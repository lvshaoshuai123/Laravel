@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加商品</h3>
        
        <p>添加商品</p>
         @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="row">
            <form action='/admin1/goods' method='post' enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="请输入商品名" name='Goods_name'>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="请输入原价" name='Goods_price'>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="请输入现价" name='Goods_tprice'>
                </div>
                
                 <div class="col-lg-12">
                    <select class="form-control input-sm m-b-10" name='Goods_stock'>
                        <option value='1'>明星单品</option>
                        <option value='2'>非明星单品</option>
                    </select>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="请输入商品介绍" name='Goods_body'>
                </div>
                <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="请输入商品上市时间" name='Goods_time'>
                </div>
                 <div class="col-lg-12">
                    <select class="form-control input-sm m-b-10" name='Goods_type'>
                        <option value=''>--商品类型--</option>
                        @foreach($goodcate as $v)
                        <option value='{{ $v->GoodCate_id }}'>{{ $v->GoodCate_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="版本" name='Goods_edition'>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="销量" name='Goods_hlevel'>
                </div>
                 <div class="col-lg-12">
                    <input type="text" class="form-control input-sm m-b-10" placeholder="折扣" name='Goods_discount'>
                </div>
                
                
                <div class="col-lg-12">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection