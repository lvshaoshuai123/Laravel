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
    public function shopid(Request $request)
    {
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        $list = $request->except('_token','num');
        $ids=$list['shopid'];
        $id = $ids[0];
        $id=intval($id);
        $shop = DB::table('shop')->where('Shop_id',$id)->first();
         $userid = $shop->Shop_uid;
         $addr = DB::table('address')->where('Address_uid',$userid)->get();
         $address = $addr->where('Address_default',2)->first();
         if($address == null){
            return redirect('home2/address')->with('msg','请设置默认收货地址');
         }
         $goodsid = $shop->Shop_gid;
         $goods = DB::table('goods')->where('Goods_id',$goodsid)->get();
         // $del = DB::table('shop')->where('Shop_id',$id)->delete();
         return view('Home.buy.index',['shop'=>$shop,'address'=>$address,'goods'=>$goods,'net'=>$net,'link'=>$link]);
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
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
          $userid = session()->get('homeuser')->User_id;
          $addr = DB::table('address')->where('Address_uid',$userid);
          $a = $addr->where('Address_default',2)->first();
          if($a == null)
          { 
            return redirect('home1/address');
          }else{
             $ob = DB::table('orderlist')->where('Orderlist_id',$id)->first();

             return view('Home.payfor.index',['ob'=>$ob,'a'=>$a,'net'=>$net,'link'=>$link]);

          }      
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
    public function date($id)
    {
        $state = array();
        $state['Orderlist_state'] = 1;
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($state);
        if($row > 0){
                return redirect('home2/orderdetail/'.$id);
        }else{
            return redirect("home2/orderdetail/".$id)->with('error','结算失败');
        }
        
    }
}
