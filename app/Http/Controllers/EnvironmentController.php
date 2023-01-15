<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use App\Models\fishponds;
use App\Models\userroles;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if ($req->user()->type == 'cooperativemanager') {
            $userroles = userroles::where('user_id', $req->user()->id)->first();
            $Fishponds = fishponds::where('cooperative_id', $userroles->cooperative_id)->select()->get();
            $Environment = Environment::whereIn('pond_id', $Fishponds->pluck('id'))->get();
            return response()->json(["data" => $Environment], 200);
        } else {
        $Environment = Environment::all();
        return response()->json(["data" => $Environment], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Environment = new Environment;
        $Environment->temperature = $request->temperature;
        $Environment->ph = $request->ph;
        $Environment->pond_id = $request->pond_id;
        $Environment->fish_type = $request->fish_type;
        $Environment->save();

        return response()->json(["data" => $Environment], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Environment = Environment::findOrFail($id);
        return response()->json(["data" => $Environment], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Environment = Environment::findOrFail($id);

        $Environment->temperature = $request->temperature;
        $Environment->ph = $request->ph;
        $Environment->pond_id = $request->pond_id;
        $Environment->fish_type = $request->fish_type;
        $Environment->save();

        return response()->json(["data" => $Environment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Environment = Environment::findOrFail($id);
        $Environment->delete();

        return response()->json(["data" => $Environment], 200);
    }
}
