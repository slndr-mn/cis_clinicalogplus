<?php

namespace App\Http\Controllers;

use App\Models\StaffUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Service\UploadService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class StaffUserController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $adminusers = StaffUser::all();

        return view('admin.staffuser', [
            'admin' => $admin,
            'adminusers' => $adminusers
        ]);
    }

    public function add(Request $request, UploadService $uploadService)
    {
        $request->validate([
            'id'     => 'required|unique:staffusers,user_idnum', 
            'addfname'     => 'required|string|max:50',
            'addmname'     => 'nullable|string|max:50',
            'addlname'     => 'required|string|max:50',
            'email'     => 'required|email|unique:staffusers,user_email',
            'addposition'  => 'required|string',
            'addrole'      => 'required|string',
            'addstatus'    => 'required|in:Active,Inactive',
            'addprofile'   => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $filename = $uploadService->uploadProfile($request);

        StaffUser::create([
            'user_idnum'    => $request->id,
            'user_fname'    => $request->addfname,
            'user_mname'    => $request->addmname,
            'user_lname'    => $request->addlname,
            'user_email'    => $request->email,
            'user_position' => $request->addposition,
            'user_role'     => $request->addrole,
            'user_status'   => $request->addstatus,
            'user_password' => Hash::make($request->addid),
            'user_profile'  => $filename,
        ]);

        return redirect()->back()->with('success', 'Staff user added successfully.');
    }

    public function update(Request $request, UploadService $uploadService)
    {
        try {
            // Validate input
            $validated = $request->validate([
                'editemail' => 'required|email',
                'editprofile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            // Fetch user
            $user = StaffUser::where('user_id', $request->adminid)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['adminid' => 'User not found.']);
            }

            if ($request->hasFile('editprofile')) {
                Log::info('File received:', [$request->file('editprofile')->getClientOriginalName()]);
            } else {
                Log::warning('No file uploaded.');
            }


            // Upload profile if available
            $filename = $uploadService->uploadProfile($request);

            // Delete old profile image if new one is uploaded
            if ($filename && $user->user_profile && Storage::exists('profile_images/' . $user->user_profile)) {
                Storage::delete('profile_images/' . $user->user_profile);
            }

            // Prepare update data
            $updateData = [
                'user_idnum'    => $request->editid,
                'user_fname'    => $request->editfname,
                'user_mname'    => $request->editmname,
                'user_lname'    => $request->editlname,
                'user_email'    => $request->editemail,
                'user_position' => $request->editposition,
                'user_role'     => $request->editrole,
                'user_status'   => $request->editstatus,
            ];

            // Only update profile if new one is uploaded
            if ($filename) {
                $updateData['user_profile'] = $filename;
            }

            $user->update($updateData);

            return redirect()->back()->with('success', 'User updated successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            Log::error('Update failed: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while updating the user.');
        }
    }

    public function delete(Request $request)
    {
        $user = StaffUser::findOrFail($request->id);

        // Delete profile image if exists
        if ($user->user_profile && Storage::exists('profile_images/' . $user->user_profile)) {
            Storage::delete('profile_images/' . $user->user_profile);
        }

        $user->delete();

        return response()->json(['success' => 'Staff user deleted successfully.']);
    }
}
