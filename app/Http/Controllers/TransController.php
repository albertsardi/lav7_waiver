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
use App\Http\Model\Purchase;
use App\Http\Model\Expense;
use App\Http\Model\Detail;
use App\report\MyReport;
use \koolreport\widgets\koolphp\Table;
use \koolreport\export\Exportable;
//use \koolreport\cloudexport\Exportable;
//use HTML;
use Session;

class TransController extends MainController {

    function listpurchase() {
        $jr = 'purchase';
        $today = date('Y-m-d');
        $out =[];
        //$res = Purchase::where('active',1)->get();
        $res = Purchase::all();
        foreach($res as $r) {
            $out[]=[
                "<a href='".url("edit/$jr/".$r->TransNo)."'>".$r->TransNo."</a>",
                $r->TransDate,
                $this->getSupplierName($r->AccCode),
                $this->getStatus($r),
                'Rp. '.number_format($r->Total,2), //TODO get Qty
            ];
        }
        $data = [
            'jr'        => $jr,
            'title'     => ucfirst($jr).' List',
            'gridhead'  => ['Purchase #','Date','Supplier','Status','Total'],
            '_url'      => env('API_URL').'/api/'.'purchase',
            // 'data'      => $this->db_query('masterproduct','Code,Name,UOM,Category,12345 as Qty'),
            'grid'      => $out,
        ];
                

        $data['grid'] = $this->makeTable($data['grid']);
        $data['gridhead'] = '<thead><tr><th>'.implode('</th><th>',$data['gridhead']).'</th></tr></thead>';
        return view('datalist', $data);
    }

    function listexpense() {
        $jr = 'expense';
        $today = date('Y-m-d');
        $out =[];
        $res = Expense::whereRaw("Amount>0")->distinct()->get();
        dump($res);
        foreach($res as $r) {
            $out[]=[
                "<a href='".url("edit/$jr/".$r->ReffNo)."'>".$r->ReffNo."</a>",
                $r->JRdate,
                $r->ExpCategory??'',
                $this->getStatus($r),
                'Rp. '.number_format($r->Amount,2), //TODO get Qty
            ];
        }
        $data = [
            'jr'        => $jr,
            'title'     => ucfirst($jr).' List',
            'gridhead'  => ['Expense #','Date','Expense Category','Status','Total'],
            '_url'      => env('API_URL').'/api/'.'purchase',
            // 'data'      => $this->db_query('masterproduct','Code,Name,UOM,Category,12345 as Qty'),
            'grid'      => $out,
        ];
                

        $data['grid'] = $this->makeTable($data['grid']);
        $data['gridhead'] = '<thead><tr><th>'.implode('</th><th>',$data['gridhead']).'</th></tr></thead>';
        return view('datalist', $data);
    }

    function dataedit($jr,$id='') {
        //return $jr.$id;
        switch($jr) {
            case 'purchase':
                return $this->editPurchase($id);
            break;
            case 'expense':
                return $this->editExpense($id);
            break;
            case 'customer':
                return $this->editCustomer($id);
            break;
            case 'supplier':
                return $this->editSupplier($id);
            break;
        }
    }

    function editPurchase($id=''){
        // return 'edit purchase '.$id;
        $data =[];
        $data['id'] = $id;
        $data['jr'] = 'purchase';
        $data['mSupplier'] = MainController::getOption('suppliers',['AccCode','AccName'], "Active='1' ");
        $data['mProduct'] = MainController::getOption('products',['id','name'], "active='1' ") ;
        $dat = Purchase::find($id);
        $total = [];
        if($dat){
            $data['data'] = $dat;
            $detail = (DB::table('details')->where('TransNo',$id)->get());
            $subtot = 0;
            foreach($detail as $d) {
                $d->Amount = floatval($d->Price) * abs(floatval($d->Qty));
                $subtot += floatval($d->Amount);
            }
            $data['detail'] = json_encode($detail);
            $data['total'] = [
                'subtotal' => $subtot,
                'disc'     => $dat->DiscAmountH,
                'freight'  => $dat->FreightAmountH,
                'tax'      => $dat->TaxAmount,
                'total'    => $subtot-$dat->DiscAmountH+$dat->FreightAmountH+$dat->TaxAmount,
            ];
        } else {
            $data['data'] = [];
            $data['image'] = 'images/no-image.png';
        }
        
        dump($data);
        return view('purchase.form', $data);

    }

    function editExpense($id=''){
        // return 'edit expense '.$id;
        $data =[];
        $data['id'] = $id;
        $data['jr'] = 'expense';
        $data['mCat'] = MainController::getOption('categories',['id','Name'], "CatType='expense' ");
        $dat = Expense::whereRaw("Amount>0 and TransNo='$id' ")->first();
        $total = [];
        if($dat){
            $data['data'] = $dat;
            $detail = (DB::table('details')->where('TransNo',$id)->get());
            $subtot = 0;
            foreach($detail as $d) {
                $d->Amount = floatval($d->Price) * abs(floatval($d->Qty));
                $subtot += floatval($d->Amount);
            }
            $data['detail'] = json_encode($detail);
            $data['total'] = [
                'subtotal' => $subtot,
                'disc'     => $dat->DiscAmountH,
                'freight'  => $dat->FreightAmountH,
                'tax'      => $dat->TaxAmount,
                'total'    => $subtot-$dat->DiscAmountH+$dat->FreightAmountH+$dat->TaxAmount,
            ];
        } else {
            $data['data'] = [];
            $data['image'] = 'images/no-image.png';
        }
        
        dump($data);
        return view('expense.form', $data);

    }

function getStatus($dat) {
    if($dat->Status==1) return "<span class='text-success'>Sent</span>";
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
        return view('expense.form', $data);
    }
    
    function store(Request $req){
        $save = $req->input();
        $jr = $save['formtype'];
        if($jr=='purchase') return $this->storePurchase($req);
        if($jr=='expense') return $this->storeExpense($req);
    }
    function storePurcase(Request $req){
        session_start();
        $save = $req->input();
        $jr = $save['formtype'];
        
        //return dd($detail);
        $user = Session::get('user')??'no user';
        $user = $req->session()->get('user');
        $save['CreatedBy'] = $user;
        if($jr=='purchase') {
            $supplier = Supplier::where('AccCode',$save['AccCode'])->first();
            $save['AccName'] = $supplier->AccName??'';
        }
        if(empty($save['sid'])) $save['sid'] = $this->createSID() ;
        //return dd($save);

        if(!empty($save['id'])) {
            //update
            if($jr=='purchase') $data = Purchase::find($save['id']);
            if($jr=='expense') $data = Expense::find($save['id']);
            $res=$data->update($save);
            //save detail
            if(isset($save['detail'])) { //if has detail save detail
                $detail = json_decode($save['detail']);
                DB::Table('details')->where('TransNo',$save['id'])->delete();
                foreach($detail as $d){
                    $data = new Detail();
                    $d = (array)$d;
                    $r = $data->create($d); 
                }
            }
            if ($res) { //save OK
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveError',json_encode($res));
            }

        } else {
            // create new
            if($jr=='purchase') $no = $this->getTransNo('PI');
            if($jr=='expense') $no = $this->getTransNo('EX');
            $data = null;
            if($save['formtype']=='product') $data = new Product();
            if($save['formtype']=='customer') $data = new Customer();
            if($save['formtype']=='supplier') $data = new Supplier();
            if($save['formtype']=='expense') $data = new Expense();
            if(is_null($data)) return dd('Error !!! formType not found');

            if (empty($save['TransNo'])) $save['TransNo'] = $this->getTransNo('PI');
            if (empty($save['ReffNo'])) $save['ReffNo'] = $this->getTransNo('EX');
            //return dd($save);
            $res = $data->create($save);
            //return dd($res);
            $lastID = $res->id; //get last save id
            //return dd($res);

            if ($res) { //save OK
                return redirect::to(url("edit/$jr/$lastID"))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/$jr/$LastID"))->with('saveError',json_encode($res));
            }
        }
        
    }
    function storeExpense(Request $req){
        session_start();
        $save = $req->input();
        $jr = $save['formtype'];
        
        //return dd($detail);
        $user = Session::get('user')??'no user';
        $user = $req->session()->get('user');
        $save['CreatedBy'] = $user;
        if(empty($save['sid'])) $save['sid'] = $this->createSID() ;
        //return dd($save);

        if(!empty($save['ReffNo'])) {
            //update
            $data = Expense::find($save['id']);
            $res = $data->update($save);
            if ($res) { //save OK
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/$jr/".$save['id']))->with('saveError',json_encode($res));
            }
        } else {
            // create new
            $data = new Expense();
            //return dd($save);
            $save['TransNo'] = $this->getTransNo('EX');
            $res = $data->create($save);
            //return dd($res);
            $lastID = $res->TransNo; //get last save id
            //return dd($res);

            if ($res) { //save OK
                return redirect::to(url("edit/expense/$lastID"))->with('saveOK','Save sucessfull');
            } else {
                return redirect::to(url("edit/expense/$LastID"))->with('saveError',json_encode($res));
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
        $out='';
        for($a=1;$a<=6;$a++){
            $out.=$char[rand(0,35)];
        }
        return $out;
        
    }

}