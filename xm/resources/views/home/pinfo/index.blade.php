<!-- 网站首页 继承了父模板-->
@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{url('/home/person/base.css') }}">
<link rel="stylesheet" type="text/css" href="{{ url('/home/person/main.css') }}">
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


<div class="breadcrumbs">
    <div class="container">
        <a href="" >首页</a><span class="sep">&gt;</span><span>个人中心</span>    </div>
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
                                <li><a href="/home2/orderlist">我的订单</a></li>
                                <li><a href="/home2/shop" data-count="comment" data-count-style="bracket" >购物车</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li class="active"><a href="/home1/pinfo">我的个人中心</a></li>
                                
                                <li><a href="/home2/cullect">喜欢的商品</a></li>
                             	<li><a href="/home2/address">收货地址</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">账户管理</h3>
                        </div>
                        <div class="box-bd">
                            <ul class="uc-nav-list">
                                <li><a href="/home2/pinfo" target="_blank">个人信息</a></li>
                                <li><a href="/home2/modify" target="_blank">修改密码</a></li>
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
<div class="span16">
    <div class="protal-content-update hide">
        <div class="protal-username">
            Hi, 1249847722        </div>
        <p class="msg">我们做了一个小升级：你的用户名可以直接修改啦，去换个酷炫的名字吧。<a href="https://account.xiaomi.com/pass/auth/profile/home" target="_blank" data-stat-id="a7bae9e996d7d321" onclick="_msq.push(['trackEvent', '45a270e10b1f8e93-a7bae9e996d7d321', 'https://account.xiaomi.com/pass/auth/profile/home', 'pcpid', '']);"> 立即前往&gt;</a></p>
    </div>
    <div class="uc-box uc-main-box">
        <div class="uc-content-box portal-content-box" > 
        <center>
            <div class="box-bd" style="margin-left:200px">
                <div class="portal-main clearfix">
                  
                    <div class="user-card">
                        <h2 class="username">{{ session()->get('homeuser')->User_name}}</h2>
                        <p class="tip">你好～</p>
                        <a class="link" href="/home2/pinfo" target="_blank">修改个人信息 &gt;</a>
                        <img class="avatar" src="{{ url('admin/upload').'/'.$ob->User_pic }}" alt="你说什么" width="150" height="150">
                    </div>
                
                </div>
            </center> 
                <div class="portal-sub">
                    <ul class="info-list clearfix">
                        <li>
                            <h3>待支付的订单</h3>
                            <a href="/home2/orderlist/state/0" >查看待支付订单<i class="iconfont"></i></a>
                            <img src="{{url('/Home/person/portal-icon-1.png') }}" alt="">
                        </li>
                        <li>
                            <h3>待收货的订单</h3>
                            <a href="/home2/orderlist/state/2" >查看待收货订单<i class="iconfont"></i></a>
                            <img src="{{ url('/Home/person/portal-icon-2.png') }}" alt="">
                        </li>
                        <li>
                            <h3>待评价商品数</h3>
                            <a href="/home2/orderlist/state/3" >查看待评价商品<i class="iconfont"></i></a>
                            <img src="{{ url('/Home/person/portal-icon-3.png') }}" alt="">
                        </li>
                        <li>
                            <h3>喜欢的商品</h3>
                            <a href="/home2/cullect" >查看喜欢的商品<i class="iconfont"></i></a>
                            <img src="{{ url('/Home/person/portal-icon-4.png') }}" alt="">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>        </div>
    </div>
</div>
<script type="text/javascript" async="" src="{{ url('/home/person/mstr_002.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/mstr_003.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/mstr_004.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/jquery.js') }}"></script>
<script type="text/javascript" async="" src="{{ url('/home/person/xmst.js') }}"></script>
<script src="{{url('/home/person/base.js') }}"></script>
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

<script type="text/javascript" src="{{ url('/home/person/user.js') }}"></script>

<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{ url('/home/person/xmst.js') }}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection