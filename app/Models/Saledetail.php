<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saledetail extends Model
{
    use HasFactory;
    protected $table='salesdetails';
    protected $fillable=['product_id','quantity','price_sale','sale_id','registeredby','subtotal','ruta'];
    protected $guarded=['id','create_at','update_at'];
    public function product()
{
  return $this->belongsTo(Product::class);
}
public function sale()
{
  return $this->belongsTo(Sale::class);
}
}
