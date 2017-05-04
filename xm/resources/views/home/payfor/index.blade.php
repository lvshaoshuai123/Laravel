@extends('home.base.parent')
@section('content')
<body>
<link rel="stylesheet" href="{{ asset('Home/payfor/css/base.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('Home/payfor/css/pay-confirm.css') }}">
<script type="text/javascript" async="" src="{{ asset('Home/payfor/js/unjcV2.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('Home/payfor/js/mstr.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('Home/payfor/js/jquery.js') }}"></script>
<script type="text/javascript" async="" src="{{ asset('Home/payfor/js/xmst.js') }}"></script>
<script type="text/javascript">
</script>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class="logo " href="" title="大米官网" ></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle"><h2>支付订单</h2></div>
        <div class="topbar-info" id="J_userInfo"><span class="user"><a rel="nofollow" class="user-name" href="http://my.mi.com/portal" target="_blank" data-stat-id="249d537faf905cee" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-249d537faf905cee', '//my.mi.com/portal', 'pcpid', '']);"><span class="name">{{ session('homeuser')->User_name}}</span><i class="iconfont"></i></a><ul class="user-menu" style="display: none;"><li><a rel="nofollow" href="http://my.mi.com/portal" target="_blank" data-stat-id="e0b9e1d1fa8052a2" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-e0b9e1d1fa8052a2', '//my.mi.com/portal', 'pcpid', '']);">个人中心</a></li><li><a rel="nofollow" href="http://order.mi.com/user/comment" target="_blank" data-stat-id="04dda61fe46ba720" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-04dda61fe46ba720', 'http://order.mi.com/user/comment', 'pcpid', '']);">评价晒单</a></li><li><a rel="nofollow" href="http://order.mi.com/user/favorite" target="_blank" data-stat-id="8660c1b13ab1c56b" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-8660c1b13ab1c56b', 'http://order.mi.com/user/favorite', 'pcpid', '']);">我的喜欢</a></li><li><a rel="nofollow" href="http://account.xiaomi.com/" target="_blank" data-stat-id="6c2aba14bc7f649a" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-6c2aba14bc7f649a', 'http://account.xiaomi.com/', 'pcpid', '']);">小米账户</a></li><li><a rel="nofollow" href="http://order.mi.com/site/logout" data-stat-id="7014141d5b446729" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-7014141d5b446729', 'http://order.mi.com/site/logout', 'pcpid', '']);">退出登录</a></li></ul></span><span class="sep">|</span><a rel="nofollow" class="link link-order" href="/home2/orderlist">我的订单</a>
        <span class="sep">|</span><a rel="nofollow" class="link link-order" href="/home2/shop">我的购物车</a></div>

    </div>
</div>
<!-- .site-mini-header END -->
<script type="text/javascript">
var _confirmConfig = {
    order_id:'1170414789002310',
    safe_tel:'',
    goods_amount:'66988.00'
};
</script>

<div class="page-main">
    <div class="container confirm-box">
        <form target="_blank" action="#" id="J_payForm" method="post">
        <div class="section section-order">
            <div class="order-info clearfix">
                <div class="fl"> 
               

                    <h2 class="title">订单提交成功！去付款咯～</h2>
                    <p class="order-time" id="J_deliverDesc">预计5天内发货</p>
           
           
             
                    <p class="post-info" id="J_postInfo"> 

                        收货信息：
                        {{ $a->Address_consignee }}&nbsp;
                        {{ $a->Address_consignee_phone }} &nbsp;&nbsp;
                        {{ $a->Address_province }}&nbsp;&nbsp;{{ $a->Address_city }}&nbsp;&nbsp;
                        {{ $a->Address_county }}&nbsp;&nbsp;
                        {{ $a->Address_detail }}     
                    </p>
                </div>
            <div class="fr">
            <p class="total">
                应付总额：<span class="money"><em>
                {{ $ob->Orderlist_total }}</em>元</span>
            </p>
            <a href="javascript:void(0);" class="show-detail" id="J_showDetail" data-stat-id="f6ce11cebe4cd0c7" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-f6ce11cebe4cd0c7', 'javascript:void0', 'pcpid', '']);">订单详情<i class="iconfont"></i></a>
        </div>
    </div>
    <i class="iconfont icon-right">√</i>
    <div class="order-detail">
        <ul>
            <li class="clearfix">
                <div class="label">订单号：</div>
                    <div class="content">
                        <span class="order-num">
                             {{ $ob->Orderlist_od_number}}
                        </span>
                    </div>
            </li>
            <li class="clearfix">
                <div class="label">收货信息：</div>
                    <div class="content">    

                {{ $a->Address_consignee }}:
                {{ $a->Address_consignee_phone }} &nbsp;&nbsp;{{ $a->Address_province }}&nbsp;&nbsp;{{ $a->Address_city }}&nbsp;&nbsp;{{ $a->Address_county }}&nbsp;&nbsp;
                      {{ $a->Address_detail}}        
            </div> 
            
            </li>
            <li class="clearfix">
                <div class="label">商品名称：</div>
                <div class="content">
                    <br>{{ $ob->Orderlist_goodsname }}<br>             
                </div>
            </li>
        </ul>
    </div>
</div>
       
        
            
<div class="section section-payment">
    <div class="cash-title" id="J_cashTitle">
         选择以下支付方式付款
    </div>
    <div class="payment-box ">
        <div class="payment-header clearfix">
            <h3 class="title">支付平台</h3>
                <span class="desc"></span>
                <!-- <form id="my" action="{{ url('home1/orderlist') }}" method="post" name="myform">
                        {{ csrf_field()}}
                    <input type="hidden" value="{{ $ob->Orderlist_id }}">
                    </form> -->
        </div>
        <div class="payment-body">
            <ul class="clearfix payment-list J_paymentList J_linksign-customize">
                    <li id="J_weixin" >
                    <input  value="alipay" type="radio">
                    <a href="/home2/orderlist/updat/{{ $ob->Orderlist_id }}"><img src="{{ asset('Home/payfor/images/wechat0715.jpg') }}" alt="微信支付" style="margin-left: 0;"></a>
                </li>
<script type="text/javascript" src="{{ asset('Home/payfor/js/jquery-1.8.3.min.js') }}"></script>
<script type="text/javascript">
     $('#J_weixin').click(function(){
        alert('支付成功');
      // $('#my').submit();  
        });
</script>
                <li class="J_weixin" >
                    <input  value="alipay" type="radio"><img src="{{ asset('Home/payfor/images/alipay-0718-1.png') }}" alt="支付宝" style="margin-left: 0;">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="unionpay" value="unionpay" type="radio"> <img src="{{ asset('Home/payfor/images/unionpay.png') }}" alt="银联" style="margin-left: 0;">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="cft" value="cft" type="radio"> <img src="{{ asset('Home/payfor/images/cft.png') }}" alt="财付通" style="margin-left: 0;">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="micash" value="micash" type="radio"> <img src="{{ asset('Home/payfor/images/micash.png') }}" alt="小米钱包" style="margin-left: 0;">
                </li>    
            </ul>
        </div>
    </div>
    <div class="payment-box ">
        <div class="payment-header clearfix">
            <h3 class="title">银行借记卡及信用卡</h3>
        </div>
        <div class="payment-body">
            <ul class="clearfix payment-list payment-list-much J_paymentList J_linksign-customize">
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="CMB" value="CMB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zsyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="ICBCB2C" value="ICBCB2C" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gsyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="CCB" value="CCB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_jsyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="COMM" value="COMM" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_jtyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="ABC" value="ABC" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_nyyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="BOCB2C" value="BOCB2C" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zgyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="PSBC-DEBIT" value="PSBC-DEBIT" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_youzheng.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="GDB" value="GDB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gfyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="SPDB" value="SPDB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_pufa.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CEBBANK" value="CEBBANK" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gdyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CIB" value="CIB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_xyyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="CMBC" value="CMBC" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_msyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="CITIC" value="CITIC" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zxyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="SHBANK" value="SHBANK" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_shyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="BJRCB" value="BJRCB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_bjnsyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="NBBANK" value="NBBANK" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_nbyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="HZCBB2C" value="HZCBB2C" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_hzyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="SHRCB" value="SHRCB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_shnsyh.png') }}" alt="">
                </li>
                <li class="J_weixin hide">
                    <input name="payOnlineBank" id="FDB" value="FDB" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_fcyh.png') }}" alt="">
                </li>                            
                <li class="J_showMore">
                    <span class="text">查看更多</span>
                    <span class="text  hide">收起更多</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="payment-box payment-box-last ">
        <div class="payment-header clearfix">
            <h3 class="title">快捷支付</h3>
                <span class="desc">（支持以下各银行信用卡以及部分银行借记卡）</span>
        </div>
        <div class="payment-body">
            <ul class="clearfix payment-list  J_paymentList J_linksign-customize">
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CMB-KQ" value="CMB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zsyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="COMM-KQ" value="COMM-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_jtyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CCB-KQ" value="CCB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_jsyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="ICBCB2C-KQ" value="ICBCB2C-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gsyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CITIC-KQ" value="CITIC-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zxyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CEBBANK-KQ" value="CEBBANK-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gdyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="BOCB2C-KQ" value="BOCB2C-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_zgyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="SRCB-KQ" value="SRCB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_shncsyyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="JSB-KQ" value="JSB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_jiangsshuyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="CIB-KQ" value="CIB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_xyyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="ABC-KQ" value="ABC-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_nyyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="SPABANK-KQ" value="SPABANK-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_payh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="HXB-KQ" value="HXB-KQ" type="radio"><img src="{{ asset('Home/payfor/images/payOnline_hyyh.png') }}" alt="">
                </li>
                <li class="J_weixin">
                    <input name="payOnlineBank" id="GDB-KQ" value="GDB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_gfyh.png') }}" alt="">
                </li>
                <li class="J_weixin" >
                    <input name="payOnlineBank" id="BOB-KQ" value="BOB-KQ" type="radio"> <img src="{{ asset('Home/payfor/images/payOnline_bjyh.png') }}" alt="">
                </li>                        
            </ul>
        </div>
    </div>
</div>
</form>
</div>
</div>

<!--现金账户 提示框-->
<div class="modal  modal-hide modal-balance-pay" id="J_balancePay">
    <div class="modal-header">
        <h3>现金账户安全验证</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
    </div>
    <div class="modal-body">
        <p>
            为了确保您的购物安全<br>
            已向您当前的联系电话 <span class="num" id="J_cashPayPhone"></span>  发送验证码
        </p>
        <div class="form-section">
            <label class="input-label" for="verifycode">请输入验证码</label>
            <input class="input-text" id="verifycode" name="verifycode" type="text">
            <span class="btn btn-block hide" id="J_sendAgain"></span>
        </div>
        <div class="tip" id="J_checkCodeTip"></div>
    </div>
    <div class="modal-footer">
         <a class="btn btn-gray" data-dismiss="modal" href="javascript:void(0);" data-stat-id="c893774534c6180e" onclick="_msq.push(['trackEvent', '192fa45feb8511c1-c893774534c6180e', 'javascript:void0', 'pcpid', '']);">取消</a>
         <a class="btn btn-primary" id="J_checkCodeBtn" href="javascript:void(0);" >确认</a>
    </div>
</div>

<!-- 支付提示框 -->
<div class="modal fade modal-hide modal-pay-tip" id="J_payTip" aria-hidden="false">
    <div class="modal-header">
        <h3>正在支付...</h3>
        <a class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
    <div class="modal-body clearfix">
        <div class="success">
            <h4>支付成功了</h4>
            <p><a href="" >立即查看订单详情 &gt;</a></p>
        </div>
        <div class="fail">
            <h4>如果支付失败</h4>
            <p><a href="" target="_blank" >查看支付常见问题 &gt;</a></p>
        </div>
    </div>
</div>

<div class="modal modal-hide fade modal-alert" id="J_modalAlert">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg"></h3>
        </div>
        <div class="actions">
            <button class="btn btn-primary" data-dismiss="modal">确定</button>
        </div>
        <a class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
</div>

<div class="modal modal-hide fade modal-alipay" id="J_modalAlipay">
    <div class="modal-bd">
        <div class="loading"><div class="loader"></div></div>
        <iframe name="alipayQrcodeIframe" scrolling="no" width="100%" frameborder="0" height="100%"></iframe>
    </div>
    <a class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
</div>

<div class="modal modal-hide fade modal-weixin-pay" id="J_modalWeixinPay">
    <div class="modal-hd">
        <span class="title">微信支付</span>
        <a class="close" data-dismiss="modal" href="javascript:%20void(0);" ><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd" id="J_showWeixinPayExample">
        <div class="code" id="J_weixinPayCode">
            <div class="loading"><div class="loader"></div></div>
        </div>
        <div class="msg">
            请使用 <span>微信</span> 扫一扫<br>二维码完成支付
        </div>
    </div>
    <div class="example" id="J_weixinPayExample"></div>
</div>

<div class="deliver-beta hide" id="J_deliverBeta">
    <p>预计送达时间功能处于测试阶段，若您在下单时已选择“周末送货”或“工作日送货”，则会顺延至您要求的时间，如果发现预计送达时间不准确，期待您的反馈，我们会及时改进。</p>
    <a href="" target="_blank">问题反馈 &gt;</a>

    <i class="arrow arrow-a"></i>
    <i class="arrow arrow-b"></i>
</div>
<script type="text/javascript" src="{{ asset('Home/payfor/js/payConfirm.js') }}"></script>
<script src="{{ asset('Home/payfor/js/base.js') }}"></script>
@endsection