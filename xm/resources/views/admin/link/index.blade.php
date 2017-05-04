@extends('admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">友情链接列表</h3>
        @if(session('msg'))
            <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
        <div class="table-responsive overflow">
        <form action="/admin1/link" method='post' name='myform'>
            {{ csrf_field()}}
            {{ method_field('DELETE')}}
        </form>
        <form action='/admin1/link' method='get'>
                <div class='medio-body'>
                    链接文字：<input type='text' class='form-control input-sm m-b-10' name='Links_name'>
                </div>
                <input type='submit' class='btn' value='搜索'>
        </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>链接文字</th>
                        <th>链接地址</th>
                        <th>连接开关</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach( $list as $v)
                    	<tr>
	                        <td>{{$v->Links_id}}</td>
	                        <td>{{$v->Links_name}}</td>
	                        <td>{{$v->Links_url}}</td>
	                        <td>{{($v->Links_switch==1)?'开':'关'}}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->Links_id}})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/link/{{ $v->Links_id}}/edit'>修改</a>
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
                form.action='/admin1/link/'+id;
                form.submit();
            }
        }
    </script>
@endsection