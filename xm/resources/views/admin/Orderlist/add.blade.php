@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加管理员</h3>
        
        <p>添加管理员</p>
         @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <form action='/admin/user' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-4">
                    <input type="text" class="form-control m-b-10" placeholder="请输入管理员账号" name='Auser_name'>
                </div>
                 <div class="col-lg-4">
                    <input type="password" class="form-control m-b-10" placeholder="请输入密码" name='Auser_pwd'>
                </div>
                
                <div class="col-lg-4">
                    <select class="form-control m-b-10" name='Auser_qx'>
                        <option>--请选择权限--</option>
                        <option value='1'>权限1</option>
                        <option value='2'>权限2</option>
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection