<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $User = User::all();
        return response()->json(["data" => $User], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::findOrFail($id);
        return response()->json(["data" => $User], 200);
    }

    // update user info

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request, $id)
    {
        $User = User::findOrFail($id);
        if ($request->name) {
            $User->name = $request->name;
        }
        if ($request->email) {
            $User->email = $request->email;
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
    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $User->delete();

        return response()->json(["data" => $User], 200);
    }
}
