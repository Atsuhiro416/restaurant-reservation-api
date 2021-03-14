<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LikesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $like_exist = DB::table('likes')->where('user_id', $request->user_id)->where('store_id', $request->store_id)->exists();
        if ($like_exist) {
            return $this->destroy($request);
        } else {
            $now = Carbon::now();
            $like = [
                "user_id" => $request->user_id,
                "store_id" => $request->store_id,
                "created_at" => $now,
                "updated_at" => $now,
            ];
            DB::table('likes')->insert($like);
            return response()->json([
                'message' => 'Like created successfully',
                'data' => $like,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::table('likes')->where('user_id', $request->user_id)->where('store_id', $request->store_id)->delete();
        return response()->json([
            'message' => 'Like deleted successfully',
        ], 200);
    }

    public function get_my_likes(User $user)
    {
        $my_likes = DB::select('select * from users join likes on users.id = likes.user_id join stores on likes.store_id = stores.id where users.id = :id', ['id' => $user->id] );
        return response()->json([
            'message' => 'OK',
            'data' => $my_likes,
        ], 200);
    }
}
