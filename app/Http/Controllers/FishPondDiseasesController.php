<?php

namespace App\Http\Controllers;

use App\Http\Requests\FishPondDiseasesRequest;
use App\Models\fishponds;
use App\Models\PondDiseases;
use App\Models\userroles;
use Illuminate\Http\Request;

class FishPondDiseasesController extends Controller
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
            $PondDiseases = PondDiseases::whereIn('pond_id', $Fishponds->pluck('id'))->get();
            return response()->json(["data" => $PondDiseases], 200);
        } else {
        $PondDiseases = PondDiseases::all();
        return response()->json(["data" => $PondDiseases], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FishPondDiseasesRequest $request)
    {
        $PondDiseases = new PondDiseases;
        $PondDiseases->pond_id = $request->pond_id;
        $PondDiseases->fish_disease = $request->fish_disease;
        $PondDiseases->status = 'active';
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
    public function update(FishPondDiseasesRequest $request, $id)
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
