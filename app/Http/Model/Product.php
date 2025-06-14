<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Session;

class Product extends MainModel
{
  protected $table = 'products';
  //protected $primaryKey = 'Code';
  //protected $keyType = 'string';
  // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
  // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
  protected $fillable = [
              'image',
              'image',
              'name',
              'barcode',
              'slug',
              'category_id',
              'content',
              'weight',
              'price',
              'discount',
              'createdBy',
              'sid' ];

  //protected $appends = ['availability'];

  public static function getdata($id=null) {
    @session_start();
    if ($id==null) {
      $data = Product::where('Token', session('user')->Token)->get();
    } else {
      $data = Product::where('id',$id)
      ->where('Token', session('user')->Token)
      ->first();
    }
     return (object)['status'=>'OK', 'data'=>$data];
  }

  // public static function getStock($id) {
  //   $data = Trans::where('ProductCode', $id)->get();
  //   return (object)['status'=>'OK', 'data'=>$data];
  // }

}


