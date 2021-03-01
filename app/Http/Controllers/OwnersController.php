<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Owner;
use Illuminate\Support\Facades\Hash;

class OwnersController extends Controller
{
    public function post(Request $request)
    {
        $owner = new Owner;
        $owner->name = $request->name;
        $owner->email = $request->email;
        $owner->password = Hash::make($request->password);
        $owner->save();
        return response()->json([
            'message' => 'Owner created successfully',
            'data' => $owner,
        ], 200);
    }
}
