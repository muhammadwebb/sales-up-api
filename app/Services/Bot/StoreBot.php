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
        $company = Company::where('user_id', auth()->id())->first();
        Bot::create([
            'company_id' => $company->id,
            'token' => $data['token'],
            'username' => $data['username'],
            'contact' => $data['contact'],
        ]);
        return true;
    }
}
