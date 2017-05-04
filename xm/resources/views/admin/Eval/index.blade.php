@extends('Admin.base.parent')
@section('content')

 <div class="block-area" id="inline">
        <h3 class="block-title">搜索框</h3>
        <form class="form-inline" role="form" action='/admin1/eval'>
            <div class="form-group">
                <input type="text" class="form-control input-sm m-b-3" id="exampleInputEmail2" placeholder="用户名" name='Eval_name'>
            </div>
            <div class="form-group m-b-3">
                <select name="Eval_state" class='form-control input-sm m-b-3'>
                    <option value="">--状态--</option>
                    <option value="1">--好评--</option>
                    <option value="2">--差评--</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm m-b-3" id="exampleInputEmail2" placeholder="评价内容" name='Eval_text'>
            </div>
            <div class="form-group">
                <input type="text" class="form-control input-sm m-b-3" id="exampleInputEmail2" placeholder="商品名称" name='Eval_gname'>
            </div>
            <button type="submit" class="btn btn-sm">搜索</button>
        </form>
    </div>
     
   <div class="block-area" id="responsiveTable">
                    <h3 class="block-title">用户评价表</h3>
                    @if(session('msg'))
                        <script>
                            alert('{{session('msg')}}');
                        </script>
                    @endif

                    <div class="table-responsive overflow">
                        <table class="table tile">
                        <form action='admin1/eval' name='myform' method='post'>
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                        </form>
                            <thead>
                                <tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>商品名</th>
                                        <th>评价内容</th>
                                        <th>回复内容</th>
                                        <th>状态</th>
                                        <th>评价时间</th>
                                        <th>操作</th>
                                    </tr>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $v)
                                <tr>
                                    <td>{{ $v->Eval_id }}</td>
                                    <td>{{ $v->Eval_name }}</td>
                                    <td>{{ $v->Eval_gname}}</td>
                                    <td>{{ $v->Eval_text }}</td>
                                    <td>{{ $v->Eval_reply }}</td>
                                    <td>{{ ($v->Eval_state == 1)?'好评':'差评' }}</td>
                                    <td>{{ date('Y-m-d H:i:s' ,$v->Eval_time) }}</td>
                                    <td>
                                        <a href="javascript:doDel({{$v->Eval_id}})">删除</a>
                                        <a href="/admin1/eval/{{$v->Eval_id}}/edit">回复</a>
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                        {{ $list->appends($where)->links() }}
                    </div>
                </div>
                    <script>
                    function doDel(id)
                    {
                        if(confirm('确定删除吗？'))
                        {
                            var form = document.myform;
                            form.action='/admin1/eval/'+id;
                            form.submit();
                        }
                    }
                </script>
@endsection