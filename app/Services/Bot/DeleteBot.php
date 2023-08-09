<?php

namespace App\Services\Bot;

use App\Models\Bot;
use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteBot extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:bots,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $company = Company::where('is_current_active', true)->first();
        $bot = Bot::find($data['id']);
        if ($bot->company_id == $company->id){
            $bot->delete();
        } else{
            throw new \Exception('You cannot deleted this bot',403);
        }
        return true;
    }
}
