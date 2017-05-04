<!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/mstr_004.js') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/mstr_002.js') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/mstr_003.js') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/unjcV2.js') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/mstr.js') }}"></script><script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/jquery.js') }}"></script>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>我的购物车-小米商城</title>
<meta name="viewport" content="width=1226">
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{ asset('/Home/kshop/css/base.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('/Home/kshop/css/cart.css') }}">
<script type="text/javascript" async="" src="{{ asset('/Home/kshop/js/xmst.js') }}"></script><script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a  href="http://www.mi.com/index.html" title="小米官网" data-stat-id="f4006c1551f77f22" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f4006c1551f77f22', '//www.mi.com/index.html', 'pcpid', '']);"><img src="{{ url('/Home/kshop/img/logo.png') }}" alt=""></a>
        </div>
        <div class="header-title" id="J_miniHeaderTitle">
            <h2>我的购物车</h2>
        </div>
        <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a rel="nofollow" class="user-name" href="/home2/person">
                    <span class="name">
                        <script>
                            var a = "{{session()->get('homeuser')->User_name}}";
                            document.write(a);
                        </script>
                    </span>
                    <!-- <i class="iconfont"></i> -->
                </a>
            </span>
            <span class="sep">|</span>
            <a rel="nofollow" class="link link-order" href="/home2/orderlist">我的订单</a>
        </div>
    </div>
</div>

<div class="page-main">

    <div class="container">
        <div class="cart-loading loading hide" id="J_cartLoading">
            <div class="loader"></div>
        </div>
        <div class="cart-empty" id="J_cartEmpty">
            <h2>您的购物车还是空的！</h2>
            <p class="login-desc">登录后将显示您之前加入的商品</p>
            <a href="#" class="btn btn-primary btn-login" id="J_loginBtn" data-stat-id="7874490dbcbc1e60" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-7874490dbcbc1e60', '#', 'pcpid', '']);">立即登录</a>
            <a href="/" class="btn btn-primary btn-shoping J_goShoping" data-stat-id="4658a7dfd89505fc" onclick="">马上去购物</a>
        </div>
        <div id="J_cartBox" class="hide">
            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-check"><i class="iconfont icon-checkbox icon-checkbox-selected" id="J_selectAll">√</i>全选</div>
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">   <div class="item-box"> <div class="item-table J_cartGoods" data-info="{ commodity_id:'1160800070', gettype:'buy', itemid:'2160800025_0_buy', num:'1'} "> <div class="item-row clearfix"> <div class="col col-check">  <i class="iconfont icon-checkbox icon-checkbox-selected J_itemCheckbox" data-itemid="2160800025_0_buy" data-status="1">√</i>  </div> <div class="col col-img">  <a href="http://item.mi.com/1160800070.html" target="_blank" data-stat-id="3aa33dc9604a49b8" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-3aa33dc9604a49b8', '//item.mi.com/1160800070.html', 'pcpid', '']);"> <img alt="" src="{{ asset('/Home/kshop/') }}/T1V.jpg" width="80" height="80"> </a>  </div> <div class="col col-name">  <div class="tags">   </div>  <h3 class="name">  <a href="http://item.mi.com/1160800070.html" target="_blank" data-stat-id="fbfc100ebb9d191f" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-fbfc100ebb9d191f', '//item.mi.com/1160800070.html', 'pcpid', '']);"> 小米电视3S 曲面 65英寸 </a>  </h3>      </div> <div class="col col-price"> 8999元 </div> <div class="col col-num">  <div class="change-goods-num clearfix J_changeGoodsNum"> <a href="javascript:void(0)" class="J_minus" data-stat-id="26b2003c8e913d6b" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-26b2003c8e913d6b', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a> <input tyep="text" name="2160800025_0_buy" value="1" data-num="1" data-buylimit="1" autocomplete="off" class="goods-num J_goodsNum"> <a href="javascript:void(0)" class="J_plus" data-stat-id="9e5e72fc18c18022" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9e5e72fc18c18022', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a>  </div>  </div> <div class="col col-total"> 8999元 <p class="pre-info">  </p> </div> <div class="col col-action"> <a id="2160800025_0_buy" data-msg="确定删除吗？" href="javascript:void(0);" title="删除" class="del J_delGoods" data-stat-id="5b1e31a52befa8ca" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-5b1e31a52befa8ca', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a> </div> </div> </div>     <div class="item-sub-box">   <div class="extend-buy J_raiseBuyItem" data-info="{ isBatch:'false', productId:'2160300025', goodsId:'2160300025-0-1-2888', bargainId:'8888888_0_bargain_2888_per_1_sale', actId:'2888', type:'1', num: 1, maxnum: 1 }">  <i class="iconfont icon-plus"></i>小米电视会员年卡（赠爱奇艺PC、移动端会员权益） 券 <span style="color:#ff6700">随新机优惠价199元（原价498元）</span>  </div>   </div>      </div>      </div>
            </div>
            <!-- 加价购 -->
            <div class="raise-buy-box" id="J_raiseBuyBox">     <div class="item  J_raiseBuyItem" data-info="{ isBatch:'true', productId:'2165100001', goodsId:'2165100001-0-1-2908', bargainId:'8888888_0_bargain_2908_per_1_sale', actId:'2908', type:'1', num:1, maxnum:1 }">  <i class="iconfont icon-plus"></i>+25元得小米活塞耳机 清新版  </div>     <div class="item  J_raiseBuyItem" data-info="{ isBatch:'true', productId:'2164700010', goodsId:'2164700010-0-1-2974', bargainId:'8888888_0_bargain_2974_per_1_sale', actId:'2974', type:'1', num:1, maxnum:1 }">  <i class="iconfont icon-plus"></i>+18元得最生活毛巾·青春系列  </div>     <div class="item  J_raiseBuyItem" data-info="{ isBatch:'true', productId:'2163900008', goodsId:'2163900008-0-1-2975', bargainId:'8888888_0_bargain_2975_per_1_sale', actId:'2975', type:'1', num:1, maxnum:1 }">  <i class="iconfont icon-plus"></i>+79元得10000mAh小米移动电源2  </div> </div>

            <div class="cart-bar clearfix" id="J_cartBar">
                <div class="section-left">
                    <a href="http://list.mi.com/0" class="back-shopping J_goShoping" data-stat-id="2e6e02113fe6d236" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2e6e02113fe6d236', '//list.mi.com/0', 'pcpid', '']);">继续购物</a>
                    <span class="cart-total">共 <i id="J_cartTotalNum">1</i> 件商品，已选择 <i id="J_selTotalNum">1</i> 件</span>
                    <span class="cart-coudan hide" id="J_coudanTip">
                        ，还需 <i id="J_postFreeBalance"></i> 元即可免邮费  <a href="javascript:void(0);" id="J_showCoudan" data-stat-id="69b06f1a9d2d512c" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-69b06f1a9d2d512c', 'javascript:void0', 'pcpid', '']);">立即凑单</a>
                    </span>
                </div>
                <span class="activity-money hide">
                    活动优惠：减 <i id="J_cartActivityMoney">0</i> 元
                </span>
                <span class="total-price">
                    合计（不含运费）：<em id="J_cartTotalPrice">8999.00</em>元
                </span>
                <a href="javascript:void(0);" class="btn btn-a btn btn-primary" id="J_goCheckout" data-stat-id="a4887072ccf6c1d5" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-a4887072ccf6c1d5', 'javascript:void0', 'pcpid', '']);">去结算</a>

                <div class="no-select-tip hide" id="J_noSelectTip">
                    请勾选需要结算的商品
                    <i class="arrow arrow-a"></i>
                    <i class="arrow arrow-b"></i>
                </div>
            </div>
        </div>
        
        <div class="cart-recommend container" id="J_historyRecommend"><h2 class="xm-recommend-title"><span>探索黑科技，小米为发烧而生</span></h2></div>

        <div class="cart-recommend" id="J_miHistoryBox"></div>
    </div>
</div>

<!-- 请求网络不正确的遮罩 -->

<!-- <div class="modal fade modal-hide  modal-alert" id="J_modalAlert" style="display: none;" aria-hidden="true">
    <div class="modal-bd">
        <div class="text">
            <h3 id="J_alertMsg"></h3>
        </div>
        <div class="actions">
            <button class="btn btn-gray" data-dismiss="modal" id="J_alertCancel">取消</button>
            <button class="btn btn-primary" data-dismiss="modal" id="J_alertOk">确定</button>
        </div>
        <a class="close" data-dismiss="modal" href="javascript:%20void(0);" data-stat-id="9cce544f88fddc4d" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9cce544f88fddc4d', 'javascript:void0', 'pcpid', '']);"><i class="iconfont"></i></a>
    </div>
</div> -->

<div class="modal fade in modal-hide modal-baoxian" id="J_baoxian">
    <div class="modal-header">
        <h3>小米意外保障服务/小米意外损坏保险</h3>
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
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
                    <a href="http://cart.mi.com/static/insuranceAgreement.php?type=" target="_blank" class="J_baoxianMore" data-stat-id="2350385c59f2d1f6" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2350385c59f2d1f6', '//cart.mi.com/static/insuranceAgreement.php', 'pcpid', '']);">阅读详细条款&gt;</a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="modal-footer clearfix">
        <p>
            <span class="J_baoxianAgree"><i class="iconfont icon-checkbox">√</i> 我已经阅读并同意</span>《<a href="http://cart.mi.com/static/insuranceAgreement.php?type=" target="_blank" class="J_baoxianMore" data-stat-id="c6f6faa9995d9b8c" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c6f6faa9995d9b8c', '//cart.mi.com/static/insuranceAgreement.php', 'pcpid', '']);">详细条款</a>》
        </p>
        <a class="btn btn-primary J_buyBaoxian" data-stat-id="2bbe651cec64351c" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2bbe651cec64351c', '', 'pcpid', '']);">确认并购买<span class="num"></span></a>
    </div>
</div>


<!-- 电视挂架弹窗 -->

<!-- 净水器或水龙头安装服务 -->

<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a rel="nofollow" href="http://www.mi.com/static/fast/" target="_blank" data-stat-id="46873828b7b782f4" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-46873828b7b782f4', '//www.mi.com/static/fast/', 'pcpid', '']);"><i class="iconfont"></i>预约维修服务</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-78babcae8a619e26', '//www.mi.com/service/exchange#back', 'pcpid', '']);"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d1745f68f8d2dad7', '//www.mi.com/service/exchange#free', 'pcpid', '']);"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f1b5c2451cf73123', '//www.mi.com/service/exchange#mail', 'pcpid', '']);"><i class="iconfont"></i>满150元包邮</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="b57397dd7ad77a31" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b57397dd7ad77a31', '//www.mi.com/static/maintainlocation/', 'pcpid', '']);"><i class="iconfont"></i>520余家售后网点</a></li>
                        </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/account/register/" target="_blank" data-stat-id="e5dad0738a41014f" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-e5dad0738a41014f', '//www.mi.com/service/account/register/', 'pcpid', '']);">账户管理</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/buy/buytime/" target="_blank" data-stat-id="8e128f473e680197" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-8e128f473e680197', '//www.mi.com/service/buy/buytime/', 'pcpid', '']);">购物指南</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/order/sendprogress/" target="_blank" data-stat-id="fd9e3532f60a2f8d" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-fd9e3532f60a2f8d', '//www.mi.com/service/order/sendprogress/', 'pcpid', '']);">订单操作</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/exchange" target="_blank" data-stat-id="8e282b6f669ba990" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-8e282b6f669ba990', '//www.mi.com/service/exchange', 'pcpid', '']);">售后政策</a></dd>
                
                <dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank" data-stat-id="5f2408ab3c808aa2" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-5f2408ab3c808aa2', 'http://fuwu.mi.com/', 'pcpid', '']);">自助服务</a></dd>
                
                <dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank" data-stat-id="18c340c920a278a1" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-18c340c920a278a1', 'http://xiazai.mi.com/', 'pcpid', '']);">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>线下门店</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/" target="_blank" data-stat-id="b27b566974e4aa67" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b27b566974e4aa67', '//www.mi.com/c/xiaomizhijia/', 'pcpid', '']);">小米之家</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/static/maintainlocation/" target="_blank" data-stat-id="6dab396f7a873f15" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6dab396f7a873f15', '//www.mi.com/static/maintainlocation/', 'pcpid', '']);">服务网点</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/static/familyLocation/" target="_blank" data-stat-id="9af5efe014c3aea2" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9af5efe014c3aea2', '//www.mi.com/static/familyLocation/', 'pcpid', '']);">零售网点</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about" target="_blank" data-stat-id="f6d386c65b1f4132" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f6d386c65b1f4132', '//www.mi.com/about', 'pcpid', '']);">了解小米</a></dd>
                
                <dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank" data-stat-id="4307a445f5592adb" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4307a445f5592adb', 'http://hr.xiaomi.com/', 'pcpid', '']);">加入小米</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about/contact" target="_blank" data-stat-id="6842e821365ee45d" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6842e821365ee45d', '//www.mi.com/about/contact', 'pcpid', '']);">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a rel="nofollow" href="http://weibo.com/xiaomishangcheng" target="_blank" data-stat-id="4d561ee685cd2e15" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4d561ee685cd2e15', 'http://weibo.com/xiaomishangcheng', 'pcpid', '']);">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank" data-stat-id="78fdefa9dee561b5" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-78fdefa9dee561b5', 'http://xiaoqu.qq.com/mobile/share/index.htmlurl=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat', 'pcpid', '']);">小米部落</a></dd>
                
                <dd><a rel="nofollow" href="#J_modalWeixin" data-toggle="modal" data-stat-id="47539f6570f0da90" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-47539f6570f0da90', '#J_modalWeixin', 'pcpid', '']);">官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a rel="nofollow" href="http://order.mi.com/queue/f2code" target="_blank" data-stat-id="fdc16dd51892a164" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-fdc16dd51892a164', '//order.mi.com/queue/f2code', 'pcpid', '']);">F 码通道</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/giftcode/" target="_blank" data-stat-id="835607e3820935bb" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-835607e3820935bb', '//www.mi.com/giftcode/', 'pcpid', '']);">礼物码</a></dd>
                
                <dd><a rel="nofollow" href="http://order.mi.com/misc/checkitem" target="_blank" data-stat-id="b08be6bd51351e1a" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b08be6bd51351e1a', '//order.mi.com/misc/checkitem', 'pcpid', '']);">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">1月27日至2月2日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.mi.com/service/contact" target="_blank" data-stat-id="a7642f0a3475d686" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-a7642f0a3475d686', '//www.mi.com/service/contact', 'pcpid', '']);"><i class="iconfont"></i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <div class="logo ir">小米官网</div>
        <div class="info-text">
            <p class="sites"><a rel="nofollow" href="http://www.mi.com/index.html" target="_blank" data-stat-id="b9017a4e9e9eefe3" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b9017a4e9e9eefe3', '//www.mi.com/index.html', 'pcpid', '']);">小米商城</a><span class="sep">|</span><a rel="nofollow" href="http://www.miui.com/" target="_blank" data-stat-id="ed2a0e25c8b0ca2f" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-ed2a0e25c8b0ca2f', 'http://www.miui.com/', 'pcpid', '']);">MIUI</a><span class="sep">|</span><a rel="nofollow" href="http://www.miliao.com/" target="_blank" data-stat-id="826b32c1478a98d5" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-826b32c1478a98d5', 'http://www.miliao.com/', 'pcpid', '']);">米聊</a><span class="sep">|</span><a rel="nofollow" href="http://www.duokan.com/" target="_blank" data-stat-id="c9d2af1ad828a834" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c9d2af1ad828a834', 'http://www.duokan.com/', 'pcpid', '']);">多看书城</a><span class="sep">|</span><a rel="nofollow" href="http://www.miwifi.com/" target="_blank" data-stat-id="96f1a8cecc909af2" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-96f1a8cecc909af2', 'http://www.miwifi.com/', 'pcpid', '']);">小米路由器</a><span class="sep">|</span><a rel="nofollow" href="http://call.mi.com/" target="_blank" data-stat-id="347f6dd0d8d9fda3" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-347f6dd0d8d9fda3', 'http://call.mi.com/', 'pcpid', '']);">视频电话</a><span class="sep">|</span><a rel="nofollow" href="http://xiaomi.tmall.com/" target="_blank" data-stat-id="dfe0fac59cfb15d9" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-dfe0fac59cfb15d9', 'http://xiaomi.tmall.com/', 'pcpid', '']);">小米天猫店</a><span class="sep">|</span><a rel="nofollow" href="http://shop115048570.taobao.com/" target="_blank" data-stat-id="c2613d0d3b77ddff" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c2613d0d3b77ddff', 'http://shop115048570.taobao.com', 'pcpid', '']);">小米淘宝直营店</a><span class="sep">|</span><a rel="nofollow" href="http://union.mi.com/" target="_blank" data-stat-id="2f48f953961c637d" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2f48f953961c637d', 'http://union.mi.com/', 'pcpid', '']);">小米网盟</a><span class="sep">|</span><a rel="nofollow" href="http://www.mi.com/mimobile/" target="_blank" data-stat-id="f7ea7880c49b687e" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f7ea7880c49b687e', '//www.mi.com/mimobile/', 'pcpid', '']);">小米移动</a><span class="sep">|</span><a rel="nofollow" href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank" data-stat-id="c7ef95929d60f3f1" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c7ef95929d60f3f1', 'http://www.miui.com/res/doc/privacy/cn.html', 'pcpid', '']);">隐私政策</a><span class="sep">|</span><a rel="nofollow" href="#J_modal-globalSites" data-toggle="modal" data-stat-id="9db137a8e0d5b3dd" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-9db137a8e0d5b3dd', '#J_modal-globalSites', 'pcpid', '']);">Select Region</a>            </p>
            <p>©<a href="http://www.mi.com/" target="_blank" title="mi.com" data-stat-id="836cacd9ca5b75dd" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-836cacd9ca5b75dd', '//www.mi.com/', 'pcpid', '']);">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" data-stat-id="f96685804376361a" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f96685804376361a', 'http://www.miitbeian.gov.cn/', 'pcpid', '']);">京ICP备10046444号</a> <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank" data-stat-id="57efc92272d4336b" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-57efc92272d4336b', 'http://www.beian.gov.cn/portal/registerSystemInforecordcode=11010802020134', 'pcpid', '']);">京公网安备11010802020134号 </a><a rel="nofollow" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" data-stat-id="c5f81675b79eb130" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c5f81675b79eb130', '//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg', 'pcpid', '']);">京网文[2014]0059-0009号</a>

<br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</p>
        </div>
        <div class="info-links">
                    <a rel="nofollow" href="http://privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn" target="_blank" data-stat-id="de920be99941f792" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-de920be99941f792', '//privacy.truste.com/privacy-seal/validationrid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn', 'pcpid', '']);"><img rel="nofollow" src="{{ asset('/Home/kshop/') }}/truste.png" alt="TRUSTe Privacy Certification"></a>
                    <a rel="nofollow" href="http://search.szfw.org/cert/l/CX20120926001783002010" target="_blank" data-stat-id="d44905018f8d7096" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d44905018f8d7096', '//search.szfw.org/cert/l/CX20120926001783002010', 'pcpid', '']);"><img rel="nofollow" src="{{ asset('/Home/kshop/') }}/v-logo-2.png" alt="诚信网站"></a>
                    <a rel="nofollow" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank" data-stat-id="3e1533699f264eac" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-3e1533699f264eac', 'https://ss.knet.cn/verifyseal.dllsn=e12033011010015771301369&amp;ct=df&amp;pa=461082', 'pcpid', '']);"><img rel="nofollow" src="{{ asset('/Home/kshop/') }}/v-logo-1.png" alt="可信网站"></a>
                    <a rel="nofollow" href="http://www.315online.com.cn/member/315140007.html" target="_blank" data-stat-id="b085e50c7ec83104" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b085e50c7ec83104', 'http://www.315online.com.cn/member/315140007.html', 'pcpid', '']);"><img rel="nofollow" src="{{ asset('/Home/kshop/') }}/v-logo-3.png" alt="网上交易保障中心"></a>
                </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>
<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-hd">
            <a class="close" data-dismiss="modal" data-stat-id="cfd3189b8a874ba4" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-cfd3189b8a874ba4', '', 'pcpid', '']);"><i class="iconfont"></i></a>
            <span class="title">小米手机官方微信二维码</span>
        </div>
        <div class="modal-bd">
            <img alt="" src="{{ asset('/Home/kshop/') }}/site-weixin.png" width="680" height="340">
        </div>
    </div>
<!-- .modal-weixin END -->
<div class="modal modal-hide modal-bigtap-queue" id="J_bigtapQueue">
    <div class="modal-body">
        <span class="close" data-dismiss="modal" aria-hidden="true">退出排队</span>
        <div class="con">
            <div class="title">正在排队，请稍候喔！</div>
            <div class="queue-tip-box">
                <p class="queue-tip">当前人数较多，请您耐心等待，排队期间请不要关闭页面。</p>
                <p class="queue-tip">时常来官网看看，最新产品和活动信息都会在这里发布。</p>
                <p class="queue-tip">下载小米商城 App 玩玩吧！产品开售信息抢先知道。</p>
                <p class="queue-tip">发现了让你眼前一亮的小米产品，别忘了分享给朋友！</p>
                <p class="queue-tip">产品开售前会有预售信息，关注官网首页就不会错过。</p>
            </div>
        </div>

        <div class="queue-posters">
            <div class="poster poster-3"></div>
            <div class="poster poster-2"></div>
            <div class="poster poster-1"></div>
            <div class="poster poster-4"></div>
            <div class="poster poster-5"></div>
        </div>
    </div>
</div>
<!-- .xm-dm-queue END -->
<div id="J_bigtapError" class="modal modal-hide modal-bigtap-error">
    <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
    <div class="modal-body">
        <h3>抱歉，网络拥堵无法连接服务器</h3>
        <p class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
        <p>
            <a class="btn btn-primary" id="J_bigtapRetry" data-stat-id="c148a4197491d5bd" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c148a4197491d5bd', '', 'pcpid', '']);">重试</a>
        </p>
    </div>
</div>


<div id="J_bigtapModeBox" class="modal fade modal-hide modal-bigtap-mode">
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
        <div class="modal-body">
            <h3 class="title">为防黄牛，请您输入下面的验证码</h3>
             <p class="desc">在防黄牛的路上，我们一直在努力，也知道做的还不够。<br>
    所以，这次劳烦您多输一次验证码，我们一起防黄牛。</p>
            <div class="mode-loading" id="J_bigtapModeLoading">
                <img src="{{ asset('/Home/kshop/') }}/loading.gif" alt="" width="32" height="32">
                <a id="J_bigtapModeReload" class="reload  hide" href="javascript:void(0);" data-stat-id="ce9e5bb5b994ad55" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-ce9e5bb5b994ad55', 'javascript:void0', 'pcpid', '']);">网络错误，点击重新获取验证码！</a>
            </div>
            <div class="mode-action hide" id="J_bigtapModeAction">
                <div class="mode-con" id="J_bigtapModeContent"></div>
                <input name="bigtapmode" class="input-text" id="J_bigtapModeInput" placeholder="请输入正确的验证码" type="text">
                <p class="tip" id="J_bigtapModeTip"></p>
                <a class="btn  btn-gray" id="J_bigtapModeSubmit" data-stat-id="7f083d6abed714f8" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-7f083d6abed714f8', '', 'pcpid', '']);">确认</a>
            </div>
        </div>
    </div>

<div id="J_bigtapSoldout" class="modal fade modal-hide modal-bigtap-soldout modal-bigtap-soldout-norec">
        <span class="close" data-dismiss="modal"><i class="iconfont"></i></span>
        <div class="modal-body ">
            <div class="content clearfix">
                <span class="mitu"></span>
                <p class="title">很抱歉，人真是太多了<br>您晚了一步...</p>
            </div>

            <div class="bigtap-recomment-goods">
                <div class="hd"><span>这些产品也不错，而且有现货哦！</span></div>
                <ul class="clearfix" id="J_bigtapRecommentList"></ul>
            </div>
        </div>
    </div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
   <div class="modal-hd">
        <a class="close" data-dismiss="modal" data-stat-id="d63900908fde14b1" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d63900908fde14b1', '', 'pcpid', '']);"><i class="iconfont"></i></a>
        <span class="title">Select Region</span>
    </div>
    <div class="modal-bd">
        <h3>Welcome to Mi.com</h3>
        <p class="modal-globalSites-tips">Please select your country or region</p>
        <p class="modal-globalSites-links clearfix">
            <a href="http://www.mi.com/index.html" data-stat-id="51fe807618ae85f4" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-51fe807618ae85f4', '//www.mi.com/index.html', 'pcpid', '']);">Mainland China</a>
            <a href="http://www.mi.com/hk/" data-stat-id="d8e4264197de1747" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d8e4264197de1747', 'http://www.mi.com/hk/', 'pcpid', '']);">Hong Kong</a>
            <a href="http://www.mi.com/tw/" data-stat-id="8b54359fb6116e28" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-8b54359fb6116e28', 'http://www.mi.com/tw/', 'pcpid', '']);">Taiwan</a>
            <a href="http://www.mi.com/sg/" data-stat-id="e9c0506f7e4e7161" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-e9c0506f7e4e7161', 'http://www.mi.com/sg/', 'pcpid', '']);">Singapore</a>
            <a href="http://www.mi.com/my/" data-stat-id="d6299ad30ec761a8" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d6299ad30ec761a8', 'http://www.mi.com/my/', 'pcpid', '']);">Malaysia</a>
            <a href="http://www.mi.com/ph/" data-stat-id="22b601cf7b3ada84" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-22b601cf7b3ada84', 'http://www.mi.com/ph/', 'pcpid', '']);">Philippines</a>
            <a href="http://www.mi.com/in/" data-stat-id="441d26d4571e10dc" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-441d26d4571e10dc', 'http://www.mi.com/in/', 'pcpid', '']);">India</a>
            <a href="http://www.mi.com/id/" data-stat-id="88ccf9755c488ec5" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-88ccf9755c488ec5', 'http://www.mi.com/id/', 'pcpid', '']);">Indonesia</a>
            <a href="http://br.mi.com/" data-stat-id="c41d871bf5ddcd95" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-c41d871bf5ddcd95', 'http://br.mi.com/', 'pcpid', '']);">Brasil</a>
            <a href="http://www.mi.com/en/" data-stat-id="4426c5dac474df5f" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4426c5dac474df5f', 'http://www.mi.com/en/', 'pcpid', '']);">Global Home</a>
            <a href="http://www.mi.com/mena/" data-stat-id="261bb8cf155fb56b" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-261bb8cf155fb56b', 'http://www.mi.com/mena/', 'pcpid', '']);">MENA</a>
            <a href="http://www.mi.com/pl/" data-stat-id="2e3007e460f40ce3" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-2e3007e460f40ce3', 'http://www.mi.com/pl/', 'pcpid', '']);">Poland</a>
            <a href="http://www.mi.com/ua/" data-stat-id="de8d49aabd1eecdd" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-de8d49aabd1eecdd', 'http://www.mi.com/ua/', 'pcpid', '']);">Ukraine</a>
            <a href="http://www.mi.com/ru/" data-stat-id="886bf2568681dd6b" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-886bf2568681dd6b', 'http://www.mi.com/ru/', 'pcpid', '']);">Russia</a>
            <a href="http://www.mi.com/vn/" data-stat-id="b859ec9bcac672f1" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b859ec9bcac672f1', 'http://www.mi.com/vn/', 'pcpid', '']);">Vietnam</a>
        </p>
    </div>
</div>
<!-- .modal-globalSites END -->
<script src="{{ asset('/Home/kshop/js/base.js') }}"></script>
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
        damiaoGoodsId:["2160400006","2160400007","2162100004","2162800010","2155300001","2155300002","2163500025","2163500026","2163500027","2164200021","2142400036","2163900015","2170800008","2171000055","2171300002"],
        logoutUrl: '//order.mi.com/site/logout',
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
<script type="text/javascript" src="{{ asset('/Home/kshop/js/cart.js') }}"></script>
<script src="{{ asset('/Home/kshop/js/xmsg_ti.js') }}"></script>
<script>
var _msq = _msq || [];
_msq.push(['setDomainId', 100]);
_msq.push(['trackPageView']);
(function() {
    var ms = document.createElement('script');
    ms.type = 'text/javascript';
    ms.async = true;
    ms.src = "{{ asset('/Home/kshop/js/xmst.js') }}";
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(ms, s);
})();
</script>
<!--mae_monitor-->

  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-2908" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList  J_carouselList ">    <li class="span4" data-gid="2165100001-0-1-2908" data-num="0" data-maxnum="" data-pid="2165100001" data-actid="2908">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1482321199.12589253!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">小米活塞耳机 清新版 黑色</p> <p class="g-price">25元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2165100002-0-1-2908" data-num="0" data-maxnum="" data-pid="2165100002" data-actid="2908">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1482321205.78014235!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">小米活塞耳机 清新版 银色</p> <p class="g-price">25元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2165100003-0-1-2908" data-num="0" data-maxnum="" data-pid="2165100003" data-actid="2908">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1482321209.75977825!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">小米活塞耳机 清新版 粉色</p> <p class="g-price">25元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2165100004-0-1-2908" data-num="0" data-maxnum="" data-pid="2165100004" data-actid="2908">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1482321212.47485716!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">小米活塞耳机 清新版 紫色</p> <p class="g-price">25元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2165100005-0-1-2908" data-num="0" data-maxnum="" data-pid="2165100005" data-actid="2908">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1482321218.65298411!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">小米活塞耳机 清新版 蓝色</p> <p class="g-price">25元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="2908" data-type="1" data-stat-id="dfab20da8a5fcf88" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-dfab20da8a5fcf88', 'javascript:void0', 'pcpid', '']);">加入购物车</a> </div> </div>  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-2974" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList ">    <li class="span4" data-gid="2164700010-0-1-2974" data-num="0" data-maxnum="" data-pid="2164700010" data-actid="2974">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1479972875.00224492!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">最生活毛巾·青春系列 绿色</p> <p class="g-price">18元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2164700011-0-1-2974" data-num="0" data-maxnum="" data-pid="2164700011" data-actid="2974">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1479972881.39395516!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">最生活毛巾·青春系列 蓝色</p> <p class="g-price">18元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2164700014-0-1-2974" data-num="0" data-maxnum="" data-pid="2164700014" data-actid="2974">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1479972891.3246061!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">最生活毛巾·青春系列 白色</p> <p class="g-price">18元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="2974" data-type="1" data-stat-id="dfab20da8a5fcf88" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-dfab20da8a5fcf88', 'javascript:void0', 'pcpid', '']);">加入购物车</a> </div> </div>  <div class="modal fade modal-hide modal-choose-pro J_modalRaisebuy J_carouselContainer" id="J_choosePro-2975" data-isadd="true"> <div class="modal-header"> <span class="close" data-dismiss="modal"><i class="iconfont"></i></span> <h3>选择产品</h3> </div> <div class="modal-body"> <ul class="clearfix list J_chooseProList ">    <li class="span4" data-gid="2163900008-0-1-2975" data-num="0" data-maxnum="" data-pid="2163900008" data-actid="2975">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1476688190.21955893!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">10000mAh小米移动电源2 锖色</p> <p class="g-price">79元</p> <i class="icon-radio"></i> </li>   <li class="span4" data-gid="2163900007-0-1-2975" data-num="0" data-maxnum="" data-pid="2163900007" data-actid="2975">  <img disabled="" data-src="//i1.mifile.cn/a1/pms_1476688193.46995320!220x220.jpg" alt="" width="220" height="220"> <p class="g-name">10000mAh小米移动电源2 银色</p> <p class="g-price">79元</p> <i class="icon-radio"></i> </li>   </ul> </div> <div class="modal-footer"> <a href="javascript:void(0);" class="btn btn-gray btn-disable J_chooseProBtn" data-actid="2975" data-type="1" data-stat-id="dfab20da8a5fcf88" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-dfab20da8a5fcf88', 'javascript:void0', 'pcpid', '']);">加入购物车</a> </div> </div> </body></html>