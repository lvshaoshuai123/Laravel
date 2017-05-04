<?php

namespace App\Http\Controllers\stu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class StuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=DB::table('user')->get();
        return view('stu.index',['list'=>$list]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stu.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->except('_token');
        $row=DB::table('user')->insertGetId($data);
        if($row>0){
            return redirect('/stu')->with('info','添加成功');
        }else{
            return redirect('/stu/create')->with('info','添加失败');
        }
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
        $row=DB::table('user')->where('uid',$id)->first();
        return view('stu.edit',['ob'=>$row]);
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
        $data=$request->only('name','age','sex');
        $row=DB::table('user')->where('uid',$id)->update($data);
          if($row>0){
            return redirect('/stu')->with('info', '修改成功!');
        }else{
            return redirect("/stu/{$id}/edit")->with('info', '修改失败！');
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
            return redirect('/stu')->with('info', '删除成功!');
        }else{
            return redirect("/stu/{$id}")->with('info', '删除失败！');
        }
    }
}
