<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class ItemKit extends Model
{
    protected $table = 'item_kits';
    protected $primaryKey = 'item_kit_id';

    protected $guarded = [];

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function itemKitItems() {
        return $this->hasMany(ItemKitItem::class);
    }
}
