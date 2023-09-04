<?php

namespace App\Http\Controllers;

use App\Http\Resources\Order\OrderResource;
use App\Models\Order;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use JsonRespondController;

    public function index()
    {
        return OrderResource::collection(Order::all());
    }


    public function store(Request $request)
    {
        //
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
