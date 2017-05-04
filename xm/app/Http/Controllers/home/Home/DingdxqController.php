<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class DingdxqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $quest,$ordlid)
    {
        //
        //dd($ordlid);
        // $ob = DB::table('orderlist')
        //     ->join('address','orderlist.Orderlist_user_id','=','address.Address_uid')
        //     ->select('orderlist.*','address.*')
        //     ->where('Orderlist_id',$ordlid)
        //     ->first();
        //$userid = session()->get('homeuser')->User_id;
        //dd($userid);
        $orderlist = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get()->first();
        $ob = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get();
        // dd($orderlist);
        
         $payid = $orderlist->Orderlist_payid;
         //dd($payid);
          $pay = DB::table('pay')->where('Pay_id',$payid)->get();
         //dd($pay);
         $dilivery = $orderlist->Orderlist_dilivery;
         $dilivry = DB::table('dilivery')->where('Dilivery_id',$dilivery)->get();
         //dd($dilivry);
         $userid = $orderlist->Orderlist_user_id;
         $address = DB::table('address')->where('Address_uid',$userid)->get();
         
        //dd($address);
            // ->crossJoin('address')
            // ->where('Orderlist_id',$ordlid)
            // ->get();
            // Orderlist_payid
            // Orderlist_dilivery

        //dd($ob);
        return view('Home.dingdanxiangqing.index',['ob'=>$ob,'pay'=> $pay,'dilivry'=>$dilivry,'address'=>$address]);


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
        //
    }
}
