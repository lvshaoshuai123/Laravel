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
        //
        //dd($id.'index');
        $userid = session()->get('homeuser')->User_id;
        //dd($userid);
        $ob = DB::table('cullect')->where('Cullect_uid',$userid)->get();

      // dd($data);
        $data = array();
        
           foreach($ob as $v){
           

            $g = $v->Cullect_gid;
            //dd($g);
              $data[] = DB::table('goods')->where('Goods_id',$g)->get();
          }
          
            //dd($data); 
            // dd($cid);
       

        return view('Home.cullect.index',['data'=>$data]);
        
        
    }
    public function del($id)
    {
        //dd($id);
        $row = DB::table('cullect')->where('Cullect_gid',$id)->delete();
          if($row>0){
            return redirect('home1/cullect')->with('msg','删除成功');
        }else{
            return redirect('home1/cullect')->with('error','删除失败');
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
        //
        //dd($id);
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
        //dd($id.'edit');
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
        //dd($id.'update');
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
        //dd($id);
    }
}
