<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Services\Status\DeleteStatus;
use App\Services\Status\StoreStatus;
use App\Services\Status\UpdateStatus;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class StatusController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        return Status::all('title');
    }


    public function store(Request $request)
    {
        try {
            app(StoreStatus::class)->execute($request->all());
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
            app(UpdateStatus::class)->execute(['id' => $id, $request->all()]);
            return $this->respondObjectUpdated($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function destroy(string $id)
    {
        try {
            app(DeleteStatus::class)->execute(['id' => $id]);
            return $this->respondObjectDeleted($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
