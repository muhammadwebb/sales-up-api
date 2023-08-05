<?php

namespace App\Services\Course;

use App\Models\Company;
use App\Models\Course;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class IndexCourse extends BaseService
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);
        $company = Company::where('user_id',auth()->id())->first();
        $courses = Course::where('company_id', $company->id)->get();
        return $courses;
    }
}
