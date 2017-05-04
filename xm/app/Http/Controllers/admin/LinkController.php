<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class LinkController extends Controller
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
        $ob=DB::table('link');
        if($request->has('Links_name')){
            //获取搜索的条件
            $name=$request->input('Links_name');
            //添加到将要携带到分页中的数组中
            $where['Links_name']=$name;
            //给查询添加where条件
            $ob->where('Links_name','like',"%{$name}%");
        }
        //执行分页查询
        $list=$ob->paginate(5);
        return view('admin.link.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.link.add');
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
            'Links_name' => 'required',
            'Links_url' => 'required|string|max:20',
        ],$this->messages());
        $data=$request->except('_token');
        $row=DB::table('link')->insertGetid($data);
        if($row>0)
        {
            return redirect('admin1/link')->with('msg','添加成功');
        }
    }
    public function messages(){
        return [
        'Links_name.required' => '请输入链接名',
        'Links_url.required' => '请输入链接地址',
        'Links_url.max'  => '链接地址过长'
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
        $data=DB::table('link')->where('Links_id',$id)->first();
        // dd($data);
        return view('admin.link.edit',['list'=>$data]);
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
        // dd($request->all());
        $data=$request->only('Links_name','Links_url','Links_switch');
        // dd($data);
        $row=DB::table('link')->where('Links_id',$id)->update($data);
        // dd($row);
        if($row)
        {
            return redirect('/admin1/link')->with('msg','修改成功');
        }else{
            return redirect('/admin1/link')->with('error','修改失败');
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
        $row=DB::table('link')->where('Links_id',$id)->delete();
        if($row>0)
        {
            return redirect('admin1/link')->with('msg','删除成功');
        }else{
            return redirect('admin1/link')->with('error','删除失败');
        }
    }
}
