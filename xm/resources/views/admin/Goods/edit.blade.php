@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    
    <div class="block-area" id="text-input">
        <h3 class="block-title">修改商品信息</h3>
        
        <p>修改商品信息</p>
        
        <div class="row">
        
            <form action='/admin1/goods/{{ $ob->Goods_id }}' method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品名" name='Goods_name' value="{{ $ob->Goods_name }}">
         
                </div>

                <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品原价" name='Goods_price' value="{{ $ob->Goods_price }}">
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入现价" name='Goods_tprice' value="{{ $ob->Goods_tprice }}">
                </div> 
            
                
                        <div class="col-lg-12">
                        
                        
                             <table>
                                <tr>
                                <div class="col-lg-4">
                                    <td >
                                        <img src="{{ url('admin/upload').'/s_'.$ob->Goods_pic }}" width="100" height="100"> <input type="file" name='Goods_pic'>
                                    </td> 
                                       
                                </div>
                               
                                    
                                </tr>
                            </table>
                        </div>
                <div class="col-lg-12">
                    
                    <select class="form-control input-sm m-b-10" name='Goods_stock'> 
                                <option value="1" {{ ($ob->Goods_type == 1)?'selected':''}}>明星单品</option>
                                <option value="2" {{ ($ob->Goods_type == 2)?'selected':''}}>非明星单品</option>   
                          </select>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品介绍" name='Goods_body' value="{{ $ob->Goods_body }}">
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品上市时间" name='Goods_time' value="{{ $ob->Goods_time }}">
                </div>
                  <div class="col-lg-12">
               
                    商品类型：<select class="form-control input-sm m-b-10" name='Goods_type'> 
                                @foreach($list as $v)
                                <option value="{{$v->GoodCate_id}}" {{ ($ob->Goods_type == $v->GoodCate_id)?'selected':''}}>{{ $v->GoodCate_name}}</option>
                                @endforeach
                          </select>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品版本" name='Goods_edition' value="{{ $ob->Goods_edition }}">
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品销量" name='Goods_hlevel' value="{{ $ob->Goods_hlevel }}">
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control m-b-10" placeholder="请输入商品折扣" name='Goods_discount' value="{{ $ob->Goods_discount }}">
                </div>
                
                
                
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
    
@endsection