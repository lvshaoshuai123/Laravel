@extends('admin.base.parent')
@section('content')
	<div class="block-area" id="tableHover">
        <h3 class="block-title">网站配置信息列表</h3>
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
        <form action="/admin1/net" method='post' name='myform'>
            {{ csrf_field()}}
        </form>
        <form action='/admin1/net' method='get'>
                <div class='medio-body'>
                    网站标题：<input type='text' class='form-control input-sm m-b-10' name='Net_title'>
                </div>
                <input type='submit' class='btn' value='搜索'>
        </form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>网站标题</th>
                        <th>网站LOGO</th>
                        <th>网站版权</th>
                        <th>网站关键字</th>
                        <th>网站开关</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach( $list as $v)
                    	<tr>
	                        <td>{{$v->Net_title}}</td>
	                        <td><img src="{{ url('admin/upload').'/'.'s_'.$v->Net_logo }}"></td>
	                        <td>{{$v->Net_copy}}</td>
	                        <td>{{ $v->Net_keword}}</td>
                            <td>{{ ($v->Net_site==1)?'开':'关'}}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/net/{{$v->Net_id}}/edit'>修改</a>
	                        </td>
	                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $list->appends($where)->links()}}
        </div>
    </div>
@endsection