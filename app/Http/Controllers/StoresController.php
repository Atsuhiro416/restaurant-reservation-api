<?php

namespace App\Http\Controllers;

use App\Store;
use Illuminate\Http\Request;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return response()->json([
            'message' => 'OK',
            'data' => $stores,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = $request->file('file')->
        getClientOriginalName();

        $store = new Store;
        $store->name = $request->name;
        $store->category = $request->category;
        $store->image = $request->file('file')->storeAs('public', $image_name);
        $store->introduction = $request->introduction;
        $store->address = $request->address;
        $store->owner_id = $request->owner_id;
        $store->save();
        return response()->json([
            'message' => 'created successfully',
            'data' => '$store',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $store = Store::where('id', $store->id)->first();
        if($store) {
            return response()->json([
                'message' => 'OK',
                'data' => $store,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $item = Store::where('id', $store->id)->first();
        $item->name = $request->name;
        $item->category = $request->category;
        $image_name = $request->file('file')->getClientOriginalName();
        $item->image = $request->file('file')->storeAs('public', $image_name);
        $item->introduction = $request->introduction;
        $item->address = $request->address;
        $item->owner_id = $request->owner_id;
        $item->save();
        if($item) {
            return response()->json([
                'message' => 'Store updated successfully',
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $item = Store::where('id', $store->id)->delete();
        if($item) {
            return response()->json([
                'message' => 'Store deleted successfully',
                'data' => $item,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }
}
