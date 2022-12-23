<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecommendedTreatmentRequest;
use App\Models\recommended_treatment;
use Illuminate\Http\Request;

class Recommended_treattmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Recommended_treatment = recommended_treatment::all();
        return response()->json(["data" => $Recommended_treatment], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecommendedTreatmentRequest $request)
    {
        $Recommended_treatment = new recommended_treatment;
        $Recommended_treatment->Recommended_treatment = $request->Recommended_treatment;
        $Recommended_treatment->save();

        return response()->json(["data" => $Recommended_treatment], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Recommended_treatment = Recommended_treatment::findOrFail($id);
        return response()->json(["data" => $Recommended_treatment], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecommendedTreatmentRequest $request, $id)
    {
        $Recommended_treatment = Recommended_treatment::findOrFail($id);
        $Recommended_treatment->Recommended_treatment = $request->Recommended_treatment;
        $Recommended_treatment->save();

        return response()->json(["data" => $Recommended_treatment], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Recommended_treatment = Recommended_treatment::findOrFail($id);
        $Recommended_treatment->delete();

        return response()->json(["data" => $Recommended_treatment], 200);
    }
}
