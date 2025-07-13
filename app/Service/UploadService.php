<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadService{
    public function uploadProfile(Request $request)
{
    if ($request->hasFile('editprofile')) {
        $file = $request->file('editprofile');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('profile_images', $filename, 'public');
        return $filename;
    }
    if ($request->hasFile('addprofile')) {
        $file = $request->file('addprofile');
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('profile_images', $filename, 'public');
        return $filename;
    }

    return null;
}

} 