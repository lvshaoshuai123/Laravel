<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class AddressController extends Controller
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
        $ob=DB::table('address');
        if($request->has('Address_consignee')){
            //获取搜索的条件
            $name=$request->input('Address_consignee');
            //添加到将要携带到分页中的数组中
            $where['Address_consignee']=$name;
            //给查询添加where条件
            $ob->where('Address_consignee','like',"%{$name}%");
        }
        //执行分页查询
        $list=$ob->paginate(2);
        return view('admin.address.index',['list'=>$list,'where'=>$where]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=DB::table('address')->where('Address_id',$id)->first();
        return view('admin.address.edit',['list'=>$data]);
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
        $data=$request->only('Address_province','Address_city','Address_county','Address_consignee','Address_consignee_phone','Address_default','Address_detail');
        $row=DB::table('address')->where('Address_id',$id)->update($data);
        if($row){
            return redirect('admin1/address')->with('msg','修改成功');
        }else{
            return redirect('admin1/address')->with('error','修改失败');
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
        $row=DB::table('address')->where('Address_id',$id)->delete();
        if($row){
            return redirect('admin1/address')->with('msg','删除成功');
        }else{
            return redirect('admin1/address')->with('error','删除失败');
        }
    }
}
