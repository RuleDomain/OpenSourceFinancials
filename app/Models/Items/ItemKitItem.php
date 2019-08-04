<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemKitItem extends Model
{
    protected $table = 'item_kit_items';
    protected $primaryKey = 'item_id';

    protected $guarded = [];

    public function itemKit() {
        return $this->belongsTo(ItemKit::class);
    }
}
