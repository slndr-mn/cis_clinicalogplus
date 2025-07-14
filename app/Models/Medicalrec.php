<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicalrec extends Model
{
    protected $primaryKey = 'medicalrec_id';
    protected $table = 'medicalrec';
    public $timestamps = false;

    protected $fillable = [
        'medicalrec_patientid',
        'medicalrec_filename',
        'medicalrec_file',
        'medicalrec_comment',
        'medicalrec_dateadded',
        'medicalrec_timeadded',
    ];

    public function patient()
    {
        return $this->belongsTo(PatientUsers::class, 'medicalrec_patientid');
    }
}
