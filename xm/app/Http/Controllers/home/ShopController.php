<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class ShopController extends Controller
{
    public function index()
    {
        $ob=session()->get('homeuser');
        $id=$ob->User_id;
    	$list=DB::table('shop')->where('Shop_uid',$id)->get();
        if(count($list)){
            return view('Home.shop.shop',['list'=>$list]);
        }else{
            return view('Home.shop.kshop');
        }
    	
    }

    public function shopdel($id)
    {
    	$row=DB::table('shop')->where('Shop_id',$id)->delete();
    	if($row>0){
    		return redirect('/home2/shop');
    	}else{
    		return redirect('/home2/shop')->with('msg','删除失败');
    	}
    }

    public function submit(Request $request)
    {
        $list = $request->except('_token','num');
        $ids=$list['shopid'];
        $id = $ids[0];
        // dd($id);
        
        $id = explode(',',$id); //分割字符串为数组
        foreach($id as $v){
            $data = DB::table('shop')->where('Shop_id',$v)->first();
            $ob[]=$data;
        }
        return view('Home.buy.index',['ob'=>$ob]);
    }


    public function add(Request $request)
    {
         $data=$request->except('_token');
         $id = $data['Shop_id'];
         $num = $data['Shop_num'];
        // $row = DB::table('user')->where('User_id',$id)->update($data);
        $row = DB::table('shop')->where('Shop_id',$id)->update(['Shop_num'=>$num]);
         // echo json_encode($row);
    }
    
    public function cshop($id)
    {
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
        $data = DB::table('goods')->where('Goods_id',$id)->first();
        $row = DB::table('shop')->insertGetId(['Shop_gid'=>$data->Goods_id,'Shop_uid'=>(session('homeuser')->User_id),'Shop_pic'=>$data->Goods_pic,'Shop_num'=>1,'Shop_price'=>$data->Goods_price,'Shop_name'=>$data->Goods_name,'Shop_model'=>$data->Goods_edition]);
        return view('home.shop.cshop',['data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
    }
}
