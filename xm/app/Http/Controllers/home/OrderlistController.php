<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class OrderlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        $userid = session()->get('homeuser')->User_id;
        $data = DB::table('orderlist')
                ->join('goods','orderlist.Orderlist_goodsid','=','goods.Goods_id')
                ->select('orderlist.*','goods.Goods_body')
                ->where('Orderlist_user_id',"$userid")
                ->get();
        //保存搜索条件
        $where = '';
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        return view('Home.orderlist.index',['data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
         
    }
    public function orderlsta(Request $request,$stat){
         //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        //dd($stat);
        $userid = session()->get('homeuser')->User_id;
        //dd($userid);
        $list = DB::table('orderlist')
                ->join('goods','orderlist.Orderlist_goodsid','=','goods.Goods_id')
                ->select('orderlist.*','goods.Goods_body')
                ->where('Orderlist_user_id',"$userid")
                ->get();
        $data = $list->where('Orderlist_state',"{$stat}");
        return view('Home.orderlist.index',['data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
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
    public function inst(Request $request,$id)
    {
         //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        $orderlist = array();
        $userid = session()->get('homeuser')->User_id;
        //获取购物车信息
        $shop = DB::table('shop')->where('Shop_id',$id)->first();
        //获取商品表中的信息
        $goodsid = $shop->Shop_gid;
        //dd($goodsid);
        $goods = DB::table('goods')->where('Goods_id',$goodsid)->first();
        //获取收货地址信息
        $addr = DB::table('address')->where('Address_uid',$userid)->get();
        $a = $addr->where('Address_default',2)->first();
        if($a == null){
            return redirect('home1/address');
        }else{
            $orderlist['Orderlist_goodsid'] = $goods->Goods_id;
            $orderlist['Orderlist_goodsname'] = $goods->Goods_name;
            $orderlist['Orderlist_goodspic'] = $goods->Goods_pic;
            $orderlist['Orderlist_user_id'] = $userid;
            $orderlist['Orderlist_state'] = 0;
            $orderlist['Orderlist_goodsnum'] = $shop->Shop_num;
            $orderlist['Orderlist_pricesum'] = $shop->Shop_price;
            $orderlist['Orderlist_total'] = $shop->Shop_price;
            $orderlist['Orderlist_price'] = $shop->Shop_price;
            $orderlist['Orderlist_name'] = $a->Address_consignee;
            $orderlist['Orderlist_tel'] = $a->Address_consignee_phone;
            $orderlist['Orderlist_time'] = time();
            $orderlist['Orderlist_od_number'] = time().rand(100,999);
            $number = $orderlist['Orderlist_od_number'];
            $row = DB::table('orderlist')->insertGetId($orderlist);
                //dd($row);
            if($row > 0){
                $dell = DB::table('shop')->where('Shop_id',$id)->delete();
                $ob = DB::table('orderlist')->where('Orderlist_od_number',$number)->first();
                //dd($ob);
                return view('Home.payfor.index',['ob'=>$ob,'a'=>$a,'net'=>$net,'link'=>$link]);
            }else{
                return redirect('/home2/orderlist')->with('error','结算失败');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ordlid)
    {
        $orderlist = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get()->first();
        $ob = DB::table('orderlist')->where('Orderlist_id',$ordlid)->get();
        $userid = $orderlist->Orderlist_user_id;
        $address = DB::table('address')->where('Address_uid',$userid)->get();
        return redirect('/home2/orderlist',['ob'=>$ob,'address'=>$address]);
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
       
       $userid = session()->get('homeuser')->User_id;
       $data['Orderlist_state'] = 1;
       $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
       if($row>0){
            return redirect('/home2/orderlist/state/'.$id)->with('msg','支付成功');
        }else{
            return redirect('/home2/orderdetail/'.$id)->with('error','结算失败');
        }

    }
    public function doupdate($id)
    {
        $userid = session()->get('homeuser')->User_id;
        $data['Orderlist_state'] = 1;
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
        if($row>0){

            return redirect('/home2/orderlist/state/1')->with('msg','支付成功');
        }else{
            return redirect('/home2/orderdetail/0')->with('error','结算失败');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->delete();
        if($row>0){
            return redirect('home2/orderlist')->with('msg','取消成功');
        }else{
            return redirect('home2/orderdetail/'.$id)->with('error','取消失败');
        }
    }

    public function rgood($id)
    {
        $data['Orderlist_state'] = 4;
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
        if($row > 0){
            return redirect('home2/orderlist/state/4')->with('msg','已退货，请耐心等待，店家正在处理');
        }else{
            return redirect('home2/orderlist/state/4')->with('error','退货失败');
        }
    }
        public function sgood($id)
    {
        $data['Orderlist_state'] = 3;
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
        if($row > 0){
            return redirect('home2/orderlist/state/3')->with('msg','收货成功，请评价');
        }else{
            return redirect('home2/orderlist/state/3')->with('error','收货失败来，再来一次');
        }
    }
}
    

