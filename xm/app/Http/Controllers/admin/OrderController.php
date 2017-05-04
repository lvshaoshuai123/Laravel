<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('orderlist')->where('Orderlist_state','4');
        if($request->has('Orderlist_od_number')){
            //获取搜索的条件
            $name = $request->input('Orderlist_od_number');
            //添加到将要携带到分页中的数组中
            $where['Orderlist_od_number'] = $name;
            //给查询添加where条件
            $ob->where('Orderlist_od_number','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(1);
        //dd($list);
        return view('Admin.Order.index',['list'=>$list,'where'=>$where]);
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
        $ob = DB::table('orderlist');
        $list = $ob->where('Orderlist_id',$id)->get();
        //dd($data);
        return view('Admin.Order.edit',['list'=>$list]);
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
        // dd($request);
        $data = $request->only('Orderlist_state');
        //dd($data);
        $data['Orderlist_state'] = 5;
        //dd($data);
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
        if($row>0){
            return redirect('admin1/order')->with('msg','退货成功');
        }else{
            return redirect('admin1/order')->with('error','退货失败');
        }
    }
}
