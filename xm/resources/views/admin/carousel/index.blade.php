@extends('admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">轮播图片列表</h3>
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
        <form action="/admin1/carousel" method='post' name='myform'>
            {{ csrf_field()}}
            {{ method_field('DELETE')}}
        </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>轮播图片</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach( $list as $v)
                    	<tr>
	                        <td>{{$v->carousel_id}}</td>
	                        <td><img src="{{url('home/index/upload').'/'.'s_'.$v->carousel_img}}" width="50px"></td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->carousel_id}})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/carousel/{{ $v->carousel_id}}/edit'>修改</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function doDel(id)
        {
            if(confirm('确定删除吗？')){
                var form=document.myform;
                form.action='/admin1/carousel/'+id;
                form.submit();
            }
        }
    </script>
@endsection