<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Detail extends Model
{
    protected $table = 'details';
    //protected $primaryKey = 'Code';
    //protected $keyType = 'string';
    // protected $fillable = ['Code', 'Name', 'Barcode', 'Category'];
    public $timestamps = false;
    // const CREATED_AT = 'CreatedDate'; //change laravel timestamp
    // const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp
    protected $fillable = ['TransNo','ProductCode','ProductName','Qty','UOM','Price','DiscPercentD','Cost','Memo','Sono','id','ProductType'];
    //protected $appends = ['availability'];

    
}


