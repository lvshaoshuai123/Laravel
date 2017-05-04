@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{asset('home/evaluate/css/base.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/evaluate/css/index.css')}}">
<script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
<script type="text/javascript" async="" src="{{asset('home/evaluate/js/unjcV2.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/evaluate/js/mstr.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/evaluate/js/jquery.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/evaluate/js/xmst.js')}}"></script>
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a href="">小米商城</a><span class="sep">|</span><a href="" target="_blank">MIUI</a><span class="sep">|</span><a href="" target="_blank">米聊</a><span class="sep">|</span><a href="" target="_blank">游戏</a><span class="sep">|</span><a href="" target="_blank">多看阅读</a><span class="sep">|</span><a href="" target="_blank">云服务</a><span class="sep">|</span><a href="">金融</a><span class="sep">|</span><a href="">小米商城移动版</a><span class="sep">|</span><a href="">问题反馈</a><span class="sep">|</span><a href="">Select Region</a>
        </div>
        <div class="topbar-info" id="J_userInfo">
            @if(empty(session()->has('homeuser')))
            <a rel="nofollow" class="link" href="/home1/login">登录</a>
            <span class="sep">|</span>
            <a rel="nofollow" class="link" href="/home1/register">注册</a>
            <span class="sep">|</span>
            @else
            <a rel="nofollow" class="link" href="/home2/person">
            <script>
                var a = "{{session()->get('homeuser')->User_name}}";
                document.write(a);
            </script>
            </a>
            <span class="sep">|</span>
             <a rel="nofollow" class="link" href="/home2/over">退出</a>
            <span class="sep">|</span>
             <a rel="nofollow" class="link" href="/home2/person">个人资料</a>
            <span class="sep">|</span>
             <a rel="nofollow" class="link" href="/home2/modify">修改密码</a>
            <span class="sep">|</span>
         @endif
        </div>
    </div>
</div>
<div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="/"><img src="{{ asset('admin/upload').'/'.'s_'.$net->Net_logo }}" alt=""></a>
                    </div>
                    <script type="text/javascript" src="{{ url('/home/list/js/jquery-1.8.3.min.js') }}"></script>
        <script type="text/javascript">
            $(function(){
                $('#J_navCategory').mouseover(function(){
                    $('div[class="site-category"]').css('display','block');
            }).mouseout(function(){
                    $('div[class="site-category"]').css('display','none');
            });
            $("li[class='category-item']").mouseover(function(){
                $(this).children('a').css('color','#FF7E00');
                $(this).children('div').css('display','block');
            }).mouseout(function(){
                $(this).children('div').css('display','none');
                $(this).children('a').css('color','#333333');
                });
            });
        </script>
        <div class="header-nav">
            <ul class="nav-list J_navMainList clearfix">
                <li id="J_navCategory" class="nav-category">
                    <a class="link-category" href="">
                        <span class="text">全部商品分类</span>
                    </a>
                    <div class="site-category">
                        <ul id="J_categoryList" class="site-category-list clearfix">
                            @foreach($datas as $v)
                            <li class="category-item">
                                <a class="title" href="/list/{{ $v->GoodCate_id }}">{{ $v->GoodCate_name }}
                                    <i class="iconfont"></i>
                                </a>
                                <div class="children clearfix children-col-3">
                                    <ul class="children-list children-list-col children-list-col-1">
                                        @foreach($goods as $v1)
                                        @if($v->GoodCate_id==$v1->Goods_type)
                                        <li class="star-goods">
                                            <a class="link" href="/detail/{{ $v1->Goods_id }}">
                                                <img class="thumb" src="{{ asset('admin/upload/').'/'.'s_'.$v1->Goods_pic }}" alt="" width="40" height="40">
                                                <span class="text">{{ $v1->Goods_name }}</span>
                                            </a>
                                            <a class="btn btn-line-primary btn-small btn-buy" href="/detail/{{ $v1->Goods_id }}">选购</a>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div> 
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @foreach($goodcates as $v)             
                <li class="nav-item">
                    <a class="link" href=""  >
                        <span class="text">{{ $v->GoodCate_name }}</span>
                        <span class="arrow"></span>
                    </a>
                    <div class="item-children">
                        <div class="container">
                            <ul class="children-list clearfix">
                                @foreach($goods as $v1)
                                @if($v->GoodCate_id==$v1->Goods_type)
                                <li class="first">
                                    <div class="figure figure-thumb">
                                        <a href="/detail/{{ $v1->Goods_id }}">
                                            <img src="{{ asset('admin/upload').'/'.'s_'.$v1->Goods_pic }}" width="160" height="110">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="/detail/{{ $v1->Goods_id }}" >{{ $v1->Goods_name }}</a>
                                    </div>
                                    <p class="price">{{ $v1->Goods_price }}</p>
                                </li>  
                                @endif
                                @endforeach 
                            </ul>
                        </div>
                    </div>
                </li>
                @endforeach             
                <li class="nav-item">
                    <a class="link" href="" target="_blank"><span class="text">服务</span></a>
                </li>
                <li class="nav-item">
                    <a rel="nofollow" class="link" href="" target="_blank"><span class="text">社区</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div id="J_navMenu" class="header-nav-menu" style="display: none;">
        <div class="container"></div>
    </div>
</div>
<div id="J_proHeader">
    <div class="xm-product-box"> 
        <div class="nav-bar" id="J_headNav"> 
            <div class="container J_navSwitch"> 
                <h2 class="J_proName">{{ $good->Goods_name }}</h2> 
                <div class="con">
                    <div class="right">
                        <a href="javascript:void(0);" class="cur" data-stat-id="63093bcebf4ac2f6" onclick="_msq.push(['trackEvent', 'fbdf2c86fa0fa944-63093bcebf4ac2f6', 'javascript:void0', 'pcpid', '']);">
                        用户评价
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="m-comment-wrap h-comment-wrap">
    <div class="container J_commentWrap">
        <div class="row"> 
            <div class="span13 h-comment-main  m-comment-main J_commentCon" style="width:100%;"> 
    @if(session()->has('homeuser'))
    <textarea style="width:100%;height:200px;resize:none;" class="text1" ></textarea>
    <input type="submit" value="评价" id="pj">
    <span class="u" style="display: none;">{{ session('homeuser')->User_id }}</span>
    <span class="g" style="display: none;">{{ $good->Goods_id }}</span>
    @endif
    <div class="comment-top">
        <h2 class="m-tit">评价</h2>
    </div> 
    <div class="m-comment-box J_commentList"> 
                                    <ul class="m-comment-list J_listBody" id="ulid">
                                    @if(count($data)<1)
                                    <li class="com-item J_resetImgCon J_canZoomBox" data-id="143276777" style="text-align:center;" id="li1">
                                    暂无评价
                                     </li>
                                    @endif
                                    @foreach($data as $v)
                                        <li class="com-item J_resetImgCon J_canZoomBox" data-id="143276777"> @foreach($user as $v1) @if($v->Eval_uid==$v1->User_id)<a class="user-img" href=""><img src="{{ asset('admin/upload').'/'.$v1->User_pic }}"></a> @endif @endforeach<div class="comment-info"><a class="user-name" href="">{{ $v->Eval_name }}</a><p class="time">{{ date('Y-m-d H:i:s',$v->Eval_time) }}</p> </div> <div class="comment-txt"> <a href="" target="_blank">{{ $v->Eval_text }}</a> </div>  <div class="m-img-list clearfix h-img-list">      <div class="img-item img-item1 item-one showimg"><div class="loader loader-gray"></div> </div>  <div class="J_zoomImgList" style="display: none;">  <span data-src="//i1.mifile.cn/a2/1492681706_7513463_s1080_2040wh.jpg"></span>  </div> </div><div class="comment-answer">  <div class="answer-item"><div class="answer-content"> <h3 class="official-name">官方回复</h3> <p> {{ $v->Eval_reply}}</p> </div> </div>    </div> 
                                        </li>@endforeach
                                    </ul> 
                </div> 
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 
    $('#pj').click(function(){
        if($('.text1').val()=='')
 {
    alert('评价内容不能为空！！');
 }else{
        $('#li1').css('display','none');
        var uid=$('.u').html();
        // alert(uid);
        var gid=$('.g').html();
        // alert(gid);
        var text=$('.text1').val();
        $('.text1').val('');
        // alert(text);
        $.ajax({
            url:'/home2/pj',
            type:'get',
            data:{Eval_gid:gid,Eval_uid:uid,Eval_text:text},
            async:true,
            dataType:'json',
            success:function(data){
                $('#ulid').append('<li class="com-item J_resetImgCon J_canZoomBox" data-id="143276777"><a class="user-img" href=""><img src="/admin/upload/'+data['User_pic']+'"></a><div class="comment-info"><a class="user-name" href="">'+data['Eval_name']+'</a><p class="time">'+data['Eval_time']+'</p> </div> <div class="comment-txt"> <a href="" target="_blank">'+data['Eval_text']+'</a> </div>  <div class="m-img-list clearfix h-img-list"><div class="img-item img-item1 item-one showimg"><div class="loader loader-gray"></div> </div>  <div class="J_zoomImgList" style="display: none;">  <span data-src="//i1.mifile.cn/a2/1492681706_7513463_s1080_2040wh.jpg"></span>  </div> </div><div class="comment-answer">  <div class="answer-item"><div class="answer-content"> <h3 class="official-name">官方回复</h3> <p>'+data['Eval_reply']+'</p> </div> </div>    </div> </li>');

            },
            error:function()
                {
                    alert('ajax请求失败');
                }
        })
  }
    });
  
    </script>
<script src="{{asset('home/evaluate/js/base.js')}}"></script>
    
    <script src="{{asset('home/evaluate/js/xmsg_ti.js')}}"></script>
        <script type="text/javascript" src="{{asset('home/evaluate/js/index.js')}}"></script>
    <script>
    var _msq = _msq || [];
    _msq.push(['setDomainId', 100]);
    _msq.push(['trackPageView']);
    (function() {
        var ms = document.createElement('script');
        ms.type = 'text/javascript';
        ms.async = true;
        ms.src = "{{asset('home/evaluate/js/xmst.js')}}";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ms, s);
    })();
    </script>
@endsection