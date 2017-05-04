<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class OrderlistController extends Controller
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
        $ob = DB::table('orderlist')->where('Orderlist_state','<','4');
        //判断是否有搜索条件
        if($request->has('Orderlist_state')){
            //获取搜索的条件
            //dd($request['Orderlist_state']);
            $Orderlist_state = $request->input('Orderlist_state');
            //添加到将要携带到分页中的数组中
            $where['Orderlist_state'] = $Orderlist_state;
            //给查询添加where条件
            $ob->where('Orderlist_state',$Orderlist_state);
        }
        if($request->has('Orderlist_od_number')){
            //获取搜索的条件
            $Orderlist_od_number = $request->input('Orderlist_od_number');
            //添加到将要携带到分页中的数组中
            $where['Orderlist_od_number'] = $Orderlist_od_number;
            //给查询添加where条件
            $ob->where('Orderlist_od_number','like',"%{$Orderlist_od_number}%");
        }
        //执行分页查询
        $list = $ob->paginate(3);
        //dd($list);
        return view('Admin.Orderlist.index',['list'=>$list,'where'=>$where]);
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
    public function edit(Request $request,$id)
    {
        
        $ob = DB::table('orderlist');
        $where = '';
        $data = $ob->where('Orderlist_id',$id)->get();
        //dd($data);
        return view('Admin.Orderlist.edit',[ 'data' => $data]);
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
        $data = $request->only('Orderlist_state');
        //dd($id);
        $data['Orderlist_state'] = 2;
        //dd($data);
        $row = DB::table('orderlist')->where('Orderlist_id',$id)->update($data);
        if($row>0){
            return redirect('admin1/orderlist')->with('msg','发货成功');
        }else{
            return redirect('admin1/orderlist')->with('error','发货失败');
        }
    }
}
