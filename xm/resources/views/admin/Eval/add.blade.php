@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">添加评价</h3>
        
        <p>添加评价</p>
        
        <div class="row">
            <form action='/admin/eval' method='post'>
                {{ csrf_field() }}
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="用户名" name='Eval_name'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="用户id" name='Eval_uid'>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="评价内容" name='Eval_text'>
                </div>
                <div class="col-lg-7">
                    <select class="form-control m-b-10" name='Eval_state'>
                        <option>--评价状态--</option>
                        <option value='1'>好评</option>
                        <option value='2'>差评</option>
                    </select>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="回复内容" name='Eval_reply'>
                </div>
                
                <div class="col-lg-7">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection