<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemTax extends Model
{
    protected $table = 'items_taxes';

    protected $guarded = [];

    public function item() {
        return $this->belongsTo(Item::class);
    }
}
