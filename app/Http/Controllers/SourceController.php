<?php

namespace App\Http\Controllers;

use App\Http\Resources\Source\SourceResource;
use App\Models\Source;
use App\Services\Source\DeleteSource;
use App\Services\Source\StoreSource;
use App\Services\Source\UpdateSource;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SourceController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        $source = Source::all('type_id', 'company_id', 'title');
        return SourceResource::collection($source);
    }


    public function store(Request $request)
    {
        try {
            app(StoreSource::class)->execute(['title' => $request->title, 'type_id' => $request->type_id]);
            return $this->respondSuccess();
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        try {
            app(UpdateSource::class)->execute(['id' => $id, 'type_id' => $request->type_id, 'title' => $request->title]);
            return $this->respondObjectUpdated($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }


    public function destroy(string $id)
    {
        try {
            app(DeleteSource::class)->execute(['id' => $id]);
            return $this->respondObjectUpdated($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }
}
