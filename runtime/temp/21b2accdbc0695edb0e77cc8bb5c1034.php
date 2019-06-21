<?php /*a:8:{s:55:"/data/httpd/wx/application/common/view/base/import.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/_nav.html";i:1553940778;s:62:"/data/httpd/wx/application/common/view/base/weixinPreview.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
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
      
  <div class="span9 page_message">
    <section id="contents">
      <?php  if(is_array($nav) && count($nav)>1) {  ?>
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
        <!-- 表单 -->
        <?php  isset($post_url) || $post_url = U('add?model='.$model['id'], $get_param); ?>
        <form id="form" action="<?php echo htmlentities($post_url); ?>" method="post" class="form-horizontal form-center">
          <!-- 基础文档模型 -->
          <?php $_result=parse_config_attr($model['field_group']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?>
            <div id="tab<?php echo htmlentities($key); ?>" class="tab-pane <?php if($key == '1'): ?>in
              <?php endif; ?>
              tab<?php echo htmlentities($key); ?>">
              <?php if(is_array($fields) || $fields instanceof \think\Collection || $fields instanceof \think\Paginator): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['is_show'] == 4): ?>
                  <input type="hidden" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo I($field['name'], $field['value']); ?>">
                <?php endif; if($field['is_show'] == 1 || $field['is_show'] == 2 || ($field['is_show'] == 5 && I($field['name']))): ?>
                  <div class="form-item cf toggle-<?php echo htmlentities($field['name']); ?>">
                    <label class="item-label">
                    <?php if(!(empty($field['is_must']) || (($field['is_must'] instanceof \think\Collection || $field['is_must'] instanceof \think\Paginator ) && $field['is_must']->isEmpty()))): ?><span class="need_flag">*</span><?php endif; ?>
                    <?php echo htmlentities($field['title']); ?>
                    <span class="check-tips">
                      （支持xls,xlsx两种格式<?php if(!(empty($import_template) || (($import_template instanceof \think\Collection || $import_template instanceof \think\Paginator ) && $import_template->isEmpty()))): ?>，导入的模板可点击<a href="/public/static/import_template/<?php echo htmlentities($import_template); ?>">这里下载</a><?php endif; ?>）
                      </span></label>
                    <div class="controls">
                      <?php switch($field['type']): case "file": ?>
                          <div class="col-sm-8 upload_file" rel="<?php echo htmlentities($field['name']); ?>" style="padding-left:0">
                          	<div id='upload_file_<?php echo htmlentities($field['name']); ?>' class='uploadrow_file'></div>
                        	<input type="hidden" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities((isset($data[$field['name']]) && ($data[$field['name']] !== '')?$data[$field['name']]:'')); ?>" data-fileexts="<?php echo htmlentities((isset($field['validate_file_exts']) && ($field['validate_file_exts'] !== '')?$field['validate_file_exts']:'')); ?>" data-maxsize="<?php echo htmlentities($field['validate_file_size']); ?>"/>
                        	
<!--                             <input type="file" id="upload_file_<?php echo htmlentities($field['name']); ?>"> -->
<!--                             <input type="hidden" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities((isset($data[$field['name']]) && ($data[$field['name']] !== '')?$data[$field['name']]:'')); ?>"/> -->
                            <div class="upload-img-box">
                              <?php if(!(empty($data[$field['name']]) || (($data[$field['name']] instanceof \think\Collection || $data[$field['name']] instanceof \think\Paginator ) && $data[$field['name']]->isEmpty()))): ?>
                                <div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo htmlentities(get_table_field($data[$field['name']],'id','name','File')); ?></div>
                              <?php endif; ?>
                            </div>
                          </div>
                              

                        <?php break; default: ?>
                        <input type="text" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo I($field['name'], $field['value']); ?>">
                      <?php endswitch; ?>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endforeach; endif; else: echo "" ;endif; ?>
          <?php endforeach; endif; else: echo "" ;endif; ?>
          <div class="form-item cf">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">导 入</button>
             </div>
             
        </form>
        </div>
        <!--通用的微信预览模板-->
<!--头部标题栏-->
<!--鉴于样式title放进具体每块模块-->
<!--CSS模块-->
<div class="weixin-preview">
	<p class="preview-tips">微信回复预览</p>
	<div class="weixin-box">
	<p class="weixin-title"></p>
    <div class="weixin-cover"><img class="weixin-cover-pic" src=""/></div>
    <p class="weixin-content">
    	
    </p>
</div>
<script type="text/javascript">
$('.tab-content').addClass('has-weixinpreivew');
if($('input[name="title"]').val()!=undefined){
	$('.weixin-title').html($('input[name="title"]').val());
}else{
	$('.weixin-title').html($('input[name="title"]').val());
}
if($('textarea[name="content"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="content"]').val());
}else if($('textarea[name="intro"]').val()!=undefined){
	$('.weixin-content').html($('textarea[name="intro"]').val());
	}else{
	$('.weixin-content').html($('textarea[name="info"]').val());	
}
var weixin_cover_picurl = $('#cover_id_picurl').next().find('img').attr('src');
if(weixin_cover_picurl==undefined)weixin_cover_picurl=$('#cover_id_cover').next().find('img').attr('src');
if($('#cover_id_cover').val()==undefined && $('#cover_id_picurl').val()==undefined){
	$('.weixin-preview').hide();
	}
if(weixin_cover_picurl==undefined || weixin_cover_picurl==""){
	$('.weixin-cover-pic').attr('src',"/public/static/base/images/no_cover.png");
}else{
	$('.weixin-cover-pic').attr('src',weixin_cover_picurl);
}
$('input[name="title"]').keyup(function(){
	$('.weixin-title').html($(this).val());
	});
$('textarea[name="content"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="info"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="des_jj"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});
$('textarea[name="intro"]').keyup(function(){
	$('.weixin-content').html($(this).val());
	});	
</script>
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

	
    

<script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});
$(function() {
    initUploadFile();
});
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
