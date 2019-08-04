<?php

namespace App\Models\Taxes;

use Illuminate\Database\Eloquent\Model;

class TaxCategory extends Model
{
    protected $table = 'tax_categories';
    protected $primaryKey = 'tax_category_id';

    protected $guarded = [];

}
