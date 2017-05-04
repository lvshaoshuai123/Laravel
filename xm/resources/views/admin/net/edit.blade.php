@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加网站配置</h3>

    <p>添加网站配置</p>
    <form action="/admin1/net/{{ $list->Net_id}}" method='post' enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
        <input type="hidden" value="{{ $list->Net_logo }}" name='logo'>
            <div class="col-lg-12">
                网站标题：<input name='Net_title' type="text" class="form-control m-b-10" value="{{$list->Net_title}}">
            </div>
            网站LOGO：<div class="col-lg-12">
                <div class="col-lg-1">
                    <img src="{{ url('admin/upload').'/'.'s_'.$list->Net_logo}}" class="img-rounded m-r-10 m-b-10" alt="网站LOGO">
                </div>
                <input type="file" name="Net_logo">
            </div>
            <div class="col-lg-12">
                网站版权：<input name='Net_copy' type="text" class="form-control m-b-10" value="{{$list->Net_copy}}">
            </div>
            <div class="col-lg-12">
                网站关键字：<input name='Net_keword' type="text" class="form-control m-b-10" value="{{$list->Net_keword}}">
            </div>
            <div class="col-lg-12">
                网站开关<select class="form-control m-b-10" name='Net_site'>
                    <option>--请选择--</option>
                    <option value='1' @if($list->Net_site==1)selected @endif>开</option>
                    <option value='2' @if($list->Net_site==2)selected @endif>关</option>
                </select>
            </div>
            <div class="col-lg-12" id="block-level">
            <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection