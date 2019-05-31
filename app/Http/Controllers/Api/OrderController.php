<?php

namespace App\Http\Controllers\Api;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
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

        $validate = $request->validate([
            'user_id' => 'required',
            'worker_id' => 'required',
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'worker_id' => $request->worker_id,
            'title' => $request->title,
            'body' => $request->body,
            'is_done' => 0,
        ]);

        return response()->json(['code' => 200, 'order' => $order, 'status' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $user = $request->user();
        if ($user->job === 1) {
            $data = Order::where('worker_id', $user->id)->get();
        } else {
            $data = Order::where('user_id', $user->id)->get();
        }
        return response()->json(['code' => '200', 'data' => $data, 'status'=> true], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $order = Order::where('id', $request->order_id)->first();
        $order->is_done = $request->is_done;

        $order->save();

        return response()->json(['code' => 200, 'data' => $order, 'message' => 'Order has been done', 'status' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
