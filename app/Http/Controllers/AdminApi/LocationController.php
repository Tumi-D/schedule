<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Location;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = Location::all();
        return response()->json(["status" => 201, "data" => $location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $priority = "Normal";
        $location =   $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        // $user = $user + $request['phone'];
        // User::create($user)
        if ($request->priority) {
            $priority = "High";
        }
        $location = Location::create([
            'name' => $request->name,
            "description" => $request->description,
            'priority' =>  $priority,
        ]);
        return response()->json(["status" => 201, 'message' => 'Location Added ', 'data' => $location]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $priority = "Normal";
        if ($request->priority) {
            $priority = "High";
        }

        $location =  Location::find($id);
        $location->update([
            'name' => $request->name,
            "description" => $request->description,
            'priority' =>  $priority
        ]);
        return response()->json(["status" => 201, 'message' => 'Location Updated', 'data' => $location]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $location =  Location::destroy($id);
            return response()->json(["status" => 201, 'message' => 'Location created succesfully', 'data' => $location]);
        } catch (ModelNotFoundException $th) {
            return response()->json(["status" => 405, 'error' => 'Request was unsucceesful']);
        }
    }
}
