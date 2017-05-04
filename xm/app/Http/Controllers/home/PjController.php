<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PjController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function pj(Request $request)
    {
        // dd($request);
        $data=$request->only('Eval_uid','Eval_gid','Eval_text');
        // dd($data);
        $list = DB::table('user')->where('User_id',$request['Eval_uid'])->select('User_name')->first();
        $pic = DB::table('user')->where('User_id',$request['Eval_uid'])->select('User_pic')->first();
        //dd($pic);
        $gname = DB::table('goods')->where('Goods_id',$data['Eval_gid'])->select('Goods_name')->first();
        // dd($gname);
        $data['Eval_name']=$list->User_name;
        $data['Eval_time']=time();
        $data['Eval_gname']=$gname->Goods_name;
        $row = DB::table('evaluate')->insertGetId($data);
        $list=DB::table('evaluate')->where('Eval_id',$row)->first();
        $time=date('Y-m-d H:i:s',$list->Eval_time);
        $list->Eval_time=$time;
        $list->User_pic=$pic->User_pic;
        // dd($list);
        if($row>0){
            echo json_encode($list);
        }else{
            echo json_encode('评价失败');
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
