<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
use HasFactory;
    protected $table='customers';
    protected $fillable=['name','identificationdocument','address','phone','email','status','registeredby','image'];
    protected $guarded=['id','create_at','update_at','status','registeredby'];

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }
}
