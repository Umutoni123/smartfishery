<?php

namespace App\Http\Controllers;

use App\Http\Requests\FishPondsRequest;
use App\Models\fishponds;

class FishpondsController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fishponds = fishponds::all();
        return response()->json(["data" => $Fishponds], 200);
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
        $Fishponds->Pond_name = $request->Pond_name;
        $Fishponds->locationi = $request->locationi;
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
        $Fishponds->Pond_name = $request->Pond_name;
        $Fishponds->locationi = $request->locationi;
        // save with Pond_Id = $id
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
