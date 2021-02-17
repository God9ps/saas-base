<?php

namespace App\Models;

use DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class Project
 * @package App
 */
class Project extends Model
{
    use SoftDeletes;
//    use MultiTenantModelTrait;

    public $table = 'projects';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'subdomain',
        'db_name',
        'db_host',
        'db_user',
        'db_password',
        'created_by_id',
    ];

    /**
     * Set the db_name.
     *
     * @return void
     */
    /*public function setDbNameAttribute()
    {
        $this->attributes['db_name'] = Str::uuid();
    }*/

    /**
     * @param DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return BelongsTo
     */
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
