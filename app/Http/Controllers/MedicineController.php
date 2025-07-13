<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Medstock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource. 
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $medicines = Medicine::all();
        $medstocks = Medstock::with('medicine')->get();


        return view('admin.medicineRecord', [
            'admin' => $admin,
            'medicines' => $medicines,
            'medstocks' => $medstocks
        ]);
    }



    public function save(Request $request)
    {
        $medicineId = $request->input('medicineId');

        $rules = [
            'medicineName' => 'required|max:100|unique:medicine,medicine_name',
            'medicineCategory' => 'required|max:50',
        ];

        if ($medicineId) {
            $rules['medicineName'] = 'required|max:100|unique:medicine,medicine_name,' . $medicineId . ',medicine_id';
        }


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            if ($validator->errors()->has('medicineName')) {
                $name = $request->input('medicineName');
                $validator->errors()->add('medicineName', "The medicine name '{$name}' already exists.");
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proceed with save
        if ($medicineId) {
            $medicine = Medicine::findOrFail($medicineId);
            $medicine->update([
                'medicine_name' => $request->input('medicineName'),
                'medicine_category' => $request->input('medicineCategory'),
            ]);
            return back()->with('success', 'Medicine updated successfully.');
        } else {
            Medicine::create([
                'medicine_name' => $request->input('medicineName'),
                'medicine_category' => $request->input('medicineCategory'),
            ]);
            return back()->with('success', 'Medicine added successfully.');
        }
    }



    public function storemedstock(Request $request)
    {
        $request->validate([
            'medicine_id' => [
                'required',
                'exists:medicine,medicine_id',
                Rule::unique('medstock')->where(function ($query) use ($request) {
                    return $query->where('medicine_id', $request->medicine_id)
                        ->where('medstock_dosage', $request->medstock_dosage)
                        ->where('medstock_unit', $request->medstock_unit)
                        ->where('medstock_expirationdt', $request->medstock_expirationdt);
                }),
            ],
            'medstock_qty' => 'required|integer|min:1',
            'medstock_dosage' => 'nullable|max:50',
            'medstock_unit' => 'required|max:10',
            'medstock_dateadded' => 'required|date',
            'medstock_timeadded' => 'required',
            'medstock_expirationdt' => 'required|date|after_or_equal:medstock_dateadded',
        ], [
            'medicine_id.unique' => 'This stock entry already exists (duplicate dosage, unit, and expiration).'
        ]);

        Medstock::create([
            'medicine_id' => $request->medicine_id,
            'medstock_qty' => $request->medstock_qty,
            'medstock_origqty' => $request->medstock_qty,
            'medstock_dosage' => $request->medstock_dosage,
            'medstock_unit' => $request->medstock_unit,
            'medstock_dateadded' => $request->medstock_dateadded,
            'medstock_timeadded' => $request->medstock_timeadded,
            'medstock_expirationdt' => $request->medstock_expirationdt,
            'medstock_disabled' => 0,
        ]);


        return redirect()->back()->with('success', 'Stock added.');
    }

    public function updateMedstock(Request $request)
    {
        $request->validate([
            'editid' => 'required|exists:medstock,medstock_id',
            'editname' => 'required|exists:medicine,medicine_id',
            'editquantity' => 'required|integer|min:0',
            'editDS' => 'nullable|string|max:50',
            'editED' => 'required|date',
            'editunit' => 'required|string|max:10',
            'editDisable' => 'required|boolean',
        ]);

        $medstock = Medstock::findOrFail($request->editid);

        $medstock->update([
            'medicine_id' => $request->editname,
            'medstock_origqty' => $request->editquantity,
            'medstock_dosage' => $request->editDS,
            'medstock_expirationdt' => $request->editED,
            'medstock_unit' => $request->editunit,
            'medstock_disabled' => $request->editDisable,
        ]);

        return redirect()->back()->with('success', 'Stock updated successfully.');
    }

    public function delete(Request $request)
    {
        $user = Medstock::findOrFail($request->id);

        $user->delete();

        return response()->json(['success' => 'Staff user deleted successfully.']);
    }
}
