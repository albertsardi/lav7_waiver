<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class Expense extends Model
{
  protected $table = 'expenses';

  

 

}

 // func lib
 function debet($val) {
  if($val>0) { return $val; } else {return 0; }
}
function credit($val) {
  if($val<0) { return -$val; } else {return 0; }
}

