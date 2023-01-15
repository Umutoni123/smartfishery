<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Environment;
use App\Models\fishponds;
use App\Models\Production;
use App\Models\userroles;
use Illuminate\Http\Request;

class ProductionController extends Controller
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
            $Environment = Environment::whereIn('pond_id', $Fishponds->pluck('id'))->get();
            $Production = Production::whereIn('environment_id', $Environment->pluck('id'))->get();
            return response()->json(["data" => $Production], 200);
        } else {
        $Production = Production::all();
        return response()->json(["data" => $Production], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $Production = new Production;
        $Production->production_tons = $request->production_tons;
        $Production->environment_id = $request->environment_id;
        $Production->save();

        return response()->json(["data" => $Production], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Production = Production::findOrFail($id);
        return response()->json(["data" => $Production], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $Production = Production::findOrFail($id);
        $Production->production_tons = $request->production_tons;
        $Production->environment_id = $request->environment_id;
        $Production->save();

        return response()->json(["data" => $Production], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Production = Production::findOrFail($id);
        $Production->delete();

        return response()->json(["data" => $Production], 200);
    }
}
