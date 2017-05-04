<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class UserAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('user');
        //判断是否有搜索条件
        if($request->has('User_sex')){
            //获取搜索的条件
            $sex = $request->input('User_sex');
            //添加到将要携带到分页中的数组中
            $where['User_sex'] = $sex;
            //给查询添加where条件
            $ob->where('User_sex',$sex);
        }
        if($request->has('User_name')){
            //获取搜索的条件
            $name = $request->input('User_name');
            //添加到将要携带到分页中的数组中
            $where['User_name'] = $name;
            //给查询添加where条件
            $ob->where('User_name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(3);
        return view('Admin.User.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.User.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'User_name' => 'required|max:8|min:2',
            'User_pwd' => 'required|min:6',
            'User_age' => 'integer|max:120',
            'User_email' => 'required|email',
            'User_tel' => 'required|digits:11',
        ],$this->messages());
        $data = $request->except('_token');
        $id = DB::table('user')->insertGetId($data);
        if($id>0){
            return redirect('/admin1/user')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'User_name.required' => '用户名必须填写',
            'User_name.max' => '用户名必须2-8位',
            'User_name.min' => '用户名必须2-8位',
            'User_pwd.min' => '密码最少六位',
            'User_age.max' => '年龄最大120岁',
            'User_age.integer' => '年龄必须为整数',
            'User_email.required' => '请填写邮箱',
            'User_email.email' => '请填写正确的邮箱格式',
            'User_tel.required' => '请填写手机号',
            'User_tel.digits' => '请填写正确的手机号',

        ];
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
        $data = DB::table('user')->where('User_id',$id)->first();
        return view('Admin.User.edit',['ob'=>$data]);
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
        $data = $request->only('User_name','User_age','User_sex','User_email','User_tel','User_pic');
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
                return redirect('/admin1/user')->with('msg','上传图片无效');
            }
        }else{
                $pic=$request->only('pic');
                $data['User_pic']=$pic['pic'];
             }


            $row = DB::table('user')->where('User_id',$id)->update($data);
            if($row>0){
            return redirect('/admin1/user')->with('msg','修改成功');
            }else{
            return redirect('/admin1/user')->with('msg','修改失败');
                    }
       


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = DB::table('user')->where('User_id',$id)->delete();
        if($row>0){
            return redirect('/admin1/user')->with('msg','删除成功');
        }else{
            return redirect('/admin1/user')->with('msg','删除失败');
        }
    }
}
