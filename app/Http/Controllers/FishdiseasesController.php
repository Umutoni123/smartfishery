<?php

namespace App\Http\Controllers;

use App\Http\Requests\FishdiseasesRequest;
use App\Models\Fishdiseases;

class FishdiseasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fishdiseases = Fishdiseases::all();
        return response()->json(["data" => $Fishdiseases], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FishdiseasesRequest $request)
    {
        $Fishdiseases = new Fishdiseases;
        $Fishdiseases->name = $request->name;
        $Fishdiseases->symptoms = $request->symptoms;
        $Fishdiseases->medication = $request->medication;
        $Fishdiseases->medication_details = $request->medication_details;
        $Fishdiseases->save();

        return response()->json(["data" => $Fishdiseases], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Fishdiseases = Fishdiseases::findOrFail($id);
        return response()->json(["data" => $Fishdiseases], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FishdiseasesRequest $request, $id)
    {
        $Fishdiseases = Fishdiseases::findOrFail($id);
        $Fishdiseases->name = $request->name;
        $Fishdiseases->symptoms = $request->symptoms;
        $Fishdiseases->medication = $request->medication;
        $Fishdiseases->medication_details = $request->medication_details;
        $Fishdiseases->save();

        return response()->json(["data" => $Fishdiseases], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Fishdiseases = Fishdiseases::findOrFail($id);
        $Fishdiseases->delete();

        return response()->json(["data" => $Fishdiseases], 200);
    }
}
