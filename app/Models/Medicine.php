<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $primaryKey = 'medicine_id';
    protected $table = 'medicine';
    public $timestamps = false;

    protected $fillable = ['medicine_id', 'medicine_name', 'medicine_category'];

    public function medstocks()
    {
        return $this->hasMany(Medstock::class, 'medicine_id');
    }
}
