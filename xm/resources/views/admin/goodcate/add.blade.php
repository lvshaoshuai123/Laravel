@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加商品类</h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin1/goodcate" method='post'>
    {{ csrf_field() }}
        <input type="hidden" name='GoodCate_gid' value='0'>
        <input type="hidden" name='GoodCate_fid' value='0'>
        <div class="row">
            <div class="col-lg-4">
               商品类名称： <input name='GoodCate_name' type="text" class="form-control m-b-10">
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection