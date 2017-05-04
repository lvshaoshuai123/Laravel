<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class EvalController extends Controller
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
        $ob = DB::table('evaluate');
        //判断是否有搜索条件
        if($request->has('Eval_name')){
            //获取搜索的条件
            $name = $request->input('Eval_name');
            //添加到将要携带到分页中的数组中
            $where['Eval_name'] = $name;
            //给查询添加where条件
            $ob->where('Eval_name','like',"%{$name}%");
        }
        if($request->has('Eval_text')){
            //获取搜索的条件
            $text = $request->input('Eval_text');
            //添加到将要携带到分页中的数组中
            $where['Eval_text'] = $text;
            //给查询添加where条件
            $ob->where('Eval_text','like',"%{$text}%");
        }
        if($request->has('Eval_state')){
            //获取搜索的条件
            $state = $request->input('Eval_state');
            //添加到将要携带到分页中的数组中
            $where['Eval_state'] = $state;
            //给查询添加where条件
            $ob->where('Eval_state',$state);
        }
        if($request->has('Eval_gname')){
            //获取搜索的条件
            $gname = $request->input('Eval_gname');
            //添加到将要携带到分页中的数组中
            $where['Eval_gname'] = $gname;
            //给查询添加where条件
            $ob->where('Eval_gname','like',"%{$gname}%");
        }
        //执行分页查询
        $list = $ob->paginate(3);
        return view('Admin.Eval.index',['list'=>$list,'where'=>$where]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Eval.add');
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
            'Eval_name' => 'required|max:8',
        ],$this->messages());
        $data = $request->except('_token');
        $data['Eval_time']=time();
        $id = DB::table('evaluate')->insertGetId($data);
        if($id>0){
            return redirect('/admin1/eval')->with('msg','添加成功');
        }
    }

    public function messages()
    {
        return [
            'name.required' => '用户名必须填写',
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
        $data = DB::table('evaluate')->where('Eval_id',$id)->first();
        return view('Admin.Eval.edit',['ob'=>$data]);
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
        $data = $request->only('Eval_reply');
        $row = DB::table('evaluate')->where('Eval_id',$id)->update($data);
        if($row>0){
            return redirect('/admin1/eval')->with('msg','回复成功');
        }else{
            return redirect('/admin1/eval')->with('error','回复失败');
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
        $row = DB::table('evaluate')->where('Eval_id',$id)->delete();
        if($row>0){
            return redirect('/admin1/eval')->with('msg','删除成功');
        }else{
            return redirect('admin1/eval')->with('msg','删除失败');
        }
    }
}
