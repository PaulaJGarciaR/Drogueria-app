<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $table='sales';
    protected $fillable=['total_payment','date_of_sale','customer_id'];
    protected $guarded=['id','create_at','update_at'];
    public function customer()
{
  return $this->belongsTo(Customer::class);
}
}

