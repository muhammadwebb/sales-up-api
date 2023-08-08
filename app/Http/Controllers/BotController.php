<?php

namespace App\Http\Controllers;

use App\Services\Bot\StoreBot;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BotController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        //
    }


    public function store(Request $request)
    {
        try {
            app(StoreBot::class)->execute($request->all());
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
}
