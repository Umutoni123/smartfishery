<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->type != 'admin') {
            return response()->json(["message" => "You are not authorized"], 401);
        }

        $User = User::all();
        return response()->json(["data" => $User], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if ($request->user()->type != 'admin') {
            return response()->json(["message" => "You are not authorized"], 401);
        }

        $User = User::findOrFail($id);
        return response()->json(["data" => $User], 200);
    }

    public function store(CreateUserRequest $request)
    {
        if ($request->user()->type != 'admin') {
            return response()->json(["message" => "You are not authorized"], 401);
        }
        
        $User = new User;
        $User->full_name = $request->full_name;
        $User->email = $request->email;
        $User->phone_number = $request->phone_number;
        $User->password = bcrypt($request->password);
        $User->role_id = $request->role_id;
        $User->type = 'cooperativemanager';
        $User->save();

        return response()->json(["data" => $User], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        if ($request->user()->id != $id && $request->user()->type != 'admin') {
            return response()->json(["message" => "You are not authorized"], 401);
        }

        $User = User::findOrFail($id);
        if ($request->full_name) {
            $User->full_name = $request->full_name;
        }
        if ($request->email) {
            $User->email = $request->email;
        }
        if ($request->phone_number) {
            $User->phone_number = $request->phone_number;
        }
        if ($request->password) {
            $User->password = bcrypt($request->password);
        }
        $User->save();

        return response()->json(["data" => $User], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if ($request->user()->type != 'admin') {
            return response()->json(["message" => "You are not authorized"], 401);
        }

        $User = User::findOrFail($id);
        $User->delete();

        return response()->json(["data" => $User], 200);
    }
}
