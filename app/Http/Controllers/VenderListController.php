<?php

namespace App\Http\Controllers;
use DB;
use App\venderlist;
use App\Buyer;
use App\Seller;
use App\Ledger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer = array();
        $buyerId = array();
        $buyerName = array();
        $venderlist = DB::table('venderlists')->where('type','buyer')->orderBy('shopName','asc')->get();
        
        foreach($venderlist as $venderlists)
        {    
            $name = $venderlists->shopName;
            $buyerId[] = $venderlists->id;
            $buyerName[] = $name;
            $buyer[] = DB::select("SELECT *, sum(ledgers.credit - ledgers.debit) as balance FROM ledgers WHERE ledgers.shopName = '$name' ");
        }    

        $seller = array();
        $sellerId = array();
        $sellerName = array();
        $venderlist1 = DB::table('venderlists')->where('type','seller')->orderBy('shopName','asc')->get();
        /* dd($venderlist1); */
       foreach($venderlist1 as $venderlists1)
       {    
            $name1 = $venderlists1->shopName;
            $sellerId[] = array();
            $sellerName[] = $name1;
            $seller[] = DB::select("SELECT *, sum(ledgers.credit - ledgers.debit) as balance FROM ledgers  WHERE ledgers.shopName = '$name1' ");
            /* dd($seller); */
        }    
            return view('VenderList',compact('buyerId','buyerName','buyer','sellerId','sellerName','seller') );
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
            'type' => '',
            'shopName' => 'required|unique:venderlists,shopName',
            'email' => '',
            'address' => 'required',
            'gst' => '',
            'phone' => '',
            'userId'=>''
        ]);

        venderlist::create($data);
        return back()->with("success","Vender Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        venderlist::where('shopName',$id)->delete();
        Ledger::where('shopName',$id)->delete();

        echo strtoupper($id.' Deleted Successful');

    }
}
