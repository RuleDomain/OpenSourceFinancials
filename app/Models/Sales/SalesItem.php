<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SalesItem extends Model
{
    protected $table = 'sales_items';

    protected $guarded = [];

    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('sale_id', '=', $this->getAttribute('sale_id'))
            ->where('line', '=', $this->getAttribute('line'));
        return $query;
    }

}
