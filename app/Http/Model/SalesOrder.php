<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Session;

class SalesOrder extends Model
{
	protected $table = 'salesorder'; 
	//protected $primaryKey = 'Code';
	//protected $keyType = 'string';
	//public $timestamps = false;
	protected $fillable = [
		'TransNo',
		'TransDate',
		'AccCode',
		'AccName',
		'DeliveryCode',
		'Deliveryto',
		'Payment',
		'Division',
		'Project',
		'TaxAmount',
		'FreightAmount',
		'DiscPercentH',
		'DiscAmountH',
		'Salesman',
		'Note',
		'ReffNo',
		'Status',
		'CreatedBy',
		'Total',
		'Token',
	];
	const CREATED_AT = 'CreatedDate'; //change laravel timestamp
	const UPDATED_AT = 'UpdatedDate'; //change laravel creator stamp

  	public static function getdata($jr, $id=null, $option=null) {
		if ($id==null) {
			$data = Order::whereRaw("left(TransNo,2)='$jr'")
					->where('Token', Session::get('Token'))
					->get();
			foreach($data as &$dt) {
				$dt->Qty = abs($dt->Qty); 
				$dt->Status = '';
			}
		} else {
			// detail
			$data = Order::where('TransNo', $id)->first();
			if(!empty($data)) {
				$data['detail'] = DB::table('orderdetail as td')
									->where('TransNo', $data['TransNo'])
									->select('td.*','mp.Name as ProductName')
									->leftJoin('masterproduct as mp','mp.Code','=','td.ProductCode')
									->get();
				
				if(!empty($data['detail'])) {
					foreach($data['detail'] as $dt) {
						//$dt->OrderQty = abs($dt->OrderQty); 
						$dt->OrderQty = Transaction::getOrderQty($dt->TransNo, $dt->ProductCode); 
						$dt->SentQty = abs($dt->Qty); 
						$dt->TotSentQty = abs($dt->Qty); 
						// $dt->ReceiveQty = abs($dt->ReceiveQty); 
						unset($dt->Qty);
					}
				}
		} else {
			//$data['detail'] = [];
		}
		}
		return (object)['status'=>'OK', 'data'=>$data];
  	}

	public static function GetListSalesInvoiceUnpaid($option=null) {
		$data = DB::table('transhead as th')->selectRaw('th.TransNo,th.TransDate,th.Total,IFNULL(SUM(AmountPaid),0)AS InvPaid,(Total-IFNULL(SUM(AmountPaid),0))AS InvUnpaid')
				->leftJoin('transpaymentarap as arap', 'arap.InvNo', '=', 'th.TransNo')
				->groupBy('th.TransNo', 'TransDate', 'Total')
				->havingRaw('InvUnpaid<>0')
				->whereRaw("LEFT(th.TransNo,2) IN ('SI','IN')")
				->get();
		return (object)['status'=>'OK', 'data'=>$data];
	}

	public static function getOrderQty($SONo, $PCode) {
		$dat = DB::table('orderdetail')
				->where('TransNo', $SONo)
				->where('ProductCode', $PCode)
				->first();
		return (!empty($dat))? $dat->Qty: 0;
	}

	public static function getStock($id, $trandate=null) {
		if ($transdate==null) $transdate = date('Y/m/d');
		$data = Trans::where('ProductCode', $id)->get();
		return (object)['status'=>'OK', 'data'=>$data];
	}

}


