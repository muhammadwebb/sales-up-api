<?php

namespace App\Http\Controllers;

use App\Http\Resources\Lead\LeadResource;
use App\Models\Lead;
use App\Services\Lead\IndexLeadService;
use App\Traits\JsonRespondController;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    use JsonRespondController;

    public function index()
    {
//        $leads = app(IndexLeadService::class)->execute();
        return LeadResource::collection(Lead::all());
    }


    public function store(Request $request)
    {

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
