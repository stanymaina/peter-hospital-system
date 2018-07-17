<?php

namespace App\Http\Controllers;

use View;
use App\Patient;
use App\Userdetail;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function patients(Request $request, Userdetail $patient){

        return redirect()->route('patient.edit', ['id'=> $patient]);
        // $patient =   Userdetail::where('user_type', 'Patient')->where('id', $patient)->get();
        return View::make('patient.edit');

    }
}
