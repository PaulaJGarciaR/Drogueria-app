<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=['name','description','price_buy','price_sale','quantity_in_stock','expiration_date','photp'];
    protected $guarded=['id','create_at','update_at'];
  
    public function orders()
    {
      return $this->hasMany(Order::class);
    }



}
