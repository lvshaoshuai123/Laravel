@extends('admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">商品分类信息列表</h3>
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
        <form action="/admin1/goodcate" method='post' name='myform'>
            {{ csrf_field()}}
            {{ method_field('DELETE')}}
        </form>
        <form action='/admin1/goodcate' method='get'>
                <div class='medio-body'>
                    商品类名：<input type='text' class='form-control input-sm m-b-10' name='GoodCate_name'>
                </div>
                <input type='submit' class='btn' value='搜索'>
        </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品类名称</th>
                        <th>商品子类ID</th>
                        <th>父id</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach( $list as $v)
                    	<tr>
	                        <td>{{$v->GoodCate_id}}</td>
	                        <td>{{$v->GoodCate_name}}</td>
	                        <td>{{$v->GoodCate_gid}}</td>
                            <td>{{$v->GoodCate_fid}}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->GoodCate_id}})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/goodcate/{{$v->GoodCate_id}}/edit'>修改</a>
                                <a class="btn btn-sm btn-alt m-r-5" href='/admin1/goodcate/addson/{{$v->GoodCate_id}}'>添加商品子类</a>
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
                form.action='/admin1/goodcate/'+id;
                form.submit();
            }
        }
    </script>
@endsection