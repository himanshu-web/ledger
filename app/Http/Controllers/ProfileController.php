<?php

namespace App\Http\Controllers;
use DB;
use App\Ledger;
use App\venderlist;
use App\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($profile)
    { 
        $shopName = $profile;
        $data = DB::select("SELECT * FROM `venderlists` WHERE shopName='$profile' ");
        
        return view('profile',compact('data','shopName'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $shopName)
    {

    $data = $request->validate([
            'type' => '',
            'shopName' => 'required',
            'email' => '',
            'address' => 'required',
            'gst' => '',
            'phone' => ''
        ]);

        venderlist::where('shopName',$shopName)->update($data);
        Ledger::where('shopName',$shopName)->update(['shopName'=>$request->shopName]);

        return Redirect('VenderListing')->with('success', 'Update SuccessFull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
