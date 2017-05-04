<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class AuserAddController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request)
    {
        $where='';
        $ob=DB::table('user');
        if($request->has('sex')){
            $sex=$request->input('sex');
            $where['sex']=$sex;
            $ob->where('sex',$sex);
        }
        if($request->has('name')){
            $name=$request->input('name');
            $where['name']=$name;
            $ob->where('name','like',"%{$name}%");
        }
        $list=$ob->paginate(3);
        return view('Admin.User.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'Auser_name'=>'required|max:12|min:3',
            'Auser_pwd'=>'required|min:8',
            ],$this->messages());
        $list=$request->only('Auser_name','Auser_pwd');
        $list['Auser_pwd']=md5($list['Auser_pwd']);
        $row=DB::table('auser')->insertGetid($list);
        if($row>0){
            return redirect('admin/login')->with('msg','注册成功');
        }
    }

    public function messages()
    {
        return [
            'Auser_name.required'=>'用户名必须填写',
            'Auser_name.max'=>'用户名为3-12个字符',
            'Auser_name.min'=>'用户名为3-12个字符',
            'Auser_pwd.required'=>'密码必须填写',
            'Auser_pwd.min'=>'密码最少八位',
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
        //
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
        //
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
