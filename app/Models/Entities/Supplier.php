<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'person_id';

    protected $guarded = [];

    /**
     * A supplier shares the key of the primary contact for the supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person() {
        return $this->belongsTo('\App\Models\Entities\Person', 'person_id', 'person_id');
    }
}
