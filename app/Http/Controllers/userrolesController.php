<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRolesRequest;
use App\Models\userroles;
use Illuminate\Http\Request;

class userrolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userroles = userroles::all();
        return response()->json(["data" => $userroles], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRolesRequest $request)
    {
        $userroles = new userroles;
        $userroles->user_id = $request->user_id;
        $userroles->location_id = $request->location_id;
        $userroles->cooperative_id = $request->cooperative_id;
        $userroles->save();

        return response()->json(["data" => $userroles], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userroles = userroles::findOrFail($id);
        return response()->json(["data" => $userroles], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRolesRequest $request, $id)
    {
        $userroles = userroles::findOrFail($id);
        $userroles->user_id = $request->user_id;
        $userroles->location_id = $request->location_id;
        $userroles->cooperative_id = $request->cooperative_id;
        $userroles->save();

        return response()->json(["data" => $userroles], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userroles = userroles::findOrFail($id);
        $userroles->delete();

        return response()->json(["data" => $userroles], 200);
    }
}
