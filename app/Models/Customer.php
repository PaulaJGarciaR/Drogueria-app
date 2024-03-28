<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
use HasFactory;
    protected $table='customers';
    protected $fillable=['name','address','phone','email','photo'];
    protected $guarded=['id','create_at','update_at'];

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }
}
