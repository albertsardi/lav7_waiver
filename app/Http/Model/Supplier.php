<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
  protected $table = 'Suppliers';
  // protected $primaryKey = 'Code';
  // protected $keyType = 'string';
  protected $fillable = [
    'AccCode',
    'AccName',
    'Category',
    'Salesman',
    'Taxno',
    'TaxName',
    'TaxAddr',
    'AccNo',
    'Memo',
    'Active',
    'CreatedBy',
];
}
