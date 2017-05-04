<!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"><script type="text/javascript" async="" src="{{asset('/Home/shop1/js/mstr_002.js')}}"></script><script type="text/javascript" async="" src="{{asset('/Home/shop1/js/unjcV2.js')}}"></script><script type="text/javascript" async="" src="{{asset('/Home/shop1/js/mstr.js')}}"></script><script type="text/javascript" async="" src="{{asset('/Home/shop1/js/jquery-1.8.3.min.js')}}"></script>
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>我的购物车-小米商城</title>
<meta name="viewport" content="width=1226">
<link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="{{asset('/Home/shop1/css/base.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/Home/shop1/css/cart.css')}}">
<script type="text/javascript" async="" src=""></script><script type="text/javascript">var _head_over_time = (new Date()).getTime();</script>
</head>
<body>
<div class="site-header site-mini-header">
    <div class="container">
        <div class="header-logo">
            <a class=" " href="/" title="小米官网" data-stat-id="f4006c1551f77f22" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f4006c1551f77f22', '//www.mi.com/index.html', 'pcpid', '']);"><img src="/Home/shop1/img/mi-logo.png" alt=""></a>
        </div>
        <div class="header-title has-more" id="J_miniHeaderTitle"><h2>我的购物车</h2><p>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</p></div>
        <div class="topbar-info" id="J_userInfo"><span class="user"><a rel="nofollow" class="user-name" href="/home2/person" target="_blank" data-stat-id="249d537faf905cee" onclick="">
        <span class="name">
			<script>
                var a = "{{session()->get('homeuser')->User_name}}";
                document.write(a);
            </script>
        </span></a><ul class="user-menu"><li><a rel="nofollow" href="http://my.mi.com/portal" target="_blank" data-stat-id="e0b9e1d1fa8052a2" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-e0b9e1d1fa8052a2', '//my.mi.com/portal', 'pcpid', '']);">个人中心</a></li><li><a rel="nofollow" href="http://order.mi.com/user/comment" target="_blank" data-stat-id="6d05445058873c2c" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6d05445058873c2c', '//order.mi.com/user/comment', 'pcpid', '']);">评价晒单</a></li><li><a rel="nofollow" href="http://order.mi.com/user/favorite" target="_blank" data-stat-id="32e2967e9a749d3d" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-32e2967e9a749d3d', '//order.mi.com/user/favorite', 'pcpid', '']);">我的喜欢</a></li><li><a rel="nofollow" href="http://account.xiaomi.com/" target="_blank" data-stat-id="6c2aba14bc7f649a" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-6c2aba14bc7f649a', 'http://account.xiaomi.com/', 'pcpid', '']);">小米账户</a></li><li><a rel="nofollow" href="http://order.mi.com/site/logout" data-stat-id="770a31519c713b11" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-770a31519c713b11', '//order.mi.com/site/logout', 'pcpid', '']);">退出登录</a></li></ul></span><span class="sep">|</span><a rel="nofollow" class="link link-order" href="/home2/orderlist" target="_blank" data-stat-id="a9e9205e73f0742c" onclick="">我的订单</a></div>
    </div>
</div>

<div class="page-main">

    <div class="container">
        <div class="cart-loading loading hide" id="J_cartLoading">
            <div class="loader"></div>
        </div>
        <div class="cart-empty hide" id="J_cartEmpty">
            <h2>您的购物车还是空的！</h2>
            <p class="login-desc">登录后将显示您之前加入的商品</p>
            <a href="#" class="btn btn-primary btn-login" id="J_loginBtn" data-stat-id="7874490dbcbc1e60" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-7874490dbcbc1e60', '#', 'pcpid', '']);">立即登录</a>
            <a href="http://list.mi.com/0" class="btn btn-primary btn-shoping J_goShoping" data-stat-id="4658a7dfd89505fc" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-4658a7dfd89505fc', '//list.mi.com/0', 'pcpid', '']);">马上去购物</a>
        </div>
        <form action = "/home2/buy/shopid" method='post' name='myform'>
        {{ csrf_field()}}
        <div id="J_cartBox" class="">
            <div class="cart-goods-list">
                <div class="list-head clearfix">
                    <div class="col col-check"><i class="iconfont icon-checkbox " id="J_selectAll">√</i>全选</div>
                    <div class="col col-img">&nbsp;</div>
                    <div class="col col-name">商品名称</div>
                    <div class="col col-price">单价</div>
                    <div class="col col-num">数量</div>
                    <div class="col col-total">小计</div>
                    <div class="col col-action">操作</div>
                </div>
                <div class="list-body" id="J_cartListBody">   
                  @foreach($list as $v )
                    <div class="item-box"> 
                        <div class="item-table J_cartGoods" data-info="{ commodity_id:'1160800072', gettype:'buy', itemid:'2160800027_0_buy', num:'1'} "> 
                            <div class="item-row clearfix">
                                 <div class="col col-check">  
                                 	<i class="iconfont icon-checkbox J_itemCheckbox" data-itemid="2160800027_0_buy" data-status="1">√</i> 
                                 	<!-- <input type='hidden' name='gid' value="{{ $v->Shop_id }}">  -->
                                 </div> 

                                <div class="col col-img">  <a href="/detail/{{ $v->Shop_gid }}"> <img alt="" src="{{ url('admin/upload').'/'.'s_'.$v->Shop_pic }}" width="80" height="80"> </a>  
                                </div>

                                <div class="col col-name">  <div class="tags">   </div>  <h3 class="name">  <a href="" target="_blank"> {{ $v->Shop_name }}</a>  </h3>   <p class="desc"> <span>适配机型：</span> {{ $v->Shop_model }}</p>     </div>

                                <div class="col col-price price">{{ $v->Shop_price }} </div> 

                                <div class="col col-num gnum">  
                                    <div class="change-goods-num clearfix J_changeGoodsNum"> 
	                                    <a href="javascript:cart()" class="minus">
	                                    	<i class="iconfont">-</i>
	                                    </a> 
                                    <input tyep="text" name="num" value="{{ $v->Shop_num}}" data-num="2" data-buylimit="10" autocomplete="off" class="goods-num J_goodsNum"> 
                                    <a href="javascript:cart()" class="plus">
                                  	  <i class="iconfont">+</i>
                                    </a>  

                                    </div> 
                                </div> 
                                <input type="hidden" class='sid' value="{{ $v->Shop_id}}">
                                
                                    <div class="col col-total sum"> {{ $v->Shop_price }} <p class="pre-info">  </p> 
                                    </div>

                                     <div class="col col-action "> <a id="2160800027_0_buy" data-msg="确定删除吗？" href="/home2/shopdel/{{ $v->Shop_id }});" title="删除" class="del J_delGoods"><i class="iconfont"></i></a> 
                                     </div>

                            </div> 
                        </div>         
                    </div>  
                    @endforeach    
                </div>
                
            </div>
            <!-- 加价购 -->
          

            <div class="cart-bar clearfix cart-bar-fixed" id="J_cartBar">
                <div class="section-left">
                    <a href="http://list.mi.com/0" class="back-shopping J_goShoping" data-stat-id="3d1e5bdd191768c8" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-3d1e5bdd191768c8', '#', 'pcpid', '']);">继续购物</a>
                    <span class="cart-total">共 <i id="J_cartTotalNum">0</i> 件商品，已选择 <i id="J_selTotalNum">0件</span>
                    <span class="cart-coudan hide" id="J_coudanTip">
                        ，还需 <i id="J_postFreeBalance"></i> 即可免邮费  <a href="javascript:void(0);" id="J_showCoudan" data-stat-id="69b06f1a9d2d512c" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-69b06f1a9d2d512c', 'javascript:void0', 'pcpid', '']);">立即凑单</a>
                    </span>
                </div>
                <span class="activity-money hide">
                    活动优惠：减 <i id="J_cartActivityMoney">0</i> 
                </span>
                <span class="total-price">
                    合计（不含运费）：<em id="J_cartTotalPrice">0</em>
                </span>
                <a href="javascript:void(0);" class="btn btn-a btn btn-primary" id="J_goCheckout">去结算</a>

                <div class="no-select-tip hide" id="J_noSelectTip">
                    请勾选需要结算的商品
                    <i class="arrow arrow-a"></i>
                    <i class="arrow arrow-b"></i>
                    <!-- 表单隐藏域传到订单表 -->


                    <!-- 商品id -->
                    <!-- <input type="hidden" name="Orderlist_goodsid" value="{{ $v->Shop_gid}}"> -->
                    <!-- 用户id -->
                    <!-- <input type="hidden" name="Orderlist_user_id" value="{{ $v->Shop_uid}}"> -->
                    <!-- 商品名称 -->
                    <!-- <input type="hidden" name="Orderlist_goodsname" value="{{ $v->Shop_name}}"> -->
					<!-- 商品图片 -->
                    <!-- <input type="hidden" name="Orderlist_goodspic" value="{{ $v->Shop_pic}}"> -->
					<!-- 商品单价 -->
                    <!-- <input type="hidden" name="Orderlist_price" value="{{ $v->Shop_price}}"> -->
                    <!--  商品数量 -->
                    <!-- <input type="hidden" name="Orderlist_goodsnum" value=""> -->
                    <!-- 商品小计 -->
                    <!-- <input type="hidden" name="Orderlist_pricesum" value=""> -->
                    <!-- 商品总计 -->
                    <!-- <input type="hidden" name="Orderlist_total" value=""> -->
                    <!-- 要购买的商品的id -->
                    <input type="hidden" name='shopid[]'>
                </div>
            </div>
        </div>
        </form>
        <div class="cart-recommend hide" id="J_historyRecommend"></div>
        <div class="cart-recommend container" id="J_miRecommendBox"><h2 class="xm-recommend-title"><span>探索黑科技，小米为发烧而生</div>

        <div class="cart-recommend" id="J_miHistoryBox"></div>
    </div>
</div>
 <script type="text/javascript">
            // var id = new Array();
            // var j = 0;
            $("#J_goCheckout").click(function(){

                var shopid = new Array();
                var i = 0;

                $('.icon-checkbox-selected').each(function(){
                    shopid[i] = $(this).parent().siblings('[class*="sid"]').val();
                    i++;
                    
  
                });
                $('input[name="shopid[]"]').val(shopid);
                   sh = shopid.length;
                    if(sh<1){
                        alert('请选择要购买的商品');
                        die();
                    }


                var form = document.myform;
                form.submit();             
            });
         
        </script>
        <script type="text/javascript">
            //显示商品数量方法
            function GoodsNum()
            {
                var a = 0;
                var b = 0;
                //获取商品数量
                $('input[name="num"]').each(function(){
                    a = parseInt($(this).val());
                    b += a;
                });
                //显示商品总量
                $('#J_cartTotalNum').text(b);
            }
            //调用显示商品数量的方法
            GoodsNum();

            //购物方法
            function cart(){
                //显示商品总量
                var a = 0;
                var b = 0;
                $('input[name="num"]').each(function(){
                    a = parseInt($(this).val());
                    b += a;
                });
                $('#J_cartTotalNum').text(b);
                //调用显示选中商品数量及总价的方法
                show();
            }
            
            //显示选中商品数量及总价    
            function show()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) > 0){
                    var sum = 0;
                    //获取选中商品的小计,并遍历
                    $('.icon-checkbox-selected').parent().siblings('[class*="sum"]').each(function(){
                        sum += parseInt($(this).text());
                    });
                    //显示选中商品总价
                    $('#J_cartTotalPrice').text(sum);
                    var total = 0;
                    //获取选中商品的总量
                    $('#J_cartListBody .icon-checkbox-selected').parent().siblings('[class*="col-num"]').each(function(){
                        total += parseInt($(this).find('input').val());
                    });
                    //显示选中商品总量
                    $('#J_selTotalNum').text(total);
                }
            }

            // 验证商品数量
            //获取所有的商品数量,并遍历
            $('input').each(function(){
                //添加表单失去焦点事件
                $(this).focusout(function(){    
                    //获取商品数量
                    var num = $.trim($(this).val());
                    //准备正则
                    var regnum = /^\d{1,3}$/;
                    if(regnum.exec(num)==null){
                        alert("数量格式输入不正确!"); 
                        // 如果没有选中商品，不能结算
                        $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    }
                    //调用显示选中商品数量及总价的方法 
                    show();
                });
            });      

            //有客户在输入自己指定的数量后页面的变化
            function input()
            {
                $('input[name="num"]').each(function(){
                    if(($('.icon-checkbox-selected').length) > 0){
                        //获取商品数量
                        var num = $(this).val();
                        //商品小计
                        var text = $(this).parent().parent().siblings('[class*="sum"]');
                        //获取单价
                        var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                        text.text(parseInt(price*num));
                        text.text(text.text());
                        var sum = 0;
                        //获取选中商品的小计,并遍历
                        $('.icon-checkbox-selected').parent().siblings('[class*="sum"]').each(function(){
                            sum += parseInt($(this).text());
                        });
                        //显示选中商品总价
                        $('#J_cartTotalPrice').text(sum);
                    }
                });    
            }
            //有客户在输入自己指定的数量后页面的变化
            $('input[name="num"]').blur(function(){
                input();
                //调用显示商品数量的方法
                GoodsNum();
            });
                    
            //选中商品方法
            function goods()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) > 0){
                    //如果有选中商品,提示框隐藏
                    $('#J_noSelectTip').addClass('hide');
                    //如果有选中商品,可以去结算
                    $('#J_goCheckout').removeClass('btn-disabled').addClass('btn-primary').css('background','#FF6700').hover(function(){
                        $(this).css('background','#D15503');
                    },
                    function(){
                        $(this).css('background','#FF6700');
                    });
                    //调用显示选中商品数量及总价的方法
                    show();
                }
            }

            //没有选中商品方法
            function checkGoods()
            {
                //判断是否有商品被选中
                if(($('.icon-checkbox-selected').length) < 1){
                    // 如果没有选中商品，不能结算
                    $('#J_goCheckout').removeClass('btn-primary').addClass('btn-disabled');
                    $('#J_noSelectTip').removeClass('hide');
                    //商品总计清零
                    $('#J_cartTotalPrice').text('0');
                    //选中商品清零
                    $('#J_selTotalNum').text(0); 
                }
            }
       
            //点击按钮选中订单
            $('.J_itemCheckbox').toggle(function(){
                $(this).addClass('icon-checkbox-selected');
                //调用选中商品方法
                goods();
                input();
            },function(){
                $(this).removeClass('icon-checkbox-selected');
                //没有选中商品方法
                checkGoods();
                //调用显示选中商品数量及总价的方法
                show();
            });
            
            //全选
            $('#J_selectAll').toggle(function(){
                //让所有商品都选中
                $(this).addClass('icon-checkbox-selected');
                $('.J_itemCheckbox').addClass('icon-checkbox-selected');
                //调用选中商品方法
                goods();
            },
            function(){
                $(this).removeClass('icon-checkbox-selected');
                $('.J_itemCheckbox').removeClass('icon-checkbox-selected');
                //没有选中商品方法
                checkGoods();
                //调用显示选中商品数量及总价的方法
                show();
            });
            
            
            // $('[class*="sum"]').text($('.price').text());
            //添加商品数量
            num=null;
            $('.plus').click(function(){
                //获取商品数量
                var num = $(this).prev('input[name*="num"]');
                num.val(parseInt(num.val())+1);
                if(num.val() > 10){
                    num.val(10);
                }
                //获取商品小计
                var text = $(this).parent().parent().siblings('[class*="sum"]');
                //获取商品单价
                var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                text.text(price*num.val());
                text.text(text.text());



                var id = $(this).parent().parent().siblings('[class*="sid"]').val();
               // alert(num.val());
                    $.ajax({
                    url:'/home2/shopadd',
                    type:'get',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{Shop_num:num.val(),Shop_id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        // console.log(data);
                    },
                    error:function()
                    {
                        alert('商品数量添加失败');
                    }
                });
            



            });
            //减少商品数量
            $('.minus').click(function(){
                //获取商品数量
                var num = $(this).next('input[name*="num"]');
                num.val(parseInt(num.val())-1);
                if(num.val() < 1){
                    num.val(1);
                }
                //商品小计
                var text = $(this).parent().parent().siblings('[class*="sum"]');
                //获取商品单价
                var price = parseInt($(this).parent().parent().siblings('[class*="price"]').text());
                text.text(price*num.val());
                text.text(text.text());


                var id = $(this).parent().parent().siblings('[class*="sid"]').val();
               // alert(num.val());
                    $.ajax({
                    url:'/home2/shopadd',
                    type:'get',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{Shop_num:num.val(),Shop_id:id},
                    dataType:'json',
                    success:function(data)
                    {
                        // console.log(data);
                    },
                    error:function()
                    {
                        alert('商品数量更改失败');
                    }
                });

            });             
        </script>


<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a rel="nofollow" href="http://www.mi.com/static/fast/" target="_blank" data-stat-id="46873828b7b782f4" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-46873828b7b782f4', '//www.mi.com/static/fast/', 'pcpid', '']);"><i class="iconfont"></i>预约维修服务</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-78babcae8a619e26', '//www.mi.com/service/exchange#back', 'pcpid', '']);"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d1745f68f8d2dad7', '//www.mi.com/service/exchange#free', 'pcpid', '']);"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-f1b5c2451cf73123', '//www.mi.com/service/exchange#mail', 'pcpid', '']);"><i class="iconfont"></i>满150包邮</a></li>
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
                    <a rel="nofollow" href="http://privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn" target="_blank" data-stat-id="de920be99941f792" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-de920be99941f792', '//privacy.truste.com/privacy-seal/validationrid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&amp;lang=zh-cn', 'pcpid', '']);"><img rel="nofollow" src="/truste.png" alt="TRUSTe Privacy Certification"></a>
                    <a rel="nofollow" href="http://search.szfw.org/cert/l/CX20120926001783002010" target="_blank" data-stat-id="d44905018f8d7096" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-d44905018f8d7096', '//search.szfw.org/cert/l/CX20120926001783002010', 'pcpid', '']);"><img rel="nofollow" src="/v-logo-2.png" alt="诚信网站"></a>
                    <a rel="nofollow" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082" target="_blank" data-stat-id="3e1533699f264eac" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-3e1533699f264eac', 'https://ss.knet.cn/verifyseal.dllsn=e12033011010015771301369&amp;ct=df&amp;pa=461082', 'pcpid', '']);"><img rel="nofollow" src="/v-logo-1.png" alt="可信网站"></a>
                    <a rel="nofollow" href="http://www.315online.com.cn/member/315140007.html" target="_blank" data-stat-id="b085e50c7ec83104" onclick="_msq.push(['trackEvent', '08fae3d5cb3abaaf-b085e50c7ec83104', 'http://www.315online.com.cn/member/315140007.html', 'pcpid', '']);"><img rel="nofollow" src="/v-logo-3.png" alt="网上交易保障中心"></a>
                </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>

<!-- .modal-globalSites END -->

