<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;
class PersonController extends Controller
{

	
	public function index(){
		 // 商品详情
        $goods = DB::table('goods')->get();
		//限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
		//所有的商品类别
        $datas = DB::table('goodcate')->get();
		$link = DB::table('link')->get();
		$net = DB::table('net')->first();
		$userid = session()->get('homeuser')->User_id;
		$ob = DB::table('user')->where('User_id',$userid)->first();
		//dd($ob);
		return view('Home.pinfo.index',['ob'=>$ob,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
	}

}