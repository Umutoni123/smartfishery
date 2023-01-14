<?php

namespace App\Http\Controllers;

use App\Models\fishtypes;
use Illuminate\Http\Request;

class FishtypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Fishtypes = fishtypes::all();
        return response()->json(["data" => $Fishtypes], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Fishtypes = new fishtypes;
        $Fishtypes->fish_name = $request->fish_name;
        $Fishtypes->save();

        return response()->json(["data" => $Fishtypes], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Fishtypes = Fishtypes::findOrFail($id);
        return response()->json(["data" => $Fishtypes], 200);
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
        $Fishtypes = Fishtypes::findOrFail($id);

        $Fishtypes->fish_name = $request->fish_name;
        $Fishtypes->save();

        return response()->json(["data" => $Fishtypes], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Fishtypes = Fishtypes::findOrFail($id);
        $Fishtypes->delete();

        return response()->json(["data" => $Fishtypes], 200);
    }
}
