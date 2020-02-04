<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Location;
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
        return response()->json(["data" => $location]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location =   $request->validate([
            'name' => 'required',
            'description' => 'required|email',
        ]);
        // $user = $user + $request['phone'];
        // User::create($user)
        $location = Location::create([
            'name' => $request->name,
            "description" => $request->description,
            'priority' => $request->priority,
        ]);
        return response()->json(['message' => 'User Created', 'data' => $location]);
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
            return response()->json(['message' => 'Location created succesfully', 'data' => $location]);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Request was unsucceesful']);
        }
    }
}
