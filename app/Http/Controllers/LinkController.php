<?php

namespace App\Http\Controllers;

use App\Http\Resources\Link\LinkResource;
use App\Models\Link;
use App\Services\Link\StoreLink;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LinkController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        $link = Link::all();
        return LinkResource::collection($link);
    }


    public function store(Request $request)
    {
        try {
            app(StoreLink::class)->execute(['source_id' => $request->source_id, 'price' => $request->price]);
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
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
