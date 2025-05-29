<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Http\Model\Common;
use App\Http\Model\User;
use App\Http\Model\Parameter;
use App\Http\Model\Company;
use Session;
use HTML;

//use App\Http\Requests;

class AppController extends MainController
{
  function dashboard() {
    //return 'dashboard';
    // DASHBOARD show
    //require 'helper_database.php';
    //require 'helper_table.php';
    //$cn=db_connect();
    $yr=date('Y');
    $yr='2019'; //debug

    //Chart1
    $sales = $this->salesbyyear($yr);
    $profit = $this->profitbyyear($yr);
    $chart1_sales = json_encode($sales);
    $chart1_profit = json_encode($profit);
    // dd($profit);

    //Chart2
    $dat = $this->salesbyyear($yr);
    $chart2_data1 = json_encode($dat);
    $dat = $this->salesbyyear($yr-1);
    $chart2_data2 = json_encode($dat);

    //Pie Chart
    $dat = $this->salesbycategory($yr);
    $piechart_data = json_encode(arr::pluck($dat,'total'));
    $piechart_label = json_encode(arr::pluck($dat,'category'));
    //dd($piechart_data);

    //Donut Chart (Top 5 Customer)
    $dat = $this->top5salesbycustomer($yr);
    $donutchart_data = json_encode(arr::pluck($dat,'total'));
    $donutchart_label = json_encode(arr::pluck($dat,'acccode'));

    //Table Expense
    $dat = $this->expenselist($yr);
    $tableexp_data = $dat;
    $tableexp_label = (arr::pluck($dat,'accname'));


    $tableExpense = [
        ['Tiger Nixon', 	'System Architect', 	'Edinburgh', 	'61', 	'2011/04/25', 	'$320,800'],
        ['Ashton Cox', 	'Junior Technical Author', 	'San Francisco', 	'66', 	'2009/01/12', 	'$86,000'],
        ['Garrett Winters', 	'Accountant', 	'Tokyo', 	'63', 	'2011/07/25', 	'$170,750'],
        ['Cedric Kelly', 	'Senior Javascript Developer', 	'Edinburgh', 	'22', 	'2012/03/29', 	'$433,060'],
        ['Airi Satou', 	'Accountant', 	'Tokyo', 	'33', 	'2008/11/28', 	'$162,700'],
        ['Brielle Williamson', 	'Integration Specialist', 	'New York', 	'61', 	'2012/12/02', 	'$372,000'],
        ['Herrod Chandler', 	'Sales Assistant', 	'San Francisco', 	'59', 	'2012/08/06', 	'$137,500'],
        ['Rhona Davidson', 	'Integration Specialist', 	'Tokyo', 	'55', 	'2010/10/14', 	'$327,900'],
        ['Colleen Hurst', 	'Javascript Developer', 	'San Francisco', 	'39', 	'2009/09/15', 	'$205,500'],
        ['Sonya Frost', 	'Software Engineer', 	'Edinburgh', 	'23', 	'2008/12/13', 	'$103,600'],
        ['Jena Gaines', 	'Office Manager', 	'London', 	'30', 	'2008/12/19', 	'$90,560'],
        ['Quinn Flynn', 	'Support Lead', 	'Edinburgh', 	'22', 	'2013/03/03', 	'$342,000'],
        ['Fiona Green', 	'Chief Operating Officer (COO)', 	'San Francisco', 	'48', 	'2010/03/11', 	'$850,000'],
        ['Shou Itou', 	'Regional Marketing', 'Tokyo', 	'20', 	'2011/08/14', 	'$163,000'],
        ['Jonas Alexander', 	'Developer', 	'San Francisco', 	'30', 	'2010/07/14', 	'$86,500'],
        ['Shad Decker', 	'Regional Director', 	'Edinburgh', 	'51', 	'2008/11/13',	'$183,000'],
        ['Michael Bruce', 	'Javascript Developer', 	'Singapore', 	'29', 	'2011/06/27', 	'$183,000'],
        ['Donna Snider', 	'Customer Support', 	'New York', 	'27', 	'2011/01/25', 	'$112,000']
    ];
    $data=['table'=>'',
            'chart1_sales'=>'',
            'chart1_profit'=>'',
            'chart2_data1'=>'',
            'chart2_data2'=>'',
            'piechart_data'=>'',
            'piechart_label'=>'',
            'donutchart_data'=>'',
            'donutchart_label'=>'',
            'tableExpense'=>$this->create_table($tableExpense),
            'yr'=>$yr
    ];
    //dd($data);
    //return View::make('dashboard', $data);
    return view('dashboard', $data);
  }

  function reportall() {
    //show view
    $data=[
        'jr'=>'reportall',
        'header'=>'Report',
        'modal'=>'',
        'jsmodal'=>''
    ];
    return view('reportall', $data);
  }

  function setting() {
      // https://www.jurnal.id/id/guidebooks/mulai-menggunakan-jurnal
    //show setting
    $data=[
        'caption'   => 'Setting',
        'jr'        => 'setting',
        'mPayCat'   => ['NET30'=>'NET 30', 'NET60'=>'NET 60'],
        //'mPayCat'   => (array)(Common::getData('Payment')->data),
        'mAccount'  => json_encode(DB::table('mastercoa')->selectRaw('AccNo, AccName, CatName')->get()),
        'mCoa'      => json_encode(DB::table('mastercoa')->selectRaw('AccNo, AccName, CatName')->get()),
        'mUnit'     => json_encode(Common::getData('Unit')->data),
        'mCategory' => json_encode(Common::getData('ProductCategory')->data),
        'comp'      => DB::table('mastermycompany')->first(),
        'data'      => (array)Parameter::GetData()->data,
    ];
    $data['data']['CreatedDate']='createDate';
    $data['data']['CreatedBy']= 'createBy';
    return view('setting', $data);
  }

function setting_save(Request $req) {
    $input = $req->all();
    DB::beginTransaction();
    try {
        //company
        $data = [
            'Name'              => (string)$req->Name ?? '',
            'LogoPath'          => (string)$req->LogoPath ?? '',
            'Address'           => (string)$req->Address ?? '',
            'DeliveryAddress'   => (string)$req->DeliveryAddress ?? '',
            'Phone'             => (string)$req->Phone ?? '',
            'Fax'               => (string)$req->Fax ?? '',
            'TaxNo'             => (string)$req->TaxNo ?? '',
            'Website'           => (string)$req->Website ?? '',
            'Email'             => (string)$req->Email ?? '',
        ];
        $cm = new Company();
        $cm->truncate();
        $cm = Company::create($data);
        $cm->save();

        //parameter
        $pm = new Parameter();
        $pm->truncate();
        $pcat = ['Sales','Purchase','Product','Account','User','Date'];
        foreach($pcat as $cat) {
            foreach($input as $key=>$v) {
                if (str_starts_with(strtoupper($key), strtoupper($cat.'_'))) {
                    $pm = new Parameter();
                    $pname = str_replace($cat.'_', '', $key);
                    $pm->ParamGroup = (string)$cat;
                    $pm->ParamName =  (string)$pname;
                    $pm->ParamValue = (string)$v;
                    $pm->save();
                }
            }
        }
        DB::commit();
        return response()->json(['success'=>'data saved', 'input'=>$input]);
    }
    catch (Exception $e) {
        DB::rollback();
        //console.log(['save Error', $e->getMessage()]);
        //return redirect(url( "setting" ))->with('error', $e->getMessage());
      }
}

function makechart($id) {
  $yr=2018; //test
  //return dd($id);
  switch ($id) {
    case 'salesvsprofit':
        return [$this->profitbyyear($yr), $this->salesbyyear($yr) ];
        break;
    case 'salesamountbyyear':
        return ( [$this->salesbyyear($yr-1), $this->salesbyyear($yr)]);
        break;
    case'profitbyyear':
        return $this->profitbyyear($yr);
        break;
    case 'salesamountbycategory':
        $dat= $this->salesbycategory($yr);
        $xdat[0] = (arr::pluck($dat,'category'));
        $xdat[1] = (arr::pluck($dat,'total'));
        return $xdat;
        break;
    case 'top5salesbycustomer':
        $dat = $this->top5salesbycustomer($yr);
        //$donutchart_data = json_encode(arr::pluck($dat,'total'));
        //$donutchart_label = json_encode(arr::pluck($dat,'acccode'));
        //return $donutchart_data;
        $xdat[0] = (arr::pluck($dat,'acccode'));
        $xdat[1] = (arr::pluck($dat,'total'));
        //$xdat[1] = $this->intarr($xdat[1]);
        //return [$xdat[0] , $xdat[1]];
        return $xdat;
        break;
    case 'expenselistbyamount':
        return $this->expenselist($yr);
        break;
  }
}
function intarr($arr=[]) {
  for($a=0;$a<count($arr);$a++) {
    $arr[$a]=(int)($arr[$a]);
  }
  return $arr;
}

// Sub Function ---------------------------------------------------------------
function salesbyyear($yr=null) {
    //return "[12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]";
    if($yr==null) $yr=year("Y");
    $dat=DB::select("SELECT MONTH(transdate)as month,abs(SUM(total)) as total
                            FROM transinvoice
                            WHERE LEFT(transno,2) IN ('IN','CM','SR')AND YEAR(transdate)='$yr'
                            GROUP BY MONTH(transdate)
                            ORDER BY MONTH(transdate) ");
    $dat = json_decode(json_encode($dat), True);
    /*$a=0;
    foreach($dat as $row ) {
        $dat[$a]=(array) $dat[$a];
        $a=$a+1;
    }*/
    $xdat = $this->chart_fillyeardata($dat);
    return $xdat;
}
function profitbyyear($yr=null) {
    if($yr==null) $yr=year("Y");
    //return "[12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]";
    $dat=DB::select("SELECT MONTH(transdate)as month,abs(SUM(-qty*price-cost)) AS total
                            FROM transinvoice th
                            LEFT JOIN transdetail td ON td.invno=th.transno
                            WHERE LEFT(th.transno,2) IN ('IN','CM','SR')AND YEAR(transdate)='$yr' AND cost>0
                            GROUP BY MONTH(transdate)
                            ORDER BY MONTH(transdate) ");
    $dat = json_decode(json_encode($dat), True);
    $xdat = $this->chart_fillyeardata($dat);
    return $xdat;
}

function salesbycategory($yr=null) {
    if($yr==null) $yr=year("Y");
    //return "[12, 19, 3, 5, 2, 3]";
    $dat=DB::select("SELECT category,SUM(qty*price)AS total
                        FROM transdetail
                        LEFT JOIN transinvoice ON transinvoice.transno=transdetail.invno
                        LEFT JOIN masterproduct ON masterproduct.code=transdetail.productcode
                        WHERE LEFT(transinvoice.transno,2) IN ('IN','CM','DO')
                        AND YEAR(transdate)='$yr'
                        GROUP BY category ");
    //$dat = json_decode(json_encode($dat), True);
    //$xdat = $this->chart_fillyeardata($dat);
    //dd($dat);
    //$xdat[0]=arr::pluck($dat,'category');
    //$xdat[1]=arr::pluck($dat,'total');

    return ($dat);
}

function top5salesbycustomer($yr=null) {
    if($yr==null) $yr=year("Y");
    //return [12, 19, 3, 5, 2, 3];
    $sql="SELECT acccode,SUM(total)AS total
            FROM transhead
            WHERE LEFT(transno,2) IN ('IN','CM','DO')AND YEAR(transdate)='$yr'
            GROUP BY acccode
            ORDER BY SUM(total) DESC ";
    $dat=$this->DB_select($sql);
    $xdat=[];
    if(count($dat)>5) {
        $sql="SELECT SUM(total)AS total
            FROM transhead
            WHERE LEFT(transno,2) IN ('IN','CM')AND YEAR(transdate)='$yr' ";
        $gtot=DB::select($sql); $gtot=$gtot[0]->total;
        $tot=0;
        for($a=0;$a<4;$a++) {
            $tot=$tot+$dat[$a]['total'];
            $xdat[$a]=$dat[$a];
        }
        $xdat[4]['acccode']="OTHERS";
        $xdat[4]['total']=$gtot; //-$tot;
    } else {
        $xdat=$dat;
    }
    return $xdat;
}

function expenselist($yr=null) {
    $yr=2018;
    $dat = $this->DB_select("SELECT jr.accno,mastercoa.accname,SUM(amount) AS total FROM journal jr
                        LEFT JOIN mastercoa ON mastercoa.accno=jr.accno
                        WHERE catname IN ('Expenses','Other Expense') AND YEAR(jrdate)='$yr'
                        GROUP BY jr.accno,mastercoa.accname
                        HAVING total>0
                        ORDER BY total DESC ");
    for($a=0;$a<count($dat);$a++) {
        //$tot=$tot+$dat[$a]['total'];
    }
    return $dat;
}

// Login
function login(Request $req) {
    $data = [];

    //if(isset($req)) return dd($req);
    //if(!empty($_POST)) return dd($_POST);
    //if(!empty($req->user)) return dd($req); //redirect('dashboard');
    //if ($req->user=='admin') return redirect('/');
    return view('login', $data);
}
function checklogin(Request $req) {
    session_start();
    $user = User::GetByLoginPassword($req->user, $req->password);
    $user = $user->data;
    if (!empty($user)) {
        $login = (object)[
            'LoginName' => $user->LoginName,
            'FullName'  => $user->FullName,
            'UserId'    => $user->id,
            'Token'     => $user->CompanyToken,
        ];
        Session::put('user', $login);
        Session::put('token', $user->CompanyToken);
    }
   return redirect('/');
}
function logout() {
    session_start();
    // clear all session
    Session::flush();
    return redirect('/');
}



function chart_fillyeardata($arr) {
    $xdat=[0,0,0,0,0,0,0,0,0,0,0,0];
    for($a=0;$a<count($arr);$a++) {
        //$m=$dat[$a]['month'];
        //$v=$dat[$a]['total'];
        $xdat[ $arr[$a]['month'] ]= $arr[$a]['total'];
    }
    $xdat1=array_shift($xdat);
    return $xdat;
}

function create_table($data) {
    $out = '';
    foreach($data as $r){
        $out.='<tr>';
        foreach($r as $c) {
            $out.="<td>$c</td>";
        }
        $out.='</tr>';
    }
    return $out;
}


// function DB_select($sql) {
//     $dat=DB::select($sql);
//     $dat = json_decode(json_encode($dat), True);
//     return $dat;
// }



}
