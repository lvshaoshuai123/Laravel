@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{ asset('Home/buy/css/base.css') }}">
<link rel="stylesheet" type="text/css" href=" {{ asset('Home/buy/css/checkout.css') }}">
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo " href="" title="小米官网" data-stat-id="ac576a29202325c4"></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle">
            <h2>确认订单</h2>
        </div>
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
            <a rel="nofollow" class="user-name" href="">
                <span class="name">{{ session('homeuser')->User_name }}</span>
                <i class="iconfont"></i>
            </a>
            <ul class="user-menu">
                <li>
                    <a rel="nofollow" href="" target="_blank" data-stat-id="e0b9e1d1fa8052a2">个人中心
                    </a>
                </li>
                <li>
                    <a rel="nofollow" href="" target="_blank" data-stat-id="04dda61fe46ba720" >评价晒单</a>
                </li>
                <li>
                    <a rel="nofollow" href="" target="_blank" data-stat-id="8660c1b13ab1c56b" >我的喜欢</a>
                </li>
                <li>
                    <a rel="nofollow" href="" target="_blank" data-stat-id="6c2aba14bc7f649a" >小米账户</a>
                </li>
                <li>
                    <a rel="nofollow" href="" data-stat-id="7014141d5b446729">退出登录</a>
                </li>
            </ul>
                </span><span class="sep">|</span>
                <a rel="nofollow" class="link link-order" href="" target="_blank" data-stat-id="a9e9205e73f0742c">我的订单</a>
        </div>
    </div>
</div>
<!-- .site-mini-header END -->
<script type="text/javascript" async="" src="{{ asset('js/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('js/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('js/xmst.js') }}"></script>

<script type="text/javascript">
var checkoutConfig={
    addressMatch:'common',
    addressMatchVarName: new Function('return ' + 'data'),
    hasPresales:false,
    hasBigTv:false,
    hasAir:false,
    hasScales:false,
    hasWater:false,
    hasWater2:false,
    hasMobile:true,
    hasEboiler:false,
    hasEvent:false,
    hasGiftcard:false,
    totalPrice:1399.00,
    needPayAmount:1399,
    postage:10,//
    postFree:true,
    bcPrice:150,
    activityDiscountMoney:0.00,//活动优惠
    showCouponBox:0,
    showCaptcha:'0',
    invoice:[{"type":"electron","value":4,"desc":"\u7535\u5b50\u53d1\u7968","checked":true},{"type":"personal","value":1,"desc":"\u7eb8\u8d28\u53d1\u7968","checked":false}],
    quickOrder: '0',
    hasBigPro: false,
    onlinePayTips: '支持微信支付、支付宝、银联、财付通、小米钱包等',
    subsidyPrice: 0};
</script>
<div class="page-main">
    <div class="container">
        <div class="checkout-box">
            <div class="section section-address">
                <div class="section-header clearfix">
                    <h3 class="title">收货地址</h3>

                    <!--<div class="tip" style="color: #f00">普通商品1月26日-28日暂停发货，大家电1月26-31日暂停发货  <a href="https://cdn.cnbj0.fds.api.mi-img.com/b2c-data-mishop/da09f7ec70a6.html?2=&needValidHost=false&from=singlemessage&isappinstalled=1" target="_blank" > 了解详情&gt;</a></div>-->

                    <div class="more">
                    </div>
                </div>
                <div class="section-body clearfix" id="J_addressList">
                    @if($address->Address_default == 2)
                         <div class="address-item address-item-new" id="J_newAddress">
                            <dl>
                                <dt>{{ $address->Address_consignee }}
                                </dt>
                                <dd class="utel">{{ $address->Address_consignee_phone }}</dd>
                                <dd class="uaddress">{{ $address->Address_province }} {{ $address->Address_city }} {{ $address->Address_county }} <br>{{ $address->Address_detail }} 
                                </dd>
                            </dl>
                       
                    </div>
                    @endif   
                </div>
            </div>
            <div class="section section-options section-payment clearfix">
                <div class="section-header">
                    <h3 class="title">支付方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="J_optionList options ">
                        <li data-type="pay" class="J_option selected" data-value="1">
                            <span>
                            （支持微信支付、支付宝、银联、财付通、小米钱包等）</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section section-options section-shipment clearfix">
                <div class="section-header">
                    <h3 class="title">配送方式</h3>
                </div>
                <div class="section-body clearfix">
                    <ul class="clearfix J_optionList options ">
                        <li data-type="shipment" class="J_option selected" data-amount="0" data-value="1">
                            顺丰快递      
                        </li>
                    </ul>
                    <div class="service-self-tip" id="J_serviceSelfTip" style="display: none;">
                    </div>
                </div>
               
            </div>
            <div class="section section-goods">
                <div class="section-header clearfix">
                    <h3 class="title">商品</h3>
                    <div class="more">
                        <a href="">返回购物车<i class="iconfont"></i></a>
                    </div>
                </div>
                <div class="section-body">
                @foreach($goods as $g)
                
                    <ul class="goods-list" id="J_goodsList">
                        <li class="clearfix">
                            <div class="col col-img">
                                <img src="{{ url('Admin/upload'.'/s_'.$g->Goods_pic) }}" width="30" height="30">
                            </div>                          
                            <div class="col col-name"> 
                                {{ $g->Goods_body }}                                    
                                <div class="col col-price">
                                    <div style="float:left;margin-left:30px;">   
                                        {{ $g->Goods_name }}
                                    </div>
                                    {{ $g->Goods_price }} x {{ $shop->Shop_num }}
                                </div>
                                <div class="col col-total">
                                    {{ $shop->Shop_price }}
                                </div> 
                            </div>
                        </li>
                    </ul> 
                    @endforeach
                </div>
                <div class="section section-count clearfix">
                    <div class="count-actions">
                        <div class="ecard-box hide" id="J_ecardBox">
                            <div class="loading hide">
                                <div class="loader"></div>
                            </div>
                         </div>
                    </div>
                    <div class="coupon-trigger" id="J_useCoupon" style="margin-left:200px;dispaly:block;">
                        <img src="{{ url('Admin/upload') }}/default.jpg" height="200">
                    </div>
                    <div class="money-box" id="J_moneyBox">
                        <ul>
                            <li class="clearfix">
                                <label>商品件数：</label>
                                <span class="val">{{ $shop->Shop_num }}件</span>
                            </li>
                            <li class="clearfix">
                                <label>金额合计：</label>
                                <span class="val">{{ $shop->Shop_price }}元</span>
                            </li>   
                            <li class="clearfix total-price">
                                <label>应付总额：</label>
                                <span class="val"><em data-id="J_totalPrice">{{ $shop->Shop_price }}</em>元</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section-bar clearfix">
                    <div class="fl">
                        <div class="seleced-address hide" id="J_confirmAddress">
                        </div>
                        <div class="big-pro-tip hide J_confirmBigProTip">
                        </div>
                    </div>
                    <div class="fr">
                        <form action=" " method="post" name="myform">
                             {{ csrf_field() }}
                        </form>
                        <a href="javascript:doupd({{ $shop->Shop_id }});" class="btn btn-primary" id="J_checkoutToPay" >去结算</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    function doupd(id){
                //alert(id);
        if(confirm('确定付款吗？')){
            var form = document.myform;
            form.action = "{{ asset('home2/orderlist/inst')}}"+'/'+id;
            form.submit();
        }
    }
    </script>
    <!-- 禮品卡提示 S-->
    <div class="modal fade modal-hide modal-lipin" id="J_lipinTip">
        <div class="modal-header">
            <h3 class="title">温馨提示</h3>
        </div>
        <div class="modal-body">
            <p>
                为保障您的利益与安全，下单后礼品卡将会被使用，<br>
                且订单信息将不可修改。请确认收货信息：
            </p>
            <ul>
                <li class="clearfix">
                    <strong>收&nbsp;&nbsp;货&nbsp;&nbsp;人：</strong>
                    <span id="J_lipinUserName"></span>
                </li>
                <li class="clearfix">
                    <strong>联系电话：</strong>
                    <span id="J_lipinUserPhone"></span>
                </li>
                <li class="clearfix">
                    <strong>收货地址：</strong>
                    <span id="J_lipinUserAddress"></span>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0);" class="btn btn-primary" id="J_lipinSubmit" data-stat-id="8e19401adef46ba2">确认下单</a>
            <a href="javascript:void(0);" class="btn btn-gray" data-dismiss="modal" data-stat-id="28800888dda4eee0">返回修改</a>
        </div>
    </div>
    <!--  禮品卡提示 E-->
    <!-- 预售提示 S-->
    <div class="modal fade modal-hide modal-yushou" id="J_yushouTip">
        <div class="modal-header">
            <h3 class="title">请确认收货地址及发货时间</h3>
        </div>
        <div class="modal-body">
            <ul class="content">
                <li>
                    <h3>请确认配送地址，提交后不可变更：</h3>
                    <p id="J_yushouAddress"> </p>
                    <span class="icon icon-1"></span>
                </li>
                <li>
                    <h3>支付后发货</h3>
                    <p>如您随预售商品一起购买的商品，将与预售商品一起发货</p>
                    <span class="icon icon-2"></span>
                </li>
                <li>
                    <h3>以支付价格为准</h3>
                    <p>如预售产品发生调价，已支付订单价格将不受影响。</p>
                    <span class="icon icon-3"></span>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0);" class="btn btn-gray" data-dismiss="modal" data-stat-id="adbbe3abff3f506a" onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-adbbe3abff3f506a', 'javascript:void0', 'pcpid', '']);">返回修改地址</a>
            <a href="javascript:void(0);" class="btn btn-primary" id="J_yushouSubmit" data-stat-id="49b440ef95b2b913" onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-49b440ef95b2b913', 'javascript:void0', 'pcpid', '']);">确认并继续下单</a>
        </div>
    </div>
    <!--  预售提示 E-->
    <div class="modal fade modal-hide modal-edit-address" id="J_modalEditAddress">
        <div class="modal-body">
            <iframe allowfullscreen="" width="100%" height="100%" frameborder="0"></iframe>
        </div>
    </div>
    <div class="modal fade modal-hide fade modal-alert" id="J_modalAlert">
        <div class="modal-bd">
            <div class="text">
                <h3 id="J_alertMsg"></h3>
            </div>
            <div class="actions">
                <button class="btn btn-primary" data-dismiss="modal">确定</button>
            </div>
            <a class="close" data-dismiss="modal" href="javascript:%20void(0);" data-stat-id="b718c74de11bb9a0" onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-b718c74de11bb9a0', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a>
        </div>
    </div>
    <div class="address-top-bar" id="J_addressTopBar">
        <div class="container">
            <a href="javascript:void(0);" class="btn btn-primary" id="J_addressTopBarBtn" data-stat-id="0263b2497800ada5">选择该收货地址</a>
            <div class="content" id="J_addressTopCon">
                <span class="uname">名字</span><span class="utel">名字</span>
            </div>
        </div>
    </div>
    <div class="modal modal-warning modal-hide" id="warning-bargain-1463">
        <div class="modal-hd">
            <h2 class="title">温馨提示</h2>
            <a class="close" data-dismiss="modal" href="javascript:%20void(0);" data-stat-id="bdb508f1f15790d3" onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-bdb508f1f15790d3', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a>
        </div>
        <div class="modal-bd">
            <p>
                <b>换卡说明：</b>
                <br><br>移动2G / 3G卡升级为移动4G卡
                <br>传统SIM大卡换小米手机适配的micro卡
            </p>
        </div>
    </div>
    <div class="modal modal-warning modal-hide" id="warning-bargain-1464">
        <div class="modal-hd">
            <h2 class="title">温馨提示</h2>
            <a class="close" data-dismiss="modal" href="javascript:%20void(0);" data-stat-id="bdb508f1f15790d3" onclick="_msq.push(['trackEvent', '50d1f382fadafb8b-bdb508f1f15790d3', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a>
        </div>
        <div class="modal-bd">
            <p>
                <b>换卡说明：</b>
                <br><br>移动2G / 3G卡升级为移动4G卡
                <br>传统SIM大卡换小米手机适配的nano卡
            </p>
        </div>
    </div>
    <!-- 保险弹窗 -->
    <!-- 保险弹窗 -->
    <div class="modal in hide modal-baoxian" id="J_baoxian">
        <div class="modal-header">
            <h3>小米意外保障服务/小米意外损坏保险</h3>
            <span class="close" data-dismiss="modal">
                <i class="iconfont"></i>
            </span>
        </div>
        <div class="modal-body">
            <div class="con-1">
                <h4>购买保障服务/保险的设备在意外受损时可获得免费维修或换新</h4>
                <ul class="icon-list clearfix">
                    <li>
                        <span class="icon icon-1"></span>
                        屏幕碎裂免费换新屏
                    </li>
                    <li>
                        <span class="icon icon-2"></span>
                        进水、摔落免费修
                    </li>
                    <li>
                        <span class="icon icon-3"></span>
                        修好为止
                    </li>
                </ul>
                <dl class="xuzhi">
                    <dt>为保障您的权益，购买前请仔细阅读：</dt>
                    <dd>· 本保障服务/保险目前仅适用于有限的产品类型，不同产品的保障规则会有所差异，请以详细条款为准；</dd>
                    <dd>· 本保障服务/保险自您收到设备起，有效期为一年，若您在收到设备7日内取消保障服务/保险，请连同设备一起申请退货。</dd>
                    <dd>· 故意行为导致的设备损坏以及盗窃、抢劫、遗失设备等不在服务保障范围内（具体以详细条款为准）。<br>
                        <a href="" target="_blank" class="J_baoxianMore" data-stat-id="13d65618f9fdb846">阅读详细条款&gt;</a>
                    </dd>
                </dl>
            </div>
        </div>
        <div class="modal-footer clearfix">
            <p>
                <span class="J_baoxianAgree">
                    <i class="iconfont icon-checkbox">√</i> 我已经阅读并同意
                </span>《<a href="" target="_blank" class="J_baoxianMore" data-stat-id="7013efcb9afc718b">详细条款</a>》
            </p>
            <a class="btn btn-primary J_buyBaoxian" data-stat-id="ee4f02aededb8e5a" >
                <span class="num"></span>确认并购买
            </a>
            <a class="btn btn-gray" data-dismiss="modal" aria-hidden="true" data-stat-id="821a98207fa653c1" );">取消</a>
        </div>
    </div>
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
            damiaoSite: 'https://tp.hd.mi.com/',
            damiaoGoodsId:[],
            logoutUrl: 'http://order.mi.com/site/logout',
            staticSite: '//static.mi.com',
            quickLoginUrl: 'https://account.xiaomi.com/pass/static/login.html'
        };
        MI.setLoginInfo.orderUrl = MI.GLOBAL_CONFIG.orderSite + '/user/order';
        MI.setLoginInfo.logoutUrl = MI.GLOBAL_CONFIG.logoutUrl;
        MI.setLoginInfo.init(MI.GLOBAL_CONFIG);
        MI.miniCart.init();
        //MI.updateMiniCart();
    })();
    </script>
    <script type="text/javascript" src="js/checkout.js"></script>
    <script>
    var _msq = _msq || [];
    _msq.push(['setDomainId', 100]);
    _msq.push(['trackPageView']);
    (function() {
        var ms = document.createElement('script');
        ms.type = 'text/javascript';
        ms.async = true;
        ms.src = '//c1.mifile.cn/f/i/15/stat/js/xmst.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ms, s);
    })();
    </script>
@endsection