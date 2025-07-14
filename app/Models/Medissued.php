<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medissued extends Model
{
    protected $primaryKey = 'mi_id';
    protected $table = 'medissued';
    public $timestamps = false;

    protected $fillable = [
        'mi_medstockid',
        'mi_medqty',
        'mi_date',
    ];

    public function medstock()
    {
        return $this->belongsTo(Medstock::class, 'mi_medstockid');
    }
}
