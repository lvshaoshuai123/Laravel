@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{ asset('/Home/address/css/base.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/Home/address/css/main.css') }}">
<script type="text/javascript" async="" src="{{ asset('Home/address/js/xmst.js') }}"></script>
<script src="{{ asset('Home/address/js/userInfoJsonP.htm') }}" type="text/javascript" async=""></script>
<script type="text/javascript" async="" src="{{ asset('Home/address/Hjs/xmst.js')}}"></script>
<script type="text/javascript" src="{{ asset('Home/address/js/jquery-1.8.3.min.js') }}"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script type="text/javascript" async="" src="{{ asset('Home/address/js/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('Home/address/js/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('Home/address/js/jquery.js') }}"></script>
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
<div id="J_navMenu" class="header-nav-menu" style="display: none;"><div class="container"></div>
</div>
</div>
<div class="breadcrumbs">
    <div class="container">
        <a href="/" data-stat-id="b0bcd814768c68cc" >首页</a>
            <span class="sep">&gt;</span><span>收货地址</span>   
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
                                    <a href="/home2/orderlist" data-stat-id="8f3d1bffd166dc22">我的订单</a>
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
                                    <a href="/home2/person" data-stat-id="00e076c95d370478" >我的个人中心</a>
                                </li>
                                 <ul class="uc-nav-list">
                                <li>
                                    <a href="/home2/shop">购物车</a>
                                </li>
                              
                                <li>
                                    <a href="/home2/cullect" data-stat-id="0c25ea23fee92211"\">喜欢的商品</a>
                                </li>
                                <li class="active">
                                    <a href="/home2/address" data-stat-id="48ecd23c6e6e50ba">收货地址</a>
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
                                    <a href="/home2/pinfo">个人信息</a>
                                </li>
                                <li>
                                    <a href="/home2/modify">修改密码</a>
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
                            <h1 class="title">收货地址</h1>
                            @if(session('msg'))
                            <div style="font-size:20px;color:red;background:#fff;">
                                <center>
                                {{ session('msg') }}
                                </center>
                            </div>
                            @endif
                        </div>
                        <div class="box-bd">
                            <form action="/home2/address" method="post" name="myform">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            </form>
                        <div class="user-address-list J_addressList clearfix">
                        @foreach($ob as $v)
                            <div class="address-item J_addressItem">
                                <dl>
                                    <dt>{{ $v->Address_consignee }}
                                    </dt>
                                <dd class="utel">{{ $v->Address_consignee_phone }}</dd>
                                <dd class="uaddress">{{ $v->Address_province }} {{ $v->Address_city }} {{ $v->Address_county }} <br>{{ $v->Address_detail }} </dd>
                                </dl>
                                <div class="actions">
                                <!--   <a class="modify J_addressModify" id="edit-addr" href="javascript:void(0);">修改</a> -->  
                                    <form action="" method="post" >
                                    {{ csrf_field() }}

                                    </form>
                                    <script type="text/javascript">
                                    </script>
                                    @if($v->Address_default == 1)
                                    <a class="modify J_addressDel" href="/home2/address/defaut/{{ $v->Address_id }}">
                                    设为默认地址
                                    </a> 
                                    @endif
                                    @if($v->Address_default == 2)
                                    <a class="modify J_addressDel" href="/home2/address/fal/{{ $v->Address_id }}">取消默认地址</a> 
                                    @endif

                                    <a class="modify J_addressDel" href="/home2/address/{{ $v->Address_id }}/edit">修改</a> 
                                    @if($v->Address_default == 1)
                                    <a class="modify J_addressDel" href="javascript:doDel({{$v->Address_id}})">删除</a>
                                    @endif 
                                </div>
                            </div>
                            @endforeach
                            <script type="text/javascript">
                            function doDel(id){
                            //alert(id);
                            if(confirm('确定删除吗？')){
                            var form = document.myform;
                            form.action = '/home2/address/'+id;
                            form.submit();
                            }
                            }
                            </script>
                            <div class="address-item address-item-new" data-type="" id="J_newAddress">
                                <i class="iconfont" id="icon"></i>
                                添加新地址
                            </div>
                            <script>
                            </script>
                        </div>

                        <div id="address_form" style="width:300px;display:none;background:#f5f5f5;border:1px solid #e0e0e0;">                        
                            <div style="background:#f5f5f5;border:1px solid #e0e0e0;width:270px;">
                            <!--遮罩层form表单-->
                                <div style="width:280px;margin-left:20px;margin-top:5px;">  
                                    <form action="" method="post">
                                        {{ csrf_field() }}
                                        <div style="width:250px;margin-left:7px;margin-bottom:5px;">
                                        姓&nbsp;&nbsp;&nbsp;名:<input id="user_name" name="Address_consignee" placeholder="收货人姓名" type="text">
                                        </div>
                                <div style="width:250px;margin-left:5px;margin-bottom:5px;">
                                手机号:
                                    <input  id="user_phone" name="Address_consignee_phone" placeholder="11位手机号" type="text">
                                </div>
                                <div style="width:250px;margin-left:5px;margin-bottom:5px;">
                                请选择:
                                    <select id='cid' name='city[]' style="width:162px;">
                                        <option>--请选择--</option>
                                    </select>
                                </div>
                            <div>
                                <div style="width:220px;margin-bottom:5px;margin-right:10px;">
                                    <center style="font-size:15px;" >
                                您的收货地址需要补全详细地址:          
                                    </center>
                                </div>
                                <div style="margin-bottom:5px;">
                                    <textarea name="Address_detail" style="width:220px;height:100px;resize:none;">
                                    </textarea>
                                </div>
                            </div>
                                <div style="margin-left:0px;margin-bottom:5px;">
                                    <button id="A_save" style="margin-left:3px;width:100px;background:#f67000">保存</button>
                                    <button id="A_cancel" style="margin-left:15px;width:100px;background:#b0b0b0;">取消</button>
                                </div> 
                            </form>
                                    </div>
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="J_modalEditAddress" class="modal fade modal-hide modal-edit-address">
                <div class="modal-body">
                    <iframe width="100%" frameborder="0" height="100%"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.iconfont').click(function(){
      $('#address_form').attr('style','display:block');
        $.ajax({
            url:'{{ url("city.php") }}',
            type:'post',
            async:true,
            data:{upid:0,'_token':'{csrf_field()}'},
            dataType:'json',
            success:function(data)
            {
              //alert(data);
              //遍历从数据库查出来的数据，生成option选项追加到select里
              for (var i = 0; i < data.length; i++) {
                $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
              };
            },
            error:function()
            {
              alert('ajax请求失败');
            }
          });

          //给所有的select标签绑定change事件
          $('select').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $(this).nextAll('select').remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '--请选择--'){
              //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
              var ob = $(this);
              $.ajax({
                url:'{{ url("city.php") }}',
                type:'post',
                async:true,
                data:{upid:$(this).val(),'_token':'{csrf_field()}'},
                dataType:'json',
                success:function(data)
                        {
                            // console.log(data);
                            //判断是不是最后一级城市，最后一级城市查数据库length==0
                            if(data.length>0){
                                //生成一个新的select标签
                                var select = $("<select name='city[]'><option>--请选择--</option></select>");
                                //遍历从数据库查出来的数据，生成option选项追加到select里
                                for (var i = 0; i < data.length; i++) {
                                    $(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
                                };
                                //外部插入到前一个selct后面
                                ob.after(select);
                            }
                        },
                error:function()
                {
                  alert('ajax请求失败');
                }
              });
            }
          });
      });
    $('#A_save').click(function(){
      $('#address_form').attr('style','display:none');
    });
    $('#A_cancel').click(function(){
      $('#address_form').attr('style','display:none');
      return false;
    });
</script>

<script type="text/javascript">     
</script>
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
<script type="text/javascript" src="{{ asset('Home/address/js/address.js') }}"></script>
<script type="text/javascript" src="{{ asset('Home/address/js/user.js') }}"></script>
<script>
    var _msq = _msq || [];
    _msq.push(['setDomainId', 100]);
    _msq.push(['trackPageView']);
    (function() {
        var ms = document.createElement('script');
        ms.type = 'text/javascript';
        ms.async = true;
        ms.src = "{{ asset('Home/address/js/xmst.js') }}";
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ms, s);
    })();
</script>
@endsection