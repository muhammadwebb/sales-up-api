<?php

namespace App\Services\Course;

use App\Models\Company;
use App\Models\Course;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreCourse extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $company = Company::where('user_id',auth()->id())->first();
        Course::create([
            'company_id' => $company->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            ]);

        return true;
    }
}
