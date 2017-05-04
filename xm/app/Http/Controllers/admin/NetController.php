<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

use Intervention\Image\ImageManagerStatic as Image;

class NetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $where='';
        $ob=DB::table('net');
        if(count($ob)==0){
            return view('admin.net.add');
        }
            if($request->has('Net_title'))
            {
                //获取搜索的条件
                $name=$request->input('Net_title');
                //添加到将要携带到分页中的数组中
                $where['Net_title']=$name;
                //给查询添加where条件
                $ob->where('Net_title','like',"%{$name}%");
            }
            //执行分页查询
            $list=$ob->paginate(5);
            return view('admin.net.index',['list'=>$list,'where'=>$where]);
            
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
        $list = $request->except('_token');
        if($request->hasFile('Net_logo')){
            // 判断上传的文件是否有效
            if($request->file('Net_logo')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('Net_logo');
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // dd($ext);
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                // dd($picname);
                $data->move('./admin/upload',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    $img = Image::make('./admin/upload/'.$picname);
                    $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                    });
                    $img->save('./admin/upload/s_'.$picname);
                    $list['Net_logo']=$picname;
                    // dd($list['Net_logo']);
                }
            }
        }
        $row=DB::table('net')->insertGetId($list);
        if($row){
            return redirect('/admin1/net')->with('msg','添加成功');
        }else{
            return redirect('/admin1/net')->with('msg','添加失败');
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
        $list=DB::table('net')->where('Net_id',$id)->first();
        // dd($list);
        return view('admin.net.edit',['list'=>$list]);
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
        $list=$request->only('Net_title','Net_logo','Net_copy','Net_keword','Net_site');
        // dd($list);
        //判断是否有文件上传
        if($request->hasFile('Net_logo')){
            // dd(111111);
            // 判断上传的文件是否有效
            if($request->file('Net_logo')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('Net_logo');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // dd($ext);
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                // dd($picname);
                $data->move('./admin/upload',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    $img = Image::make('./admin/upload/'.$picname);
                    $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                    });
                    $img->save('./admin/upload/s_'.$picname);
                    $list['Net_logo']=$picname;
                    // dd($list['Net_logo']);
                }
            }
        }else{
            $pic=$request->input('logo');
            // dd($pic);
            $list['Net_logo']=$pic;
        }
        // dd($data);
        $row=DB::table('net')->where('Net_id',$id)->update($list);
        if($row){
            return redirect('/admin1/net')->with('msg','修改成功');
        }else{
            return redirect('/admin1/net')->with('error','修改失败');
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
         $row=DB::table('net')->where('Net_id',$id)->delete();
        if($row>0){
            return redirect('/admin1/net')->with('msg','删除成功');
        }else{
            return redirect('/admin1/net')->with('error','删除失败');
        }
    }
}
