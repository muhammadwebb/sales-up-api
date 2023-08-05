<?php

namespace App\Services\Course;

use App\Models\Course;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class ShowCourse extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:courses,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data)
    {
        $this->validate($data);
        $course = Course::find($data['id']);
//        $sum = $course->clicked + 1;
//        $course->update(['clicked' => $sum]);
        return $course;
    }
}
