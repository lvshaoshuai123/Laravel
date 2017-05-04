<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    public function index()
    {
    	return view('Admin.login');
    }

    public function dologin(Request $request)
    {
        //获取session中的验证码内容
        $mycode = session('mycode');
        // 判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('mycode')){
            return back()->with('msg','登录失败：验证码不正确');
        }

    	$name=$request->input('Auser_name');
    	$password=md5($request->input('Auser_pwd'));
    	$ob=DB::table('auser')->where('Auser_name',$name)->first();
    	if($ob){
    		if($password == $ob->Auser_pwd){
    			session(['adminuser'=>$ob]);

    			return redirect('admin1/index');
    		}else{
    			return back()->with('msg','密码不对');
    		}

    	}else{
    		return back()->with('msg','用户名不存在');
    	}
    }

    public function captch($tmp)
    {
        //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        // 设置验证码的宽高字体
        $builder->build(200,44,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    public function over()
    {
        session()->forget('adminuser');
        return redirect('/admin/login');
    }
}

