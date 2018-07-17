<?php

namespace App\Http\Controllers;

use Auth;
use View;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =   Order::all();
        return view('order.index', compact('orders'));
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
        $order  =   new Order;
        $order  ->user_id       =   Auth::user()->id;
        $order  ->product_id    =   $request->ProductId;
        $order  ->order_price   =   $request->OrderPrice;
        $order  ->save();

        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $order1=$order->user->name;
        $order2=$order->product->product_name;
        $order3=$order->planId->hire_purchase_name;

        $compact = compact('order1', 'order2', 'order3');
        return $compact;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return View::make('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function makeOrder($productid, $planid, $orderprice){
        $compact = compact('productid', 'planid', 'orderprice');

        $newOrder   =   new Order;
        $newOrder->user_id      = Auth::user()->id;
        $newOrder->product_id   = $productid;
        $newOrder->hire_purchase_id =   $planid;
        $newOrder->order_price  = $orderprice;
        $newOrder->save();
        
        // return $compact;
        return back()->with('success','Order placed successfully.');
    }
}
