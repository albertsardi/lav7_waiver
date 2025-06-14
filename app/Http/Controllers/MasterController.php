<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Model\User;
use App\Http\Model\Product;
use App\Http\Model\AccountAddr;
use App\Http\Model\Customer;
use App\Http\Model\Supplier;
use App\Http\Model\CustomerSupplierCategory;
use App\Http\Model\Profile;
use App\Http\Model\Account;
use App\Http\Model\Bank;
use App\Http\Model\Order;
use App\report\MyReport;
use \koolreport\widgets\koolphp\Table;
use \koolreport\export\Exportable;
//use \koolreport\cloudexport\Exportable;
//use HTML;
use App\Http\Controllers\TransController;
use Session;

class MasterController extends MainController {

    function datalist($jr) {
        // return 'datalist';
        if (in_array($jr, ['purchase'])) return TransController::datalist($jr);
        $today = date('Y-m-d');
        //dump(session('user')->Token);
        //show view
        $out =[];
        //dump($jr);
        switch($jr) {
            case 'products':
                //$res = Product::selectRaw('Code,Name,UOM,Category,ActiveProduct,id')->where('Token', session('user')->Token)->get();
                $res = Product::where('active',1)->get();
                dump($res);
                foreach($res as $r) {
                    //$r->Qty = DB::select(" CALL getProductQty('$r->Code','$today') ")[0]->Total ?? 0;
                    $out[]=[
                        "<a href='".url('edit/product/'.$r->id)."'>".$r->name."</a>",
                        $r->unit,
                        $this->getCatName($r->category_id,'product'),
                        $r->active,
                        12345, //TODO get Qty
                    ];
                }
                // dd($out);
                //dd($res);
                $data = [
                    'jr'        => $jr,
                    'title'     => 'Products List',
                    'gridhead'  => ['Product Name','Unit','Category','Active/not Active','Quantity'],
                    '_url'      => env('API_URL').'/api/'.$jr,
                    // 'data'      => $this->db_query('masterproduct','Code,Name,UOM,Category,12345 as Qty'),
                    'grid'      => $out,
                    'xxdatacol'   => json_encode([
                        [ 'data' => 'Code'],
                        [ 'data' => 'Name'],
                        [ 'data' => 'UOM'],
                        [ 'data' => 'Category']
                    ])
                ];
                //dd($data);
                break;
            case 'suppliers':
                $res = Supplier::get();
                //dd($res);
                foreach($res as $r) {
                    $out[]=[
                        "<a href='".url('edit/supplier/'.$r->id)."'>".$r->AccCode."</a>",
                        $r->AccName,
                        $r->Phone,
                        $r->email,
                        $r->Address,
                        $r->Active,
                        rand(1000,2000)*1000, //TODO get Balance
                    ];
                }
                $data = [
                    'jr'        => $jr,
                    'title'     => ucfirst($jr).' List',
                    'gridhead'  => ['Display Name','Code','Phone','Email','Address', 'Status', 'Balance (Rp)'],
                    'grid'      => $out,
                    'caption'   => $this->makeCaption($jr),
                    '_url'      => env('API_URL').'/api/'.$jr,
                    'data'      => $res,
                ];
                break;
            case 'customers':
                $res = Customer::get();
                //dd($res);
                foreach($res as $r) {
                    $r->Bal = rand(1000,2000)*1000; //TODO
                }
                $out[]=[
                    "<a href='".url('customer/'.$r->id)."'>".$r->AccCode."</a>",
                    $r->AccName,
                    $r->Phone,
                    $r->email,
                    $r->Address,
                    $r->Active,
                    rand(1000,2000)*1000, //TODO get Balance
                ];
                $data = [
                    'jr'        => $jr,
                    'title'     => ucfirst($jr).' List',
                    'gridhead'  => ['Display Name','Code','Phone','Email','Address', 'Status', 'Balance (Rp)'],
                    'grid'      => $out,
                    'caption'   => $this->makeCaption($jr),
                    '_url'      => env('API_URL').'/api/'.$jr,
                    'data'      => $res,
                ];
                break;
                case 'coa':
                    //$res = DB::table('mastercoa')->selectRaw('AccNo, AccName, CatName, 123456 as Bal,id')->get();
                    $res= Account::Get()->data;
                    foreach($res as $r) {
                        $r->Bal = DB::select(" CALL getAccountAmount('".Session::get('Token')."','$r->id','$today') ")[0]->Total ?? 0;;
                    }
                    $data = [
                        'jr'        => $jr,
                        'gridhead'      => ['Account #','Account Name','Category','Amount (Rp)',' '],
                        'grid'=> $out,
                        'caption'   => $this->makeCaption($jr),
                        '_url'      => env('API_URL').'/api/'.$jr,
                        'data'      => $res
                    ];
                    break;
                case 'banks':
                    $dat =  DB::table('masterbank')->selectRaw('BankAccName, BankAccNo, AccNo, BankType, 1234567 as Bal,id')->get();
                    foreach($dat as $dt) {
                        $dt->Bal = Account::getAmount($dt->id);
                        }
                    $data = [
                        'jr'        => $jr,
                        'gridhead'  => ['Bank Name', 'Bank Account#', 'Account#','Bank Type','Amount (Rp)', ' '],
                        'grid'      => $out,
                        'caption'   => $this->makeCaption($jr),
                        '_url'      => env('API_URL').'/api/'.$jr,
                        'data'      => $dat
                    ];
                    break;
                }

        $data['grid'] = $this->makeTable($data['grid']);
        $data['gridhead'] = '<thead><tr><th>'.implode('</th><th>',$data['gridhead']).'</th></tr></thead>';
        dump($data);
        //return $data;
        return view('datalist', $data);
    }

    function dataedit($jr,$id='') {
        //return $jr.$id;
        switch($jr) {
            case 'product':
                return $this->editProduct($id);
            break;
            case 'customer':
                return $this->editCustomer($id);
            break;
            case 'supplier':
                return $this->editSupplier($id);
            case 'purchase':
                //return 'purchase';
                //$tc = new TransController;
                return TransController::editPurchase($id);
            break;
        }
    }

    function editProduct($id=''){
        $data =[];
        $data['id'] = $id;
        $data['jr'] = 'product';
        $data['mCat'] = [
            [1, 'cat1'],
            [2, 'cat2'],
        ];
        $data['mType'] = [
            [1, 'type1'],
            [2, 'type2'],
        ];
        $data['mHpp'] = [
            [1, 'hpp1'],
            [2, 'hpp2'],
        ];
        $dat = Product::find($id);
        //dd($data['data']);
        if($dat){
            $data['data'] = $dat;
            $data['image'] = $this->getProductImage($data['data']['image']??'null');
        } else {
            $data['data'] = [];
            $data['image'] = 'images/no-image.png';
        }
        
        dump($data);
        return view('form-product', $data);

    }

    function editCustomer($id){
        $data =[];
        $data['jr'] = 'customer';
        $data['id'] = $id;
        $data['CreatedBy'] = 'User';
        $data['mCat'] = [
            [1, 'cat1'],
            [2, 'cat2'],
        ];
        $data['mType'] = [
            [1, 'type1'],
            [2, 'type2'],
        ];
        $data['mHpp'] = [
            [1, 'hpp1'],
            [2, 'hpp2'],
        ];
        $data['data'] = Customer::find($id);
        dump($data);
        return view('form-customer', $data);
    }

    function editSupplier($id){
        $data =[];
        $data['jr'] = 'supplier';
        $data['id'] = $id;
        $data['mCat'] = [
            [1, 'cat1'],
            [2, 'cat2'],
        ];
        $data['mType'] = [
            [1, 'type1'],
            [2, 'type2'],
        ];
        $data['mHpp'] = [
            [1, 'hpp1'],
            [2, 'hpp2'],
        ];
        
        $data['data'] = Supplier::find($id);
        dump($data);
        return view('form-supplier', $data);
    }
    function store(Request $req){
        $save = $req->input();
        if (in_array($save['formtype'],['purchase'])) return TransController::store($req);
        $save['CreatedBy'] = 'User';
        $jr = $save['formtype'];
        if(empty($save['sid'])) $save['sid'] = $this->createSID() ;
        //return ($save);

        if(!empty($save['id'])) {
            //update
            if($jr=='product') $data = Product::find($save['id']);
            if($jr=='customer') $data = Customer::find($save['id']);
            if($jr=='supplier') $data = Supplier::find($save['id']);
            //return dd([$jr,$data]);
            $res=$data->update($save);
            //return dd($res);
            if ($res) { //save OK
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveError',json_encode($res));
            }

        } else {
            // create new
            $data = null;
            if($save['formtype']=='product') $data = new Product();
            if($save['formtype']=='customer') $data = new Customer();
            if($save['formtype']=='supplier') $data = new Supplier();
            if(is_null($data)) return dd('Error !!! formType not found');

            if (empty($save['sid'])) $save['sid'] = 'SIDNO';
            //return dd($save);
            $res = $data->create($save);
            //dd($res->id);
            $lastID = $res->id; //get last save id

            if ($res) { //save OK
                return redirect::to(url("edit/$jr/$lastID"))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/$jr/$LastID"))->with('saveError',json_encode($res));
            }
        }
        
    }

    function makeList($jr='') {
    switch($jr) {
        case 'product':
            $dat= DB::table('masterproduct')->select('Code','Name','UOM','Category')->get();
            $dat= json_decode(json_encode($dat), true);
            for($a=0;$a<count($dat);$a++) {
                $link=$dat[$a]['Code'];
                $dat[$a]['Code']= link_to("product-edit/$link", $link);
                $dat[$a]['Qty']= 1234; //$this->getProdBalance($link); //1234;
            }
            return $this->table_generate($dat,['Product #','Product Name','Unit','Category','Quantity']);
            break;

        // case 'product':
        //     $dat= $this->db_array('masterproduct', 'Code,Name,UOM,Category,0 as Qty');
        //     for($a=0;$a<count($dat);$a++) {
        //         $link=$dat[$a]['Code'];
        //         $dat[$a]['Code']= link_to("product-edit/$link", $link);
        //         $dat[$a]['Qty']= $this->getProdBalance($link); //1234;
        //     }
        //     return $this->table_generate($dat,['Product #','Product Name','Unit','Category','Quantity']);
        //     break;

        case 'customer':
            // $dat= $this->db_select("SELECT concat(masteraccount.AccCode,'|',AccName)as Acc,Phone,Email,Address,0 as Bal
            //                             FROM masteraccount
            //                             LEFT JOIN masteraccountaddr ON masteraccountaddr.AccCode=masteraccount.AccCode
            //                             WHERE AccType='C' ");
            // $dat= DB::table('masteraccount')->select("concat(masteraccount.AccCode,'|',AccName)","Phone","Email","Address","AccName")
            //                                     ->leftJoin('masteraccountaddr', 'masteraccountaddr.AccCode', '=', 'masteraccount.AccCode')->get();
            $dat= DB::select("SELECT concat(masteraccount.AccCode,'|',AccName)as Acc,Phone,Email,Address,0 as Bal
                                        FROM masteraccount
                                        LEFT JOIN masteraccountaddr ON masteraccountaddr.AccCode=masteraccount.AccCode
                                        WHERE AccType='C' ");
            //$dat= DB::table('listaccount')->get();
            $dat= DB::table('masteraccount')->get();
            $dat= json_decode(json_encode($dat), true);
            for($a=0;$a<count($dat);$a++) {
                //$acc=explode('|', $dat[$a]['Acc']);
                //$dat[$a]['Acc']= link_to("customer-edit/".$acc[0], $acc[1]);
                //$dat[$a]['Bal']= $this->getAccBalance( $acc[0], 'IN' ); //1234567890;
                $dat[$a]['Bal']= 1234567890;
            }
            return $this->table_generate($dat,['Display Name','Phone','Email','Address', 'Balance (Rp)']);
            break;

        case 'supplier':
            $dat= $this->DB_select("SELECT CONCAT(masteraccount.AccCode,'|',AccName)AS Acc,Phone,Email,Address,0 AS Bal
                                FROM masteraccount
                                LEFT JOIN masteraccountaddr ON masteraccountaddr.AccCode=masteraccount.AccCode
                                WHERE AccType='S' AND DefAddr=1");
            for($a=0;$a<count($dat);$a++) {
                $acc=explode('|', $dat[$a]['Acc']);
                //$dat[$a]['Acc']= "<a href='supplier-edit.php?id=$acc[0]'>".$acc[1]."</a>";
                $dat[$a]['Acc']= link_to("supplier-edit/$acc[0]", $acc[1]);
                $dat[$a]['Bal']= $this->getAccBalance( $acc[0], 'PI' ); //1234567890;
            }
            return $this->table_generate($dat,['Display Name','Phone','Email','Address', 'Balance (Rp)']);
            break;

        case 'coa':
            //   $dat= $this->db_select("SELECT mastercoa.AccNo as AccNo,AccName,CatName,ifnull(SUM(Amount),0)
            //                               FROM mastercoa
            //                               LEFT JOIN journal ON journal.AccNo=mastercoa.AccNo
            //                               GROUP BY AccNo");
            $dat= Account::Get()->data;
            for($a=0;$a<count($dat);$a++) {
                $dat[$a]['AccNo']= link_to("accountdetail/".$dat[$a]['AccNo'], $dat[$a]['AccNo']);
            }
            return $this->table_generate($dat,['Account #','Account Name','Category','Amount (Rp)']);
            break;

        case 'bank':
            $dat= $this->db_select("SELECT mastercoa.AccNo,AccName,CatName,ifnull(SUM(Amount),0)
                                        FROM mastercoa
                                        LEFT JOIN journal ON journal.AccNo=mastercoa.AccNo
                                        WHERE CatName='Cash & Bank'
                                        GROUP BY AccNo");
            for($a=0;$a<count($dat);$a++) {
                $dat[$a]['AccName']= "<a href='accountdetail.php?id=".$dat[$a]['AccNo']."'>".$dat[$a]['AccName']."</a>";
            }
            return $this->table_generate($dat,['Account #','Account Name','Category','Amount (Rp)']);
            break;

        case 'bom':
            $dat= DB::select("SELECT pcode,(select Name from masterproduct where masterproduct_bomhead.PCode=masterproduct.Code)as pname,pcat,ptype
                                FROM masterproduct_bomhead
                                ORDER BY pcode,pname ");
            $dat= json_decode(json_encode($dat), true);
            for($a=0;$a<count($dat);$a++) {
                $dat[$a]['pcode']= link_to("bom-edit/".$dat[$a]['pcode'], $dat[$a]['pcode']);
            }
            return $this->table_generate($dat,['Product #','Product Name','Category','Type']);
            break;
        }
    }

    // Export to Excel using koolreport
    function datalist_exportexcel(Request $req) {
        //return 'koolreport - export excel';
        $excelPath = 'exportXls/';
        $report = new MyReport;
        $prodData = DB::table('masterproduct')->selectRaw('Code,Name,UOM,Category,1234567 as Qty,id')->get();
        //$prodData = $this->db_query('transhead');
        //return dd($prodData);
        $report->rdata['data'] = $prodData;
        return $report->run()->exportToExcel($excelPath.'report_excel')->toBrowser("myreport.xlsx");
        /*$dat = [ "dataStores" => array(
                    'report_product' => array(
                        "columns"=>array(
                            0, 1, 2, 'column3', 'column4' //if not specifying, all columns are exported
                        )
                    )
                )
        ];
        $report->run()->exportToExcel($dat)->toBrowser("myreport.xlsx");   */
    }

    // Export to Pdf using koolreport
    function datalist_exportpdf(Request $req) {
        //dd("D:\ProgProject\Web\lav7_PikeAdmin\vendor\prince\engine\bin\prince.exe "."D:\ProgProject\Web\lav7_PikeAdmin\public\638b00325f1251.tmp");
        //$cmd = shell_exec("D:\ProgProject\Web\lav7_PikeAdmin\vendor\prince\engine\bin\prince.exe "."D:\ProgProject\Web\lav7_PikeAdmin\public\638b00325f1251.tmp");
        //exec('D:\ProgProject\Web\lav7_PikeAdmin\vendor\prince\engine\bin\prince.exe '.'D:\ProgProject\Web\lav7_PikeAdmin\public\638b00325f1251.tmp', $output, $status);
        //dd([$output,$status]);

        //return 'koolreport - export pdf';
        $pdfPath = 'exportPdf/';
        $report = new MyReport;
        $prodData = DB::table('masterproduct')->selectRaw('Code,Name,UOM,Category,1234567 as Qty,id')->get();
        $report->rdata['report-header'] = 'Report Master Data List';
        $report->rdata['data'] = $prodData->toArray();
        return $report->run()->export($pdfPath.'report_master_pdf')
                        ->settings([
                            // "useLocalTempFolder" => true,
                        ])
                        ->pdf([
                            'format'=>'A4',
                            'orientation'=>'portrait',
                        ])->toBrowser("myreport.pdf");
    }

    // Export to Pdf using koolreport chromeHeadless.io
    function datalist_exportpdf_usingChromeheadless(Request $req) {
        // return 'koolreport - export pdf using chromeHeadless';
        // https://www.koolreport.com/docs/cloudexport/chromeheadlessio/
        // get Token -> Register an account in https://chromeheadless.io/
        // registered token email:albertsardi@gmail.com pass:sardi2201 token: 597482c40db16dd62a5a0d7d9c0894f5edd63f1178ab6a8d87e9b802a33a4e8b
        $pdfPath = 'exportPdf/';
        $tokenKey = "597482c40db16dd62a5a0d7d9c0894f5edd63f1178ab6a8d87e9b802a33a4e8b";
        $report = new MyReport;
        $prodData = DB::table('masterproduct')->selectRaw('Code,Name,UOM,Category,1234567 as Qty,id')->get();
        $report->rdata['report-header'] = 'Report Master Data List';
        $report->rdata['data'] = $prodData->toArray();
        /*return $report->run()->export($pdfPath.'report_master_pdf')
                        ->settings([
                            // "useLocalTempFolder" => true,
                        ])
                        ->pdf([
                            'format'=>'A4',
                            'orientation'=>'portrait',
                        ])->toBrowser("myreport.pdf"); */
        return $report->run()
                ->cloudExport($pdfPath.'report_master_using_chromeheadless_pdf')
                ->chromeHeadlessio($tokenKey)
                ->pdf([
                    "format"=>"A4",
                    // "displayHeaderFooter" => true,
                    // "headerTemplate" => 'this is header',
                    // "footerTemplate" => 'this is footer',
                ])
                ->toBrowser("myreport.pdf");
    }

    function makeDetailList($id='') {
        $dat=db_get_array('journal','JRdate,ReffNo,JRdesc,Amount as Debet,Amount as Credit,Amount as Bal',"AccNo='$id' ",'JRdate');
        $bal=0;
        for($a=0;$a<count($dat);$a++) {
            $dat[$a]['Debet']= debet($dat[$a]['Debet']);
            $dat[$a]['Credit']= credit($dat[$a]['Credit']);
            $bal= $bal + $dat[$a]['Debet'] - $dat[$a]['Credit'];
            $dat[$a]['Bal']= $bal;
        }
        return table_generate($dat,['Journal Date','Reff #','Description','Debet (Rp)','Credit (Rp)','Balance (Rp)']);
    }

    // function
    function getAccBalance($AccCode, $jr) {
    $row = $this->DB_select("SELECT AccCode,(Total-IFNULL(AmountPaid,0))as Bal
                                FROM transhead
                                LEFT JOIN transpaymentarap ON transpaymentarap.InvNo=transhead.TransNo
                                WHERE LEFT(transhead.transno,2)='$jr' AND AccCode='$AccCode' ");
    if($row==[]) return 0;
    return $row[0]['Bal'];
    }

    function getProdBalance($Pcode) {
    $row = $this->DB_select("SELECT -SUM(Qty) AS Qty
            FROM transdetail
            WHERE ProductCode='$Pcode' ");
    //return isset($row[0]['Qty'])?$row[0]['Qty']:0;
    return $row[0]['Qty'];
    }

    function getIndoCity() {
        //populate city
        $OpenApi =new OpenapiController();
        $city = [];
        foreach($OpenApi->indoProvince() as $res) {
            foreach($OpenApi->indoCity($res->id) as $dat) {
                $city[] = (array)$dat;
            }
        }
        return $city;
    }

    function makeTable($data) {
        $out = '';
        $data=(array)$data;
        foreach($data as $dt) {
            $dt = array_values((array)$dt);
            $row ='<tr><td>'. implode('</td><td>', $dt). '</td></tr>';
            $out.=$row;

        }
        return "<tbody><tr>".$out."</tr></tbody>";
    }

    function getProductImage($imgpath) {
        $noimage = 'images/no-image.png';
        if ($imgpath == 'null') return $noimage;
        if (!file_exists('assets/productImage/'.$imgpath)) return $noimage;
        return 'productImage/'.$imgpath;

    }
    function createSID() {
        $char = [];
        for($a=ord('A');$a<=ord('Z');$a++) {
            $char[] = chr($a);
        }
        for($a=1;$a<=9;$a++) {
            $char[] = (string)$a;
        }
        $char[] = '0';
        //return dd($char);
        $out='';
        for($a=1;$a<=6;$a++){
            $out.=$char[rand(0,35)];
        }
        return $out;
        
    }

}