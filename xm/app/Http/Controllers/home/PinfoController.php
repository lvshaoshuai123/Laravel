<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ob=session()->get('homeuser');
        $id=$ob->User_id;
        $list=DB::table('user')->where('User_id',$id)->get();
        return view('Home.pinfo.pinfo',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list=DB::table('user')->where('User_id',$id)->first();
        return view('/Home.pinfo.edit',['list'=>$list]);
        // return view('/Home.pinfo.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
                $request,[
                    'User_email' => 'email',
                    'User_age' => 'integer|max:120',
                    'User_tel' => 'required|digits:11',
                ],$this->messages()
            );

        $data = $request->only('User_age','User_sex','User_email','User_tel','User_pic');
        //判断是否有文件上传
        if($request->hasFile('User_pic')){
            // 判断上传的文件是否有效
            if($request->file('User_pic')->isValid()){
                // 获取上传的文件对象
                $pic = $request->file('User_pic');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $pic->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $pic->move('./admin/upload',$picname);
                //把上传的图片新生成的文件名赋值给User_pic
                $data['User_pic']=$picname;
            }else{
                return redirect('/home2/pinfo')->with('msg','上传图片无效');
            }
        }else{
                $pic=$request->only('pic');
                $data['User_pic']=$pic['pic'];
             }


            $row = DB::table('user')->where('User_id',$id)->update($data);
            if($row>0){
            return redirect('/home2/pinfo')->with('msg','修改成功');
            }else{
            return redirect('/home2/pinfo')->with('msg','修改失败');
                    }
       


    }

     public function messages()
    {
        return [
            'User_age.max' => '年龄最大120岁',
            'User_age.integer' => '年龄必须为整数',
            'User_email.email' => '请填写正确的邮箱格式',
            'User_tel.required' => '请填写手机号',
            'User_tel.digits' => '请填写正确的手机号',

        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
