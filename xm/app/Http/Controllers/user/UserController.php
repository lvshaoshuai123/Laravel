<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //保存搜索条件
        $where='';
        //实例化操作表
        $ob=DB::table('user');
        //判断是否有搜索条件
        if($request->has('sex')){
            //获取搜索的条件
            $sex=$request->input('sex');
            //添加到将要携带到分页中的数组中
            $where['sex']=$sex;
            //给查询添加where条件
            $ob->where('sex',$sex);
        }
        if($request->has('name')){
            //获取搜索的条件
            $name=$request->input('name');
            //添加到将要携带到分页中的数组中
            $where['name']=$name;
            //给查询添加where条件
            $ob->where('name','like',"%{$name}%");
        }
        //执行分页查询
        $list=$ob->paginate(5);
        return view('admin.user.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
        'name' => 'required|max:8',
        'age' => 'integer|max:100|min:18',
    ],$this->messages());

        $data=$request->except('_token');
        $row=DB::table('user')->insertGetId($data);
        if($row>0){
            return redirect('/admin1/demo1')->with('msg','添加成功');
        }
    }

    public function messages(){
    return [
        'name.required' => '请输入用户名',
        'age.min'  => '未满18周岁禁止注册',
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
        $list=DB::table('user')->where('uid',$id)->first();
        return view('admin.user.edit',['list'=>$list]);
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
        $data=$request->only('name','sex','age');
        $row=DB::table('user')->where('uid',$id)->update($data);
        if($row){
            return redirect('/admin1/demo1')->with('msg','修改成功');
        }else{
            return redirect('/admin1/demo1')->with('error','修改失败');
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
        $row=DB::table('user')->where('uid',$id)->delete();
        if($row>0){
            return redirect('/admin1/demo1')->with('msg','删除成功');
        }else{
            return redirect('/admin1/demo1')->with('error','删除失败');
        }
    }
}
