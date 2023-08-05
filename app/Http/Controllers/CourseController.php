<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company\CourseResource;
use App\Http\Resources\Course\AllCoursesResource;
use App\Services\Course\DeleteCourse;
use App\Services\Course\IndexCourse;
use App\Services\Course\ShowCourse;
use App\Services\Course\StoreCourse;
use App\Services\Course\UpdateCourse;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CourseController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        try {
            $courses = app(IndexCourse::class)->execute([]);
            return AllCoursesResource::collection($courses);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function store(Request $request)
    {
        try {
            app(StoreCourse::class)->execute($request->all());
            return $this->respondSuccess();
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function show(string $id)
    {
        try {
            $course = app(ShowCourse::class)->execute(['id' => $id]);
            return new CourseResource($course);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (ModelNotFoundException){
            return $this->respondNotFound();
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            app(UpdateCourse::class)->execute(['id' => $id, $request->all()]);
            return $this->respondObjectUpdated($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }


    public function destroy(String $id)
    {
        try {
            app(DeleteCourse::class)->execute(['id' => $id]);
            return $this->respondObjectDeleted($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }

    }
}
