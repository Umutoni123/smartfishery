<?php

namespace App\Http\Controllers;

use App\Http\Requests\FishPondsRequest;
use App\Models\PondDiseases;

class FishPondDiseasesController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PondDiseases = PondDiseases::all();
        return response()->json(["data" => $PondDiseases], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FishPondsRequest $request)
    {
        $PondDiseases = new PondDiseases;
        $PondDiseases->pond_id = $request->pond_id;
        $PondDiseases->fish_disease = $request->fish_disease;
        $PondDiseases->status = $request->status;
        $PondDiseases->save();

        return response()->json(["data" => $PondDiseases], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PondDiseases = PondDiseases::findorFail($id);
        return response()->json(["data" => $PondDiseases], 200);
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
        $PondDiseases = PondDiseases::findorFail($id);
        $PondDiseases->pond_id = $request->pond_id;
        $PondDiseases->fish_disease = $request->fish_disease;
        $PondDiseases->status = $request->status;
        $PondDiseases->save();

        return response()->json(["data" => $PondDiseases], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PondDiseases = PondDiseases::findorFail($id);
        $PondDiseases->delete();

        return response()->json(["data" => $PondDiseases], 200);
    }
}
