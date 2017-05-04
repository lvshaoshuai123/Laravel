@extends('Admin.base.parent')
@section('content')
	<div class="block-area" id="basic">
                    <h3 class="block-title">添加用户</h3>
                     @if (count($errors) > 0)
			            <div class="alert alert-danger">
			                <ul>
			                    @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                    @endforeach
			                </ul>
			            </div>
			        @endif
                    <form role="form" action='/admin1/user' method='post'>
                    {{csrf_field()}}
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" id="exampleInputEmail1" placeholder="姓名：" name='User_name'>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control input-sm" id="exampleInputPassword1" placeholder="年龄：" name='User_age'>
                        </div>

                        <div class="form-group">
                             <select name="User_sex" class="form-control input-sm">
                             <option value='1'>--性别--</option>
								<option value="1" >男</option>
								<option value="2" >女</option>
                             </select>
                        </div>

                       <div class="form-group">
                            <input type="text" class="form-control input-sm" id="exampleInputPassword1" placeholder="邮箱：" name='User_email'>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control input-sm" id="exampleInputPassword1" placeholder="电话" name='User_tel'>
                        </div>

                         <div class="form-group">
                            <input type="password" class="form-control input-sm" id="exampleInputPassword1" placeholder="密码" name='User_pwd'>
                        </div>

                        <button type="submit" class="btn btn-sm m-t-10">添加</button>
                        <button type="reset" class="btn btn-sm m-t-10">重置</button>
                    </form>
                </div>
@endsection