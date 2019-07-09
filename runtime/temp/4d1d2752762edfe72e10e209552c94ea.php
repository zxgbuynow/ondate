<?php /*a:3:{s:56:"/data/httpd/wx/application/common/view/base/loading.html";i:1553940778;s:60:"/data/httpd/wx/application/common/view/base/mobile_head.html";i:1553940778;s:60:"/data/httpd/wx/application/common/view/base/mobile_foot.html";i:1553940778;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <title><?php echo htmlentities((isset($page_title) && ($page_title !== '')?$page_title:'weiphp')); ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" href="/public/static/default/lib/jquery-weui/weui.min.css">
        <link rel="stylesheet" href="/public/static/default/lib/jquery-weui/jquery-weui.min.css">
    <link rel="stylesheet" type="text/css" href="/public/home/css/mobile_module.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL; ?>";
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
<!--     <script src="/public/static/base/js/dialog.js"></script> -->
    <script src="/public/static/flipsnap.min.js"></script>
    <script src="/public/static/mobile_module.js"></script>     

    
    <script src="/public/static/default/lib/weui/weui.min.js"></script>
    <script src="/public/static/default/lib/jquery-weui/jquery-weui.min.js"></script>
    
    
    
<!--     <script type="text/javascript" src="/public/static/jquery-2.0.3.min.js"></script> -->
<!--     <script type="text/javascript" src="/public/static/mobile_module.js"></script> -->
<!--     <script type="text/javascript" src="/public/static/base/js/dialog.js"></script> -->
<!-- 	<script type="text/javascript" src="//res.wx.qq.com/open/js/jweixin-1.0.0.js"></script> -->
<!-- 	<script type="text/javascript" src="/public/minify.php?f=mobile_head&v=<?php echo SITE_VERSION; ?>"></script> -->
	
	 <script src="/public/static/default/lib/jquery-weui/fastclick.js"></script>
    <script src="/public/static/default/lib/lazyload.min.js"></script>  
    <script src="/public/static/default/js/function.js"></script>
</head>
<link href="<?php echo SITE_URL; ?>/public/userCenter.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">

<style type="text/css">
body{ background:#fff}
</style>
<section class="check_box">
        	<img src="/public/home/images/checking1.png"/>
        	<p><?php echo htmlentities($msg); ?><br/>请勿退出该页面</p>
</section>
<script>
	window.location.href = "<?php echo $url; ?>";
</script>

<!-- Wap页面脚部 -->
<div style="height:0; visibility:hidden; overflow:hidden;">
<?php echo $tongji_code; ?>
</div>
</body>
</html>
