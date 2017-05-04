@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">订单详细信息</h3>
        
        <p>订单详细信息</p>
        
        <div class="row">
             <table class="table table-bordered table-hover tile">
                  @foreach($data as $v)
                  <thead>
                    <tr>
                        <th>商品名称</th> 
                        <td>{{ $v->Orderlist_goodsname }}</td>
                    </tr>
                   
                    <tr>
                        <th>商品图片</th>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ url('/admin/upload').'/s_'.$v->Orderlist_goodspic }}" width="400" height="400">
                        </td>
                        <td>
                            <table class="table table-bordered table-hover tile" style="width:400px;height:417px;background:#371015">
                                <tr>
                                    <th>收货人姓名</th>
                                    <td>{{ $v->Orderlist_name }}</td>
                                </tr>
                                <tr>
                                    <th>电话</th>
                                    <td>{{ $v->Orderlist_tel }}</td>
                                </tr>
                                <tr>
                                    <th>详细地址</th>
                                    <td>{{ $v->Orderlist_detail }}</td>
                                </tr>
                                <tr>
                                    <th>邮编</th>  
                                    <td>{{ $v->Orderlist_code }}</td>
                                </tr>
                                <tr>
                                    <th>商品单价</th> 
                                    <td>{{ $v->Orderlist_price }}</td>
                                </tr>
                                <tr>
                                    <th>商品数量</th> 
                                    <td>{{ $v->Orderlist_goodsnum }}</td>
                                </tr>
                                <tr>
                                    <th>商品总计</th>
                                    <td>{{ $v->Orderlist_total }}</td>
                                </tr>
                                <tr>
                                    <th>付款时间</th>
                                    <td>{{ $v->Orderlist_paytime }}</td>
                                </tr>
                    
                @if($v->Orderlist_state == 1)
                                    <tr>
                                    <th>发货时间</th>
                                    <td>{{ $v->Orderlist_ftime }}</td>
                               </tr>
                            </table>
                           
                        </td>
                       
                    </tr>
                </thead>
                <tbody>
                <form action='/admin1/orderlist' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                </form>  
                    
                       
                
                        <tr>
                             <th>操作</th>

                            <td>
                                <a class="btn btn-sm btn-alt m-r-5" href="javascript:doupdate({{ $v->Orderlist_id }})">发货</a>
                            </td>
                              <script type="text/javascript">
                                  function doupdate(id){
                                        if(confirm('确认发货吗？')){
                                              var form = document.myform;
                                              form.action = '/admin1/orderlist/'+id;
                                              form.submit();
                                          }
                                    }
                              </script>
               
                 @else
                 		   <tr>
                                    <th>发货时间</th>
                                    <td>{{ $v->Orderlist_ftime }}</td>
                           </tr>
                    </table>
                           
                        </td>
                       
                    </tr>
                        <tr> 
                            <th>操作</th>
                            <td>

                                <a class="btn btn-sm btn-alt m-r-5" href="javascript:alert('已经发货，无需再发');">发货</a>
                            </td>
                         
                        </tr>
                 @endif
                @endforeach
                </tbody>
            </table>
        </div>
        <p></p>
       
        
    </div>
@endsection