<?php

namespace App\Http\Controllers;

use App\Http\Requests\CooperativesRequest;
use App\Models\Cooperative;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cooperatives = Cooperative::all();
        return response()->json(["data" => $cooperatives], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CooperativesRequest $request)
    {
        $cooperative = new Cooperative;
        $cooperative->cooperativename = $request->cooperativename;
        $cooperative->description = $request->description;
        $cooperative->contact = $request->contact;
        $cooperative->locationid = $request->locationid;
        $cooperative->save();

        return response()->json(["data" => $cooperative], 201);
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
        $cooperative = Cooperative::findOrFail($id);
        return response()->json(["data" => $cooperative], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CooperativesRequest $request, $id)
    {
        $cooperative = Cooperative::findOrFail($id);
        $cooperative->cooperativename = $request->cooperativename;
        $cooperative->description = $request->description;
        $cooperative->contact = $request->contact;
        $cooperative->locationid = $request->locationid;
        $cooperative->save();

        return response()->json(["data" => $cooperative], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cooperative = Cooperative::findOrFail($id);
        $cooperative->delete();
        return response()->json(["data" => $cooperative], 200);
    }
}
