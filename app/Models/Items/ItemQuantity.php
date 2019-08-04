<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemQuantity extends Model
{
    protected $table = 'item_quantities';

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function stockLocation() {
        return $this->belongsTo(StockLocation::class);
    }

    public function inventory() {
        return $this->hasMany(Inventory::class);
    }
}
