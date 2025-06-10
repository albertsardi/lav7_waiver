<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = 'customers';
  // protected $primaryKey = 'AccCode';
  //protected $keyType = 'string';
  protected $fillable = [
    'name',
    'email',
    'email_verified_at',
    'password',
    'remember_token',
    'sid',
    'CreatedBy',
];
}
