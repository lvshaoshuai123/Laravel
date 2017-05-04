<!-- 成功加入购物车界面 -->
@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{asset('home/cshop/css/base.css')}}">
<script type="text/javascript" async="" src="{{ asset('home/cshop/js/xmst.js')}}"></script><script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
<script>
    var UA=navigator.userAgent;if(UA.match(/Android/i)||(UA.indexOf('iPhone')!=-1)||(UA.indexOf('iPod')!=-1)){window.location='http://m.mi.com/_/product/category';}
</script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script type="text/javascript" async="" src="{{asset('home/cshop/js/mstr.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/cshop/js/unjcV2.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/cshop/js/mstr_002.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/cshop/js/jquery.js')}}"></script>
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a rel="nofollow" href="">小米商城</a><span class="sep">|</span><a rel="nofollow" href="">MIUI</a><span class="sep">|</span><a rel="nofollow" href="">米聊</a><span class="sep">|</span><a rel="nofollow" href="">游戏</a><span class="sep">|</span><a rel="nofollow" href="">多看阅读</a><span class="sep">|</span><a rel="nofollow" href="" target="_blank">云服务</a><span class="sep">|</span><a rel="nofollow" href="">金融</a><span class="sep">|</span><a rel="nofollow" href="">小米商城移动版</a><span class="sep">|</span><a rel="nofollow" href="">问题反馈</a><span class="sep">|</span><a rel="nofollow" href="">Select Region</a>
        </div>
        <div class="topbar-info" id="J_userInfo">
         @if(empty(session()->has('homeuser')))
            <a rel="nofollow" class="link" href="/home1/login">登录</a>
            <span class="sep">|</span>
            <a rel="nofollow" class="link" href="/home1/register">注册</a>
            <span class="sep">|</span>
            @else
            <a rel="nofollow" class="link" href="/home2/pinfo">
            <script>
                var a = "{{session()->get('homeuser')->User_name}}";
                document.write(a);
            </script>
            </a>
            <span class="sep">|</span>
             <a rel="nofollow" class="link" href="/home2/over">退出</a>
            <span class="sep">|</span>
             <a rel="nofollow" class="link" href="/home2/pinfo">个人资料</a>
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
                                <a class="title" href="">{{ $v->GoodCate_name }}
                                    <i class="iconfont"></i>
                                </a>
                                <div class="children clearfix children-col-3">
                                    <ul class="children-list children-list-col children-list-col-1">
                                        @foreach($goods as $v1)
                                        @if($v->GoodCate_id==$v1->Goods_type)
                                        <li class="star-goods">
                                            <a class="link" href="">
                                                <img class="thumb" src="{{asset('admin/upload/').'/'.'s_'.$v1->Goods_pic}}" alt="" width="40" height="40">
                                                <span class="text">{{ $v1->Goods_name}}</span>
                                            </a>
                                            <a class="btn btn-line-primary btn-small btn-buy" href="">选购</a>
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
                                        <a href="">
                                            <img src="{{ asset('admin/upload').'/'.'s_'.$v1->Goods_pic }}"  alt="小米手机5c" width="160" height="110">
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="" >{{$v1->Goods_name}}</a>
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
<div id="J_navMenu" class="header-nav-menu" style="display: none;"><div class="container"></div></div></div>

<div class="page-main">
    <div class="container">
        <div class="buy-succ-box clearfix">
            <div class="goods-content" id="J_goodsBox"> <div class="goods-img"> <img src="{{asset('home/cshop/images/success.png')}}" width="64" height="64"> </div> <div class="goods-info"> <h3>已成功加入购物车！</h3> <span class="name">{{ $data->Goods_name }} &nbsp {{ $data->Goods_edition }}</span>     </div></div>

            <div class="actions J_actBox">
                <a href="/detail/{{ $data->Goods_id }}" class="btn btn-line-gray J_goBack">返回上一级</a>
                <a href="/home2/shop" class="btn btn-primary">去购物车结算</a>
            </div>
        </div>
        <div class="buy-succ-recommend" id="J_userHistory"></div>

    </div>
</div>

<script id="J_goodsTemplate" type="text/x-dot-template">
    <div class="goods-img">
        <img src="" width="64" height="64">
    </div>
    <div class="goods-info">
        <h3>已成功加入购物车！</h3>
        <span class="name">
        </span> 
    </div>
</script>
<script src="{{asset('home/cshop/js/base.js')}}"></script>

<script type="text/javascript" src="{{asset('home/cshop/js/buySuccess.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('home/cshop/css/buy-success.css')}}">
<script src="{{asset('home/cshop/js/xmsg_ti.js')}}"></script>
<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{asset('home/cshop/js/xmst.js')}}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection