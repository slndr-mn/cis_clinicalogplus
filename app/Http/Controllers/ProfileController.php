<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($filename)
    {
        $user = Auth::user();

        $path = storage_path('app/public/profile_images/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        } 

        return response()->file($path);
    }
}
