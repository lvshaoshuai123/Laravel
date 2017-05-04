!function(t){function e(i){if(a[i])return a[i].exports;var n=a[i]={exports:{},id:i,loaded:!1};return t[i].call(n.exports,n,n.exports,e),n.loaded=!0,n.exports}var a={};return e.m=t,e.c=a,e.p="",e(0)}([function(t,e,a){t.exports=a(1)},function(t,e,a){a(2),function(t){function e(e,a){var i=e,n=d,r={bts:t.cookie("xm_order_btauth")||null,id:i.attr("data-address_id"),area:i.attr("data-area"),type:i.attr("data-type")};"new"===a?(s={},n+="?bts="+r.bts+"&action="+a+"&address_match="+r.type):"edit"===a&&(s={address_id:i.attr("data-address_id"),consignee:i.attr("data-consignee"),tel:i.attr("data-tel"),province_id:i.attr("data-province_id"),province_name:i.attr("data-province_name"),city_id:i.attr("data-city_id"),city_name:i.attr("data-city_name"),district_id:i.attr("data-district_id"),district_name:i.attr("data-district_name"),area:i.attr("data-area")?i.attr("data-area"):"",address:i.attr("data-address"),tag_name:i.attr("data-tag_name")?i.attr("data-tag_name"):""},n+="?id="+r.id+"&area="+r.area+"&bts="+r.bts+"&action="+a),o.off(".addr").on("show.addr",function(){t(this).css({top:i.offset().top-10,left:i.offset().left-33}),t(this).find("iframe").attr("src",n)}).modal({show:!0,backdrop:"static"}).on("hide.addr",function(){t(this).find("iframe").removeAttr("src")})}var a=t("#J_newAddress"),i=t(".J_addressModify"),n=t(".J_addressDel"),o=t("#J_modalEditAddress"),d=MI.GLOBAL_CONFIG.orderSite+"/address/add.php",s={};a.on("click",function(a){var i=t(this),n=i.closest(".address-item");a.preventDefault(),MI.checkUserRisk.init({action:"addr_add",callback:function(){e(n,"new")}})}),i.on("click",function(a){var i=t(this),n=i.closest(".address-item");a.preventDefault(),MI.checkUserRisk.init({action:"addr_add",callback:function(){e(n,"edit")}})}),n.on("click",function(e){var a=t(this),i=a.closest(".address-item");e.preventDefault(),a.hasClass("disabled")||MI.checkUserRisk.init({action:"addr_delete",callback:function(){if(window.confirm("确定删除该地址吗？")){a.addClass("disabled");var e=t.cookie("xm_order_btauth")||null,n=window.getUserTiskToken();t.ajax({type:"POST",url:MI.GLOBAL_CONFIG.orderSite+"/address/delete.php?bts="+e,data:{id:a.attr("data-id"),risk_token:n},dataType:"json",success:function(t){a.removeClass("disable"),1!==t.code?alert(t.msg):i.fadeOut(500)}})}}})}),window.editAddressCallback={save:function(t){1===t.code?location.reload():alert(t.msg)},cancel:function(){o.modal("hide")},getAddress:function(){return s}},window.getUserTiskToken=function(){return t.cookie("miUserRiskToken")||""}}(jQuery)},function(t,e){MI.checkUserRisk=function(){function t(){return multiline(function(){/*!@tpl
	<div  class="modal modal-hide fade modal-user-risk" id="J_modalUserRisk">
	    <div class="modal-hd">
	        <h3 class="title">验证信息</h3>
	        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
	    </div>
	    <div class="modal-bd">
	        <h3 class="title">您的账号存在风险</h3>
	        <p class="desc">如需继续操作，我们将向您绑定的手机 <span id="J_userRiskPhone"></span> 发送验证码</p>

	        <div class="form-section">
	            <label class="input-label" for="J_riskCode">输入验证码</label>
	            <input class="input-text input-url" type="text" id="J_riskCode" name="J_riskCode" />
	            <a href="javascript:void(0);" class="btn btn-get" id="J_getRiskCode">获取验证码 &gt;</a>
	            <span href="javascript:void(0);" class="btn btn-coutdown hide" id="J_riskCoutdown"></span>
	        </div>
	        <div class="tip-msg" id="J_riskTipMsg"></div>
	    </div>
	    <div class="modal-ft">
	        <a class="btn btn-gray" data-dismiss="modal" href="javascript: void(0);">取消</a>
	        <a class="btn btn-primary" href="javascript: void(0);" id="J_submitRiskCode">提交</a>
	    </div>
	</div>
	  */
console.log()})}function e(){return multiline(function(){/*!@tpl
	<div  class="modal modal-hide fade modal-user-risk" id="J_modalUserRisk">
	    <div class="modal-hd">
	        <h3 class="title">验证信息</h3>
	        <a class="close" data-dismiss="modal" href="javascript: void(0);"><i class="iconfont">&#xe602;</i></a>
	    </div>
	    <div class="modal-bd">
	        <h3 class="title">您的账号存在风险</h3>
	        <p class="desc">如需继续操作，请前往账号中心完成安全设置</p>
	        <a href="https://account.xiaomi.com/pass/auth/security/home" class="btn btn-primary "
	        id="J_riskPortalLink" target="_blank">前往小米账号中心</a>
	    </div>
	</div>
	  */
console.log()})}function a(){var a=MI.GLOBAL_CONFIG.orderSite+"/risk/checkuser",n=$.cookie("miUserRiskToken")||"";$.ajax({type:"POST",url:a,dataType:"json",data:{risk_token:n},timeout:5e3,error:function(){alert("抱歉！网络超时，请刷新重试！")},success:function(a){-1===a.code?(r(),a.data&&a.data.safe_mobile?($("body").append(t()),$("#J_userRiskPhone").html(a.data.safe_mobile)):$("body").append(e()),i()):1===a.code&&"function"==typeof u.callback?u.callback():alert(a.msg)}})}function i(){var t=$("#J_modalUserRisk");MI.form.init(),t.modal({show:!0,backdrop:"static"}),$("#J_submitRiskCode").on("click",function(){return d(),!1}),$("#J_getRiskCode").on("click",function(){return n(),!1})}function n(){var t=MI.GLOBAL_CONFIG.orderSite+"/risk/sendsms";$.ajax({type:"POST",url:t,dataType:"json",data:{sms_action:u.action},success:function(t){1===t.code?o():s(t.msg)}})}function o(){var t,e=60,a=$("#J_riskCoutdown"),i=function(){return a.html(e+"秒后重新获取"),e-=1,t&&clearTimeout(t),0>=e?(a.addClass("hide").siblings(".btn").removeClass("hide"),!1):void(t=setTimeout(i,1e3))};s(),a.removeClass("hide").siblings(".btn").addClass("hide"),i()}function d(){var t=$.trim($("#J_riskCode").val()),e=MI.GLOBAL_CONFIG.orderSite+"/risk/checksmscode";return t?void $.ajax({type:"POST",url:e,dataType:"json",data:{sms_code:t},timeout:5e3,error:function(){s("抱歉！网络超时，请重试!")},success:function(t){1===t.code&&"function"==typeof u.callback?($("#J_modalUserRisk").modal("hide"),$.cookie("miUserRiskToken",t.data.risk_token,{expires:1,path:"/",domain:"mi.com"}),u.callback()):s(t.msg)}}):void s("请输入正确的验证码!")}function s(t){$("#J_riskTipMsg").html(t?t:"")}function r(){$("#J_modalUserRisk").remove(),$.cookie("miUserRiskToken",null)}function c(t){u=$.extend(l,t||{}),a()}var l={action:"",callback:$.noop},u={};return{init:c}}()}]);