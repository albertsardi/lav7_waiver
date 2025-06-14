<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use App\Http\Model\Trans;

class Category extends Model
{
  protected $table = 'categories';
  // protected $primaryKey = 'Code';
  //protected $keyType = 'string';
  protected $fillable = ['Name', 'CatType'];
  public $timestamps = false; //disable time stamp
  //const CREATED_AT = 'CreatedDate'; //change laravel timestamp
  //const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
}


