<?php

namespace App\Models\Tenant;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;

class Admin extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    protected $connection = 'tenant';
    public $table = 'admins';
    protected $guard = 'admin';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'name',
        'created_by',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
        'address_1',
        'address_2',
        'country_id',
        'city',
        'postcode',
        'phone_number',
    ];


    public function owner()
    {
        return $this->hasMany(User::class, 'created_by');
    }
}
