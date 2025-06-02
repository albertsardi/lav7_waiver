<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = 'suppliers';
  //protected $primaryKey = 'Code';
  protected $keyType = 'string';

  protected $fillable = [
    'sid',
    'AccCode',
    'AccName',
    'Category',
    'SubCategory',
    'Salesman',
    'CreditLimit',
    'CreditActive',
    'Warning',
    'Unlimit',
    'Combine',
    'Taxno',
    'TaxName',
    'TaxAddr',
    'PaymentAddr',
    'Area2',
    'PriceChannel',
    'AccNo',
    'Memo',
    'AccType',
    'Active',
    'CreatedBy',
];
}
