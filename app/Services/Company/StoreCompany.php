<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreCompany extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:255',
            'phone' => 'required|unique:companies,phone',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        Company::create([
            'user_id' => auth()->id(),
            'title' => $data['title'],
            'description' => $data['description'],
            'phone' => $data['phone'],
        ]);
        return true;
    }
}
