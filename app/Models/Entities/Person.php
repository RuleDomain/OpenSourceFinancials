<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'person_id';

    protected $guarded = [];
}
