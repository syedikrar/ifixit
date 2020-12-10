<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
class UserController extends Controller
{
    public function __construct() {
        // $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function allusers()
    {
        $user = User::all();
        return response()->json([
            'status' => true,
            'data'   => $user
        ]);
    }

    public function save(Request $request)
    {
        // dd($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user = $user->save();

        return response()->json([
            'status'    => true,
            'data'      => $user
        ]);
    }
}
