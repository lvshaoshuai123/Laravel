@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">添加轮播图片</h3>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/admin1/carousel" method='post' enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-4">
                轮播图片：<input type="file" name='carousel_img'>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection