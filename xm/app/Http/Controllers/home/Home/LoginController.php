<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoginController extends Controller
{
    public function login()
    {
    	return view('Home.login');
    }

    public function dologin(Request $request)
    {
    	//获取session中的验证码内容
        // $mycode = session('mycode');
        // 判断用户输入的验证码和session中的内容是否一致
        // if($mycode != $request->input('mycode')){
        //     return back()->with('msg','登录失败：验证码不正确');
        // }
    	$name=$request->input('User_name');
    	$password=md5($request->input('User_pwd'));
    	$ob=DB::table('user')->where('User_name',$name)->first();
    	if($ob){
    		if($password == $ob->User_pwd){
    			session(['homeuser'=>$ob]);
              $sess=  session()->get('homeuser');
              $data = DB::table('user')->where('User_id',$sess->User_id)->get();
              
    			return view('Home.pinfo.pinfo',['sess' => $sess,'data'=>$data]);
    		}else{
    			return back()->with('msg','密码不对');
    		}

    	}else{
    		return back()->with('msg','用户名不存在');
    	}
    }

    // public function captch($tmp)
    // {
    //     //生成验证码图片的builder对象，
    //     $builder = new CaptchaBuilder;
    //     // 设置验证码的宽高字体
    //     $builder->build(200,44,null);
    //     //获取验证码中的内容
    //     $data = $builder->getPhrase();
    //     //把验证码的内容闪存到session里面
    //     session()->flash('mycode',$data);

    //     //告诉浏览器，这是一张图片
    //     // header('content-type:image/jpeg');
    //     //生成图片
    //     // $builder->output();die;

    //     return response($builder->output())->header('Content-type','image/jpeg');
    // }

    public function over()
    {
        session()->forget('homeuser');
        return redirect('home1/login');
    }

    public function index()
    {
    	return view('Home.orderlist.index');
    }
}
