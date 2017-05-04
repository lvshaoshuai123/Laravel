<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;
class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ordlid)
    {
        // 
        //dd($orderlistid);
        
         $orderlist = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get()->first();
        $ob = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get();
        //dd($orderlist);
        
         $payid = $orderlist->Orderlist_payid;
         //dd($payid);
          $pay = DB::table('pay')->where('Pay_id',$payid)->get();
         
         $dilivery = $orderlist->Orderlist_dilivery;
         $dilivry = DB::table('dilivery')->where('Dilivery_id',$dilivery)->get();
         //dd($dilivry);
         $userid = $orderlist->Orderlist_user_id;
         $address = DB::table('address')->where('Address_uid',$userid)->get();
         $goodsid = $orderlist->Orderlist_goodsid;
         //dd($goodsid);
         $goods = DB::table('goods')->where('Goods_id',$goodsid)->get();
        //dd($goods);
         return view('Home.buy.index',['ob'=>$ob,'pay'=>$pay,'dilivry'=>$dilivry,'address'=>$address,'goods'=>$goods]);
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
