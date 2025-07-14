<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pataddress extends Model
{
    //protected $table = 'pataddresses';
    protected $primaryKey = 'address_id';
    public $timestamps = false;

    protected $fillable = [
        'address_patientid',
        'address_region',
        'address_province',
        'address_municipality',
        'address_barangay',
        'address_prkstrtadd',
    ];

    // Relationship: belongs to patient
    public function patient()
    {
        return $this->belongsTo(PatientUsers::class, 'address_patientid', 'patient_id');
    }
}
