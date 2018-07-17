<?php

namespace App\Http\Controllers;

use View;
use App\Patient;
use App\Userdetail;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients =   Userdetail::where('user_type', 'Patient')->get();
        return view('patient.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user_details = new Userdetail;
        $user_details ->surname =  $request->surname;
        $user_details ->other_names =  $request->other_names;
        $user_details ->id_number =  $request->id_number;
        $user_details ->phone_number =  $request->phone_number;
        $user_details ->alt_phone_number =  $request->alt_phone_number;
        $user_details ->next_kin_name =  $request->next_kin_name;
        $user_details ->kin_phone_number =  $request->kin_phone_number;
        $user_details ->user_type =  'Patient';
        $saved  =   $user_details ->save();

        return back()->with('success','Patient saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Userdetail $patient)
    {
        //$patient =   Userdetail::where('user_type', 'Patient')->where('id', $patient->id)->get();
        return View::make('patient.edit', compact('patient'));
        //return $patient;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        $user_details = $patient;
        $user_details ->surname =  $request->surname;
        $user_details ->other_names =  $request->other_names;
        $user_details ->id_number =  $request->id_number;
        $user_details ->phone_number =  $request->phone_number;
        $user_details ->alt_phone_number =  $request->alt_phone_number;
        $user_details ->next_kin_name =  $request->next_kin_name;
        $user_details ->kin_phone_number =  $request->kin_phone_number;
        $user_details ->user_type =  'Patient';
        $user_details ->save();

        return redirect()->url('patients')->with('success','Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete(patient);
        
        return redirect()->url('patients')->with('success','Patient updated successfully.');
    }
}
