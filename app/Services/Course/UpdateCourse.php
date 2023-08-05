<?php

namespace App\Services\Course;

use App\Models\Company;
use App\Models\Course;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateCourse extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:courses,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws \Exception
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $course = Course::find($data['id']);
        $company = Company::where('user_id', auth()->id())->first();

        if ($course->company_id == $company->id){
            $course->update($data[0]);
        } else{
            throw new \Exception('You cannot update this course',401);
        }

        return true;
    }
}
