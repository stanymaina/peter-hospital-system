<?php

namespace App\Http\Controllers;

use App\Hirepurchase;
use Illuminate\Http\Request;

class HiresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hirepurchases   =   Hirepurchase::all();
        return view('purchase.index', compact('hirepurchases'));
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
        $hirepurchase   =   new Hirepurchase;
        $hirepurchase->hire_purchase_name=$request->hire_purchase_name;
        $hirepurchase->hire_purchase_percentage=$request->hire_purchase_percentage;
        $hirepurchase->hire_purchase_payment_duration=$request->hire_purchase_payment_duration;
        $hirepurchase->hire_purchase_percentage_principle=$request->hire_purchase_percentage_principle;
        $hirepurchase->hire_purchase_min_price=$request->hire_purchase_min_price;
        $hirepurchase->hire_purchase_max_price=$request->hire_purchase_max_price;
        $hirepurchase->save();
        
        return back()->with('success','Hire purchase entry added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hirepurchase  $hirepurchase
     * @return \Illuminate\Http\Response
     */
    public function show(Hirepurchase $hirepurchase)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hirepurchase  $hirepurchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Hirepurchase $hirepurchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hirepurchase  $hirepurchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hirepurchase $hirepurchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hirepurchase  $hirepurchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hirepurchase $hirepurchase)
    {
        //
    }
}
