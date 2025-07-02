<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PatientStudents extends Model
{
  use HasFactory;

    protected $table = 'patstudents';
    protected $primaryKey = 'student_id';
    public $incrementing = true;
    public $timestamps = true;

    protected $fillable = [
        'student_idnum',
        'student_patientid',
        'student_program',
        'student_major',
        'student_year',
        'student_section',
    ];

    /**
     * Relationship: A student belongs to a patient.
     */
    public function patient()
    {
        return $this->belongsTo(PatientUsers::class, 'student_patientid', 'patient_id');
    }
}
