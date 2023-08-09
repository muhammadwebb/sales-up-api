<?php

namespace App\Services\Course;

use App\Models\Company;
use App\Models\Course;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteCourse extends BaseService
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
        $company = auth()->user()->companies->where('is_current_active', true)->first();
        $course = Course::find($data['id']);

        if ($course->company_id == $company->id){
            $course->delete();
        } else{
            throw new \Exception('You cannot delete this course',401);
        }
        return true;
    }
}
