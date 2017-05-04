<?php

namespace App\Http\Controllers\Admin;

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
        $where = '';
        //实例化操作表
        $ob = DB::table('auser');
        // 判断是否有搜索条件
        if($request->has('Auser_qx')){
            //获取搜索的条件
            $Auser_qx = $request->input('Auser_qx');
            //添加到将要携带到分页中的数组中
            $where['Auser_qx'] = $Auser_qx;
            //给查询添加where条件
            $ob->where('Auser_qx',$Auser_qx);
        }
        if($request->has('Auser_name')){
            //获取搜索的条件
            $Auser_name = $request->input('Auser_name');
            //添加到将要携带到分页中的数组中
            $where['Auser_name'] = $Auser_name;
            //给查询添加where条件
            $ob->where('Auser_name','like',"%{$Auser_name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.AUser.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Auser.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request);
        $ob = DB::table('auser');
        $data = $request->except('_token');
        //dd($data);
        $this->validate($request, [
            'Auser_name' => 'required|max:16',
            //'Auser_pwd' => 'required',
            'Auser_pwd' => 'regex:/^\w{6,18}$/',
            'Auser_qx' => 'nullable',
            'Auser_sex' => 'required',
            'Auser_age' => 'required|integer|max:100|min:18',


        ],$this->messages());
       
        // dd($data);
        $list = $ob->where('Auser_name',$data['Auser_name'])->get();
        // dd(count($list));
        if(count($list)<1){
            if($data['Auser_qx'] == '--请选择权限--'){
                    $data['Auser_qx'] = 1;
                
                }
                $id = $ob->insertGetId($data);
                //dd($id);
                if($id>0){
                    return redirect('admin1/auser')->with('msg','添加成功');
            }
        }else{
            return redirect('admin1/auser')->with('msg','管理员已存在');
        }
    }

     public function messages()
     {
         return [
            'Auser_name.required' => '用户名必须填写',
            'Auser_name.max' => '用户名长度不能超过16位',
            //'Auser_pwd.required' => '密码不能为空',
            'Auser_pwd.regex' => '密码不能为空,请输入6-18位除特殊字符之外的有效字符',
            'Auser_sex.required' => '请选择性别',
            'Auser_age.required' => '年龄不能为空',
            'Auser_age.integer' => '请输入数字',
            'Auser_age.max' => '您老是王八吗？',
            'Auser_age.min' => '小屁孩儿滚犊子',
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
        $data = DB::table('auser')->where('Auser_id',$id)->first();
        return view('Admin.Auser.edit',['ob'=>$data]);
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
        $ob = DB::table('auser');
        $list = $request->only('Auser_name','Auser_sex','Auser_age');
        //dd($list);
        $row = DB::table('auser')->where('Auser_id',$id)->update($list);
        //dd($row);
        if($row>0){
            return redirect('admin1/auser')->with('msg','修改成功');
        }else{
            return redirect('admin1/auser')->with('error','修改失败');
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
        //
        $row = DB::table('auser')->where('Auser_id',$id)->delete();
        if($row>0){
            return redirect('admin1/auser')->with('msg','删除成功');
        }else{
            return redirect('admin1/auser')->with('error','删除失败');
        }
    }
}
