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
        	<form action='/admin1/auser' method='post' name='myform'>
        		{{ csrf_field() }}
        		{{ method_field('DELETE') }}
        	</form>
        	<form action='/admin1/auser' method='get'>
        		<div class='medio-body'>
    				管理员账号：<input type='text' class='form-control input-sm m-b-10' name='Auser_name'>
    			</div>
        		<div>
        			权限：<select name='Auser_qx' class='form-control input-sm m-b-10'>
        				<option value=''>--请选择--</option>
        				<option value='1'>--超级管理员--</option>
        				<option value='2'>--管理员--</option>
        			</select>
        		</div>
        		<input type='submit' class='btn' value='搜索'>
        	</form>
            <table class="table table-bordered table-hover tile">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>账号</th>
                        <th>性别</th>
                        <th>年龄</th>
                        <th>权限</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $v)
                    	<tr>
	                        <td>{{ $v->Auser_id }}</td>
	                        <td>{{ $v->Auser_name }}</td>
                            <td>{{ ($v->Auser_sex == 1)?'男':'女' }}</td>
                            <td>{{ $v->Auser_age }}</td>
	                        <td>{{ ($v->Auser_qx == 1)?'超级管理员':'管理员' }}</td>
	                        <td>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='javascript:doDel({{ $v->Auser_id }})'>删除</a>
	                        	<a class="btn btn-sm btn-alt m-r-5" href='/admin1/auser/{{ $v->Auser_id }}/edit'>修改</a>
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
        		form.action = '/admin1/auser/'+id;
        		form.submit();
        	}
        }
    </script>
@endsection