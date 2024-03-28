<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table='inventories';
    protected $fillable=['product_id','product_category','quantity_in_stock','expiration_date','supplier'];
    protected $guarded=['id','create_at','update_at'];
    public function product()
{
  return $this->belongsTo(Product::class);
}
}
