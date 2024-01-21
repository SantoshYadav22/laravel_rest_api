<?php

namespace App\Http\Controllers;
use App\Models\RestAPI;

use Illuminate\Http\Request;

class RestAPIController extends Controller
{
    public function index()
    {
        return RestAPI::all();
    }

    public function show(RestAPI $RestAPI)
    {
        return $RestAPI;
    }

    public function store(Request $request)
    {
        $RestAPI = RestAPI::create($request->all());
        return response()->json($RestAPI, 201);
    }

    public function update(Request $request, RestAPI $RestAPI)
    {
        $RestAPI->update($request->all());
        return response()->json($RestAPI, 200);
    }

    public function destroy(RestAPI $RestAPI)
    {
        $RestAPI->delete();
        return response()->json(null, 204);
    }
}
