<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable  = [
        'name',
        'display_name',
        'generic_id',
        'brand_id',
        'product_category_id',
        'strength',
        'mrp',
        'pack_size',
        'image',
    ];

    protected $casts = [
        'display_name'        => 'string',
        'generic_id'          => 'integer',
        'brand_id'            => 'integer',
        'product_category_id' => 'integer',
        'strength'            => 'string',
        'mrp'                 => 'float',
        'pack_size'           => 'string',
        // 'image'               => 'string',
        'created_at'          => 'datetime:Y-m-d H:i:s',
        'updated_at'          => 'datetime:Y-m-d H:i:s',
        'deleted_at'          => 'datetime:Y-m-d H:i:s'
    ];

    // relationship
    // relation with generic
    public function generic()
    {
        return $this->belongsTo(Generic::class);
    }

    // relation with brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // relation with product category
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    // relation with dosage form
    public function dosageForm()
    {
        return $this->belongsTo(DosageForm::class);
    }
}
