@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">订单信息列表</h3>
        @if(session('msg'))
        	<div class="alert alert-success alert-icon">
			{{ session('msg') }}
			<i class="icon"></i>
			</div>
        @endif
        @if(session('error'))
        	<div class="alert alert-warning alert-icon">
			{{ session('error') }}
			<i class="icon"></i>
			</div>
		@endif
        <div class="table-responsive overflow">
        	

        	<form action='/orderlist' method='get'>
        		<div class='medio-body'>
    				订单编号：<input type='text' class='form-control input-sm m-b-10' name='Orderlist_od_number'>
    			</div>
        		
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>订单ID</th>
                        <th>订单编号</th>
                        <th>商品名称</th>
                        <th>订单状态</th>
                        <th>支付方式</th>
                        <th>配送方式</th>
                        <th>商品小计</th>
                        <th>退单时间</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>    

                    @foreach($list as $v)
                    @if($v->Orderlist_state == 4)
                          
                    	<tr>
	                        <td>{{ $v->Orderlist_id }}</td>
	                        <td>{{ $v->Orderlist_od_number }}</td>
	                        <td>{{ $v->Orderlist_goodsname }}</td>
	                        <td>{{ $v->Orderlist_state }}</td>
                            <td>{{ $v->Orderlist_payid }}</td>
                            <td>{{ $v->Orderlist_dilivery }}</td>
                            <td>{{ $v->Orderlist_pricesum }}</td>
                            <td>{{ $v->Orderlist_rtime }}</td>

	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href="/admin1/order/{{ $v->Orderlist_id }}/edit">详情</a>
	                        </td>
	                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>
   
@endsection