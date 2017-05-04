@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{asset('home/list/css/base.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('home/list/css/phone.css')}}">
<script type="text/javascript" async="" src="{{asset('home/list/js/unjcV2.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/list/js/mstr.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/list/js/jquery.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/list/js/xmst.js')}}"></script>
<script type="text/javascript" async="" src="{{asset('home/list/js/xiaomi.js')}}"></script>
<script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a rel="nofollow" href="">小米商城</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">MIUI</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">米聊</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">游戏</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">多看阅读</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="" target="_blank">云服务</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">金融</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">小米商城移动版</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">问题反馈</a>
            <span class="sep">|</span>
            <a rel="nofollow" href="">Select Region</a>
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
                                            <a class="btn btn-line-primary btn-small btn-buy" href="">选购
                                            </a>
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
    <div id="J_navMenu" class="header-nav-menu" style="display: none;">
        <div class="container"></div>
    </div>
</div>
<div class="page-main channel buyphone-channel">
    <div class="container breadcrumbs"> 
        <a href="/home1">首页</a>
        <span class="sep">/</span>选购{{ $data->GoodCate_name }}
    </div>
    <div class="container channel-nav">
        <ul class="clearfix">
            <li class="current">
                <a data-stat-id="37221d8e391cd561" onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-37221d8e391cd561', '', 'pcpid', '']);">选购{{ $data->GoodCate_name }}
                </a>
            </li>
            @foreach($goods as $v)
            @if($id==($v->Goods_type))
            <li class="hh" style="cursor: pointer;">
                <a href="/detail/{{ $v->Goods_id }}">{{ $v->Goods_name }}</a>
            </li>
            @endif
            @endforeach
        </ul>
        <ul class="clearfix J_more-box" style="display:none;width:100%;height:81px">
        </ul>
        <script type="text/javascript">
            $('.hh:eq(7)').html('<a style="color:#FF6709">查看全部<i class="iconfont"></i></a>').click(function(){
                $('ul[class="clearfix J_more-box"]').toggle();
            });
            $('.hh:gt(7)').appendTo('ul[class="clearfix J_more-box"]');
        </script>
    </div>
    <div class="container channel-list">
        <ul class="row clearfix">
        @foreach($goods as $v)
        @if($v->Goods_type  == $id)
            <li class="span10">
                <div class="channel-list-img">
                    <a href="/detail/{{ $v->Goods_id }}"><img src="{{asset('admin/upload').'/'.'s_'.$v->Goods_pic }}" height="360px" width="606px"></a>
                </div>
                <div class="channel-list-con clearfix">
                    <dl class="channel-list-des">
                        <dt>
                            {{ $v->Goods_name}} <b>{{ $v->Goods_price }}</b><span>元</span>
                        </dt>
                        <dd>
                            {{ $v->Goods_body }}                       
                        </dd>
                    </dl>
                    <p class="channel-list-btn">
                        <a href="/detail/{{$v->Goods_id}}" class="btn btn-line-primary">立即购买</a>
                    </p>
                </div>
            </li>
            @endif
            @endforeach 
        </ul>
    </div>
    <div class="channel-tips">
        <div class="section container">
                <img src="{{asset('home/list/img/phone-section-01.png')}}">
        </div>
        <div class="section container">
            <img src="{{asset('home/list/img/mi-mobile.jpg')}}" alt="" style="display:block">
        </div>
        <div class="section container"> 
            <img src="{{asset('home/list/img/phone-section-02.png')}}">
        </div>
        <div class="section container">
            <img src="{{asset('home/list/img/phone-section-04.jpg')}}">
        </div>
        <div class="container channel-acces">
            <dl class="channel-acces-des">
                <dt>搭配更多智能硬件产品</dt>
                <dd>
                    以小米手机为中心，控制智能硬件产品，轻松享受智能生活带来的方便和舒适。
                </dd>
            </dl>
            <ul class="channel-acces-list clearfix">
                @foreach($goods as $v)
                @if($v->Goods_type==3)
                <li class="channel-acces-list clearfix1">
                    <a href="/detail/{{ $v->Goods_id }}">
                        <img src="{{asset('admin/upload').'/'.'s_'.$v->Goods_pic}}" alt="{{ $v->Goods_name}}" width="220px" height="220px">
                    </a>
                    <dl>
                        <dt>
                            <a href="/detail/{{ $v->Goods_id }}">{{$v->Goods_name}}</a>
                            </dt>
                        <dd>
                            <a href="">{{ $v->Goods_body}}
                            </a>
                        </dd>
                        <dd class="price">{{ $v->Goods_price}}元</dd>
                    </dl>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
        <script type="text/javascript">
            $('li[class="channel-acces-list clearfix1"]:gt(5)').remove();
        </script>
        <div class="container channel-mihone">
            <div class="channel-mihone-des">
                <dl>
                    <dt>小米之家及官方授权维修网点</dt>
                    <dd>
                        欢迎来小米之家解决你遇到的问题，了解最新的小米官方产品最全面的产品信息，还有很多好玩的活动等你来访。<br>
                        你还可以前往小米授权维修网点解决售后问题，520家网点让服务随时在身边。
                    </dd>
                </dl>
                <p>
                    <a href="http://www.mi.com/c/xiaomizhijia/" class="btn btn-large btn-line-primary" data-stat-id="92bb525974bcde0e" onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-92bb525974bcde0e', '//www.mi.com/c/xiaomizhijia/', 'pcpid', '']);">小米之家</a>
                    <a href="http://www.mi.com/c/service/poststation/" class="btn btn-large btn-line-primary" data-stat-id="a684b74699138aae" onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-a684b74699138aae', '//www.mi.com/c/service/poststation/', 'pcpid', '']);">官方维修网点</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('home/list/js/base.js')}}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: '//order.mi.com',
        orderSSLSite: 'https://order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: '//tp.hd.mi.com/',
        
damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2164200006","2164200002","2164200001","2142400036","2164700002","2164200008","2164200012","2164600009","2163900015","2170600014","2170800008","2170700003","2170700002","2171000055","2164200004","2164200007","2170900019","2164200011"],

        logoutUrl: '//order.mi.com/site/logout',
        staticSite: '//static.mi.com',
        quickLoginUrl: 
'https://account.xiaomi.com/pass/static/login.html'
    };
    MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + 
'/user/order';
    MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
    MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
    MI.miniCart.init();
    MI.updateMiniCart();
})();
</script>
<script type="text/javascript">
$(".J_channel-more").on("click",function(){
        $(".J_more-box").toggle("fast");
    });
</script>
<script type="text/javascript">
$('#')
</script>
<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{asset('home/list/js/xmst.js')}}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();

</script>

@endsection