@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加网站配置</h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin1/net" method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-4">
                网站标题：<input name='Net_title' type="text" class="form-control m-b-10" placeholder="请输入网站标题">
            </div>
            <div class="col-lg-4">
               网站LOGO： <input type="file" name='Net_logo'>
            </div>
            <div class="col-lg-4">
               网站版权： <input type="text" name='Net_copy' class="form-control m-b-10" placeholder="请输入网站版权">
            </div>
            <div class="col-lg-4">
               网站关键字： <input type="text" name='Net_keword' class="form-control m-b-10" placeholder="请输入网站关键字">
            </div>
            <div class="col-lg-4">
                网站开关：<select class="form-control m-b-10" name='Net_site'>
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