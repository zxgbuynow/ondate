<?php /*a:7:{s:82:"/data/httpd/wx/application/weixin/view/template_message/send_template_message.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/_nav.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
<meta content="<?php echo config('WEB_SITE_KEYWORD'); ?>" name="keywords"/>
<meta content="<?php echo config('WEB_SITE_DESCRIPTION'); ?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico">
<title><?php echo htmlentities((isset($page_title) && ($page_title !== '')?$page_title:'weiphp')); ?></title>
<link href="/public/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="/public/static/ymyui/css/ymyui.css">
<!-- <link rel="stylesheet" href="/public/static/bootstrap/css/bootstrap.css"> -->
<link href="/public/static/base/css/base.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/public/static/base/css/module.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/public/static/base/css/weiphp.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="//at.alicdn.com/t/font_727459_zyp88ew3c6.css"></link>

<!-- <link rel="stylesheet" src="/public/static/ymyui/css/ymyui.css"> -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/public/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION; ?>"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="/public/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/public/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<!-- <script type="text/javascript" src="/public/static/bootstrap/js/bootstrap.min.js"></script> -->
<!-- 菜单下拉 -->
<script src="//cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
<script type="text/javascript" src="/public/static/ymyui/js/ymyui.min.js"></script>



<script type="text/javascript" src="/public/static/uploadify/jquery.uploadify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script type="text/javascript" src="/public/static/base/js/dialog.js?v=<?php echo SITE_VERSION; ?>"></script>

<script type="text/javascript" src="/public/static/webuploader-0.1.5/webuploader.min.js"></script>

<script type="text/javascript" src="/public/static/base/js/admin_common.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/public/static/base/js/admin_image.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/public/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/public/static/jquery.dragsort-0.5.2.min.js"></script> 
<script src="//cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.all.min.js"></script>
<!-- 封装的jquery表单验证插件，依赖sweetalert2 -->
<script src="/public/static/default/lib/formverfiy.js"></script>
<script type="text/javascript">
var  IMG_PATH = "/public/static/base/images";
var  STATIC = "/public/static";
var  ROOT = "/public";
var  UPLOAD_PICTURE = "<?php echo U('home/File/upload_picture',array('session_id'=>session_id())); ?>";
var  UPLOAD_FILE = "<?php echo U('home/File/upload',array('session_id'=>session_id())); ?>";
var  UPLOAD_DIALOG_URL = "<?php echo U('home/File/upload_dialog',array('session_id'=>session_id())); ?>";
var COPY_PAGE_URL = "<?php echo U('home/index/copy'); ?>";
</script>
<!-- 页面header钩子，一般用于加载插件CSS文件和代码 -->
<?php echo hook('pageHeader'); ?>

    
</head>
<body>
	

	<!-- 主体 -->

<?php  //验证登录
  if(!is_login() && empty(cookie( '__forward__'))){
  $forward = cookie('__forward__');
            empty( $forward ) && cookie('__forward__', $_SERVER['REQUEST_URI']);
  //return redirect(U('home/user/login',array('from'=>4)));
  }  ?>
<div id="main-container" class="admin_container">
  <?php if(!(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty()))): ?>
    <div class="sidebar">
      <!-- 左侧栏用户信息 -->
      <div class="user-info">
        

        <a href="#" class="user-info-head">
            <img class="admin_head url" src="<?php echo SITE_URL; ?>/static/base/images/admin.jpg"/>
        </a>

        <div class="user-info-name"><?php echo htmlentities(getShort($myinfo['nickname'],4)); ?><i class="pl_5 fa fa-sort-down"></i>
          <div class="user-info-dropdown">
          <a href="<?php echo U('home/User/profile'); ?>">修改密码</a>
          <a href="<?php echo U('home/User/logout'); ?>">退出</a>
        </div>
        </div>

        
      </div>
      
    
      <div id="sidenav">
        <ul class="sidenav_sub">
          <?php if(is_array($top_menu['core_side_menu']) || $top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_side_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <li class="<?php echo htmlentities($vo['class']); ?>" data-id="<?php echo htmlentities($vo['id']); ?>"> <a href="<?php echo htmlentities($vo['url']); ?>"> <?php echo htmlentities($vo['title']); ?> </a><b class="active_arrow"></b></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="bar"></div>
        </ul>

      </div>

    </div>

  <?php endif; ?>
   
    <div class="main_body admin-body">
      <!-- 头部 -->
      <!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
  <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
  <div class="alert-content"></div>
</div>


<!-- 导航条
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="wrap">

       <a class="brand" title="<?php echo config('WEB_SITE_TITLE'); ?>" href="<?php echo U('home/index/main'); ?>">
       		<img height="52" src="/public/static/base/images/logo.png"/>
       </a>
      <?php  $index_2 = parse_name(MODULE_NAME) . '/' . parse_name(CONTROLLER_NAME) . '/*' ; $index_3 = parse_name(MODULE_NAME) . '/' . parse_name(CONTROLLER_NAME) . '/' . parse_name(ACTION_NAME );  ?>

            <div class="top_nav">
                <?php if(is_login()): ?>
                    <ul class="nav" style="margin-right:0">
                        <?php if(is_array($top_menu['core_top_menu']) || $top_menu['core_top_menu'] instanceof \think\Collection || $top_menu['core_top_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_top_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    	<li class="<?php echo htmlentities($vo['class']); ?>"><a href="<?php echo htmlentities($vo['url']); ?>" target="<?php echo htmlentities($vo['target']); ?>"><?php echo htmlentities($vo['title']); ?></a></li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
</div>
      <!-- /头部 -->
      
<style text='text/css'>
.image_material{
    border: 1px dashed #ddd;
    width: 308px;
    height: 196px;
     background: #eee;
    text-align: center;
    color: #333;
    display: block;
    float: left;
	margin-left:10px;
   display:none;
   position:relative;
}
.image_material .select_image{line-height: 196px; display:block; height:200px;}
.image_material .delete{ position:absolute; bottom:3px; left:3px; display:none}
.appmsg_area{ position:relative;}
.appmsg_area .delete{ position:absolute; bottom:10px; left:10px; z-index:1000; margin:10px;}
.voice_wrap{ width:308px;}
.video_wrap{ width:222px;}
#video_area{ height:250px}
.appmsg_area .select_video{  height: 240px;line-height: 240px; cursor:pointer}
.delete {
position: absolute;
bottom: 10px;
left: 10px;
z-index: 1000;
margin: 10px;
}
</style>
  <div class="span9 page_message">
  
    <section id="contents"> <?php  if(is_array($nav) && count($nav)>1) {  ?>
<ul class="tab-nav nav">
  <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <li class="<?php echo htmlentities($vo['class']); ?>"><a href="<?php echo isset($vo['url']) ? $vo['url'] :''; ?>"><?php echo htmlentities($vo['title']); ?><span class="arrow fa fa-sort-up"></span></a></li>
  <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php  }  if(!empty($sub_nav)): ?>
<div class="sub-tab-nav">
       <ul class="sub_tab">
       <?php if(is_array($sub_nav) || $sub_nav instanceof \think\Collection || $sub_nav instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li><a class="<?php echo htmlentities($vo['class']); ?>" href="<?php echo htmlentities($vo['url']); ?>"><?php echo htmlentities($vo['title']); ?><span class="arrow fa fa-sort-up"></span></a></li>
       <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div> 
<?php endif; if(!empty($normal_tips)): ?>
	<p class="normal_tips"><b class="fa fa-info-circle"></b> <?php echo $normal_tips; ?></p>
<?php endif; ?>
    
      <div class="tab-content"> 
      
      <div class="message_list" style="padding:10px;  text-align: left;color: #333;padding: 10px;background-color: #eaeaea;">
            <?php  isset($post_url) || $post_url = U('send_template_message', $get_param); ?>
            <form id="form" action="<?php echo htmlentities($post_url); ?>" method="post" class="form-horizontal form-center">
                  <div class="form-item cf toggle-send_type">
                    <label class="item-label">标题 <span class="check-tips"> </span></label>
                    <div class="controls">
                      <input type="text" name="title" class="text input-large" value="通知提醒">
                    </div>
                  </div>
                  
                <label class="item-label"> 发送内容 <span class="check-tips"> </span></label>
                <label class="textarea" style="position:relative; overflow:hidden; zoom:1;">
                    <textarea name="content" placeholder="请输入要发送的文本"  id='message_content'></textarea>
                 </label>
                 
                
                  
                  <div class="form-item cf toggle-send_type">
                    <label class="item-label">发起人 <span class="check-tips"> </span></label>
                    <div class="controls">
                      <input type="text" name="sender" class="text input-large" <?php if(!(empty($page_title) || (($page_title instanceof \think\Collection || $page_title instanceof \think\Paginator ) && $page_title->isEmpty()))): ?>value="<?php echo htmlentities($page_title); ?>"<?php endif; ?> >
                    </div>
                  </div>
                  
                  <div class="form-item cf toggle-send_type">
                    <label class="item-label">跳转链接 <span class="check-tips"> （链接需要加http://或https://）</span></label>
                    <div class="controls">
                      <input type="text" name="jamp_url" class="text input-large" value="">
                    </div>
                  </div>
                  
                  
                 <div class="form-item cf toggle-send_type">
                    <label class="item-label"> 发送方式 <span class="check-tips"> </span></label>
                    <div class="controls">
                      <select name="send_type">
                        <option selected="" toggle-data="group_id@show,send_openids@hide" class="toggle-data" value="0">按用户组发送 </option>
                        <option toggle-data="group_id@hide,send_openids@show" class="toggle-data" value="1">指定OpenID发送 </option>
                      </select>
                    </div>
                  </div>
                  <div class="form-item cf toggle-group_id">
                        <label class="item-label"> 群发对象 <span class="check-tips"> （全部用户或者某分组用户） </span></label>
                        <div class="controls">
                          <div id="dynamic_select_group_id"></div>
                          <select name="group_id">
                            <option toggle-data="全部用户" class="toggle-data" value="0">全部用户</option>
                            <?php if(is_array($group_list) || $group_list instanceof \think\Collection || $group_list instanceof \think\Paginator): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <option toggle-data="" class="toggle-data" value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?> </option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-item cf toggle-send_openids" style="display: none;">
                      	<a class="border-btn" href="javascript:;" onClick="selectUser()">选择指定的用户</a>
                        <br/>
                        <div class="mt10">指定的用户：<span id="send_openids" class="colorless"></span></div>
                        <br/>
                        <div style="display:none">
                            <label class="item-label"> 要发送的OpenID <span class="check-tips"> （多个可用逗号或者换行分开，OpenID值可在微信用户的列表中找到） </span></label>
                            <div class="controls">
                              <label class="textarea input-large">
                                <textarea name="send_openids"></textarea>
                              </label>
                            </div>
                        </div>
                      </div>
                      <!-- <div class="form-item cf ">
                        <label class="item-label"> 定时发送 </label>
						<div class="controls">
					         <input style="width:175px"  type="datetime" autocomplete="off" name="send_time" class="text time" value="" placeholder="请选择时间" />
					    </div>
                   	 </div> -->
                      
                 <button class="btn submit-btn ajax-post" id="submit1" type="button" target-form="form-horizontal">群 发</button>
                  &nbsp;&nbsp;&nbsp;&nbsp;
<!--                   <button onclick="preview()" class="border-btn submit-btn ajax-post">预览</button> -->
           		       	
            </form>
        </div>
       
      </div>
    </section>
  </div>



      <!-- 底部 -->
      <div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="https://www.weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">

(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "/public", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "/public", //项目公共目录地址
		"DEEP"   : "<?php echo config("pathinfo_depr"); ?>", //PATHINFO分割符
		"MODEL"  : ["<?php echo config("URL_MODEL"); ?>", "<?php echo config("URL_CASE_INSENSITIVE"); ?>", "<?php echo config("URL_HTML_SUFFIX"); ?>"],
		"VAR"    : ["<?php echo config("VAR_MODULE"); ?>", "<?php echo config("VAR_CONTROLLER"); ?>", "<?php echo config("VAR_ACTION"); ?>"]
	}
})();
</script>

<!-- 页面footer钩子，一般用于加载插件JS文件和JS代码 -->
<?php echo hook("pageFooter", "widget"); ?>
<div style="display:none"><?php echo $tongji_code; ?></div>


    </div>
    



</div>

	<!-- /主体 -->

	
    
  <link href="/public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
   <?php if(config('COLOR_STYLE')=='blue_color') echo '
   <link href="/public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/public/static/datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script>
   <script type="text/javascript">
$('#submit1').click(function(){
	var content=$('#message_content').val();
	if(content==''){
		alert('请输入要发送内容');
		return false;
	}
	if(confirm("确定要群发消息？")){
		$('#form').submit();
	}
});
$(function(){
	$('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:0,
        autoclose:true
    });
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
	showTab();
	
	$('.toggle-data').each(function(){
		var data = $(this).attr('toggle-data');
		if(data=='') return true;		
		
	     if($(this).is(":selected") || $(this).is(":checked")){
			 change_event(this)
		 }
	});
	
	$('select').change(function(){
		$('.toggle-data').each(function(){
			var data = $(this).attr('toggle-data');
			if(data=='') return true;		
			
			 if($(this).is(":selected") || $(this).is(":checked")){
				 change_event(this)
			 }
		});
	});
});
function selectUser(){
	$.WeiPHP.openSelectUsers("<?php echo U('weixin/UserCenter/lists',array('isAjax'=>1)); ?>",0,function(data){
		if(data && data.length>0){
			var idsArr  = new Array();
			var nameArr = new Array();
			for(var i=0;i<data.length;i++){
				idsArr.push(data[i].openid);
				nameArr.push(data[i].nickname);
			}
			$('textarea[name="send_openids"]').val(idsArr.toString());
			$('#send_openids').text(nameArr.toString());
			
		}
	})
}
</script> 
 <!-- 用于加载js代码 -->
    <div class="hidden"><!-- 用于加载统计代码等隐藏元素 -->
        
    </div>
  <!-- /底部 -->
  
  <script>
    // 判断一下侧边栏是否存在 
    $(function() {
      if(!$('.user-info-name').length > 0) {
        // 不存在
        $('.main_body').removeClass('admin-body')
      }
    })
  </script>
</body>
</html>
