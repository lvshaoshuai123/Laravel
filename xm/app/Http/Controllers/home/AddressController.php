<?php

namespace App\Http\Controllers\Home;

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
        $addruid = session()->get('homeuser')->User_id;
        $ob = DB::table('address')->where('Address_uid',$addruid)->get();
        return view('Home.address.index',['ob'=>$ob,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);
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
           
        $data = $request->except('_token');
        $cityid = $request->city; 
        $province = DB::table('district')->where('id',$cityid[0])->first();
        $city = DB::table('district')->where('id',$cityid[1])->first();
        $county = DB::table('district')->where('id',$cityid[2])->first();
        $data['Address_province']=  $province->name;
        $data['Address_city']=  $city->name ;
        $data['Address_county']=  $county->name ;
        unset($data['city']);
        $uid = session('homeuser')->User_id;
        $data['Address_uid'] = $uid;
        $list = DB::table('address')->insertGetId($data);
        $ob = DB::table('address')->where('Address_uid',$uid)->get();
         //网站配置
        $net=DB::table('net')->first();
         // 友情链接
        $link=DB::table('link')->get();
         //所有的商品类别
        $datas = DB::table('goodcate')->get();
          //限定条数
        $goodcates = DB::table('goodcate')->limit(6)->get();
        // 商品详情
        $goods = DB::table('goods')->get();
        return view('Home.address.index',['ob'=> $ob,'net'=>$net,'link'=>$link,'datas'=>$datas,'goodcates'=>$goodcates,'goods'=>$goods]);

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
        $ob = DB::table('Address')->where('Address_id',$id)->first();
        return view('Home.address.edit',['ob'=>$ob]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = $request->only('Address_consignee','Address_consignee_phone','Address_detail');
        $cityid = $request->city;
         
        $province = DB::table('district')->where('id',$cityid[0])->first();
        $city = DB::table('district')->where('id',$cityid[1])->first();
        $county = DB::table('district')->where('id',$cityid[2])->first();
        $data['Address_province']=  $province->name;
        $data['Address_city']=  $city->name ;
        $data['Address_county']=  $county->name ;
        $data['Address_default'] = 1;
        $data['Address_uid']=session('homeuser')->User_id;
        $row = DB::table('address')->where('Address_id',$id)->update($data);
        if($row > 0){
            return redirect('home2/address');
        }else{
            return redirect('home2/address/'.$id.'/edit');
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
        
        $ob = DB::table('address')->where('Address_id',$id)->delete();
        return redirect('/home2/address');
    }
    public function defaut($id)
    {
        $addr['Address_default'] = 1;
        $rows = DB::table('address')->where('Address_default',2)->update($addr);
        $addr['Address_default'] = 2; 
        $row = DB::table('address')->where('Address_id',$id)->update($addr);
        if($row>0){
            return redirect('home2/address')->with('msg','修改成功');
        }else{
            return redirect('home2/address')->with('error','修改失败');
        }
    }
    public function fal($id)
    {
       $addr['Address_default'] = 1;
       $row = DB::table('address')->where('Address_id',$id)->update($addr);
       if($row>0){
            return redirect('home2/address')->with('msg','修改成功');
        }else{
            return redirect('home2/address')->with('error','修改失败');
        }  
    }
    
}
