<?php

namespace App\Services\Message;

use App\Models\Lead;
use App\Models\Message;
use App\Services\BaseService;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Validation\ValidationException;

class StoreMessage extends BaseService
{
    public function rules(): array
    {
        return [
            'lead_id' => 'required|exists:leads,id',
            'text' => 'required|string|max:255'
        ];
    }

    /**
     * @throws ValidationException
     *
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $lead = Lead::find($data['lead_id']);
        $chat = TelegraphChat::where('chat_id', $lead->chat_id)->first();
        $chat->message($data['text'])->send();
        Message::create([
            'lead_id' => $data['lead_id'],
            'text' => $data['text']
        ]);
        return true;
    }
}
