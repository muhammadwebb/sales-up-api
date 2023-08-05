<?php

namespace App\Http\Controllers;

use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\Company\CompanyWithCourseResource;
use App\Models\Company;
use App\Services\Company\DeleteCompany;
use App\Services\Company\ShowCompany;
use App\Services\Company\StoreCompany;
use App\Services\Company\UpdateCompany;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompanyController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        $company = Company::where('user_id', auth()->id())->get();
        return CompanyResource::collection($company);
    }


    public function store(Request $request)
    {
        try {
            app(StoreCompany::class)->execute($request->all());
            return $this->respondSuccess();
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function show(string $id)
    {
        try {
            [$company] = app(ShowCompany::class)->execute(['id' => $id]);
            return new CompanyWithCourseResource($company);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (ModelNotFoundException){
            return $this->respondNotFound();
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            app(UpdateCompany::class)->execute(['id' => $id, $request->all()]);
            return $this->respondSuccess();
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (ModelNotFoundException){
            return $this->respondNotFound();
        }
    }


    public function destroy(string $id)
    {
        try {
            app(DeleteCompany::class)->execute(['id' => $id]);
            return $this->respondObjectDeleted($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
