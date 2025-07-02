<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $client = Auth::guard('patient')->user(); 
        $userId = $client->user_idnum;
 
        return view('client.dashboard', compact('client'));
    }
}
