<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'people';
    protected $primaryKey = 'person_id';

    protected $guarded = [];

    public function getPersonName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
