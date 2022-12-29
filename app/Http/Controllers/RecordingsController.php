<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordingsRequest;
use App\Models\Recordings;
use Laracsv\Export as LaracsvExport;

class RecordingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Recordings = Recordings::all();
        // return response()->json(["data" => $Recordings], 200);
        $Recordings = Recordings::all();
        $csvExporter = new LaracsvExport();
        $csvExporter->build($Recordings, ['entry_id', 'temperature', 'turbidity', 'dissolved_oxygen', 'ph', 'ammonia', 'nitrate', 'population', 'fish_length', 'fish_weight', 'created_at'])->download();
    }


    // generate function to return recordings in csv format

    public function csv()
    {
        $Recordings = Recordings::all();
        $csvExporter = new LaracsvExport();
        $csvExporter->build($Recordings, ['entry_id', 'temperature', 'turbidity', 'dissolved_oxygen', 'ph', 'ammonia', 'nitrate', 'population', 'fish_length', 'fish_weight', 'created_at'])->download();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordingsRequest $request)
    {
        $Recordings = new Recordings;

        $Recordings->temperature = $request->temperature;
        $Recordings->turbidity = $request->turbidity;
        $Recordings->dissolved_oxygen = $request->dissolved_oxygen;
        $Recordings->ph = $request->ph;
        $Recordings->ammonia = $request->ammonia;
        $Recordings->nitrate = $request->nitrate;
        $Recordings->population = $request->population;
        $Recordings->fish_length = $request->fish_length;
        $Recordings->fish_weight = $request->fish_weight;

        $Recordings->save();

        return response()->json(["data" => $Recordings], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Recordings = Recordings::findorFail($id);
        return response()->json(["data" => $Recordings], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecordingsRequest $request, $id)
    {
        $Recordings = Recordings::findorFail($id);
        $Recordings->temperature = $request->temperature;
        $Recordings->turbidity = $request->turbidity;
        $Recordings->dissolved_oxygen = $request->dissolved_oxygen;
        $Recordings->ph = $request->ph;
        $Recordings->ammonia = $request->ammonia;
        $Recordings->nitrate = $request->nitrate;
        $Recordings->population = $request->population;
        $Recordings->fish_length = $request->fish_length;
        $Recordings->fish_weight = $request->fish_weight;
        $Recordings->save();

        return response()->json(["data" => $Recordings], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Recordings = Recordings::findorFail($id);
        $Recordings->delete();

        return response()->json(["data" => $Recordings], 200);
    }
}
