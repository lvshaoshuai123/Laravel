@extends('admin.base.parent')
@section('content')
<div class="block-area" id="tableHover">
    <h3 class="block-title">地址管理列表</h3>
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
    <form action="/admin1/address" method='post' name='myform'>
        {{ csrf_field()}}
        {{ method_field('DELETE')}}
    </form>
    <form action='/admin1/address' method='get'>
            <div class='medio-body'>
                收货人：<input type='text' class='form-control input-sm m-b-10' name='Address_consignee'>
            </div>
            <input type='submit' class='btn' value='搜索'>
    </form>
        <table class="table table-bordered table-hover tile">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>用户ID</th>
                    <th>省</th>
                    <th>市</th>
                    <th>县</th>
                    <th>收货人</th>
                    <th>收货人手机</th>
                    <th>地址是否默认</th>
                    <th>详细地址</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach( $list as $v)
                	<tr>
                        <td>{{$v->Address_id}}</td>
                        <td>{{$v->Address_uid}}</td>
                        <td>{{$v->Address_province}}</td>
                        <td>{{ $v->Address_city}}</td>
                        <td>{{ $v->Address_county}}</td>
                        <td>{{ $v->Address_consignee}}</td>
                        <td>{{ $v->Address_consignee_phone}}</td>
                        <td>{{ ($v->Address_default==1)?'否':'是'}}</td>
                        <td>{{ $v->Address_detail}}</td>
                        <td>
                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{$v->Address_id}})'>删除</a>
                            <a class="btn btn-sm btn-alt m-r-5" href='/admin1/address/{{$v->Address_id}}/edit'>修改</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         {{ $list->appends($where)->links()}}
    </div>
</div>
<script type="text/javascript">
        function doDel(id)
    {
        if(confirm('确定删除吗？')){
            var form=document.myform;
            form.action='/admin1/address/'+id;
            form.submit();
        }
    }
</script>
@endsection