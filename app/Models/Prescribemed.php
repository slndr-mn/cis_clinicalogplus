<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescribemed extends Model
{
    protected $primaryKey = 'pm_id';
    protected $table = 'prescribemed';
    public $timestamps = false;

    protected $fillable = [
        'pm_consultid',
        'pm_medstockid',
        'pm_medqty',
    ];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'pm_consultid');
    }

    public function medstock()
    {
        return $this->belongsTo(Medstock::class, 'pm_medstockid');
    }
}
