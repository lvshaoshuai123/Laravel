@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{ url('Home/orderlist/css/base.css') }}"/>
<link rel="stylesheet" href="{{ url('Home/orderlist/css/main.css') }}"/>
<script type="text/javascript" async="" src="{{ url('Home/orderlist/js/xmst.js')}}"></script><script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
<script type="text/javascript" async="" src="{{ asset('Home/orderlist/js/unjcV2.js') }}"></script><script type="text/javascript" async="" src="{{ asset('Home/orderlist/js/mstr.js') }}"></script><script type="text/javascript" async="" src="{{ asset('Home/orderlist/js/jquery.js') }}"></script>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<meta name='csrf-token' content="{{ csrf_token() }}">
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
            <a href="">小米商城</a><span class="sep">|</span><a href="">MIUI</a><span class="sep">|</span><a href="">米聊</a><span class="sep">|</span><a href="">游戏</a><span class="sep">|</span><a href="">多看阅读</a><span class="sep">|</span><a href="">云服务</a><span class="sep">|</span><a href="">金融</a><span class="sep">|</span><a href="">小米商城移动版</a><span class="sep">|</span><a href="">问题反馈</a><span class="sep">|</span><a href="">Select Region</a>
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
        <a href="/" >首页</a>
        <span class="sep">&gt;</span>
        <span>交易订单</span>
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
                            <ul class="uc-nav-list J_navList">
                                <li class="active"><a class="J_noRandom" href="/home2/orderlist">我的订单</a></li>
                        </div>
                    </div>
                    <div class="uc-nav-box">
                        <div class="box-hd">
                            <h3 class="title">个人中心</h3>
                        </div>
                        <div class="box-bd">
                            <ul id="J_orderNavList" class="uc-nav-list">
                                <li><a href="/home2/person" >我的个人中心</a></li>
                                <li><a href="/home2/shop" >购物车</a></li>
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
                <div class="uc-box uc-main-box">
                    <div class="uc-content-box order-list-box">
                        <div class="box-hd" id="box-hd">
                            <h1 class="title">我的订单</h1>
                             <form id="J_orderSearchForm" class="search-form clearfix" action="#" method="get">
                                    <label for="search" class="hide">站内搜索</label>
                                    <input class="search-text" id="J_orderSearchKeywords" name="keywords" autocomplete="off" placeholder="输入订单号" type="search">
                                    <input class="search-btn iconfont" value="" type="submit">
                                </form>
                            <div class="more clearfix">  
         @if(session('msg'))
            <div style="font-size:15px;color:green;">
            {{ session('msg') }}
            
            </div>
        @endif
        @if(session('error'))
            <div style="font-size:15px;color:red;" >
            {{ session('error') }}
            
            </div>
        @endif
                                <ul class="filter-list J_orderType">
                                    <li >
                                        <a id="b" href="/home2/orderlist" >全部有效订单</a>
                                    </li>
                                    <li class="">
                                        <a id="J_unpaidTab" href="/home2/orderlist/state/0" onclick="">待支付</a>
                                    </li>
                                    <li class="">
                                        <a id="J_sendTab" href="/home2/orderlist/state/1">待发货</a>
                                    </li>
                                    <li class="">
                                        <a id="J_sendTab" href="/home2/orderlist/state/2" >待收货</a>
                                    </li>
                                    <li class="">
                                        <a id="J_sendTab" href="/home2/orderlist/state/3" >待评价</a>
                                    </li>
                                    <li class="">
                                        <a id="J_sendTab" href="/home2/orderlist/state/4" >退货</a>
                                    </li>
                                    
                                </ul>
                               
                            </div>
                        </div>

                           @foreach($data as $v) 

                        <div class="box-bd">
                            <div id="J_orderList">
                                <ul class="order-list">
                                    <li id="c" class="uc-order-item uc-order-item-pay"> 
 
   
                
                 <!-- 遍历从数据库查出来的数据，生成div选项追加到li里 -->
                
         
                	
            <div id="orderlist_state" class="order-detail"> 
                 <div class="order-summary"> 
                    <div class="order-status">
                    @if($v->Orderlist_state == 0)
                    等待付款
                    @endif
                    <div class="order-status">
                    @if($v->Orderlist_state == 1)
                    等待发货
                    @endif
                    <div class="order-status">
                    @if($v->Orderlist_state == 2)
                    待收货
                    @endif
                    <div class="order-status">
                    @if($v->Orderlist_state == 3)
                    待评价
                    @endif
                    @if($v->Orderlist_state == 4)
                    正在退货
                    @endif
                    @if($v->Orderlist_state == 5)
                    退货成功
                    @endif

                    </div>  
                 </div> 
                 <table class="order-detail-table"> 
                    <thead><tr> 
                        <th class="col-main">
                           <p class="caption-info">{{ $v->Orderlist_ftime  }}<span class="sep">|</span>{{ $v->Orderlist_name }}<span class="sep">|</span>订单号： <a href="">{{ $v->Orderlist_od_number }}</a><span class="sep">
							
                           </span>
                           </p> 
                        </th> 
                        <th class="col-sub"> 
                            <p class="caption-price">订单金额：<span class="num">{{ $v->Orderlist_total }}</span>元</p>
                        </th> 
                    </tr></thead> 
                    <tbody><tr> 
                    	<td class="order-items"> 
                            <ul class="goods-list">  
                               <li> 
	       							 
	                                <p class="name">
	                                     <a target="_blank" href="">
                                          {{ $v->Goods_body }}   
                                         </a>
	                                </p>
	                                <p class="price">{{ $v->Orderlist_price }} 元 ×  {{ $v->Orderlist_goodsnum }} </p> 
                                </li>  
                            </ul> 
                        </td> 
                        
                        <td class="order-actions">
                             @if($v->Orderlist_state != 3)
                            <a class="btn btn-small btn-primary" href="/home2/orderdetail/{{ $v->Orderlist_id}}" target="_blank">订单详情</a> 
                             @endif
                             @if($v->Orderlist_state == 3)
                            <a class="btn btn-small btn-primary" href="/evaluate/{{ $v->Orderlist_goodsid}}" target="_blank">去评价</a> 
                             @endif
                                 
                        </td> 
                      
                    </tr> </tbody> 
                </table> 
             </div>
          </li>
        </ul>
     </div>
   </div>
   @endforeach
        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ url('Home/orderlist/js/jquery-1.8.3.min.js')}}"></script>
<script type="text/javascript">
	
		$('li a').click(function()
			{ 
				var list = $('li>a').attr('style','color:red');
				list.attr('style','color:');
				$(this).attr('style','color:red');
				$(this>'#ordercount').attr('style','display:block');
				$(this>'#ordercount').attr('style','color:red');
				
				// for(i = 0;i<data.length;i++){
				// 	alert(data.length);
				// }
				
			});
</script>
<script type="text/javascript">
			// $('#ordercount').click(function(){	
			// 	$(this).attr('style','display:block');
			// 	$(this).attr('style','color:red');
			// });
</script>

<div class="deliver-beta hide" id="J_deliverBeta">
    <p>预计送达时间功能处于测试阶段，若您在下单时已选择“周末送货”或“工作日送货”，则会顺延至您要求的时间，如果发现预计送达时间不准确，期待您的反馈，我们会及时改进。</p>
    <a href="http://static.mi.com/feedback/" target="_blank" data-stat-id="170c9b99b0391e09" onclick="_msq.push(['trackEvent', '5eab40056fa03ac0-170c9b99b0391e09', '//static.mi.com/feedback/', 'pcpid', '']);">问题反馈 &gt;</a>
    <i class="arrow arrow-a"></i>
    <i class="arrow arrow-b"></i>
</div>
@endsection