<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use DB;
class PdfMakerController extends Controller
{
    function generate($request)
    {   
        $pdf = App::make('dompdf.wrapper');
                
        $pdf->loadHTML( $this->convert_customer_data_to_html($request) );
        return $pdf->stream();
    }

    function convert_customer_data_to_html($data)
    {
        $ledgerDetail = DB::select("select * from ledgers where shopName='$data' ");
            /* dd($ledgerDetail); */
            $ledgerTotal = DB::select("SELECT *, credit,debit,SUM(credit) AS total_credit ,SUM(debit) AS total_debit,( SUM(credit) - SUM(debit) ) as total_balance FROM ledgers where shopName='$data' ");
        $output = ' Name: '.$ledgerDetail[0]->shopName.'
        <style> 
            table, td, th { 
                border: 1px solid black; 
            } 
            #separateTable { 
                border-collapse: separate; 
            } 
            #collapseTable { 
                border-collapse: collapse; 
            } 
        </style> 
            <table style="width:100%" id = "collapseTable">
                <thead>
                    <tr>
                        <td >Date</td>
                        <td >Discription</td>
                        <td >Credit</td>
                        <td >Debit</td>
                        <td >Balance</td>
                    </tr>
                </thead>
                <tbody >
                ';
                foreach($ledgerDetail as $ledgerDetails){
            $output .='
                    <tr>
                        <td>'.$ledgerDetails->date.'</td>
                        <td>'.$ledgerDetails->discription.'</td>
                        <td>'.$ledgerDetails->credit.'</td>
                        <td>'.$ledgerDetails->debit.'</td>
                        <td>'.$ledgerDetails->balance.'</td>
                    </tr>
                    ';}$output .='
                    <tfoot>
                    <tr>
                        <td></td>
                        <td>Total=</td>
                        <td>'.$ledgerTotal[0]->total_credit .'</td>
                        <td>'. $ledgerTotal[0]->total_debit .'</td>
                        <td>'. $ledgerTotal[0]->total_balance .'</td>
                    </tr>
                    </tfoot>
                    
                </tbody>
            </table>
        ';
        return $output;
    }

    function LedgerPdf()
    {
        $pdf = App::make('dompdf.wrapper');
        
        $ledgerDetail = DB::select("select *, (credit - debit) as balance from ledgers where shopName='Himanshu Verma' ");
        print_r($ledgerDetail);
       return view('LedgerPdf');   
    }
    
}
