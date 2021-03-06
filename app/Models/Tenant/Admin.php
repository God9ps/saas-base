<?php

namespace App\Models\Tenant;

use App\Models\Country;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Admin
 * @package App\Models\Tenant
 */
class Admin extends Authenticatable implements HasMedia
{

    use HasApiTokens;
    use Notifiable;
    use SoftDeletes;
    use InteractsWithMedia;

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
        'avatar',
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
        'birth_date',
        'country_id',
        'postcode',
        'phone_number',
        'vat_number',
        'is_admin',
    ];

    public function isadmin() {
        return $this->is_admin === 1;
    }

    public function owner()
    {
        return $this->setConnection('mysql')->belongsTo(User::class, 'created_by')->with('roles');
    }

    public function country()
    {
        return $this->setConnection('mysql')->belongsTo(Country::class, 'country_id');
    }
}
