<?php /*a:2:{s:57:"/data/httpd/wx/application/weixin/view/wap/vue_login.html";i:1553940778;s:57:"/data/httpd/wx/application/shop/view/wap/common_file.html";i:1553940778;}*/ ?>
 <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        

        <script src="/public/static/default/lib/flexible/flexible.min.js"></script>
<!-- 
        <link rel="stylesheet" href="/public/static/default/lib/jquery-weui/weui.min.css">
        <link rel="stylesheet" href="/public/static/default/lib/jquery-weui/jquery-weui.min.css">
        <link rel="stylesheet" href="/public/static/default/lib/swiper/swiper-4.3.3.min.css">
        <link rel="stylesheet" href="/public/static/default/lib/animate.css">
        <link rel="stylesheet" href="/public/static/default/css/iconfont.css"> -->
        <link rel="stylesheet" href="/public/static/default/dist/main.css">
        <link href="/public/static/diy_page.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">

        <title><?php echo htmlentities($page_title); ?></title>
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL; ?>";
		var CARD_URL = "<?php echo U('card/wap/member_center'); ?>";
		var IMG_PATH = "/public/weixin/images";
		var STATIC_PATH = "/public/static";
		var WX_APPID = '<?php if(!(empty($jsapiParams['appId']) || (($jsapiParams['appId'] instanceof \think\Collection || $jsapiParams['appId'] instanceof \think\Paginator ) && $jsapiParams['appId']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['appId']); ?><?php endif; ?>';
		var	WXJS_TIMESTAMP='<?php if(!(empty($jsapiParams['timestamp']) || (($jsapiParams['timestamp'] instanceof \think\Collection || $jsapiParams['timestamp'] instanceof \think\Paginator ) && $jsapiParams['timestamp']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['timestamp']); ?><?php endif; ?>'; 
		var NONCESTR= '<?php if(!(empty($jsapiParams['nonceStr']) || (($jsapiParams['nonceStr'] instanceof \think\Collection || $jsapiParams['nonceStr'] instanceof \think\Paginator ) && $jsapiParams['nonceStr']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['nonceStr']); ?><?php endif; ?>'; 
		var SIGNATURE= '<?php if(!(empty($jsapiParams['signature']) || (($jsapiParams['signature'] instanceof \think\Collection || $jsapiParams['signature'] instanceof \think\Paginator ) && $jsapiParams['signature']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['signature']); ?><?php endif; ?>'; 
	</script>        
        
    <script src="/public/static/default/lib/jquery-3.3.1.min.js"></script>
    <script src="/public/static/default/lib/swiper/swiper-4.3.3.min.js"></script>  
    
    <script src="/public/static/default/lib/jweixin-1.0.0.js"></script>   
    <script src="/public/static/base/js/dialog.js"></script>
    <script src="/public/static/flipsnap.min.js"></script>
    <script src="/public/static/mobile_module.js"></script>     

    
    <script src="/public/static/angular.min.js"></script>
    <script src="/public/static/shop.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script src="/public/static/default/lib/weui/weui.min.js"></script>
    <script src="/public/static/default/lib/jquery-weui/jquery-weui.min.js"></script>
    
    
    

    </head>

<body ng-controller="commonCtrl">
    
    
<style type="text/css">
    .page-hint {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #fff;
				flex-direction: column;
    }
	
@-webkit-keyframes rotate {
  from {-webkit-transform:rotate(0deg);}
  to {-webkit-transform:rotate(360deg);}
}	
.page-hint img {
  -webkit-animation-name: rotate;
  -webkit-animation-duration: 1.5s;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
	margin-bottom: 10px;
}	
</style>

<body class="index">

    <div class="page-hint">
			<img src="/public/home/images/checking1.png"/>
			<p>自动获取用户信息中...</p>
    </div>
</body>
<script type="text/javascript">
    var openid = "<?php echo htmlentities($openid); ?>";
    var uid = <?php echo htmlentities((isset($uid) && ($uid !== '')?$uid:0)); ?>;
    var sid = "<?php echo htmlentities($sid); ?>";
    var pbid = "<?php echo htmlentities($pbid); ?>";
    var public_name = "<?php echo htmlentities($public_name); ?>";
    if (openid != '' && openid != -1 && openid != -2 && uid > 0) {
        window.localStorage.setItem('openid', openid)
        window.localStorage.setItem('uid', uid)
        window.localStorage.setItem('PHPSESSID', sid)
        window.localStorage.setItem('public_name', public_name)
        setTimeout(function() {
            window.location.href = window.localStorage.getItem("prevUrl") ||"<?php echo SITE_URL; ?>/wap/index.html?pbid=" + pbid 
        }, 3000)
    }
</script>


    <script src="/public/static/default/lib/jquery-weui/fastclick.js"></script>
    <script src="/public/static/default/lib/lazyload.min.js"></script>  
    <script src="/public/static/default/js/function.js"></script>


</body>

</html>
