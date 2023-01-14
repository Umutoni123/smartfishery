<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationsRequest;
use App\Models\Locations;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Location = Locations::all();
        return response()->json(["data" => $Location], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationsRequest $request)
    {
        $Location = new Locations;
        $Location->location_name = $request->location_name;
        $Location->province = $request->province;
        $Location->district = $request->district;
        $Location->sector = $request->sector;
        $Location->cell = $request->cell;
        $Location->save();

        return response()->json(["data" => $Location], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Location = Locations::findOrFail($id);
        return response()->json(["data" => $Location], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationsRequest $request, $id)
    {
        $Location = Locations::findOrFail($id);
        $Location->location_name = $request->location_name;
        $Location->province = $request->province;
        $Location->district = $request->district;
        $Location->sector = $request->sector;
        $Location->cell = $request->cell;
        $Location->save();

        return response()->json(["data" => $Location], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Location = Locations::findOrFail($id);
        $Location->delete();

        return response()->json(["data" => $Location], 200);
    }
}
