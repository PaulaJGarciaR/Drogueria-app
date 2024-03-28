<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $fillable=['date','product_id','customer_id','total_amount'];
    protected $guarded=['id','create_at','update_at'];
  public function client()
  {
    return $this->belongsTo(Customer::class);
  }
  public function product()
  {
    return $this->belongsTo(Product::class);
  }
}
