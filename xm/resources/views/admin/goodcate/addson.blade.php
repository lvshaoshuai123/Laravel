@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加商品子类</h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin1/goodcate/addson" method='post'>
    {{ csrf_field() }}
        <div class="row">
        <div class="col-lg-4">
               商品类名称： <input name='GoodCate_name' type="text" disabled='' class="form-control m-b-10" value='{{ $list->GoodCate_name}}'>
            </div>
            <div class="col-lg-4">
               商品子类名称： <input name='GoodCate_name' type="text" class="form-control m-b-10">
            </div>
            <div class="col-lg-4">
                <input type="hidden" name='GoodCate_fid' value='{{ $list->GoodCate_id}}'>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection