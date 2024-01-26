<?php

namespace App\Http\Controllers;
use App\Models\RestAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestAPIsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(['data'=>RestAPI::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'last' => 'required|string',
            'age' => 'required',
            'contact' => 'required',
            'email' => 'required|email',
        ]);
        $restAPI = RestAPI::create($data);

        return response()->json(['data' => $restAPI], 201); // 201 Created status code
   
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, RestAPI $RestAPI)
    {
        return response()->json(['data' => $RestAPI->find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, RestAPI $RestAPI)
    {
        return response()->json(['data' => $RestAPI->find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $restAPI = RestAPI::find($id);

        // Check if the record exists
        if (!$restAPI) {
            return response()->json(['error' => 'Record not found'], 404);
        }
        $data = $request->validate([
            'name' => 'required|string',
            'last' => 'required|string',
            'age' => 'required|integer',
            'contact' => 'required',
            'email' => 'required|email',
        ]);
        $restAPI->update($data);

        return response()->json(['data' => $restAPI], 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $restAPI = RestAPI::find($id);

        // Check if the record exists
        if (!$restAPI) {
            return response()->json(['error' => 'Record not found'], 404);
        }
    
        // Delete the record
        $restAPI->delete();
    
        // Return a success response
        return response()->json(['message' => 'Record deleted successfully'], 200);
    
    }
}
