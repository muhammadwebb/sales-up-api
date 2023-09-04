<?php

namespace App\Http\Controllers;

use App\Services\Message\SendAllMessage;
use App\Services\Message\StoreMessage;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class MessageController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            app(StoreMessage::class)->execute(['lead_id' => $request->lead_id, 'text' => $request->text]);
            return $this->respondSuccess();
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        }
    }


    public function show(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function send_all(Request $request)
    {
        try {
            app(SendAllMessage::class)->execute(['text' => $request->text]);
            return $this->respondSuccess();
        } catch (ValidationException $exception) {
            return $this->respondValidatorFailed($exception->validator);
        }
    }
}
