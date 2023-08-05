<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateCompany extends BaseService
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
    public function execute(array $data): bool
    {
        $this->validate($data);
        Company::where('id', $data['id'])->update($data[0]);
        return true;
    }
}
