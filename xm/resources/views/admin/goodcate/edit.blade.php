@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">修改商品</h3>

    <p>修改商品</p>
    <form action="/admin1/goodcate/{{ $list->GoodCate_id}}" method='post' enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
            <div class="col-lg-12">
                商品名称<input name='GoodCate_name' type="text" class="form-control m-b-10" value="{{$list->GoodCate_name}}">
            </div>
            <div class="col-lg-12" id="block-level">
            <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection