@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">修改轮播</h3>
    <form action="/admin1/carousel/{{ $list->carousel_id}}" method='post' enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
            <div class="col-lg-4">
                轮播图片：
                <img src="{{url('home/index/upload').'/'.'s_'.$list->carousel_img}}">
                <input type='file' name='carousel_img'>
            </div>
             <div class="col-lg-12" id="block-level">
                <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection