<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SafetyController extends Controller
{
   	public function repwd()
   	{
   		return view('Home.safety.repwd');
   	}

   	public function check(Request $request)
   	{
   		$list=$request->except('_token');
   		$name=$list['User_name'];
   		$email=$list['User_email'];
   		$tel=$list['User_tel'];
   		$ob=DB::table('user')->where('User_name',$name)->first();
   		if($ob->User_email == $email){
   			if($ob->User_tel == $tel){
   				$id=$ob->User_id;
   				return view('Home.safety.newpwd',['id'=>$id]);
   			}else{
   				return back()->with('msg','信息填写错误');
   			}
   		}else{
   			return back()->with('msg','填写信息错误');
   		}
   	}

   	public function newpwd(Request $request)
   	{
		$list=$request->except('_token','User_pwdd'); 
		$id=$list['User_id'];
		$list['User_pwd']=md5($list['User_pwd']);
		$row=DB::table('user')->where('User_id',$id)->update($list);
		if($row>0){
			return redirect('/home1/login')->with('msg','重置密码成功');
		}else{
			return back()->with('msg','重置密码失败');
		}
   	}
}
