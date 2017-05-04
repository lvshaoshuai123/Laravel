@extends('admin.base.parent')
@section('content')
 <div class="block-area" id="text-input">
    <h3 class="block-title">修改地址</h3>
    <form action="/admin1/address/{{ $list->Address_id}}" method='post' enctype="multipart/form-data">
    {{ csrf_field()}}
    {{ method_field('PUT')}}
        <div class="row">
            <div class="col-lg-12">
                省：<input name='Address_province' type="text" class="form-control m-b-10" value="{{$list->Address_province}}">
            </div>
            <div class="col-lg-12">
                市:<input name='Address_city' type="text" class="form-control m-b-10" value="{{$list->Address_city}}">
            </div>
            <div class="col-lg-12">
                县:<input name='Address_county' type="text" class="form-control m-b-10" value="{{$list->Address_county}}">
            </div>
            <div class="col-lg-12">
                收货人：<input name='Address_consignee' type="text" class="form-control m-b-10" value="{{$list->Address_consignee}}">
            </div>
            <div class="col-lg-12">
                收货人手机：<input name='Address_consignee_phone' type="text" class="form-control m-b-10" value="{{$list->Address_consignee_phone}}">
            </div>
            <div class="col-lg-12">
                地址是否默认：<select class="form-control m-b-10" name='Address_default'>
                    <option>--请选择--</option>
                    <option value='1' @if($list->Address_default==1)selected @endif>否</option>
                    <option value='2' @if($list->Address_default==2)selected @endif>是</option>
                </select>
            </div>
            <div class="col-lg-12">
                详细地址：<input name='Address_detail' type="text" class="form-control m-b-10" value="{{$list->Address_detail}}">
            </div>
            <div class="col-lg-12" id="block-level">
            <input type='submit' class="btn btn-block btn-alt" value='提交'>
            </div>
        </div>
    </form>
</div>
@endsection