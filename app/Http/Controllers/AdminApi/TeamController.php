<?php

namespace App\Http\Controllers\AdminApi;

use App\Http\Controllers\Controller;
use App\Team;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $team = Team::all();
        return response()->json(["status" => 201, "data" => $team]);
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
        $team =   $request->validate([
            'name' => 'required',
        ]);
        // $user = $user + $request['phone'];
        // User::create($user)
        if ($request->priority) {
            $priority = "High";
        }
        $team = Team::create([
            'name' => $request->name,
            "description" => $request->description,
            'priority' =>  $priority,
        ]);
        return response()->json(["status" => 201, 'message' => 'team Added ', 'data' => $team]);
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


        $team =  Team::find($id);
        $team->update([
            'name' => $request->name,
        ]);
        return response()->json(["status" => 201, 'message' => 'Team Updated', 'data' => $team]);
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
            $team =  Team::destroy($id);
            return response()->json(["status" => 201, 'message' => 'Team deleted succesfully', 'data' => $team]);
        } catch (ModelNotFoundException $th) {
            return response()->json(["status" => 405, 'error' => 'Request was unsucceesful']);
        }
    }
}
