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
        //
       //dd($request);
        //实例化操作表
       
       $userid = session()->get('homeuser')->User_id;
        $data = DB::table('orderlist')
        ->join('pay','orderlist.Orderlist_payid','=','pay.Pay_id')
        ->join('goods','orderlist.Orderlist_goodsid','=','goods.Goods_id')
        ->select('orderlist.*','pay.Pay_content','goods.Goods_body')
        ->where('Orderlist_user_id',"$userid")
        ->get();
        //dd($data);
        //dd($userid);
        //$a = count($ob);
        //dd($a);
        //$b = array[]; 
     //保存搜索条件
        $where = '';
        $ob = $data->where('Orderlist_state','<','4');
       
       // dd($ob);
        //$goodsid = $data->where('')
       //dd($ob);
        //dd($ob);
        //判断是否有搜索条件
        // if($request->has('Orderlist_state')){
        //     //获取搜索的条件
        //     //dd($request['Orderlist_state']);
        //     $Orderlist_state = $request->input('Orderlist_state');
        //     //添加到将要携带到分页中的数组中
        //     $where['Orderlist_state'] = $Orderlist_state;
        //     //给查询添加where条件
        //     $ob->where('Orderlist_state',$Orderlist_state);
        // }
        // if($request->has('Orderlist_od_number')){
        //     //获取搜索的条件
        //     $Orderlist_od_number = $request->input('Orderlist_od_number');
        //     //添加到将要携带到分页中的数组中
        //     $where['Orderlist_od_number'] = $Orderlist_od_number;
        //     //给查询添加where条件
        //     $ob->where('Orderlist_od_number','like',"%{$Orderlist_od_number}%");
        // }
        // //执行分页查询

        // $list = $ob->paginate(1);
        //dd($list);
        return view('Home.orderlist.index',['data'=>$data,'where'=>$where]);
         
    }
    public function orderlsta(Request $request,$stat){
        //dd($stat);
        $userid = session()->get('homeuser')->User_id;
        //dd($userid);
        $list = DB::table('orderlist')
        ->join('pay','orderlist.Orderlist_payid','=','pay.Pay_id')
        ->select('orderlist.*','pay.Pay_content')
        ->where('Orderlist_user_id',"$userid")
        ->get();
        //dd($list);
        $data = $list->where('Orderlist_state',"{$stat}");
        //dd($data);
        return view('Home.orderlist.index',['data'=>$data]);
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
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ordlid)
    {
        //
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
         
       // dd($ob);
            // ->crossJoin('address')
            // ->where('Orderlist_id',$ordlid)
            // ->get();
            // Orderlist_payid
            // Orderlist_dilivery

        //dd($ob);
        return redirect('/home1/orderlist',['ob'=>$ob,'pay'=> $pay,'dilivry'=>$dilivry,'address'=>$address]);


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
        // dd($id);
       $userid = session()->get('homeuser')->User_id;
        //dd($userid);
        $list = DB::table('address')->where('Address_uid',$userid)->get();
        $a = $list->where('Address_default','=','2')->first();
        //dd($a);
       //dd($a);
         $ob = DB::table('orderlist')->where('Orderlist_id',$id)->first();
        
        $data = $ob->Orderlist_state;
        // dd($data);
        $data = array();
        $data['Orderlist_state'] = 1;
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);

        // dd($row);
          if($row>0){

            return view('Home/payfor/index',['ob'=>$ob,'a'=> $a]);
        }else{
            return redirect('/home1/orderdetail/'.$id)->with('error','结算失败');
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
        //
    }


    
}
    

