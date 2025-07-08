<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;

class StaffUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'staffusers';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_idnum',
        'user_fname',
        'user_lname', 
        'user_mname',
        'user_email',
        'email_hash',
        'user_contact',
        'user_address',
        'user_position',
        'user_role',
        'user_status',
        'user_profile',
        'user_password',
        'user_otpcode',
        'user_otpexpiresat'
    ];

    protected $hidden = [
        'user_password',
    ];

    // Encrypt & Decrypt First Name
    public function setUserFnameAttribute($value)
    {
        $this->attributes['user_fname'] = Crypt::encrypt($value);
    }

    public function getUserFnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Last Name
    public function setUserLnameAttribute($value)
    {
        $this->attributes['user_lname'] = Crypt::encrypt($value);
    }

    public function getUserLnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Middle Name
    public function setUserMnameAttribute($value)
    {
        $this->attributes['user_mname'] = Crypt::encrypt($value);
    }

    public function getUserMnameAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Contact
    public function setUserContactAttribute($value)
    {
        $this->attributes['user_contact'] = Crypt::encrypt($value);
    }
 
    public function getUserContactAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Encrypt & Decrypt Address
    public function setUserAddressAttribute($value)
    {
        $this->attributes['user_address'] = Crypt::encrypt($value);
    }

    public function getUserAddressAttribute($value)
    {
        return Crypt::decrypt($value); 
    }

    // Encrypt Email + Auto-generate Hash
    public function setUserEmailAttribute($value)
    {
        $this->attributes['user_email'] = Crypt::encrypt($value);
        $this->attributes['email_hash'] = hash('sha256', strtolower($value));
    }

    public function getUserEmailAttribute($value)
    {
        return Crypt::decrypt($value);
    }

    // Custom password column for Laravel Auth
    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
