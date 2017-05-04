@extends('home.base.parent')
@section('content')
<body>
<meta name='csrf-token' content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('home/index/css/xiaomi.css') }}"/>
<link rel="stylesheet" href="{{asset('home/list/css/base.css')}}">
<script type="text/javascript" src="{{asset('/home/index/js/jquery-1.8.3.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('home/list/css/phone.css')}}">
    <script type="text/javascript" src="{{ asset('home/index/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('home/index/js/jquery.animate-colors-min.js') }}"></script>
    <div class="head_box">
        <div id="head_wrap">
            <div id="head_nav">
                <a class="head_nav_a">大米网</a>
                <span>|</span>
                <a class="head_nav_a">MIUI</a>
                <span>|</span>
                <a class="head_nav_a">米聊</a>
                <span>|</span>
                <a class="head_nav_a">游戏</a>
                <span>|</span>
                <a class="head_nav_a">多看阅读</a>
                <span>|</span>
                <a class="head_nav_a">云服务</a>
                <span>|</span>
                <a class="head_nav_a">大米移动版</a>
                <span>|</span>
                <a class="head_nav_a">问题反馈</a>
                <span>|</span>
                <a class="head_nav_a" id="Select_Region_but">Select Region</a>
            </div>
            <div id="head_right">
                <div id="head_right">
                <div id="head_landing">
                    @if(session()->has('homeuser'))
                        <script>
                            var a = "{{session()->get('homeuser')->User_name}}";
                            document.write(a);
                        </script>
                        <span>|</span>
                        <a class="head_nav_a" href="/home2/over">退出</a>
                        <span>|</span>
                        <a class="head_nav_a" href="/home2/person">个人资料</a>
                        <span>|</span>
                        <a class="head_nav_a" href="/home2/modify">修改密码</a>
                        <span>|</span>
                </div>
                <div id="head_car">
                        <a class="head_car_text" href='/home2/shop'>购物车( {{ count($row) }} )</a>
                        <div id="car_content" style="height: 0px;width:0px ;background-color: white;box-shadow:-5px 5px 5px;z-index: 999;display:none">
                            @if(count($shop)<1)
                            <p class="car_text" style="line-height:100px">购物车中没有商品，赶紧选购吧！
                            </p>
                             @else
                            <ul style="width:100%;margin-top:10px">
                                <li>
                                    <img src="{{asset('/admin/upload').'/'.'s_'.$shop->Shop_pic}}" alt="" height="80px" width="80px" style="float:left;display:inline;margin-left:20px;">
                                    <div style="line-height:50px;float:left;margin-left:20px;">{{ $shop->Shop_name }}</div>
                                    <div style="line-height:50px;">{{ $shop->Shop_price }}元</div>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    @else
                        <a class="head_nav_a" href="/home1/login">登陆</a>
                    <span>|</span>
                    <a class="head_nav_a" href="/home1/register">注册</a>
                    <span>|</span>
                    </div>
                    <div id="head_car">
                        <a class="head_car_text" href='/home1/login'>购物车( 0 )</a>
                        <div id="car_content" style="height: 0px;width:0px ;background-color: white;box-shadow:-5px 5px 5px;z-index: 999;display:none">
                            <p class="car_text" style="line-height:100px">购物车中没有商品，赶紧选购吧！
                            </p>
                        </div>
                        </div>
                    @endif
            </div>
        </div>
    </div>
    <div id="main_head_box">
        <div id="menu_wrap">
            <div id="menu_logo">
                <a href="/"><img src="{{ asset('admin/upload').'/'.'s_'.$net->Net_logo }}" width="56px" height="57px"></a>
            </div>
            <div id="menu_nav">
                <ul id="uu">
                    @foreach($goodcates as $v)
                     <li class="menu_li[]">
                        <a class="link" href=""  >
                            <span class="text">{{ $v->GoodCate_name }}</span>
                            <span class="arrow"></span>
                        </a>
                        <div id="menu_content_bg" class='menu_uu' style="width:100%;height:230px;display:none;left:0px;margin-top:10px;">
                                <ul style="top: 0px;" class="ab">
                                    @foreach($goods as $v1)
                                    @if($v->GoodCate_id==$v1->Goods_type)
                                    <li style='display:block'>
                                        <div class="menu_content">
                                            <img src="{{ asset('admin/upload').'/'.'s_'.$v1->Goods_pic }}" style="width:80px;height:80px;">
                                            <a href="/detail/{{ $v1->Goods_id }}">
                                            <p class="menu_content_tit" style="margin:10px auto 10px auto;">{{$v1->Goods_name}}
                                            </p>
                                            </a>
                                            <a href="/detail/{{ $v1->Goods_id }}">
                                            <p class="menu_content_price">{{ $v1->Goods_price}}元</p>
                                            </a>
                                        </div>
                                        <span class="menu_content_line"></span>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                        </div>
                    </li>
                    @endforeach
                    <li><a>服务</a></li>
                    <li><a>社区</a></li>
                </ul>
            </div>
            <form action='/search' method='get'>
            <input type='submit' class='btn' value='GO'>
                <div id="find_wrap">
                    <div id="find_bar">
                        <input type="text" id="find_input" name='Goods_name' value="">
                    </div>
                </div>
            </form>
            <script type="text/javascript">
                $('.btn').click(function(){
                    if(($('#find_input').val())=='')
                    {
                        return false;
                    }
                });
            </script>
        </div>
    </div>
    <div id="big_banner_wrap">
        <ul id="banner_menu_wrap">
            @foreach($list as $v1)
            @if($v1->GoodCate_fid==0)
            <li class="active">
                <a href="/list/{{ $v1->GoodCate_id }}">{{ $v1->GoodCate_name }}</a>
                <a class="banner_menu_i">&gt;</a>
                <div class="banner_menu_content" style="height: 450px; top: 0px; " id="banner_menu_content_a">
                    <ul class="banner_menu_content_ul" style="width:602px;height:452px">
                    @foreach($goods as $v)
                    @if(($v->Goods_type)==($v1->GoodCate_id))
                        <li>
                            <a href=""><img src="{{ asset('admin/upload').'/'.'s_'.$v->Goods_pic }}" width="40px"></a><a class="banner_menu_content_ul_a" href="/detail/{{ $v->Goods_id }}">{{ $v->Goods_name }}</a><span style="text-align:center;"><a href="/detail/{{ $v->Goods_id }}">选购</a></span>
                        </li>
                    @endif
                    @endforeach
                    </ul>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
        <script type="text/javascript">
            var w = 0;
            var j = 0;
            $('#banner_menu_wrap>li').each(function(){
                w = -(j*45)+'px';
                $(this).children(2).css("top",w);
                j++;
            });
        </script>
        <div id="big_banner_pic_wrap">
            <ul id="big_banner_pic">
             @foreach($carousel as $v)
                <li><img src="{{ asset('admin/upload').'/'.'s_'.$v->carousel_img }}" align="right" width='977px' height="460"></li>
            @endforeach
            </ul>
        </div>
        <div id="big_banner_change_wrap">
            <div id="big_banner_change_prev"> &lt;</div>
            <div id="big_banner_change_next">&gt;</div>
        </div>
    </div>
    <div id="head_other_wrap">
        <div id="head_other">
            <ul>
                <li>
                    <div id="div1">
                        <p>START</p>
                        <p>开房购买</p>
                    </div>
                </li>
                <li>
                    <div id="div2">
                        <p>GROUND</p>
                        <p>企业团购</p>
                    </div>
                </li>
                <li>
                    <div id="div3">
                        <p>RETROFIT</p>
                        <p>官方产品</p>
                    </div>
                </li>
                <li>
                    <div id="div4">
                        <p>CHANNEL</p>
                        <p>F码通道</p>
                    </div>
                </li>
                <li>
                    <div id="div5">
                        <p>RECHARGE</p>
                        <p>话费充值</p>
                    </div>
                </li>
                <li>
                    <div id="div6">
                        <p>SECURITY</p>
                        <p>防伪检查</p>
                    </div>
                </li>
            </ul>
        </div>
         <div class="head_other_ad"><img src="{{ asset('home/index/img/T184E_BQWT1RXrhCrK.jpg') }}"></div>
         <div class="head_other_ad"><img src="{{ asset('home/index/img/T1yvd_BQDT1RXrhCrK.jpg') }}"></div>
         <div class="head_other_ad"><img src="{{ asset('home/index/img/T1mahQBmKT1RXrhCrK.jpg') }}"></div>
    </div>
    <div id="head_hot_goods_wrap">
        <div id="head_hot_goods_title">
            <span class="title_span">大米明星单品</span>
            <div id="head_hot_goods_change">
                <span id="head_hot_goods_prave"><</span>
                <span id="head_hot_goods_next">></span>
            </div>
        </div>
        <div id="head_hot_goods_content">
            <ul>
                @foreach($goods as $v)
                @if($v->Goods_stock==1)
                <li>
                    <a href='/detail/{{ $v->Goods_id }}'><img src="{{ asset('admin/upload').'/'.'s_'.$v->Goods_pic }}" width="160px" height="160px"></a>
                    <a>{{ $v->Goods_name }}</a>
                    <a>{{ $v->Goods_body }}</a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
     </div>
    @foreach( $list as $v1)
    <div id="main_show_box" name="main_show_box">
        <div id="floor_1">
            <div id="floor_head">
                <span class="title_span">{{ $v1->GoodCate_name}}</span>
                <a class="more_span" href="/list/{{ $v1->GoodCate_id}}">查看更多</a>
            </div>
        </div>
        <div class="floor_goods_wrap">
            <ul>
                @if($v1->GoodCate_id==1)
                <li class="floor_goods_wrap_li_a">
                    <a href="">
                        <img src="{{ asset('admin/upload/s_T1IhLjBC_T1RXrhCrK.jpg')}}">
                    </a>
                </li>
                @endif
                @foreach( $goods as $v)
                @if($v->Goods_type==$v1->GoodCate_id)
                <li class="floor_goods_wrap_li">
                    <a class="floor_goods_img" href="/detail/{{ $v->Goods_id }}"><img src="{{ asset('admin/upload').'/'.'s_'.$v->Goods_pic }}" width="160px" height="160px"></a>
                    <a class="floor_goods_tit" href="/detail/{{ $v->Goods_id }}">{{  $v->Goods_name }}</a>
                    <a class="floor_goods_txt" >{{ $v->Goods_body }}</a>
                    <a class="floor_goods_price">{{ $v->Goods_price }}元</a>
                </li>
                @endif
                @endforeach
                <div style="clear:both;"></div>
            </ul>
        </div>
    </div>
    @endforeach
<script type="text/javascript">
    $("div[name='main_show_box']:gt(4)").remove();
</script>
<script type="text/javascript" src="{{ asset('home/index/js/xiaomi.js') }}"></script>
<script type="text/javascript">
    $('#uu').children().mouseover(function(){
        $(this).css("color","#ff6700");
        $(this).children('.menu_uu').css('display','block');
    }).mouseout(function(){
        $(this).css("color","#757575");
    });
    $(".menu_uu").mouseout(function(){
        $(".menu_uu").css("display","none");
    });
</script>
    @endsection