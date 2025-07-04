<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientRecordController extends Controller
{
    /**
     * Display a listing of the medicines.
     */
    public function index()
    {
        return view('admin.patientRecord'); // placeholder view
    }
}
