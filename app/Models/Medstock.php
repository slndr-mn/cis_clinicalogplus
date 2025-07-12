<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medstock extends Model
{
    protected $primaryKey = 'medstock_id';
    protected $table = 'medstock';
    public $timestamps = false;

    protected $fillable = [
        'medicine_id',
        'medstock_unit',
        'medstock_qty',
        'medstock_origqty',
        'medstock_dosage',
        'medstock_dateadded',
        'medstock_timeadded',
        'medstock_expirationdt',
        'medstock_disable'
    ];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id');
    }
}
