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
<title>
  小米帐号 - 重置密码
</title>

		<link type="text/css" rel="stylesheet" href="{{ asset('Home/newpwd/css/reset.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('Home/newpwd/css/layout.css') }}">
		<link type="text/css" rel="stylesheet" href="{{ asset('Home/newpwd/css/registerpwd.css') }}">

	
</head>
<body class="zh_CN">
<div class="wrapper">
<div class="wrap">
<div class="layout">  
  <div class="n-frame device-frame reg_frame">
    <div class="external_logo_area"><a class="milogo" href="javascript:void(0)"></a></div>
    <div class="title-item t_c">
      <h4 class="title_big30">重置密码</h4>
    </div>
    <form action="/home1/newpwd" method="post" id="resetPwdForm">
    {{ csrf_field() }}
      <!-- <input name="qs" value="" type="hidden"> -->
      <input type="hidden" value={{ $id }} name='User_id'>
      <div class="regbox">
        <div class="step3">                  
          <dl>
            <dt><h4>请重设您的帐号密码</h4></dt>
            <dd>
              <div class="inputbg">
                <!-- 错误添加class为err_label -->
                <label class="labelbox" for="">
                  <input id="pwd" name="User_pwd" placeholder="请输入新密码" type="password">
                </label>        
              </div>
            </dd>
            <dd>
              <div class="inputbg">
                <!-- 错误添加class为err_label -->
                <label class="labelbox" for="">
                  <input id="repwd" name="User_pwdd" placeholder="请输入确认密码" type="password">
                  <!-- <input name="userId" value="1249847722" type="hidden"> 
                  <input name="passportsecurity_ph" id="passportsecurity_ph" value="QhtlswbuI8gbs6mSlnHKdw==" type="hidden"> -->
                </label>        
              </div>
            </dd>
          </dl>        
          <div class="err_tip">
            <div class="dis_box">
              <em class="icon_error"></em>
              <span id="error_con"></span>
            </div>
          </div>
          <div class="err_tip pwd_tip" id="pwd_tips" style="display:block;">
            <div class="dis_box">
              <em class="icon_error"></em>
              <span>
                密码长度6~16位，数字、字母、字符至少包含两种
              </span>
            </div>
          </div>        
          <div class="fixed_bot mar_phone_dis3">
            <input class="btn332 btn_reg_1" value="提交" type="submit">
          </div>    
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
    
      |<li><a class="a_critical" href="" target="_blank"><em></em>常见问题</a></li>
    
  </ul>
  </div>
  <p class="nf-intro"><span>小米公司版权所有-京ICP备10046444-<a class="beianlink beian-record-link" target="_blank" href=""><span></span>京公网安备11010802020134号</a>-京ICP证110507号</span></p>
</div>
<script src="{{ asset('Home/newpwd/js/jquery-1.js') }}"></script>
<script src="{{ asset('Home/newpwd/js/placeholder.js') }}"></script>

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
  callback:"",
  sid:"",
  
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
  var popContainer= '<div style="display:block;" class="popup_mask"' 
pchide sysBrowserTip">'+'"
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
var pt_ph = document.getElementById("passportsecurity_ph");
var c = document.cookie.split(";");
ptValue = "";
phValue = "";
for(var i = 0 ; i < c.length ; i++){
  if(c[i].indexOf("passportsecurity_ph") > -1){
    phValue = c[i].substring(c[i].indexOf("=")+1);
  }
}
if(pt_ph){
	pt_ph.value= phValue;
}
})();
</script>



<script>
var MSG={
  empty:"请输入新密码",
  ruleError:"密码长度8~16位，数字、字母、字符至少包含两种",
  lenError:"密码长度为8~16位",
  AllLetterError:"密码不能全为字母",
  AllNumError:"密码不能全为数字",
  AllCharError:"密码长度8~16位，数字、字母、字符至少包含两种",
  SameWithEmail:"密码不能与邮箱相同",
  lackNormal:"密码不能全为字符",
  SameWithOld:"不能与原密码相同",
  repeatEmpty:"请输入确认密码",
  repeatError:"密码输入不一致",
  samePwdError:"不能与原密码相同",
  sameWithMail:"密码不能与邮箱相同",
  sameWithBlackList:"您的密码可能存在安全风险，请您重新设置一个全新的密码",
  pwdRiskError:"新密码不能包含小米帐号，绑定手机，绑定邮箱",
  systemError:"系统错误，请稍后再试"
}
$("input[placeholder]").miPlaceholder();
var form=$("#resetPwdForm");
var pwd=$("#pwd");
var repwd=$("#repwd");
var errorCon=$("#error_con");
var pwdTips=$("#pwd_tips");
function showError(text,el){
  if(text){
    errorCon.html(text);
    errorCon.parent().parent().show();
    el && el.parent().addClass("err_label");
  }else{
    errorCon.html("");
    errorCon.parent().parent().hide();
    el && el.parent().removeClass("err_label");
  }
  if(text===MSG.ruleError){
    pwdTips.hide();
  }else{
    pwdTips.show();
  }
}
/*jsp 回传的错误显示*/
var error="";
if(error){
  var _txt_=MSG.ruleError;
  if(parseInt(error)===110061001){
    _txt_=MSG.samePwdError;
  }
  if(parseInt(error)===110071001){
    _txt_=MSG.sameWithMail;
  }
  //密码黑名单
  if(parseInt(error)===410081001){
    _txt_=MSG.sameWithBlackList;
  }
  //密码不能含ID,PH,EM
  if(parseInt(error)===110091001){
    _txt_=MSG.pwdRiskError;
  }
  if(parseInt(error)===550035000 || parseInt(error)===550025000){
    _txt_=MSG.systemError;
  }
  showError(_txt_,pwd);
}
/*focus 取消错误显示*/
pwd.bind("focus",function(){
  if( pwd.parent().hasClass("err_label") ){
    showError("",pwd);
  }
});
repwd.bind("focus",function(){
  if( repwd.parent().hasClass("err_label") ){
    showError("",repwd);
  }
});
/*绑定提交事件*/
form.bind("submit",function(){
  var val=pwd.val();
  var reval=repwd.val();
  var msg="";
  var el=pwd;
  if(val===""){
    msg=MSG.empty
  }else if( val.length<6 || val.length >16){
    msg=MSG.ruleError;//MSG.lenError;
  }else if(/^\d+$/.test(val)){
    msg=MSG.ruleError;//MSG.AllNumError;全数字错误
  }else if(/^[A-Za-z]+$/.test(val)){
    msg=MSG.ruleError;//MSG.AllLetterError;全字母错误
  }else if(/^[^A-Za-z0-9]+$/.test(val)){
    msg=MSG.ruleError;//MSG.AllCharError;不包含一个数字字母也是错的。
  }else if(reval===""){
    msg=MSG.repeatEmpty;
    el=repwd;
  }else if(val!==reval){
    msg=MSG.repeatError;
    el=repwd;
  }
  if(msg){
    showError(msg,el);
    return false;
  }
});
</script>
</body></html>