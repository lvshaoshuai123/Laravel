@extends('Admin.base.parent')
@section('content')
	<!-- Text Input -->
    <div class="block-area" id="text-input">
        <h3 class="block-title">回复评价</h3>
        
        <p>回复用户评价</p>
        
        <div class="row">
            <form action="/admin1/eval/{{ $ob->Eval_id }}" method='post'>
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入用户名" name='Eval_name' value="{{ $ob->Eval_name }}">
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入年龄" name='Eval_time' value="{{ $ob->Eval_time }}">
                </div>
                <div class="col-lg-7">
                    <select class="form-control m-b-10" name='Eval_state'>
                        <option value='1' @if($ob->Eval_state ==1)selected @endif>好评</option>
                        <option value='2' @if($ob->Eval_state ==2)selected @endif>差评</option>
                    </select>
                </div>
                <div class="col-lg-7">
                    <input type="text" class="form-control m-b-10" placeholder="请输入回复内容" name='Eval_reply' value="{{ $ob->Eval_reply}}">
                </div>
                <div class="col-lg-7">
                    <input type='submit' class="btn btn-block btn-alt" value='提交'>
                </div>
            </form>
        </div>
        <p></p>
        
    </div>
@endsection