<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class ShowCompany extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:companies,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): array
    {
        $this->validate($data);
//        $company = Company::where('id', $data['id'])->first();
        $company = Company::find($data['id']);
        return [$company];
    }
}
