@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加用户</h3>

    <p>添加用户</p>
    <form action="/admin1/demo1/{{ $list->uid}}" method='post'>
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
            <div class="col-lg-4">
                <input name='name' type="text" class="form-control m-b-10" value="{{$list->name}}">
            </div>
            <div class="col-lg-4">
                <input type="text" name='age' class="form-control m-b-10" value="{{$list->age}}">
            </div>
            <div class="col-lg-4">
                <select class="form-control m-b-10" name='sex'>
                    <option>--请选择--</option>
                    <option value='1' @if($list->sex==1)selected @endif>男</option>
                    <option value='2' @if($list->sex==2)selected @endif>女</option>
                </select>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection