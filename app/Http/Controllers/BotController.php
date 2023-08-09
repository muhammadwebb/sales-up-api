<?php

namespace App\Http\Controllers;

use App\Http\Resources\Bot\BotResource;
use App\Models\Bot;
use App\Services\Bot\DeleteBot;
use App\Services\Bot\StoreBot;
use App\Traits\JsonRespondController;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BotController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        $bot = Bot::all();
        return BotResource::collection($bot);
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
        try {
            app(DeleteBot::class)->execute(['id' => $id]);
            return $this->respondObjectDeleted($id);
        } catch (ValidationException $exception){
            return $this->respondValidatorFailed($exception->validator);
        } catch (Exception $exception){
            $this->setHTTPStatusCode($exception->getCode());
            return $this->respondWithError($exception->getMessage());
        }
    }
}
