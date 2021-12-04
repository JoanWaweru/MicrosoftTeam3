<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctors/doctor_landing');
    }

    public function patients(){
        return view('doctors/patients');
    }

    public function patientsWaiting(){
        return view('doctors/patients_waiting');
    }

    public function vitals(){
        return view('doctors/vitals');
    }
    
    public function history(){
        return view('doctors/history');
    }
}
