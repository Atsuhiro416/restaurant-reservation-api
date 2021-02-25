<?php

namespace App\Http\Controllers;

use App\Http\Requests\PutPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function get(Request $request)
    {
        if($request->has('email')) {
            $user = DB::table('users')->where('email', $request->email)->get();
            return response()->json([
                'message' => 'User got successfully',
                'data' => $user,
            ], 200);
        } else {
            return response()->json([
                'status' => 'not found'
            ], 404);
        }
    }

    public function put(PutPassword $request)
    {
        $param = [
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];
        DB::table('users')->where('email', $request->email)->update($param);
        return response()->json([
            'message' => 'User updated successfully',
            'data' => $param,
        ], 200);
    }
}
