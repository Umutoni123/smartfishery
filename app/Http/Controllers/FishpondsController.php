<?php

namespace App\Http\Controllers;

use App\Http\Requests\FishPondsRequest;
use App\Models\fishponds;
use App\Models\userroles;
use Illuminate\Http\Request;

class FishpondsController extends Controller
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
            $Fishponds = fishponds::where('cooperative_id', $userroles->cooperative_id)->get();
            return response()->json(["data" => $Fishponds], 200);
        } else {
            $Fishponds = fishponds::all();
            return response()->json(["data" => $Fishponds], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FishPondsRequest $request)
    {
        $Fishponds = new fishponds;
        $Fishponds->name = $request->name;
        $Fishponds->cooperative_id = $request->cooperative_id;
        $Fishponds->save();

        return response()->json(["data" => $Fishponds], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Fishponds = Fishponds::findorFail($id);
        return response()->json(["data" => $Fishponds], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FishPondsRequest $request, $id)
    {
        $Fishponds = Fishponds::findorFail($id);
        $Fishponds->name = $request->name;
        $Fishponds->cooperative_id = $request->cooperative_id;
        $Fishponds->save();

        return response()->json(["data" => $Fishponds], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Fishponds = Fishponds::findorFail($id);
        $Fishponds->delete();

        return response()->json(["data" => $Fishponds], 200);
    }
}
