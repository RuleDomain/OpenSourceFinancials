<?php

namespace App\Models\Items;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey = 'item_id';

    protected $guarded = [];

    public function itemQuantities() {
        return $this->hasMany(ItemQuantity::class);
    }

    public function itemTaxes() {
        return $this->hasMany(ItemTax::class);
    }

    public function supplier() {
        return $this->hasOne('\App\Models\Entities\Supplier', 'supplier_id', 'person_id');
    }

    public function lowSellItem() {
        return $this->hasOne('\App\Models\Items\Item', 'low_sell_item_id', 'item_id');
    }

    public function taxCategory() {
        return $this->hasOne('\App\Models\Taxes\TaxCategory', 'tax_category_id', 'tax_category_id');
    }

    public function itemKits() {
        return $this->hasMany(ItemKit::class);
    }
}
