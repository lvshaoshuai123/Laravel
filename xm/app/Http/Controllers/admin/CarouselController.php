<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

use DB;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('carousel')->get();
        return view('admin.carousel.index',['list'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('carousel')->get();
        if(count($data)>4){
            return redirect('admin1/carousel')->with('error','图片数量不能超过5张！！');
        }
        return view('admin.carousel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $list=$request->except('_token');
        //dd($list);
        //判断是否有文件上传
        if($request->hasFile('carousel_img')){
            // dd(1111);
            // 判断上传的文件是否有效
            if($request->file('carousel_img')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('carousel_img');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // dd($ext);
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
               // dd($picname);
                $data->move('./home/index/upload/',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    $img = Image::make('./home/index/upload/'.$picname);
                    $img->resize(977, 460, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                    });
                    $img->save('./home/index/upload/s_'.$picname);
                    $list['carousel_img']=$picname;
                    // dd($list['carousel_img']);
                }
            }
        }
        $row=DB::table('carousel')->insertGetId($list);
        // dd($row);
        if($row){
            return redirect('admin1/carousel')->with('msg','添加成功');
        }else{
            return redirect('admin1/carousel')->with('error','添加失败');
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
        $data=DB::table('carousel')->where('carousel_id',$id)->first();
        return view('admin.carousel.edit',['list'=>$data]);
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
        $list=$request->only('carousel_img');
        // dd($list);
        //判断是否有文件上传
        if($request->hasFile('carousel_img')){
            // 判断上传的文件是否有效
            if($request->file('carousel_img')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('carousel_img');
                // dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // dd($ext);
                // 拼装出你需要使用的文件名
                $picname = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                // dd($picname);
                $data->move('./home/index/upload/',$picname);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    $img = Image::make('./home/index/upload/'.$picname);
                    $img->resize(977, 460, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                    });
                    $img->save('./home/index/upload/s_'.$picname);
                    $list['carousel_img']=$picname;
                    // dd($list['Net_logo']);
                }
            }
        }
        $row=DB::table('carousel')->where('carousel_id',$id)->update($list);
        if($row){
            return redirect('admin1/carousel')->with('msg','修改成功');
        }else{
            return redirect('admin1/carousel')->with('error','修改失败');
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
        $row = DB::table('carousel')->where('carousel_id',$id)->delete();
        if($row){
            return redirect('admin1/carousel')->with('msg','删除成功');
        }else{
            return redirect('admin1/carousel')->with('error','删除失败');
        }
    }
}
