<?php

namespace App\Telegram;

use App\Models\Bot;
use App\Models\Company;
use App\Models\Course;
use App\Models\Lead;
use App\Models\Link;
use App\Models\Message;
use App\Models\Order;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Support\Stringable;
use function Laravel\Prompts\text;

class Handler extends WebhookHandler
{
    public function start(): void
    {
        $bot_token = explode(':', $this->bot->token)[0];
        $bot = Bot::where('chat_id', $bot_token)->first();

        $chat_id = $this->message->chat()->id();
        $user = Lead::where('chat_id', $chat_id)->where('company_id', $bot->company_id)->first();

        if (!$user || !$user->phone) {
            $firstName = $this->message->from()->firstName() ?? null;
            $lastName = $this->message->from()->lastName() ?? null;
            $username = $this->message->from()->username() ?? null;

            $code = explode(' ', $this->message->text())[1];
            $link = Link::where('code', $code)->first();
            $click = $link->clicked+1;

            $link->update(['clicked' => $click]);


            Lead::create([
                'company_id' => $bot->company_id,
                'link_id' => $link->id,
                'chat_id' => $chat_id,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'username' => $username,
                'page' => 'start'
            ]);

            $this->chat->message('Send your contact')->replyKeyboard(
                ReplyKeyboard::make()->resize()->buttons([
                    ReplyButton::make('Send contact')->requestContact()
                ])
            )->send();
        }
         else{
            $this->chat->message('hello')->replyKeyboard(
                ReplyKeyboard::make()->resize()
                    ->row([
                        ReplyButton::make('Courses'),
                        ReplyButton::make('About')
                    ])->row([
                        ReplyButton::make('Murajat')
                    ])
            )->send();
        }

    }

    protected function handleChatMessage(Stringable $text): void
    {
        $chat_id = $this->message->chat()->id();
        $lead = Lead::where('chat_id', $chat_id)->first();
        $page = $lead->page;
        if ($page == 'murajat'){
            $lead->update(['page' => 'main']);
            Message::create([
                'lead_id' => $lead->id,
                'text' => $text->value(),
                'message_id' => $this->message->id(),
                'is_answer' => false
                ]);
            $this->chat->message("Murajatin'iz qabillandi")->replyKeyboard(
               ReplyKeyboard::make()->resize()
                   ->row([
                       ReplyButton::make('Courses'),
                       ReplyButton::make('About')
                   ])->row([
                       ReplyButton::make('Murajat')
                   ])
           )->send();
        }

        if ($this->message->contact()){
            $phone = $this->message->contact()->phoneNumber();
            Lead::where('chat_id', $chat_id)->update(['phone' => $phone]);
            $this->chat->message('hello')->replyKeyboard(
                ReplyKeyboard::make()->resize()
                    ->row([
                        ReplyButton::make('Courses'),
                        ReplyButton::make('About')
                    ])->row([
                        ReplyButton::make('Murajat')
                    ])
            )->send();
            $lead->update(['page' => 'main']);
        } else{
            switch ($text->value()){
                case 'Courses':
                    $bot_token = explode(':', $this->bot->token)[0];
                    $bot = Bot::where('chat_id', $bot_token)->first();
                    $courses = Course::where('company_id', $bot->company_id)->get();
                    $keyboard = [];

                    foreach ($courses as $course)
                    {
                        $keyboard [] = Button::make($course['title'])->action('course')->param('id', $course['title']);
                    }
                    $this->chat->message('Course')
                        ->keyboard(Keyboard::make()->buttons($keyboard))
                        ->send();

                    $lead->update(['page' => 'courses']);
                    break;

                case 'About':
                    $bot_token = explode(':', $this->bot->token)[0];
                    $bot = Bot::where('chat_id', $bot_token)->first();
                    $company = Company::find($bot->company_id);
                    $message = '🏢 '. $company->title ."\n". $company->description."\n☎️phone number: ". $company->phone;

                    $this->chat->message($message)->send();
                    $lead->update(['page' => 'about']);
                break;
                case 'Murajat':
                    $this->chat->message("Murajatin'izdi jazip qaldirin':")->replyKeyboard(
                        ReplyKeyboard::make()->resize()->buttons([
                            ReplyButton::make('🔙 Back')
                        ])
                    )->send();

                    $lead->update(['page' => 'murajat']);

                    break;
                case '🔙 Back':
                    $this->chat->message('MENU')->replyKeyboard(
                        ReplyKeyboard::make()->resize()
                            ->row([
                                ReplyButton::make('Courses'),
                                ReplyButton::make('About')
                            ])->row([
                                ReplyButton::make('Murajat')
                            ])
                    )->send();
                    break;
            }
        }
    }


    public function course()
    {
        $id = $this->data->get('id');
        $course = Course::where('title', $id)->first();

        $this->chat->message('🔖'. $course->title ."\n". $course->description)->keyboard(Keyboard::make()
            ->buttons([
                Button::make('Kursqa jaziliw')->action('order')->param('title', $id)
            ]))
            ->send();
    }


    public function order(): void
    {
        $title = $this->data->get('title');
        $course = Course::where('title', $title)->first();
        $lead = Lead::where('chat_id', $this->callbackQuery->message()->chat()->id())->first();

        if (Order::where('course_id', $course->id)->where('lead_id', $lead->id)->first()){
            $message = 'Siz aldin bul kursqa jazilg\'ansiz.';
            $this->chat->deleteMessage($this->message->id());
            $this->chat->deleteKeyboard($this->messageId)->send();
        } else {
            Order::create([
                'course_id' => $course->id,
                'lead_id' => $lead->id,
            ]);
            $lead->update(['status_id' => 2]);
            $message = 'Siz benen tez arada baylanisamiz';
            //
            $this->chat->deleteKeyboard($this->messageId)->send();
        }
        $this->chat->message($message)->send();
    }


}



