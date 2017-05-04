<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use DB;

class CullectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        //所有的商品类别
        $datas = DB::table('goodcate')->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        //网站配置
        $net=DB::table('net')->first();
        // 友情链接
        $link=DB::table('link')->get();
        $userid = session()->get('homeuser')->User_id;
        $ob = DB::table('cullect')->where('Cullect_uid',$userid)->get();
        $data = array();
        foreach($ob as $v){
            $g = $v->Cullect_gid;
            $data[] = DB::table('goods')->where('Goods_id',$g)->get();
          }
            return view('Home.cullect.index',['data'=>$data,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
        
        
    }
    public function del($id)
    {
        $row = DB::table('cullect')->where('Cullect_gid',$id)->delete();
          if($row>0){
            return redirect('home2/cullect')->with('msg','删除成功');
        }else{
            return redirect('home2/cullect')->with('error','删除失败');
        }
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
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    public function cullent(Request $request)
    {
        $data = DB::table('cullect')->insertGetId($request->except('_token'));
        echo json_encode($data);
    }
    public function qcullent(Request $request)
    {
        $data = $request->only('Cullect_uid','Cullect_gid');
        $uid=$data['Cullect_uid'];
        $gid=$data['Cullect_gid'];
        $list=DB::table('cullect')->where(['Cullect_uid'=>$uid,'Cullect_gid'=>$gid])->delete();
        echo json_encode($list);
    }
}
