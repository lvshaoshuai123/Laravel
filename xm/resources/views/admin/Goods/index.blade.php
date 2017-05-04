@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">用户信息列表</h3>
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
        	<form action='/user' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>

        	<form action='/admin1/goods' method='get'>
        		<div class='medio-body'>
    				商品名：<input type='text' class='form-control input-sm m-b-10' name='Goods_name'>
    			</div>
        		<div>
        			商品类型：<select name='Goods_type' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
                        @foreach($goodcate as $v)
        				<option value='{{ $v->GoodCate_id }}'>--{{ $v->GoodCate_name }}--</option>
                        @endforeach
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>原价</th>
                        <th>现价</th>
                        <th style="text-align:center;">商品图片</th>
                        <th>明星单品</th>
                        <th>商品介绍</th>
                        <th>上市时间</th>
                        <th>商品类型</th>
                        <th>版本</th>
                        <th>商品销量</th>
                        <th>商品折扣</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                        
                         
                    	<tr>
	                        <td>{{ $v->Goods_id }}</td>
	                        <td>{{ $v->Goods_name }}</td>
	                        
	                        <td>{{ $v->Goods_price }}</td>
                            <td>{{ $v->Goods_tprice }}</td>
                            <td><img src="{{ url("admin/upload").'/'.'s_'.$v->Goods_pic}}" width="50" height="50"></td>
                            <td>{{ ($v->Goods_stock==1)?'是':'否'}}</td>
                            <td>{{ $v->Goods_body }}</td>
                            <td>{{ $v->Goods_time }}</td>
                            <td>
                            @foreach($goodcate as $v1)
                            @if($v->Goods_type ==$v1->GoodCate_id){{ $v1->GoodCate_name }}
                            @endif
                            @endforeach
                            </td>
                            <td>{{ $v->Goods_edition }}</td>
                            <td>{{ $v->Goods_hlevel }}</td>
                            <td>{{ $v->Goods_discount }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->Goods_id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/goods/{{ $v->Goods_id }}/edit'>修改</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links() }}
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
        	if(confirm('确定删除吗？')){
        		var form = document.myform;
        		form.action = '/admin1/goods/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection