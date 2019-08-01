<?php

namespace App\Models\Auth;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;

    const TYPE_STORE = 0;
    const TYPE_STOCK_LOCATION = 1;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'short_name',
        'location_type',
        'location_name',
        'address',
        'website',
        'email',
        'phone',
        'fax',
        'return_policy',
        'logo',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'primary' => 'boolean',
    ];
}
