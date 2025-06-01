<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  //protected $primaryKey = 'AccCode';
  protected $keyType = 'string';
}
