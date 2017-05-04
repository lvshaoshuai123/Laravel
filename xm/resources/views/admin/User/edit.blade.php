@extends('Admin.base.parent')
@section('content')

	<div class="block-area" id="multi-column">
                    <h3 class="block-title">修改信息</h3>
                     @if (count($errors) > 0)
			            <div class="alert alert-danger">
			                <ul>
			                    @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                    @endforeach
			                </ul>
			            </div>
			        @endif
                    <form class="row form-columned" role="form" method='post' action='/admin1/user/{{$ob->User_id}}' enctype='multipart/form-data'>
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                        <div class="col-md-7">
                            <input type="text" class="form-control input-sm m-b-10" placeholder="请输入用户名" name='User_name' value='{{$ob->User_name}}'>
                        </div>
                        <div class="col-md-7">
                            <input type="text" class="form-control input-sm m-b-10" placeholder="请输入年龄" name='User_age' value='{{$ob->User_age}}'>
                        </div>
                       <div class="col-lg-7">
                            <select class="form-control m-b-10" name='User_sex' >
                                <option value='1' @if($ob->User_sex == 1)selected @endif>男</option>
                                <option value='2' @if($ob->User_sex==2)selected @endif>女</option>
                            </select>
                        </div>

                        <div class="col-md-7">
                            <input type="text" class="form-control input-sm m-b-10" placeholder="请输入邮箱" name='User_email' value='{{$ob->User_email}}'>
                        </div>

                        <div class="col-md-7">
                            <input type="text" class="form-control input-sm m-b-10" placeholder="请输入电话" name='User_tel' value='{{$ob->User_tel}}'>
                        </div>
        
                        <div class="col-md-7">
                            <img width='200' src="{{ url('admin/upload').'/'.$ob->User_pic }}" >
                            <input  type="file" name='User_pic'>

                        </div>

                        <input type="hidden" name='pic' value="{{ $ob->User_pic}}">


                        

                        <div class="clearfix"></div>
                       
                       
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-sm">提交修改</button>
                        </div>
                    </form>
                </div>
@endsection