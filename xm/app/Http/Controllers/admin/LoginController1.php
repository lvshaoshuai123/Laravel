<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    public function index()
    {
    	return view('admin.login');
    }
    public function dologin(Request $request)
    {
        $mycode = session('mycode');
        if($mycode != $request->input('mycode'))
        {
            return back()->with('msg','登录失败：验证码不正确');
        }
    	$user=new User();
    	$ob=$user->checkUser($request);
    	if($ob)
    	{
    		session(['adminuser'=>$ob]);
    		return redirect('/admin1/demo');
    	}else{
    		return back()->with('msg','登录失败：用户名或密码不正确');
    	}
    }
    public function captch($tmp)
    {

        $builder = new CaptchaBuilder;
        $builder->build(200,44,null);
        //获取验证码中的内容
        $data=$builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);
        return response($builder->output())-header('Content-type','image/jpeg');
    }
    public function over()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }
}