<?php

namespace App\Models\Entities;

use Illuminate\Foundation\Auth\User as Model;

class Employee extends Model
{
    // Override default Eloquent settings
    protected $table = 'employees';
    protected $primaryKey = 'person_id';
    public $timestamps = false;

    protected $guarded = ['person_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
}
