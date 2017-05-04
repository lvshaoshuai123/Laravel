<!DOCTYPE html>
<html><head>

@if(session('msg'))
  <script>
  alert("{{ session('msg') }}");
  </script>
@endif
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
<title>小米帐号 - 重置密码</title>

		<link type="text/css" rel="stylesheet" href="{{ asset('/Home/repwd/css/reset.css')}} ">
    <link type="text/css" rel="stylesheet" href="{{ asset('/Home/repwd/css/layout.css')}} ">
		<link type="text/css" rel="stylesheet" href="{{ asset('/Home/repwd/css/registerpwd.css')}} ">

	
</head>
<!-- 添加版本uLocale -->
<body class="zh_CN">
  
<div class="wrapper">
<div class="wrap">
  <div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><a class="milogo" href="/home1/login"></a></div>
    <div class="title-item t_c">
      <h4 class="title_big30">修改个人信息</h4>
    </div>
    <!-- 接收表单错误验证信息 -->
     @if (count($errors) > 0)
         <div class="title-item t_c">
           <ul>
              @foreach ($errors->all() as $error)
               <li style='color:red'>{{ $error }}</li>
               @endforeach
          </ul>
       </div>
       @endif
    <!-- <form action="/home1/check" method="post" id="forgetpwd_form"> -->
    <form method="post" action="/home2/pinfo/{{$list->User_id}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PUT')}}
    <!-- <input name="qs" value="" type="hidden"> -->
    <!-- 记得在此添加标记语言uLocale -->
    <div class="regbox">
      <h5 class="n_tit_msg">请输入要修改的个人信息</h5>      
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <h5>用户名：</h5>
        <label class="labelbox labelbox-user" for="user">
          <input name="User_age" value="{{ $list->User_name }}" id="user" autocomplete="off" type="text">
         </label>

        <!--  <input name="passToken" id="passToken" value="" type="hidden">
         <input name="passport_ph" id="passport_ph" value="" type="hidden"> -->
      </div>	
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <h5>邮箱：</h5>
        <label class="labelbox labelbox-user" for="user">
          <input name='User_email' value='{{ $list->User_email }}' rule="" type="text">
         </label>
         
         <!-- <input name="passToken" id="passToken" value="" type="hidden">
         <input name="passport_ph" id="passport_ph" value="" type="hidden"> -->
      </div>  
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <h5>年龄：</h5>
        <label class="labelbox labelbox-user" for="user">
          <input name="User_age" value="{{ $list->User_age }}"  rule="" type="text">
         </label>
      </div>  
      <div class="inputbg">
        <!-- 错误添加class为err_label -->
        <h5>手机号：</h5>
        <label class="labelbox labelbox-user" for="user">
          <input name="User_tel" value="{{ $list->User_tel }}" type="text" placeholder="填写手机号有助于找回密码">
         </label>
      </div>  
      <div class="err_tip error-tip-1">
        <div class="dis_box">
          <em class="icon_error"></em>
          <span id="error-content"></span>
        </div>
      </div> 
			<div class="inputbg inputcode dis_box">
				
				<!-- <img alt="图片验证码" src="{{ asset('Home/repwd/img/getCode')}}" title="看不清换一张" class="chkcode_img icode_image code-image"> -->
        <!-- <img src="{{url('/home1/hmycode').'/'.time()}}" onclick="this.src='{{ url('/home1/hmycode') }}/'+Math.random()" class="chkcode_img icode_image code-image"> -->
        <img width='100' src="{{ url('admin/upload').'/'.$list->User_pic }}" >
        <label class="" for="">
          <input type="file" name="User_pic">
        <input type="hidden" name='pic' value='{{$list->User_pic}}'>
        </label>
			</div>
			<div class="err_tip error-tip-2">
				<div class="dis_box"><em class="icon_error"></em><span id="error-content-2"></span></div>
			</div>
      <div class="country_tips c_b">
        &nbsp;
        <a class="fr underline" id="select_country_code" href="javascript:void(0)">帮助</a>
      </div>  

      <div class="fixed_bot">
        <input class="btn332 btn_reg_1" id="submit_button" value="确认修改" type="submit">   
      </div>
     
    </div>
    </form>        
  </div>
  </div>
</div>
</div>
<div class="n-footer">
  <div class="nf-link-area clearfix">
  <ul class="lang-select-list">
    <li><a class="lang-select-li current" href="javascript:void(0)" data-lang="zh_CN">简体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="zh_TW">繁体</a>|</li>
    <li><a class="lang-select-li" href="javascript:void(0)" data-lang="en">English</a></li>
    
      |<li><a class="a_critical" href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank"><em></em>常见问题</a></li>
    
  </ul>
  </div>
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134"><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
<script src="{{ asset('/Home/repwd/js/jquery-1.js')}}"></script>
<script src="{{ asset('/Home/repwd/js/placeholder.js')}}"></script>

<script>
$(function(){
  //语言部分
  var locale="zh_CN";
  if(locale!=='zh_CN' && locale!=='zh_TW' && locale!=='en'){
    locale=locale.indexOf("zh")!==-1?"zh_TW":"en";
  }
  var list=$(".lang-select-li");
  list.each(function(index,item){
    if($(this).data("lang")===locale){
      $(this).addClass("current");
    }
  });
  list.bind("click",function(){
    var selectLocale=$(this).data("lang");
    var params=location.search.substring(1).split("&");
    if(locale!==selectLocale){
      for(var i=0;i<params.length;i++){
        if(params[i].indexOf("_locale=")===0){
          params.splice(i,1);i--;
        }
      }
      params.push("_locale="+selectLocale);
      
location.href=("//"+location.host+location.pathname+"?"+params.join("&")+location.hash);

    }
  });
  /*不知道是什么功能部分
  if($(window).innerWidth() <= 640 && 
(!/AppName\/[0-9\.]+$/.test(navigator.userAgent) || 
navigator.standalone)){
    $('.n-footer').show();
  }*/
  /*备案链接上的图片*/
  var recordLink=$('.beian-record-link');
  var 
beianRecordLink="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134";

  var 
beianRecordImg="https://account.xiaomi.com/static/res/9204d06/account-static/respassport/acc-2014/img/ghs.png";

  var 
default1px_gif="data:image/gif;base64,R0lGODlhAQABAJEAAAAAAP///////wAAACH5BAEAAAIALAAAAAABAAEAAAICVAEAOw==";

  if(recordLink.length && beianRecordLink){
    recordLink[0].href=beianRecordLink;
  }
  var _img=new Image();
  var _span=$('.beian-record-link span');
  if(_span){
    _img.onload=_img.oncomplete=function(){
      _img._loaded=true;
      _span.append(_img);
    }
    setTimeout(function(){
      if(!_img._loaded && default1px_gif){
        _img.src=default1px_gif;
      }
    },1000);
    _img.src=beianRecordImg;
  }

  /*url 转义*/
  function  encodeURLparam(links,param){
    $(links).each(function(index,item){
      if((item.search+"").indexOf(param)!==-1){
        //分解参数，encode value
        var params=item.search.substring(1).split("&");
        for(var i=0;i<params.length;i++){

          if( (params[i]+"").indexOf(param+"=")===0 ){

            params.splice(i,1, param+"="+encodeURIComponent( 
(params[i]+"").substring(param.length+1) ) );

            item.search=params.join("&")
          }

        }
      }
    })
  }
  encodeURLparam(document.links,'externalId')
});
var JSP_VAR={
  deviceType:'PC',
  dataCenter:'lg',
  locale:"zh_CN",
  region:"CN",
  
callback:"http://order.mi.com/login/callback?followup=http%3A%2F%2Fwww.mi.com%2Findex.html&sign=NDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ,,",

  sid:"mi_eshop",
  
qs:"callback=http%3A%2F%2Forder.mi.com%2Flogin%2Fcallback%3Ffollowup%3Dhttp%253A%252F%252Fwww.mi.com%252Findex.html%26sign%3DNDRhYjQwYmNlZTg2ZGJhZjI0MTJjY2ZiMTNiZWExODMwYjkwNzg2ZQ%2C%2C&sid=mi_eshop&_bannerBiz=mistore&_qrsize=180",

  hidden:"",
  "_sign":"",
  serviceParam :'',
  privacyLink:''
};
</script>
<style>
  .btn-action-go{ display:none;}
</style>
<script>
/*MIUI  客户端和  authSDK 客户端*/
  
  var webviewDisableTip="";
  var closeStatus="";
  var webviewDisableTip2="";
  var webviewDisableBtn="";
  var webviewCopyLink="";

  function isWebview(){
    var result=false;
    var ua=navigator.userAgent;
    
    var authSDK=/passport\/oauthsdk\/([\d.]+)/i.test(ua)? 
parseFloat(RegExp.$1) : false ;
    var miuiClient=/passport\/oauthmiui/i.test(ua);
    var weixinClient=/micromessenger/i.test(ua);
    var miAccountClient=/passportsdk\/notificationwebview/i.test(ua);
    var miuiYellowPageClient=/miuiyellowpage/i.test(ua);
    if(authSDK || miuiClient || weixinClient || miAccountClient || 
miuiYellowPageClient){
      result={
        authSDK:authSDK,
        miuiClient:miuiClient,
        weixinClient:weixinClient,
        miAccountClient:miAccountClient,
        miuiYellowPageClient:miuiYellowPageClient
      }
    }
    return result;
  }
  
  var webviewDisabled= "";
  var popContainer= '<div style="display:block;" class="popup_mask>';
pchide sysBrowserTip">'+"
                      '<div class="bkc"></div>'+
                      '<div class="mod_wrap">'+
                        '<div style="display:block;" '
class="mod_acc_tip">'+
                          '<div class="wap_frame">'+
                            '<div class="icon_around"></div>'+
                            '<div class="around_txt">'+
                              
'<h4>'+webviewDisableTip+'</h4><p>'+webviewDisableTip2+
                              '</p><p class="pt20 t_c copy-link" 
id="tocopy">'+location.href+'</p>'+
                            '</div>'+
                            '<a class="btn_tip btn_back" 
href="javascript:void(0)" id="copyLinkBtn">'+webviewCopyLink+'</a>'+
                            '<a class="btn_tip btn_back wap_btn_abs 
btn-action-go" href="javascript:void(0)">'+webviewDisableBtn+'</a>'+
                          '</div>'+
                        '</div>'+
                      '</div>'+
                      
                    '</div>';
  if(isWebview()){
    $(".n-footer").hide();
    //$(".n-logo-area").hide();
    $(".logout_wap").hide();
  }
  
  if(webviewDisabled==='true'){
    $('body').append(popContainer);
  }
  if(!isWebview() && closeStatus==='true'){
    $('.btn-action-go').show();
  }
  $('.btn-action-go').bind('click',function(){
    $(this).closest('.popup_mask').hide();
    $(".wrapper").removeClass("hidewap");
    $(document.body).css({
	    'overflow-y': 'auto',"height":"auto"
	  });
    return false;
  });
  if($('.sysBrowserTip:visible').length){
	$(".wrapper").addClass("hidewap");
	  $(document.body).css({
	    "height":"100%",'overflow-y': 'hidden'
	  });
	}
</script>


<script>
;(function(){
var pt = document.getElementById("passToken");
var pt_ph = document.getElementById("passport_ph");
var c = document.cookie.split(";");
ptValue = ""; 
phValue = ""; 
for(var i = 0 ; i < c.length ; i++){
  if(c[i].indexOf("passToken") > -1){
    ptValue = c[i].substring(c[i].indexOf("=")+1) ; 
  }   
  if(c[i].indexOf("passport_ph") > -1){
    phValue = c[i].substring(c[i].indexOf("=")+1) ;
  }
}
if(pt){
	pt.value = ptValue ;
}
if(pt_ph){
	pt_ph.value= phValue;
}
})();
</script>



<script src="{{ asset('/Home/repwd/js/modal_lite.js')}} "></script><a target="_blank"></a>
<script src="{{ asset('/Home/repwd/js/countryCode.js')}}">
</script>

<iframe id="postee" name="postee" style="display:none;" src="{{ url('Home/repwd/img/a.htm')}}"></iframe>
<script>
  $(function(){
	var fraPostee = document.getElementById('postee'), posteeWindow = 
fraPostee.contentWindow;
	fraPostee.src = 'about:blank';
	fraPostee.onload = function(){
		var posteeLoc = posteeWindow.location.href;
		if(posteeLoc.indexOf('blank') > -1)  {return;}
		if(posteeLoc.indexOf('/pass/forgetPassword') === -1){
			location.href = posteeLoc;
		}else{
			var msg = posteeWindow.msg;
			var user = posteeWindow.user;
			if(msg && msg.length > 0 ){
			  if(msg == "NoSafeAddressForRetrievePassword") {
				showError("该帐号没有绑定手机号码或邮箱，无法找回密码");
			  }else if(msg == "CAPTCHA_VERIFY_ERROR"){
					showError("验证码错误或已过期",'captcha');
					userInput.val(user);
			  }else {
				showError("帐号不存在");
				userInput.val('');
			  }
			  $('.chkcode_img').click();
			}
			var fraClone = fraPostee.cloneNode();
			$(fraPostee).replaceWith(fraClone);
			fraPostee = fraClone;
			posteeWindow = fraPostee.contentWindow;
			fraPostee.src = 'about:blank';
			fraPostee.onload = arguments.callee;
		}
	};
});
var MSG={
  close:"关闭",
  cancel:"取消"
};
var msg = "" ; 
var user = "";
var userInput=$("#user");
var form=$("#forgetpwd_form");
var codeCaptcha=$('#code-captcha');
var chkcodeImg=$('.chkcode_img');
if(msg.length > 0 ){
  if(msg == "NoSafeAddressForRetrievePassword") {
    showError("该帐号没有绑定手机号码或邮箱，无法找回密码");
  }else if(msg == "CAPTCHA_VERIFY_ERROR"){
		showError("验证码错误或已过期",'captcha');
		userInput.val(user);
	}	else {
    showError("帐号不存在");
  }
}
function showError(text,type){
  var el=type!=='captcha'?$("#error-content"):$("#error-content-2");
	
  var con=type!=='captcha'?$(".error-tip-1"):$(".error-tip-2");
  var label=type!=='captcha'?$(".labelbox-user"):$(".labelbox-captcha");
  if(text){
    con.show();
    el.html(text);
    label.addClass("err_label");
  }else{
    con.hide();
    label.removeClass("err_label");
  }
}
function setIcodeUrl(chkcodeImg){
	chkcodeImg.attr('src','/pass/getCode?icodeType=resetPwd&'+(new 
Date().getTime()));
	chkcodeImg.parent().find("[name=icode]").val("");
}
var icodeImageRefresh;
setIcodeUrl(chkcodeImg);
chkcodeImg.bind("click",function(){	
	clearTimeout(icodeImageRefresh);
	icodeImageRefresh=setTimeout(function(){
		setIcodeUrl(chkcodeImg);
	},200);
});

form.bind("submit",function(){
  var val=$.trim( userInput.val() );
  var rule= new RegExp( userInput.attr('rule') );
	var captchaVal=$.trim(codeCaptcha.val());
  if(val===""){
    showError("请输入帐号")
    return false;
  }else if(!rule.test(val)){
    showError("帐号名称格式错误");
    return false;
  }else if(captchaVal==""){
		showError("请输入验证码",'captcha');
		return false;
	}
  userInput.val(val.replace(/^\+86/,''));
});
userInput.bind("focus",function(){
  showError();
});
userInput.miPlaceholder("#ccc");
//图片验证码
codeCaptcha.bind("focus",function(){
  showError();
});
codeCaptcha.miPlaceholder("#ccc");
/*选择国家码*/
  var select_country_code=$("#select_country_code");
  var select_country_code_modal=null;
  var resultCode="+86";
  var oldCode="";
  function submitCountryCode(code,oldCode){
    var _user=userInput
    var _userPlaceholder=userInput.prev();
    var value=_user.val();
    /*将原先选择清空*/
    value=value.indexOf(oldCode)===0?value.replace(oldCode,""):value;
    /*用户名内容框为邮件*/
    _userPlaceholder.focus();
    if(value.indexOf("@")>0){
      _user.val(code);
      _userPlaceholder.addClass("hide");
    }else{
      _user.val(code+value);
      _userPlaceholder.addClass("hide");
    }
    _userPlaceholder.blur();
  }
  select_country_code.bind('click',function(){
    if(!select_country_code_modal){
      select_country_code_modal=new Modal({
        title:"请选择地区代码",
        html:'<div class="regbox login_countrycode_box">\
                <div class="listwrap">\
                  <div class="listtit" '
id="select_country_code_trigger">\
                    <div class="tits display_box c_b">\
                      <p id="select_country_code_result">中国（+86）</p>\
                      <i class="icon_cirarr"></i>\
                    </div>\
                  </div>\
                  <div class="country-container-panel">\
                  </div>\
                </div>\
              </div>\
              <div class="tip_btns">\
                <a class="btn_tip btn_commom" 
id="select_country_code_submit" href="javascript:void(0)" 
title="确定">确定</a>\
              </div><br/>\
              <div class="tip_btns">\
                <a class="btn_tip btn_commom_cancel" 
id="select_country_code_cancel" href="javascript:void(0)" 
title="删除">删除</a>\
              </div>',
        cls:'select_country_code_content',
        customDevice640:true,//modal小屏幕定制为全屏
        afterRender:function(){
          var modal=this.modal;
          var trigger=$("#select_country_code_trigger");
          var container=$(document.createElement("div"));
          var submit=$("#select_country_code_submit");
          var cancel=$("#select_country_code_cancel");
          var result=$("#select_country_code_result");
          var countainerPanel=$(".country-container-panel");
          var cancelHtml='<div class="cancel_panel">'+
                          '<div class="cancel_box">'+
                            '<a class="btnadpt bg_white btn-cancel" 
href="javascript:void(0);">'+MSG.cancel+'</a>'+
                          '</div>'+
                        '</div>';
          $(this.header).find(".btn_mod_close span").text(MSG.close);
          container.addClass("country-container");
          container.hide()
          container.html( RegionsCode.getAll({'usual':"常用"},true) );
          countainerPanel.append(container);
          container.append(cancelHtml);
          trigger.bind('click',function(e){
            container.show();
            return false;
          });
          $(document.body).bind('click',function(){
            container.hide();
          });
          container.bind('click',function(e){
            var target=$(e.target||e.srcElement);
            var content=null;
            if(target.hasClass('record')){
              content=target;
            }else if(target.hasClass('record-country') || 
target.hasClass('record-code')){
              content=target.parent();
            }
            if(content){
              var text=content.find(".record-country").text();
              var code=content.find(".record-code").text();
              result.html(text+"("+code+")");
              resultCode=code;
              container.hide();
            }
            
            return false;
          });
          var countainerCancel=$(".btn-cancel");
          if(countainerCancel){
            countainerCancel.bind('click',function(e){
              e.stopPropagation();
              container.hide();
            });
          }
          submit.bind("click",function(){
            submitCountryCode(resultCode,oldCode);
            container.hide()
            select_country_code_modal.hide();
            return false;
          });
          cancel.bind("click",function(){
            container.hide();
            select_country_code_modal.hide();
            return false
          });
        }
      });
    }
    select_country_code_modal.show();
    oldCode=resultCode;
  })
</script>
</body></html>