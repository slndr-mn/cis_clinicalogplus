<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $primaryKey = 'consult_id';
    protected $table = 'consultations';
    public $timestamps = false;

    protected $fillable = [
        'consult_patientid',
        'consult_diagnosis',
        'consult_treatmentnotes',
        'consult_remark',
        'consult_date',
        'consult_timein',
        'consult_timeout',
        'consult_timespent',
    ];

    public function patient()
    {
        return $this->belongsTo(PatientUsers::class, 'consult_patientid');
    }

    public function prescribedMeds()
    {
        return $this->hasMany(Prescribemed::class, 'pm_consultid');
    }
}
