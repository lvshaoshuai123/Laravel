@extends('Admin.base.parent')
@section('content')
<!-- Text Input -->
<div class="block-area" id="text-input">
    <h3 class="block-title">修改管理员信息</h3>
    <p>修改管理员信息</p>
    <div class="row">
        <form action='/admin1/auser/{{ $ob->Auser_id }}' method='post'>
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="col-lg-4">
                用户名：<input type="text" class="form-control m-b-10" placeholder="请输入账号" name='Auser_name' value="{{ $ob->Auser_name }}">
            </div>
            <div class="col-lg-4">
                年龄：<input type="text" class="form-control m-b-10" placeholder="请输入年龄" name='Auser_age' value="{{ $ob->Auser_age }}">
            </div>
            <div class="col-lg-4">
              性别：<select class="form-control input-sm m-b-10" name='Auser_sex'> 
                        <option value="1" {{ ($ob->Auser_sex == 1)?'selected':''}}>男</option>
                        <option value="2" {{ ($ob->Auser_sex == 2)?'selected':''}}>女</option>
                    </select>
            </div>
            <div class="col-lg-12" style="margin-bottom: 10px;">
            <table class="btn btn-sm btn-alt m-r-5" style="width:350px;">
                     权限:
                 <tr>
                    <td >{{($ob->Auser_qx ==1)?'超级管理员':'管理员' }}</td>
                 </tr>
            </table>
            </div>
            <div class="col-lg-12">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </form>
    </div>
    <p></p>
</div>
@endsection