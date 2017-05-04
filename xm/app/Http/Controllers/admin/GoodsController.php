<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Intervention\Image\ImageManagerStatic as Image;

use DB;



class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        //
          //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('goods');
        $goodcate = DB::table('goodcate')->get();
        //dd($request['Goods_name']);
        //判断是否有搜索条件
        if($request->has('Goods_type')){
            //dd($request['Goods_type']);
            //获取搜索的条件
            $Goods_type = $request->input('Goods_type');
            //dd($Goods_type);
            //添加到将要携带到分页中的数组中
            $where['Goods_type'] = $Goods_type;
            //给查询添加where条件
            $ob->where('Goods_type',$Goods_type);
        }
        if($request->has('Goods_name')){
            //获取搜索的条件
            $Goods_name = $request->input('Goods_name');
           // dd($Goods_name);
            //添加到将要携带到分页中的数组中
            $where['Goods_name'] = $Goods_name;
            //给查询添加where条件
            $ob->where('Goods_name','like',"%{$Goods_name}%");
        }
       
        $data = $ob->get()->except('_token');
        //dd($data);
        for($i = 0; $i < count($data) ; $i++)
        {
            //dd($data);
           $data[$i]->Goods_pic = explode(',',$data[$i]->Goods_pic);
           //dd($data[$i]->Goods_pic);
        }
         //执行分页查询
        $list = $ob->paginate(3);
        return view('Admin.Goods.index',['list'=>$list,'where'=>$where,'goodcate'=>$goodcate]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('goodcate')->get();
        return view('Admin.Goods.add',['goodcate'=>$data]);
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
        	//判断是否有文件上传
    	if($request->hasFile('Goods_pic')){
    		// 判断上传的文件是否有效
    		if($request->file('Goods_pic')->isValid()){
    			// 获取上传的文件对象
    			$data = $request->file('Goods_pic');
    			//dd($data);
    			// 获取上传的文件的后缀
    			$ext = $data->getClientOriginalExtension();
    			// 拼装出你需要使用的文件名
    			$picname = time().rand(1000,9999).'.'.$ext;
    			// 移动临时文件，生成新文件到指定目录下
    			$data->move('./admin/upload',$picname);
    			if($data->getError()>0){
    				echo '上传失败';
    			}else{
    				//2.使用第三方图片处理
					$img = Image::make('./admin/upload/'.$picname);
					$img->resize(100,100,function($constraint){
					    $constraint->aspectRatio();
					    $constraint->upsize();
					});
					$img->save('./admin/upload/s_'.$picname);
					$list['Goods_pic'] = $picname;
                    //dd($request['Goods_pic']);
    			}
    		}
    	}
            $this->validate($request, [
            /*'Auser_name' => 'required|max:16',
               'Auser_pwd' => 'required',
               'Auser_pwd' => 'regex:/^\w{6,18}$/',
               'Auser_qx' => 'nullable',
               */
            'Goods_name' => 'required|string',
            'Goods_price' => 'required|integer|max:9999',
            'Goods_tprice' => 'required|integer|max:9999',
            'Goods_stock' => 'required|integer',
            'Goods_body' => 'required|string',
            'Goods_time' => 'required|string',
            'Goods_type' => 'required',
            'Goods_hlevel' => 'required|integer',
            'Goods_discount' => 'required|integer',
        ],$this->messages());
  		//dd($list);
        $id = DB::table('goods')->insertGetId($list);
       // dd($id);
        if($id>0){
            return redirect('admin1/goods')->with('msg','添加成功');
        }
    }
     public function messages()
     {
         return [
            'Goods_name.regex' => '请输入1-18有效字符作为商品名',
            'Goods_price.required' =>  '原价不能为空',
            'Goods_price.integer'=> '请输入数字',
            'Goods_price.max' => '价格不能超过9999',
            'Goods_tprice.required' => '特价不能为空',
            'Goods_tprice.integer' => '请输入数字',
            'Goods_tprice.max' => '价格不能超过9999',
          
            
            'Goods_stock.required' => '请填写库存',
            'Goods_stock.integer' => '请输入数字',
            'Goods_body.required' => '商品介绍不能为空',
            'Goods_body.string' => '请输入文字',
            'Goods_time.required' => '上市时间不能为空',
            'Goods_time.string' => '请输入时间',
            'Goods_type.required' => '商品类型不能为空',
            
            'Goods_hleve.required' => '商品销量不能为空',
            'Goods_hleve.integer' => '请输入数字',
            'Goods_discount.required' => '商品折扣不能为空',
            'Goods_discount.integer' => '请输入数字',
             /*
             'Auser_name.required' => '用户名必须填写',
             'Auser_name.max' => '用户名长度不能超过16位',
             'Auser_pwd.required' => '密码不能为空',
             'Auser_pwd.regex' => '密码不能为空,请输入6-18位除特殊字符之外的有效字符',
             */
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
        //
        $data = DB::table('goods')->where('Goods_id',$id)->first();
        $list=DB::table('goodcate')->get();
        return view('Admin.Goods.edit',['ob'=>$data,'list'=>$list]);
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
         $list = $request->except('_token','_method');
            if($request->hasFile('Goods_pic')){
            // dd(111111);
            // 判断上传的文件是否有效
            if($request->file('Goods_pic')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('Goods_pic');
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
                    $list['Goods_pic']=$picname;
                    // dd($list['Net_logo']);
                }
            }
        }
        
        $row = DB::table('goods')->where('Goods_id',$id)->update($list);
        if($row>0){
            return redirect('admin1/goods')->with('msg','修改成功');
        }else{
            return redirect('admin1/goods')->with('error','修改失败');
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
        //
        $row = DB::table('goods')->where('Goods_id',$id)->delete();
        if($row>0){
            return redirect('admin1/goods')->with('msg','删除成功');
        }else{
            return redirect('admin1/goods')->with('error','删除失败');
        }
    }
}
