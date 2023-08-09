<?php

namespace App\Services\Bot;

use App\Models\Bot;
use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreBot extends BaseService
{
    public function rules(): array
    {
        return [
            'token' => 'required',
            'username' => 'required',
            'contact' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        list($chat_id) = explode(":", $data['token']);
        list($https, $file_name) = explode("//t.me/", $data['username']);
        $company = Company::where('is_current_active', true)->first();
        \File::copy('telegram/sales-up-bot.php', 'telegram/'.$file_name.'.php');

        $filename = 'telegram/'.$file_name.'.php';

        Bot::create([
            'company_id' => $company->id,
            'token' => $data['token'],
            'chat_id' => $chat_id,
            'username' => $data['username'],
            'filename' => $filename,
            'contact' => $data['contact'],
        ]);


        return true;
    }
}
