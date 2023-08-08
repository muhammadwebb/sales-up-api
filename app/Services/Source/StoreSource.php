<?php

namespace App\Services\Source;

use App\Models\Company;
use App\Models\Source;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreSource extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'type_id' => 'required|exists:types,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $company = Company::where('is_current_active', true)->first();
        Source::create([
            'company_id' => $company->id,
            'type_id' => $data['type_id'],
            'title' => $data['title']
        ]);
        return true;
    }
}
