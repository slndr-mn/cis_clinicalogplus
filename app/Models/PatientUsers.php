<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class PatientUsers extends Authenticatable
{
    use Notifiable;

    protected $table = 'patients';
    protected $primaryKey = 'patient_id';
    public $incrementing = true;
    
    protected $fillable = [
        'patient_fname',
        'patient_lname',
        'patient_mname',
        'patient_email',
        'patient_emailhash',
        'patient_connum',
        'patient_dob',
        'patient_sex',
        'patient_profile',
        'patient_patienttype',
        'patient_password',
        'patient_status',
        'patient_code',
    ];

    protected $hidden = [
        'patient_password',
    ];

   // Encrypt & Decrypt First Name
    public function setPatientFnameAttribute($value)
    {
        $this->attributes['patient_fname'] = Crypt::encrypt($value);
    }

    public function getpatientFnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Last Name
    public function setPatientLnameAttribute($value)
    {
        $this->attributes['patient_lname'] = Crypt::encrypt($value);
    }

    public function getPatientLnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Middle Name
    public function setPatientMnameAttribute($value)
    {
        $this->attributes['patient_mname'] = Crypt::encrypt($value);
    }

    public function getPatientMnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Contact
    public function setPatientContactAttribute($value)
    {
        $this->attributes['patient_connum'] = Crypt::encrypt($value);
    }

    public function getPatientContactAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Address
    public function setPatientAddressAttribute($value)
    {
        $this->attributes['patient_address'] = Crypt::encrypt($value);
    }

    public function getPatientAddressAttribute($value)
    {
        return Crypt::decrypt($value); 
    }

    // Encrypt Email + Auto-generate Hash
    public function setPatientEmailAttribute($value)
    {
        $this->attributes['patient_email'] = Crypt::encrypt($value);
        $this->attributes['patient_emailhash'] = hash('sha256', strtolower($value));
    }

    public function getPatientEmailAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Custom password column for Laravel Auth
    public function getAuthPassword()
    {
        return $this->patient_password;
    }
}
 