@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加链接</h3>
    
    <p>添加链接</p>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin1/link" method='post'>
    {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-4">
                链接文字<input name='Links_name' type="text" class="form-control m-b-10" placeholder="请输入链接文字">
            </div>
            <div class="col-lg-4">
               URL地址 <input type="text" name='Links_url' class="form-control m-b-10" placeholder="请输入链接地址">
            </div>
            <div class="col-lg-4">
                链接开关<select class="form-control m-b-10" name='Links_switch'>
                    <option value='1'>开</option>
                    <option value='2'>关</option>
                </select>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection