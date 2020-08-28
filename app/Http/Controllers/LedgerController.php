<?php

namespace App\Http\Controllers;
use DB;
use App\Ledger;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $user = DB::select("SELECT credit,debit,SUM(credit) AS total_credit ,SUM(debit) AS total_debit,(credit-debit) as balance,( SUM(credit) - SUM(debit) ) as total_balance FROM ledgers");
       dd($user);
        return view('Ledger'); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $data = $request->validate([
            'shopName' => '',
            'date' => '',
            'discription'=>'',
            'credit'=>'',
            'debit'=>'',
            'balance'=>''
        ]); 
        
        $led_dt = DB::select("SELECT * FROM `ledgers` WHERE shopName='$data[shopName]' ORDER BY id DESC LIMIT 1");
        
        
        if(count($led_dt) > 0)
        {
            $led_dt = DB::select("SELECT * FROM `ledgers` WHERE shopName='$data[shopName]' ORDER BY id DESC LIMIT 1");
            
            if(!empty($request->credit))
            {
                $data['balance'] = $request['credit'] + $led_dt[0]->balance;
            }
            if(!empty($request->debit))
            {
                $data['balance'] =   $led_dt[0]->balance - $request['debit'];
            }

            Ledger::create($data);
            return back()->with('success','Date Inserted Successfully');
        }
        else
        {
            if(empty($request['credit']))
            {
                $request['credit'] = 0;
            }else{
                $request['debit'] = 0;
            }
            $data['balance'] = $request['credit'] - $request['debit'];
           
            Ledger::create($data);
            return back()->with('success','Date Inserted Successfully');
        }
           
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function show($request)
    {   

        //$led_dt = DB::select("SELECT * FROM `ledgers` WHERE shopName='$request[shopName]' ORDER BY shopName DESC LIMIT 1");
        
        $shopName = $request;
        $ledgerDetail = DB::select("SELECT *  from ledgers where shopName='$request'");

          
        
        $ledgerTotal = DB::select("SELECT *, credit,debit,SUM(credit) AS total_credit ,SUM(debit) AS total_debit,( SUM(credit) - SUM(debit) ) as total_balance FROM ledgers where shopName='$request' ");
        return view('Ledger',compact('ledgerDetail','ledgerTotal','shopName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function edit(Ledger $ledger)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ledger $ledger)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ledger  $ledger
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ledger $ledger)
    {
        //
    }
}
