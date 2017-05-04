<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Gregwar\Captcha\CaptchaBuilder;

use DB;

class RegisterController extends Controller
{
	public function register()
	{
		return view('Home.register');
	}
    
    public function doregister(Request $request)
    {
    	//获取session中的验证码内容
        $mycode = session('hmycode');
        // // 判断用户输入的验证码和session中的内容是否一致
        if($mycode != $request->input('User_mycode')){
            return back()->with('msg','注册失败：验证码不正确');
        }

        $this->validate($request, [
        'User_name' => 'required|max:8|min:2|unique:user,User_name',
        'User_pwd' => 'required|min:6',
        'User_email' => 'required|email',
        ],$this->messages());
    
        $data = $request->only('User_name','User_email','User_pwd');
        $data['User_pwd']=md5($data['User_pwd']);
        //判断密码和确认密码是否一致
        $pwdd=md5($request->input('User_pwdd'));
        if($data['User_pwd'] == $pwdd){
            $id = DB::table('user')->insertGetId($data);
            if($id>0){
                return redirect('/home1/login')->with('msg','注册成功');
            }else{
                return back()->with('msg','系统忙碌，注册失败');
                }
        }else{
            return back()->with('msg','密码与确认密码不一致');
        }
        
    }

     public function captch($tmp)
    {
        //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        // 设置验证码的宽高字体
        $builder->build(130,44,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('hmycode',$data);

        return response($builder->output())->header('Content-type','image/jpeg');
    }

     public function messages()
    {
        return [
            'User_name.required' => '用户名必须填写',
            'User_name.max' => '用户名必须2-8位',
            'User_name.min' => '用户名必须2-8位',
            'User_name.unique' => '用户名已存在',
            'User_pwd.required' => '密码必须填写',
            'User_pwd.min' => '密码最少六位',
            'User_email.required' => '请填写邮箱',
            'User_email.email' => '请填写正确的邮箱格式',

        ];
    }
}
