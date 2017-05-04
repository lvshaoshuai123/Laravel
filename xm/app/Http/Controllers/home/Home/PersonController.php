<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;
class PersonController extends Controller
{


	public function index(){
		$userid = session()->get('homeuser')->User_id;
		$ob = DB::table('user')->where('User_id',$userid);
		//dd($ob);
		return view('Home.person.index',['ob'=>$ob]);
	}

}