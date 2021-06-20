<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supply extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    public static $name = 'supply';

    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_supply')->withPivot('quantity', 'unit_price');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'id','supplier_id');
    }
}
