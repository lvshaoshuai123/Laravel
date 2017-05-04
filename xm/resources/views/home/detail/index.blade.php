@extends('home.base.parent')
@section('content')
<body>
    <link rel="shortcut icon" href="" type="image/x-icon">
    <link rel="icon" href="" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('home/detail/css/base.css')}}">
    <link rel="stylesheet" href="{{asset('home/detail/css/my.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/detail/css/product_buy.css')}}">
    <script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
    <script type="text/javascript" async="" src="{{asset('home/detail/js/unjcV2.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/detail/js/mstr.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/detail/js/jquery.js')}}"></script><script type="text/javascript" async="" src="{{asset('home/detail/js/xmst.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/home/detail/js/jquery-1.8.3.min.js') }}"></script>
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
            <span class="homeuser" style="display:none;">
                {{ session('homeuser')->User_id }}
            </span>
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
                                            <a class="link" href="/detail/{{ $v1->Goods_id}}">
                                                <img class="thumb" src="{{asset('admin/upload/').'/'.'s_'.$v1->Goods_pic}}" alt="" width="40" height="40">
                                                <span class="text">{{ $v1->Goods_name}}</span>
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
                                            <img src="{{ asset('admin/upload').'/'.'s_'.$v1->Goods_pic }}"  alt="小米手机5c" width="160" height="110">
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
<div id='nav'>
    <div>{{ $data->Goods_name }}</div>
        <ul class="box-right">
            <li style="cursor: pointer;">
                <a href="/evaluate/{{ $data->Goods_id }}">用户评价</a>
            </li>
        </ul>
</div>
<div id='nav2'>
    <div>{{ $data->Goods_name }}</div>
    <ul class="box-right">
        <li>
            <a href="/evaluate/{{ $data->Goods_id }}">用户评价</a>
        </li>
    </ul>
</div>
<script>
    $(window).scroll(function ()
    {
        var st = $(this).scrollTop();
        if(st>200){
            $('#nav2').slideDown();
        }else{
            $('#nav2').slideUp();
        }
    });
</script>
<div class="xm-buyBox" id="J_buyBox">
    <div class="box clearfix">
        @if(empty(session()->has('homeuser')))
        <div class="login-notic J_notic">
            <div class="container">
                为方便您购买，请提前登录 
                <a href="/home1/login" class="J_proLogin">立即登录</a>
                <a href="javascript:void(0);" class="iconfont J_proLoginClose"></a>
            </div>
        </div>
        @endif
        <div class="pro-choose-main container clearfix">
            <div style="float:left;" class="imge">
                <img src="{{asset('admin/upload').'/'.'s_'.$data->Goods_pic }}" alt="" style="width:560px;height:560px;">
                <ul style="list-style:none;text-align:center;color:#9C9C9C;" class="bottom-line">
                    <li>______</li>
                </ul>
            </div>
            <div class="pro-info span10">
                <h1 class="pro-title J_proName">{{ $data->Goods_name }}</h1>
                <p class="sale-desc" id="J_desc">
                    <font color="#ff4a00">【4月10日-30日，4GB+64GB版本】</font>{{  $data->Goods_body }} 
                </p>
                <!-- 选择第一级别 -->
                <span class="pro-price J_proPrice">{{ $data->Goods_price }}元</span>
                <div class="loading J_load hide">
                    <div class="loader"></div>
                </div>
                <div class="J_main">
                    <div class="J_addressWrap address-wrap hide">
                    </div>
                    <div class="list-wrap" id="J_list">
                        <div class="pro-choose pro-choose-col2 J_step" >
                            <div class="step-title">选择版本<span>MTK Helio X20 10核处理器 最高主频 2.1GHz，全网通 2.0</span> 
                            </div> 
                                <ul class="step-list step-one clearfix" id="cc">  
                                     <li class="btn btn-biglarge active2">
                                        <a class='edition'>
                                            <span class="name">{{ $data->Goods_edition}}</span>
                                            <span class="price"> {{ $data->Goods_price }}元</span>
                                        </a> 
                                    </li>
                                    <li class="btn btn-biglarge active1" style='display: none;float:right;'>收藏
                                    </li>
                                    @if(!empty(session()->has('homeuser')))
                                    <span style="display:none">{{ session('homeuser')->User_id }}
                                    </span>
                                    <div style="display:none">{{ $data->Goods_id }}</div>
                                @endif
                                </ul> 
                        </div>
                        <div class="pro-choose pro-choose-col2 J_step" data-index="1">
                        </div>
                    </div>
                    <div id="J_relation"></div>
                    <div class="pro-list" id="J_proList" >
                        <ul>  
                            <li class="totlePrice">总计：{{ $data->Goods_price }}元</li> 
                        </ul>
                    </div>
                    <ul class="btn-wrap clearfix" id="J_buyBtnBox">       
                        <li> 
                            <a href="/home2/cshop/{{ $data->Goods_id }}" class="btn btn-primary btn-biglarge J_proBuyBtn">加入购物车</a> 
                        </li>      
                    </ul>
                    <div class="pro-policy" id="J_policy">
                        <i class="iconfont support"></i>
                        <i class="iconfont nosupport hide"></i>
                        <span class="J_tips ">支持7天无理由退货</span>
                    </div>
                    <div class="J_addressWrap">
                        <div class="user-default-address" id="J_userDefaultAddress">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pro-infomation" id="J_proInfo"> 
            <div class="section "> 
                <img data-src="http://cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/635496d1f56a31b0173f4b4c504e8b8a.jpg" class="slider"> 
            </div> 
            <div class="section "> 
                <img data-src="http://cdn.cnbj0.fds.api.mi-img.com/b2c-mimall-media/dc1b76ea7388c7cb4dc47840125f7ec1.jpg" class="slider">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#cc').mouseover(function(){
        $(this).children('li[class="btn btn-biglarge active1"]').css('display','block');
        }).mouseout(function(){
        $(this).children('li[class="btn btn-biglarge active1"]').css('display','none');
    });
    $('.active1').click(function(){
        var uid = null;
        var gid = null;
        // alert($(this).text());
        if($('.homeuser').html()){
        if($(this).text()=='收藏'){
            $(this).html('已收藏');
            uid = $(this).siblings('span').html();
            gid = $(this).siblings('div').html();
            
             $.ajax({
            url:'/ajax/get',
            type:'get',
            async:true,
            data:{Cullect_gid:gid,Cullect_uid:uid},
            dataType:'json',
            success:function(data)
            {
                if(data){
                    $('.active1').css({color:'#FF6700',border:'1px solid #FF6700'});
                }
            },
            error:function()
            {
                alert('ajax请求失败');
            }
                });
                }else{
                    uid = $(this).siblings('span').html();
                    gid = $(this).siblings('div').html();
                    $.ajax({
                        url:'/jax/gt',
                        type:'get',
                        async:true,
                        data:{Cullect_gid:gid,Cullect_uid:uid},
                        dataType:'json',
                    success:function(data)
                    {
                    if(data){
                    $('.active1').css({color:'#E0E0E0',border:'1px solid #E0E0E0'});
                }

                },
                error:function()
                {
                    alert('ajax请求失败');
                }
                    });
                    $(this).html('收藏');
                    
                } 
                }else{
                    window.location.href ="/home1/login";
                } 
    });  
</script>
<script type="text/javascript">
$('.active2').toggle(function(){
    $(this).css('border','1px solid #ff6700');
    $('.name').css('color','#ff6700');   
},function(){
    $(this).css('border','1px solid #e0e0e0');
    $('.name').css('color','black');
});
</script>
<script src="{{asset('home/detail/js/base.js')}}"></script>
<script>
(function() {
    MI.namespace('GLOBAL_CONFIG');
    MI.GLOBAL_CONFIG = {
        orderSite: '//order.mi.com',
        wwwSite: '//www.mi.com',
        cartSite: '//cart.mi.com',
        itemSite: '//item.mi.com',
        assetsSite: '//s01.mifile.cn',
        listSite: '//list.mi.com',
        searchSite: '//search.mi.com',
        mySite: '//my.mi.com',
        damiaoSite: '//tp.hd.mi.com/',
        
damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2142400036","2163900015","2170800008","2171000055"],

        damiaoPresalesGoodsId:[],
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
<script src="{{asset('home/detail/js/xmsg_ti.js')}}"></script>
<script type="text/javascript" src="{{asset('home/detail/js/product_buy.js')}}"></script>
<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "//c1.mifile.cn/f/i/15/stat/js/xmst.js";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
@endsection