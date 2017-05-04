@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{ url('home/cullect/base.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('home/cullect/main.css') }}">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" async="" src="{{ url('Home/cullect/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('home/cullect/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('home/cullect/jquery.js') }}"></script>
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a href="">小米商城</a>
            <span class="sep">|</span>
            <a href="">MIUI</a>
            <span class="sep">|</span>
            <a href="">米聊</a>
            <span class="sep">|</span>
            <a href="">游戏</a>
            <span class="sep">|</span>
            <a href="">多看阅读</a>
            <span class="sep">|</span>
            <a href="">云服务</a>
            <span class="sep">|</span>
            <a href="">金融</a>
            <span class="sep">|</span>
            <a href="">小米商城移动版</a>
            <span class="sep">|</span>
            <a href="">问题反馈</a>
            <span class="sep">|</span>
            <a href="">Select Region</a>
        </div>
        <div class="topbar-info" id="J_userInfo">
           @if(empty(session()->has('homeuser')))
            <a rel="nofollow" class="link" href="/home1/login">登录</a>
            <span class="sep">|</span>
            <a rel="nofollow" class="link" href="/home1/register">注册</a>
            <span class="sep">|</span>
            @else
            <span class="homeuser" style="display:none;">{{ session('homeuser')->User_id }}</span>
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
</div>
<div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="/">
                <img src="{{ asset('admin/upload').'/'.'s_'.$net->Net_logo }}" alt="">
            </a>
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
                                    <i class="iconfont"></i>
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
                    <a class="link" href="" target="_blank">
                        <span class="text">服务</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a rel="nofollow" class="link" href="" target="_blank">
                        <span class="text">社区</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="J_navMenu" class="header-nav-menu" style="display: none;">
        <div class="container">
        </div>
    </div>
</div>
<div class="breadcrumbs">
    <div class="container">
        <a href="">首页</a><
        span class="sep">&gt;</span>
        <span>我的收藏夹</span>   
     </div>
</div>

<div class="page-main user-main">
    <div class="container">
        <div class="row">
            <div class="span4">
                <div class="uc-box uc-sub-box">
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">订单中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li>
                                    <a href="/home2/orderlist">我的订单</a>
                                </li>
                                <li>
                                    <a href="" data-count="comment" data-count-style="bracket" >评价晒单</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li>
                                    <a href="/home2/person" >我的个人中心</a>
                                </li>
                                <li class="active">
                                    <a href="/home2/cullect">喜欢的商品</a>
                                </li>
                                <li>
                                    <a href="/home2/address" >收货地址</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li>
                                    <a href="/home2/pinfo" target="_blank">个人信息</a>
                                </li>
                                <li>
                                    <a href="/home2/modify" target="_blank" >修改密码</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="span16">
                <div class="uc-box uc-main-box">
                    <div class="uc-content-box">
                        <div class="box-hd">
                            <h1 class="title">喜欢的商品</h1>
                            <div class="more clearfix hide">
                                <ul class="filter-list J_addrType">
                                    <li class="first active"><a href="">喜欢的商品</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="box-bd">
                        @if(session('msg'))
                            <div style="font-size:30px;color:green;">
                                {{ session('msg') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div style="font-size:30px;color:red;">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="xm-goods-list-wrap">
                            <ul class="xm-goods-list clearfix">
                                @foreach($data as $goods)
                                @foreach($goods as $v)
                                <li class="xm-goods-item">
                                <div class="figure figure-img">
                                    <a href="" target="_blank" >
                                        <img src="{{ url('Admin/upload').'/s_'.$v->Goods_pic }}">
                                    </a>
                                </div>
                                <h3 class="title">
                                    <a href="" target="_blank" > {{ $v->Goods_name }} &nbsp;&nbsp;{{ $v->Goods_body }}</a>
                                </h3>
                                <p class="price">
                                   {{ $v->Goods_price }} 元
                                </p> 
                                <p class="rank"> </p>
                                    <a id="1164400011_favorite" class="btn btn-small btn-line-gray J_delFav" href="/home2/cullect/del/{{ $v->Goods_id}}">删除</a>
                                    <a class="btn btn-small btn-primary" target="_blank" href="/detail/{{ $v->Goods_id }}">查看详情</a>
                                    @endforeach
                                    @endforeach 
                                </li>    
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" async="" src="{{ url('home/cullect/xmst.js') }}"></script><script src="{{ url('home/cullect/base.js') }}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: 'http://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: 'http://tp.hd.mi.com/',
        damiaoGoodsId:[],
        logoutUrl: 'http://order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    MI.updateMiniCart();
})();
</script>

<script type="text/javascript" src="{{ url('home/cullect/user.js') }}"></script>

<script type="text/javascript">
jQuery(function($) {
    $(".J_delFav").on("click", function () {
        return confirm("确定删除吗？");
    });
});
</script>

<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{ url('home/cullect/xmst.js') }}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection