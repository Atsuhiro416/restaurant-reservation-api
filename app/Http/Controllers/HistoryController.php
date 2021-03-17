<?php

namespace App\Http\Controllers;

use App\History;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HistoryController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $history_exist = DB::table('histories')->where('user_id', $request->user_id)->where('store_id', $request->store_id)->exists();
        if ($history_exist) {
            return $this->update($request);
        } else {
            $now = Carbon::now();
            $history = [
                "user_id" => $request->user_id,
                "store_id" => $request->store_id,
                "clicks" => 1,
                "created_at" => $now,
                "updated_at" => $now,
            ];
            DB::table('histories')->insert($history);
            return response()->json([
                'message' => 'History created successfully',
                'data' => $history,
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        History::where('user_id', $request->user_id)->where('store_id', $request->store_id)->increment('clicks');
        $history = History::where('user_id', $request->user_id)->where('store_id', $request->store_id)->first();
        return response()->json([
            'message' => 'History updated successfully',
            'data' => $history,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }

    public function get_my_histories(User $user)
    {
        $my_histories = DB::select('select * from histories join stores on histories.store_id = stores.id where histories.user_id = :id order by histories.updated_at desc', ['id' => $user->id]);
        return response()->json([
            'message' => 'OK',
            'data' => $my_histories,
        ], 200);
    }
}
