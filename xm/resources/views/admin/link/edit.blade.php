@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">修改链接</h3>
    <form action="/admin1/link/{{ $list->Links_id}}" method='post'>
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
            <div class="col-lg-4">
                <input name='Links_name' type="text" class="form-control m-b-10" value="{{$list->Links_name}}">
            </div>
            <div class="col-lg-4">
                <input type="text" name='Links_url' class="form-control m-b-10" value="{{$list->Links_url}}">
            </div>
            <div class="col-lg-4">
                <select class="form-control m-b-10" name='Links_switch'>
                    <option>--请选择--</option>
                    <option value='1' @if($list->Links_switch==1)selected @endif>开</option>
                    <option value='2' @if($list->Links_switch==2)selected @endif>关</option>
                </select>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection