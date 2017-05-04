<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ModifyController extends Controller
{
    public function modify(Request $request)
    {
    	$list=$request->session()->get('homeuser');
    	$a=$list->User_id;
    	return view('Home.safety.modifypwd',['id'=>$a]);
    }

    public function domodify(Request $request)
    {
         
    	$id=$request->input('User_id');
    	$pwd=md5($request->input('User_pwd'));
    	$pwdd=md5($request->input('User_pwdd'));
    	$pwddd=md5($request->input('User_pwddd'));
    	$a=DB::table('user')->where('User_id',$id)->first();
    	if($a->User_pwd == $pwd){
    		if($pwdd){
                    $this->validate($request, [
                    'User_pwdd' => 'required|min:6',
                    ],$this->messages());
    				if($pwdd == $pwddd){
    					$newpwd=array('User_pwd'=>"$pwdd");
    					$row=DB::table('user')->where('User_id',$id)->update($newpwd);
    					return redirect('/')->with('msg','密码修改成功');
    				}else{
    					return back()->with('msg','新密码与确认密码不一致');
    				}
    		}else{
    				return back()->with('msg','请输入新密码');
    		}

    	}else{

    		return back()->with('msg','原密码不正确');
    	}

    }

     public function messages()
    {
        return [
            'User_pwdd.min' => '新密码最少六位',

        ];
    }
}
