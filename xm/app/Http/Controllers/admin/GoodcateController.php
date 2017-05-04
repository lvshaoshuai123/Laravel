<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class GoodcateController extends Controller
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
        $ob=DB::table('goodcate');
        if($request->has('GoodCate_name')){
            //获取搜索的条件
            $name=$request->input('GoodCate_name');
            //添加到将要携带到分页中的数组中
            $where['GoodCate_name']=$name;
            //给查询添加where条件
            $ob->where('GoodCate_name','like',"%{$name}%");
        }
        //执行分页查询
        $list=$ob->paginate(5);
        return view('admin.goodcate.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.goodcate.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 表单验证
        $this->validate($request, [
            'GoodCate_name' => 'required',
        ],$this->messages());
        $data=$request->except('_token');
        // dd($data);
        $GoodCate_name=$request->input('GoodCate_name');
        // dd($a);
        $rows=DB::table('goodcate')->where('GoodCate_name',$GoodCate_name)->get();
        //判断添加的类是否已存在
        if(count($rows)>0){
            return redirect('admin1/goodcate')->with('error','此商品类已存在');
        }else{
            $row=DB::table('goodcate')->insertGetid($data);
            if($row){
                return redirect('admin1/goodcate')->with('msg','添加成功');
            }else{
                return redirect('admin1/goodcate')->with('error','添加失败');
            }
        }
    }
    public function messages(){
        return [
        'GoodCate_name.required' => '请输入商品类名',
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
        $list=DB::table('goodcate')->where('GoodCate_id',$id)->first();
        return view('admin.goodcate.edit',['list'=>$list]);
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
        $data=$request->only('GoodCate_name');
        $row=DB::table('goodcate')->where('GoodCate_id',$id)->update($data);
        if($row>0){
            return redirect('admin1/goodcate')->with('msg','修改成功');
        }else{
            return redirect('admin1/goodcate')->with('error','修改失败');
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
        
        $rows=DB::table('goodcate')->where('GoodCate_fid',$id)->get();
        if(count($rows)>0){
            return redirect('/admin1/goodcate')->with('msg','此商品有子类,不能删除'); 
        }else{
            $row=DB::table('goodcate')->where('GoodCate_id',$id)->delete();
            if($row){
                return redirect('/admin1/goodcate')->with('msg','删除成功');
            }else{
                return redirect('/admin1/goodcate')->with('error','删除失败');
            }
        }
    }
    public function addson($id)
    {
        // dd(1111111);
        $data=DB::table('goodcate')->where('GoodCate_id',$id)->first();
        return view('admin.goodcate.addson',['list'=>$data]);
    }
    public function doAddSon(Request $request)
    {
        $list=$request->except('_token');
        // dd($list);
        $GoodCate_name=$request->input('GoodCate_name');
        // dd($a);
        $rows=DB::table('goodcate')->where('GoodCate_name',$GoodCate_name)->get();
        $pre=DB::table('goodcate')->where('GoodCate_id',$list['GoodCate_fid'])->first();
        //判断此商品是否已存在
        if(count($rows)>0){
            return redirect('admin1/goodcate')->with('error','此商品已存在');
        }else{
            $list['GoodCate_gid']=$pre->GoodCate_gid.','.$list['GoodCate_fid'];
            // dd($list);
            $row=DB::table('goodcate')->insertGetId($list);
            if($row>0){
                return redirect('admin1/goodcate')->with('msg','添加成功');
            }
        }
    }
}
