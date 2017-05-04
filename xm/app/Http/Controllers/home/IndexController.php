<?php
// 主页、列表页、详情页、评论页、主页搜索等控制器
namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class IndexController extends Controller
{
	public function index(Request $request)
    {
        //保存搜索条件
        $where='';
        //实例化操作表
        //网站配置
        $net=DB::table('net')->first();
        // dd($net);
        //商品类别
        $data = DB::table('goodcate')->get();
        // dd($data);
        // 友情链接
        $link=DB::table('link')->get();
        // dd($link);
        //轮播图
        $carousel = DB::table('carousel')->get();
        //小米明星单品
        // $product=DB::table('product')->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        //导航栏商品类别
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        // dd($goods);
        if(session()->has('homeuser'))
        {
            $a = session()->get('homeuser');
            $b=$a->User_id;
            $row=DB::table('shop')->where('Shop_uid',$b)->get();
            $shop=DB::table('shop')->where('Shop_uid',$b)->first();
        }else{
            $shop='';
            $row=0;
        }
        if($request->has('Goods_name')){
            //获取搜索的条件
            $name=$request->input('Goods_name');
            // dd($name);
            //添加到将要携带到分页中的数组中
            $where['Goods_name']=$name;
            //给查询添加where条件
            $goods->where('Goods_name','like',"%{$name}%");
        }
        // $a = DB::table('goodcate')->select('GoodCate_name')->get();
        if($net->Net_site==1){
    	return view('home.index.index',['list'=>$data,'carousel'=>$carousel,'goods'=>$goods,'net'=>$net,'link'=>$link,'where'=>$where,'goodcates'=>$goodcates,'shop'=>$shop,'row'=>$row]);
        }
        return view('home.index.net');
    }
    public function list($id)
    {
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        //单条商品类别
        $data = DB::table('goodcate')->where('GoodCate_id',$id)->first();
        if(session()->has('homeuser'))
        {
            $a = session()->get('homeuser');
            $b=$a->User_id;
            $shop=DB::table('shop')->where('Shop_uid',$b)->first();
        }else{
            $shop='';
        }
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        return view('home.list.index',['net'=>$net,'link'=>$link,'goods'=>$goods,'id'=>$id,'data'=>$data,'datas'=>$datas,'goodcates'=>$goodcates,'shop'=>$shop]);
    }
    public function detail($id)
    {
         // 商品详情
        $goods = DB::table('goods')->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        $data = DB::table('goods')->where('Goods_id',$id)->first();
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        // dd($data);
        return view('home.detail.index',['data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goods'=>$goods,'goodcates'=>$goodcates]);
    }
    public function evaluate($id)
    {
         //所有的商品类别
        $datas = DB::table('goodcate')->get();
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        //查询所有评论
        $data = DB::table('evaluate')->where('Eval_gid',$id)->get();
        $good = DB::table('goods')->where('Goods_id',$id)->first();
        $user = DB::table('user')->get();
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        return view('home.evaluate.index',['good'=>$good,'data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goods'=>$goods,'goodcates'=>$goodcates,'user'=>$user]);
    }
    public function search(Request $request)
    {
        //保存搜索条件
        $goods = DB::table('goods');
        if($request->has('Goods_name')){
            // 商品详情
            //获取搜索的条件
            $name=$request->input('Goods_name');
            // dd($name);
            //给查询添加where条件
            $goods->where('Goods_name','like',"%{$name}%");
        }
        $list = $goods->get();
        //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        return view('home.search.index',['net'=>$net,'datas'=>$datas,'goods'=>$list,'goodcates'=>$goodcates,'link'=>$link]);
    }

}
