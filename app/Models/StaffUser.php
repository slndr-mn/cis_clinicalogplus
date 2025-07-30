<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffUser extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasFactory;

    protected $guard_name = 'web';

    protected $table = 'staffusers';
    protected $primaryKey = 'user_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'user_idnum',
        'user_fname',
        'user_mname',
        'user_lname',
        'user_email',
        'email_hash',
        'user_position',
        'user_role',
        'user_status',
        'user_profile',
        'user_password',
    ];

    protected $hidden = [
        'user_password',
    ];

    // Capitalize + Encrypt First Name
    public function setUserFnameAttribute($value)
    {
        $this->attributes['user_fname'] = $value ? Crypt::encrypt(ucwords(strtolower($value))) : null;
    }

    public function getUserFnameAttribute($value)
    {
        return $value ? Crypt::decrypt($value) : null;
    }

    // Capitalize + Encrypt Last Name
    public function setUserLnameAttribute($value)
    {
        $this->attributes['user_lname'] = $value ? Crypt::encrypt(ucwords(strtolower($value))) : null;
    }

    public function getUserLnameAttribute($value)
    {
        return $value ? Crypt::decrypt($value) : null;
    }

    // Capitalize + Encrypt Middle Name
    public function setUserMnameAttribute($value)
    {
        $this->attributes['user_mname'] = $value ? Crypt::encrypt(ucwords(strtolower($value))) : null;
    }

    public function getUserMnameAttribute($value)
    {
        return $value ? Crypt::decrypt($value) : null;
    }

    // Encrypt Email (no hash logic here anymore)
    public function setUserEmailAttribute($value)
    {
        $this->attributes['user_email'] = $value ? Crypt::encrypt($value) : null;
    }

    public function getUserEmailAttribute($value)
    {
        return $value ? Crypt::decrypt($value) : null;
    }

    // Boot method to auto-generate email_hash
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->user_email) {
                $user->email_hash = hash('sha256', strtolower($user->user_email));
            }
        });

        static::updating(function ($user) {
            if ($user->user_email) {
                $user->email_hash = hash('sha256', strtolower($user->user_email));
            }
        });
    }

    // Custom password column for Laravel Auth
    public function getAuthPassword()
    {
        return $this->user_password;
    }
}
