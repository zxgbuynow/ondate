<?php /*a:47:{s:55:"/data/httpd/wx/application/shop/view/diy_page/edit.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/_nav.html";i:1553940778;s:65:"/data/httpd/wx/application/shop/view/diy_template/allDisplay.html";i:1553940778;s:61:"/data/httpd/wx/application/shop/view/diy_template/header.html";i:1553940778;s:63:"/data/httpd/wx/application/shop/view/diy_template/richtext.html";i:1553940778;s:60:"/data/httpd/wx/application/shop/view/diy_template/goods.html";i:1553940778;s:68:"/data/httpd/wx/application/shop/view/diy_template/mutipic_goods.html";i:1553940778;s:61:"/data/httpd/wx/application/shop/view/diy_template/banner.html";i:1553940778;s:69:"/data/httpd/wx/application/shop/view/diy_template/mutipic_banner.html";i:1553940778;s:62:"/data/httpd/wx/application/shop/view/diy_template/piclist.html";i:1553940778;s:60:"/data/httpd/wx/application/shop/view/diy_template/blank.html";i:1553940778;s:60:"/data/httpd/wx/application/shop/view/diy_template/title.html";i:1553940778;s:62:"/data/httpd/wx/application/shop/view/diy_template/textnav.html";i:1553940778;s:61:"/data/httpd/wx/application/shop/view/diy_template/picnav.html";i:1553940778;s:66:"/data/httpd/wx/application/shop/view/diy_template/searchgoods.html";i:1553940778;s:64:"/data/httpd/wx/application/shop/view/diy_template/blankline.html";i:1553940778;s:59:"/data/httpd/wx/application/shop/view/diy_template/case.html";i:1553940778;s:60:"/data/httpd/wx/application/shop/view/diy_template/case2.html";i:1553940778;s:61:"/data/httpd/wx/application/shop/view/diy_template/notice.html";i:1553940778;s:65:"/data/httpd/wx/application/shop/view/diy_template/usercenter.html";i:1553940778;s:66:"/data/httpd/wx/application/shop/view/diy_template/goodsdetail.html";i:1553940778;s:66:"/data/httpd/wx/application/shop/view/diy_template/fixedmodule.html";i:1553940778;s:64:"/data/httpd/wx/application/shop/view/diy_template/allEditor.html";i:1553940778;s:68:"/data/httpd/wx/application/shop/view/diy_template/header-editor.html";i:1553940778;s:70:"/data/httpd/wx/application/shop/view/diy_template/richtext-editor.html";i:1553940778;s:67:"/data/httpd/wx/application/shop/view/diy_template/goods-editor.html";i:1553940778;s:75:"/data/httpd/wx/application/shop/view/diy_template/mutipic_goods-editor.html";i:1553940778;s:68:"/data/httpd/wx/application/shop/view/diy_template/banner-editor.html";i:1553940778;s:76:"/data/httpd/wx/application/shop/view/diy_template/mutipic_banner-editor.html";i:1553940778;s:69:"/data/httpd/wx/application/shop/view/diy_template/piclist-editor.html";i:1553940778;s:67:"/data/httpd/wx/application/shop/view/diy_template/blank-editor.html";i:1553940778;s:67:"/data/httpd/wx/application/shop/view/diy_template/title-editor.html";i:1553940778;s:69:"/data/httpd/wx/application/shop/view/diy_template/textnav-editor.html";i:1553940778;s:68:"/data/httpd/wx/application/shop/view/diy_template/picnav-editor.html";i:1553940778;s:73:"/data/httpd/wx/application/shop/view/diy_template/searchgoods-editor.html";i:1553940778;s:71:"/data/httpd/wx/application/shop/view/diy_template/blankline-editor.html";i:1553940778;s:66:"/data/httpd/wx/application/shop/view/diy_template/case-editor.html";i:1553940778;s:67:"/data/httpd/wx/application/shop/view/diy_template/case2-editor.html";i:1553940778;s:68:"/data/httpd/wx/application/shop/view/diy_template/notice-editor.html";i:1553940778;s:72:"/data/httpd/wx/application/shop/view/diy_template/usercenter-editor.html";i:1553940778;s:73:"/data/httpd/wx/application/shop/view/diy_template/goodsdetail-editor.html";i:1553940778;s:73:"/data/httpd/wx/application/shop/view/diy_template/fixedmodule-editor.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
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
      
  <link href="/public/static/diy_page.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
  <link type="text/css" rel="stylesheet" href="/public/static/colorpicker/colpick.css?v=<?php echo SITE_VERSION; ?>"/>
  <style type="text/css">
    .app_editor input[type="radio"], .app_editor input[type="checkbox"] {vertical-align: middle;}
    .app_editor {overflow: hidden;}
    .app_editor .form_item label {width: auto;}
    /*隐藏多余组件*/
    #edui1,#edui133{max-width: 420px !important;min-width: auto}
    #edui110,#edui116,#edui131,#edui240,#edui246,#edui251,#edui256,#edui261{
        display:none !important;
    }
    .upload-img-box {
      position: static;
    }
  </style>
  <script src="/public/static/angular.min.js"></script>
  <script type="text/javascript" src="/public/static/colorpicker/colpick.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script> 
  <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.config.js?v=<?php echo SITE_VERSION; ?>"></script>
  <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/ueditor.all.js?v=<?php echo SITE_VERSION; ?>"></script>
   <script type="text/javascript" charset="utf-8" src="/public/static/ueditor/lang/zh-cn/zh-cn.js?v=<?php echo SITE_VERSION; ?>"></script>
   <script type="text/javascript" charset="utf-8" src="/public/static/init_editor.js?v=<?php echo SITE_VERSION; ?>"></script>
   <script type="text/javascript" charset="utf-8" src="/public/static/flipsnap.min.js?v=<?php echo SITE_VERSION; ?>"></script>
   
  <!-- 标签页导航 -->
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
    <?php  $post_url || $post_url = U('edit?model='.$model['id'], $get_param); ?>
    <form id="form" action="<?php echo htmlentities($post_url); ?>" method="post" class="form-horizontal form-center" ng-controller="commonCtrl">
     
      <div class="page_diy_container">
			<div class="page_left app_preview">
            	<div class="app_header"></div>
                <div class="app_inner"  ng-style="{'background-color' : activeModules[0].params.bgColor}">
                    


                    <div class="app-content">
                        <div class="modules" id="modules">
                            <div ng-click="editItem(module)" ng-if="module['id']" id="module-{{module.index}}" name="{{module.id}}" index="{{module.index}}" ng-class="{'modules-actions': activeItem.index == module.index, 'js-sorttable' : !module.issystem,'edit_panel':!module.disable,'disable_muodule':module.disable}" ng-repeat="module in activeModules track by $index" on-finish-render-filters>
                                <div ng-init="displayPanel = ('widget-'+(module['id'].toLowerCase())+'-display.html')" ng-include="displayPanel"></div>
                                <div class="edit_cover">
                                    
                                </div>
                                <div class="aciton_wrap">
                                    <span class="action edit" ng-click="editItem(module)">编辑</span>
                                    <span ng-show="!module.issystem" class="action remove" data-container="body" data-toggle="popover" data-placement="left" ng-click="deleteItem(module)">删除</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add_page_widget">
                    <em class="arrow-top"></em>
                    <h4 class="text-center">添加内容</h4>
                    <ul class="widget_btn_list">
                        <li ng-repeat="m in modules" ng-if="!m.issystem" ng-click="addItem(m['id'])"><a id="{{m['id']}}" class="border-btn" href="javascript:;" ng-bind="m['name']"></a></li>
                    </ul>
                </div>
            	<div class="app_footer"><em></em></div>
            </div>
            <div class="page_right">
            	<div class="form_wrap">
            		
                	<div ng-init="editorPanel = ('widget-'+(activeItem['id'].toLowerCase())+'-editor.html'.toLowerCase())" ng-show="activeItem.id == editorid" ng-repeat="editorid in editors" ng-include="editorPanel" id="editor{{editorid}}" class="editor">
                	
                	</div>
               	</div>
               	
           </div>
      </div>
      <div class="form-item mt-4" style="margin-left: 580px">
        <?php if(!(empty($data['id']) || (($data['id'] instanceof \think\Collection || $data['id'] instanceof \think\Paginator ) && $data['id']->isEmpty()))): ?>
          <input type="hidden" name="id" value="<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>">
        <?php endif; ?>
        <button class="btn submit-btn ajax-post" id="submit" type="button" ng-click="submitForm()" target-form="form-horizontal"><?php echo htmlentities((isset($submit_name) && ($submit_name !== '')?$submit_name:'确 定')); ?></button>
        <div class="temp_click" ng-click="tempClick($event)" ng-model="activeItem.params.id" style="visibility:hidden"></div>
      </div>
      <a href="#" class="color_picker_hide" ng-model="colorValue">&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <script type="text/ng-template" id="widget-header-display.html">
	<div class="titlebar">{{module.params.title}}</div>
</script>
<script type="text/ng-template" id="widget-richtext-display.html">
	<div class="diy_richtext" ng-style="{'background-color':module.params.bgColor,'color':module.params.color,'font-size':module.params.fontsize+'px','text-align':module.params.align}" ng-bind-html="module.params.content|to_trusted"></div>
</script>
<script type="text/ng-template" id="widget-goods-display.html">
	<div class="goods_list"  ng-switch="module.params.list_style">
<ul class="big_list" ng-switch-when="1">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
        	<p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
        </a>
    </li>
</ul>
<ul class="small_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}" class="goods_img">
        	<img ng-if="m.img" src="{{m.img}}"/>
        </a>
        <a  href="{{m.url}}" class="info">
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <p class="btn_p" ng-show="module.params.show_btn"><span class="btn">立即购买</span></p>
        </a>
    </li>
</ul>
<ul class="list_1_2" ng-switch-when="3">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
            <div class="info">
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <p class="btn_p" ng-show="module.params.show_btn"><span class="btn">立即购买</span></p>
            </div>
    	</a>
    </li>
</ul>
<ul class="common_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
    	</a>
    </li>
</ul>
</div>
</script>
<script type="text/ng-template" id="widget-mutipic_goods-display.html">
  
<section class="mutipic_goods" data-colGoods="{{module.params.colGoods}}" id="mutipic_goods{{module.index}}" ng-show="module.params.goods_list.length">
<ul>
    <li ng-repeat="m in module.params.goods_list track by $index" on-finish-render-filters>
    	<a href="{{m.url}}">
        	<div class="goods-img"><img ng-if="m.img" src="{{m.img}}"/></div>
        	<p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
        </a>
    </li>
</ul>
    <span class="mutipic_banner_identify" style="left:auto;top:0;right:0;">
        <span  class="pointer">
        </span>       
    </span>
</section>

</script>
<script type="text/ng-template" id="widget-banner-display.html">
	<div class="default_div" ng-show="!module.params.banner_list.length">请幻灯片图片</div>
<section class="banner" ng-show="module.params.banner_list.length" id="banner{{module.index}}">
    <ul>
    	<li ng-repeat="b in module.params.banner_list" on-finish-render-filters>
            <div class="upload-img-box">
                <a href="{{b.url}}"><img src="{{b.pic}}"/></a>
            </div>
            <span ng-show="module.params.show_title" class="title">{{b.title}}</span>
        </li>
    </ul>
    <span class="identify">
        <span ng-show="module.params.show_cursor" class="pointer">
			<em ng-repeat="b in module.params.banner_list"></em>
        </span>       
    </span>
</section>
</script>
<script type="text/ng-template" id="widget-mutipic_banner-display.html">
	<div class="default_div" ng-show="!module.params.banner_list.length">请幻灯片图片</div>
<section class="mutipic_banner" data-col="{{module.params.col}}" id="mutipic_banner_{{module.index}}" ng-show="module.params.banner_list.length">
    <ul>
    	<li ng-repeat="b in module.params.banner_list track by $index" on-finish-render-filters>
            <a href="{{b.url}}"><img src="{{b.pic}}"/></a>
            <span ng-show="module.params.show_title" class="title">{{b.title}}</span>
        </li>
    </ul>
    <span class="mutipic_banner_identify">
        <span ng-show="module.params.show_cursor" class="pointer">
        </span>       
    </span>

    

</section>
</script>
<script type="text/ng-template" id="widget-piclist-display.html">
	<div class="pic_list"  ng-switch="module.params.list_style">
<div class="default_div" ng-show="!module.params.pic_list.length">请添加图片</div>
<ul class="one_colum_list" ng-switch-when="1">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
        	<p class="title" ng-show="module.params.show_title">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="two_colum_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="three_colum_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="four_colum_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
</script>
<script type="text/ng-template" id="widget-blank-display.html">
	<div class="blank_div" ng-style="{'height':module.params.height}"></div>
  </script>
 <script type="text/ng-template" id="widget-title-display.html">
	<div class="diy_title" ng-style="{'background-color':module.params.bgColor}">
	<p class="title" ng-style="{'color':module.params.maincolor,'text-align':module.params.align}">{{module.params.title}}</p>
    <p class="subtitle" ng-style="{'color':module.params.subcolor,'text-align':module.params.align}">{{module.params.subtitle}}</p>
</div>
  </script>
  <script type="text/ng-template" id="widget-textnav-display.html">
	<div class="text_nav_list" ng-switch="module.params.text_nav_style">
<div class="default_div" ng-show="!module.params.text_nav_list.length">请添加导航</div>
<ul ng-switch-when="1">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
            <em></em>
        </a>
    </li>
</ul>
<ul class="two_text_nav_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="three_text_nav_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="four_text_nav_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
</div>
  </script>
   <script type="text/ng-template" id="widget-picnav-display.html">
	<div class="pic_nav_list"  ng-switch="module.params.nav_style">
<div class="default_div" ng-show="!module.params.pic_nav_list.length">请添加导航</div>
<ul class="two_nav_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="three_nav_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="four_nav_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
  </script>
  <script type="text/ng-template" id="widget-searchgoods-display.html">
	<div class="diy_search_goods">
	<form action="<?php echo U ( 'Shop/Wap/lists'); ?>" target="_blank" method="post">
        <input type="text" name="search_key" value="" placeholder="请输入关键词搜索商品"/>
        <button type="sbumit"></button>
    </form>
</div>
  </script>
  <script type="text/ng-template" id="widget-blankline-display.html">
	<div class="blank_line_div" ng-style="{'border-color':module.params.borderColor,'border-style':module.params.borderStyle,'border-bottom-width':module.params.borderWidth+'px'}"></div>
  </script>
  <script type="text/ng-template" id="widget-case-display.html">
	<div class="case_box">
<p class="case_title">{{module.params.title}}</p>
<div  ng-switch="module.params.style">
<ul class="case_default_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="case_three_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
<p class="case_content_title">{{module.params.contentTitle}}</p>
<div class="case_content">{{module.params.content}}</div>
</div>
  </script>
  <script type="text/ng-template" id="widget-case2-display.html">
  <div class="case_box2">
<p class="case_title">{{module.params.title}}</p>
<div  ng-switch="module.params.style">
    <div  ng-switch-when="2">
        <div  ng-switch="module.params.position">
            <ul class="case_default_list2" ng-switch-when="1">
                <li ng-repeat="m in module.params.pic_list">
                	<a href="{{m.url}}">
                    	<img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                	</a>
                </li>
            </ul>
            <ul class="case_default_list2" ng-switch-when="2">
                <li ng-repeat="m in module.params.pic_list" style="float: right">
                    <a href="{{m.url}}">
                        <img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div  ng-switch-when="3">
        <div  ng-switch="module.params.position">
            <ul class="case_three_list2" ng-switch-when="1">
                <li ng-repeat="m in module.params.pic_list_3">
                	<a href="{{m.url}}">
                    	<img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                	</a>
                </li>
            </ul>
            <ul class="case_three_list2" ng-switch-when="2">
                <li ng-repeat="m in module.params.pic_list_3" style="float:right">
                    <a href="{{m.url}}">
                        <img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<p class="case_content_title">{{module.params.contentTitle}}</p>
<div class="case_content">{{module.params.content}}</div>
</div>
  </script>
  <script type="text/ng-template" id="widget-notice-display.html">
	<div class="diy_notice">
	<div class="notice_box" ng-style="{'background-color':module.params.bgColor,'color':module.params.color}">
    	<div class="scrollNotice">
        	<span class="js-scroll-notice" ng-bind-html="module.params.notice_content|to_trusted"></span>
        </div>
    </div>
</div>
  </script>
  <script type="text/ng-template" id="widget-usercenter-display.html">
	<div class="fixed_module">
	<h6>个人中心固定模块</h6>
    <p>个人中心页</p>
</div>
  </script>
  <script type="text/ng-template" id="widget-goodsdetail-display.html">
	<div class="shot_div">
	<img src="/public/static/base/images/goods_detail_shot.png"/>
</div>
  </script>
<script type="text/ng-template" id="widget-fixedmodule-display.html">
	<div class="fixed_module">
	<h6>{{module.params.title}}</h6>
    <p>{{module.params.desc}}</p>
</div>
</script>
<script type="text/javascript">
var dataConfig = '<?php echo htmlentities((isset($diyData['config']) && ($diyData['config'] !== '')?$diyData['config']:'')); ?>';
if(dataConfig!=""){
	initDiy(dataConfig);
}
</script>
      <script type="text/ng-template" id="widget-header-editor.html">
<div>
    <!--页面标题设置-->
    <div class="app_editor">
        <em class="arrow-left"></em>
        <div class="form_item">
            <label>页面名称</label>
            <div class="iput">
                <input class="form-control" type="text" ng-model="activeItem.params.title" placeholder="微页面标题"/>
            </div>
        </div>
        <div class="form_item">
            <label>页面描述</label>
            <textarea class="form-control" type="text" ng-model="activeItem.params.description" placeholder="描述" style="font-size: 14px"></textarea>
        </div>
        <div class="form_item">
            <label>页面颜色</label>
            <div class="iput">
                <div data-color="bgColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.bgColor}"  ng-model="activeItem.params.bgColor"></div>
                <input type="hidden" ng-model="activeItem.params.bgColor"/>
                <span class="tips">背景颜色只在手机端显示</span>
            </div>
        </div>
        
   
        <div style="padding: 15px 0;">
        <span ><lable>是否显示底部导航：</lable></span>
        <span ><input checked type='radio' name='is_show' value="0"  ng-model="activeItem.params.is_show"/> <label  for="is_show_0">不显示</label></span>
        <span><input type ='radio' name='is_show' value="1"  ng-model="activeItem.params.is_show"/><label  for="is_show_1"> 显示<lable></span>
         </div>
        <div style="padding: 15px 0;">
        <span ><lable>设置为首页：</lable></span>
        <span ><input type='radio' name='is_index' value="0" ng-model="activeItem.params.is_index" /> <label  for="is_index_0">否</label></span>
        <span><input ng-model="activeItem.params.is_index" type ='radio' name='is_index' value='1' /><label  for="is_index_1">是</label></span>
        </div>
    </div>
    	<!--页面标题设置-->
<!-- 	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			固定模块，不可编辑<br/>
            只允许在底部添加DIY模块
		</div>
	</div> -->
</div>
</script>
<script type="text/ng-template" id="widget-richtext-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
        <!--
		<div class="form_item">
			<label>背景颜色</label>
			<div class="iput">
				<div data-color="bgColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.bgColor}"  ng-model="activeItem.params.bgColor"></div>
				<span class="tips">背景颜色只在手机端显示</span>
			</div>
		</div>
        <div class="form_item">
			<label>文字颜色</label>
			<div class="iput">
				<div data-color="color" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.color}"  ng-model="activeItem.params.color"></div>
				<span class="tips"></span>
			</div>
		</div>
        <div class="form_item">
			<label>文字大小</label>
			<div class="iput">
				<input type="range" max="40" min="12" ng-model="activeItem.params.fontsize"/>
			</div>
		</div>
        <div class="form_item">
			<label>对齐方式</label>
			<div class="iput pt_8">
				<input type="radio" name="align" value="left" ng-model="activeItem.params.align"/>左对齐&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="center" ng-model="activeItem.params.align"/>居中对齐&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="right" ng-model="activeItem.params.align"/>右对齐
			</div>
		</div>
        -->
		<div class="form_item">
			<label>富文本内容</label>
			<div class="iput">
				
		<!-- 		<textarea style="width:420px" name="diy_editor_richcontent" ng-model="activeItem.params.content">{{activeItem.params.content}}</textarea> -->
		<textarea style="width:420px" name="diy_editor_richcontent" ng-model="activeItem.params.content"></textarea>
			</div>
			
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-goods-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		<div class="form_item">
			<label>选择商品</label>
			<div class="iput">
            	<ul class="select_goods_list">
                	<li ng-repeat="m in activeItem.params.goods_list" ng-show="activeItem.params.hasTestData == 0"><span class="img"><img ng-if="m.img" src="{{m.img}}"/></span><em ng-click="deleteGoods(m)">X</em></li>
                </ul>
				<div class="add_goods_btn" ng-click="addGoodsDialog('<?php echo U ( "Shop/Goods/lists",array('isAjax'=>'ajax','isRadio'=>1)); ?>');"></div>
			</div>
        </div>
        <div class="form_item">
			<label>样式</label>
			<div class="iput pt_8">
            	<input type="radio" name="list_style" value="1" ng-model="activeItem.params.list_style"/>大图&nbsp;&nbsp;&nbsp;
                <input type="radio" name="list_style" value="2" ng-model="activeItem.params.list_style"/>小图&nbsp;&nbsp;&nbsp;
                <input type="radio" name="list_style" value="3" ng-model="activeItem.params.list_style"/>一大两小&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="list_style" value="4" ng-model="activeItem.params.list_style"/>详细列表
			</div>
        </div>
        <div class="form_item">
			<label>显示</label>
			<div class="iput pt_8">
            	<input type="checkbox" name="show_price" value="1" ng-model="activeItem.params.show_price"/>显示价格&nbsp;&nbsp;&nbsp;
               <input type="checkbox" name="show_btn" value="1" ng-model="activeItem.params.show_btn"/>显示购买按钮&nbsp;&nbsp;&nbsp;
               
			</div>
        </div>
        
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-mutipic_goods-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor"  ng-controller="mutipicBannerController">
		<em class="arrow-left"></em>
		<div class="form_item">
			<label>选择商品</label>
			<div class="iput">
            	<ul class="select_goods_list">
                	<li ng-repeat="m in activeItem.params.goods_list" ng-show="activeItem.params.hasTestData == 0"><span class="img"><img ng-if="m.img" src="{{m.img}}"/></span><em ng-click="deleteGoods(m)">X</em></li>
                </ul>
				<div class="add_goods_btn" ng-click="addGoodsDialog('<?php echo U ( "Shop/Goods/lists",array('isAjax'=>'ajax','isRadio'=>1)); ?>');"></div>
			</div>
        </div>
        <div class="form_item">
			<label>样式</label>
			<div class="iput pt_8">
            	<input type="radio" name="list_style" value="2" ng-model="activeItem.params.colGoods" ng-click="changeColGood($event)"/>两列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="list_style" value="3" ng-model="activeItem.params.colGoods" ng-click="changeColGood($event)"/>三列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="list_style" value="4" ng-model="activeItem.params.colGoods" ng-click="changeColGood($event)"/>四列&nbsp;&nbsp;&nbsp;
			</div>
        </div>
        <div class="form_item">
			<label>显示</label>
			<div class="iput pt_8">
            	<input type="checkbox" name="show_price" value="1" ng-model="activeItem.params.show_price"/>显示价格&nbsp;&nbsp;&nbsp;
               <input type="checkbox" name="show_btn" value="1" ng-model="activeItem.params.show_btn"/>显示购买按钮&nbsp;&nbsp;&nbsp;             
			</div>
        </div>        
            <p class="edit_tips"><b class="fa fa-info-circle"></b> 幻灯片图片尺寸建议为640*640（为了美观，请确保所有图片的高度一致)</p>			
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-banner-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>显示设置</label>
			<div class="iput pt_8">
            	<input type="checkbox" name="show_title" value="1" ng-model="activeItem.params.show_title"/>显示标题&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="form_item">
			<div class="iput wput">
				<a href="javascript:;" class="btn" ng-click="addBanner()">添加图片</a>
               
                <div class="sub_edit_item" ng-repeat="b in activeItem.params.banner_list">
                	<div class="upload-img-box"><a class="add_pic_btn" href="javascript:;" ng-click="addBannerPic(b)"><img class="slider-img" ng-show="b.pic" src="{{b.pic}}" rel="{{b.rel}}" id="cover_id_{{b.rel}}" data-callback="callbackimg" data-max="1" /></a></div>	
                    
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                    <a class="del_pic_btn" href="javascript:;" ng-click="deleteBanner(b)">&nbsp;</a>
                </div>
			</div>
		</div>
        <p class="edit_tips"><b class="fa fa-info-circle"></b> 幻灯片图片尺寸建议为640*320</p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-mutipic_banner-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor"  ng-controller="mutipicBannerController">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>显示设置</label>
			<div class="iput pt_8">
            	<input type="checkbox" name="show_title" value="1" ng-model="activeItem.params.show_title"/>显示标题&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
                <input type="radio" checked="" name="align" value="2" ng-model="activeItem.params.col" class="ng-valid ng-dirty" ng-click="changeCol($event)">两列&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align" value="3" ng-model="activeItem.params.col" class="ng-valid ng-dirty" ng-click="changeCol($event)">三列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="4" ng-model="activeItem.params.col" class="ng-valid ng-dirty" ng-click="changeCol($event)">四列
			</div>
		</div>
		<div class="form_item">
			<div class="iput wput">
				&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="btn" ng-click="addMutiBanner()">添加图片</a>
               
                <div class="sub_edit_item" ng-repeat="b in activeItem.params.banner_list">
                    <a class="add_pic_btn" href="javascript:;" ng-click="addBannerPic(b)"><img ng-show="b.pic" src="{{b.pic}}" rel="{{b.rel}}" id="cover_id_{{b.rel}}" data-callback="callbackimg" data-max=1 /></a>
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                    <a class="del_pic_btn" href="javascript:;" ng-click="deleteMutiBanner(b)">&nbsp;</a>
                </div>
			</div>
            <p class="edit_tips"><b class="fa fa-info-circle"></b> 幻灯片图片尺寸建议为640*640（为了美观，请确保所有图片的高度一致)</p>
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-piclist-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor" ng-controller="picListController">
		<em class="arrow-left"></em>
		
        <!--<div class="form_item">
			<label>显示设置</label>
			<div class="iput pt_8">
            	<input type="checkbox" checked name="show_title" ng-model="activeItem.params.show_title"/>显示标题&nbsp;&nbsp;&nbsp;               
			</div>
		</div>-->
        <!--<div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
				<input type="radio" checked name="align" value="1" ng-model="activeItem.params.list_style"/>一列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="2" ng-model="activeItem.params.list_style"/>两列&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align" value="3" ng-model="activeItem.params.list_style"/>三列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="4" ng-model="activeItem.params.list_style"/>四列
			</div>
		</div>-->
		<div class="row ml-3">
			<div class="iput wput">
				<a href="javascript:;" class="btn" ng-click="addPicList()">添加图片</a>
               
                <div class="sub_edit_item" ng-repeat="b in activeItem.params.pic_list">
                    <a class="add_pic_btn" href="javascript:;" ng-click="addPicListPic(b)"><img ng-show="b.pic" src="{{b.pic}}" rel="{{b.rel}}" id="cover_id_{{b.rel}}" data-callback="callbackimg" data-max=1 /></a>
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                    <a class="del_pic_btn" href="javascript:;" ng-click="deletePicListPic(b)">&nbsp;</a>
                </div>
			</div>
        </div>
            <p class="edit_tips">
            	<b class="fa fa-info-circle"></b> 配置说明：（为了美观，请确保所有图片的宽高一致，比如都是300*150）<br/>
            	一列:图片宽度640 高度自定义<br/>
                <!--二列:图片宽度320 高度自定义<br/>
                三列:图片宽度210 高度自定义<br/>
                四列:图片宽度160 高度自定义<br/>-->
            </p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-blank-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>宽度</label>
			<div class="iput pt_8">
            	<input style=" width:350px" type="range" max="100" min="10" ng-model="activeItem.params.height"/>
			</div>
		</div>
            <p class="edit_tips">
            	<b class="fa fa-info-circle"></b> 空白设置仅为辅助功能
            </p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-title-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
        <div class="form_item">
			<label>标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_title" ng-model="activeItem.params.title" value="{{activeItem.params.title}}" />
			</div>
			
		</div>
        <div class="form_item">
			<label>副标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_subtitle" ng-model="activeItem.params.subtitle" value="{{activeItem.params.subtitle}}"/>
			</div>
		</div>
		<div class="form_item">
			<label>背景颜色</label>
			<div class="iput">
				<div data-color="bgColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.bgColor}"  ng-model="activeItem.params.bgColor"></div>
				<span class="tips">背景颜色只在手机端显示</span>
			</div>
		</div>
        <div class="form_item">
			<label>主标题颜色</label>
			<div class="iput">
				<div data-color="maincolor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.maincolor}"  ng-model="activeItem.params.maincolor"></div>
				<span class="tips"></span>
			</div>
		</div>
        <div class="form_item">
			<label>副标题颜色</label>
			<div class="iput">
				<div data-color="subcolor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.subcolor}"  ng-model="activeItem.params.subcolor"></div>
				<span class="tips"></span>
			</div>
		</div>
        <div class="form_item">
			<label>对齐方式</label>
			<div class="iput pt_8">
				<input type="radio" name="align" value="left" ng-model="activeItem.params.align"/>左对齐&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="center" ng-model="activeItem.params.align"/>居中对齐&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="right" ng-model="activeItem.params.align"/>右对齐
			</div>
		</div>
		
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-textnav-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor" ng-controller="textNavListController">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>导航背景</label>
			<div class="iput">
				<div data-color="bgColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.bgColor}"  ng-model="activeItem.params.bgColor"></div>
				<span class="tips">背景颜色只在手机端显示</span>
			</div>
		</div>
        <div class="form_item">
			<label>文字颜色</label>
			<div class="iput">
				<div data-color="color" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.color}"  ng-model="activeItem.params.color"></div>
				<span class="tips"></span>
			</div>
		</div>
        <div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
                <input type="radio" name="align" value="1" ng-model="activeItem.params.text_nav_style"/>一列&nbsp;&nbsp;&nbsp;			
                <input type="radio" name="align" value="2" ng-model="activeItem.params.text_nav_style"/>两列&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align" value="3" ng-model="activeItem.params.text_nav_style"/>三列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="4" ng-model="activeItem.params.text_nav_style"/>四列
			</div>
		</div>		
		<div class="form_item">
			<div class="iput wput">
				<a href="javascript:;" class="btn" ng-click="addTextNav()">添加导航</a>
               
                <div class="sub_edit_item sub_edit_item_no_pic" ng-repeat="b in activeItem.params.text_nav_list">
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                    <a class="del_pic_btn" href="javascript:;" ng-click="deleteTextNav(b)">&nbsp;</a>
                </div>
			</div>
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-picnav-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor" ng-controller="picNavController">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>显示设置</label>
			<div class="iput pt_8">
            	<input type="checkbox" checked name="show_title" ng-model="activeItem.params.show_title"/>显示文字&nbsp;&nbsp;&nbsp;               
			</div>
		</div>
        <div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
                <input type="radio" name="align" value="2" ng-model="activeItem.params.nav_style"/>两列&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align" value="3" ng-model="activeItem.params.nav_style"/>三列&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="4" ng-model="activeItem.params.nav_style"/>四列
			</div>
		</div>
		<div class="form_item">
			<div class="iput wput">
				<a href="javascript:;" class="btn" ng-click="addPicNav()">添加导航</a>
               
                <div class="sub_edit_item" ng-repeat="b in activeItem.params.pic_nav_list">
                    <a class="add_pic_btn" href="javascript:;" ng-click="addPicNavPic(b)"><img ng-show="b.pic" src="{{b.pic}}"/></a>
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                    <a class="del_pic_btn" href="javascript:;" ng-click="deletePicNav(b)">&nbsp;</a>
                </div>
                
			</div>
        </div>
            <p class="edit_tips">
            	<b class="fa fa-info-circle"></b> 配置说明：<br/>
                二列:图片宽高建议为正方形 300*300以上<br/>
                三列:图片宽高建议为正方形 200*200以上<br/>
                四列:图片宽高建议为正方形 100*100以上<br/>
            </p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-searchgoods-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
        <div class="form_item">
			可随意插入任何页面和位置 , 方便粉丝快速搜索商品<br/>
注意 : 记得给商品添加合适的商品标签哦!
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-blankline-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>线条颜色</label>
			<div class="iput">
				<div data-color="borderColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.borderColor}"  ng-model="activeItem.params.borderColor"></div>
			</div>
		</div>
        <div class="form_item">
			<label>线条宽度</label>
			<div class="iput">
				<input style=" width:350px" type="range" max="20" min="1" ng-model="activeItem.params.borderWidth"/>
			</div>
		</div>
         <div class="form_item">
			<label>线条样式</label>
			<div class="iput pt_8">
				<input type="radio" name="align" value="dotted" ng-model="activeItem.params.borderStyle"/>点线&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="dashed" ng-model="activeItem.params.borderStyle"/>虚线&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="solid" ng-model="activeItem.params.borderStyle"/>实线&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="ridge" ng-model="activeItem.params.borderStyle"/> 垄状&nbsp;&nbsp;&nbsp;
                <input type="radio" name="align" value="groove" ng-model="activeItem.params.borderStyle"/> 凹槽
			</div>
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-case-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor" ng-controller="caseController">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_title" ng-model="activeItem.params.title" value="{{activeItem.params.title}}" />
			</div>
			
		</div>
        <div class="form_item">
			<label>内容区标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_title" ng-model="activeItem.params.contentTitle" value="{{activeItem.params.contentTitle}}" />
			</div>
			
		</div>
        <div class="form_item">
			<label>内容区说明</label>
			<div class="iput">
				<textarea style="width:420px" name="diy_editor_case_desc" ng-model="activeItem.params.content" value="{{activeItem.params.content}}" ></textarea>
			</div>
			
		</div>
        <div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
				<input type="radio" name="align" value="2" ng-model="activeItem.params.style"/>默认&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align" value="3" ng-model="activeItem.params.style"/>三列&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="form_item">
			<div class="iput wput">
				<div class="sub_edit_item" ng-repeat="b in activeItem.params.pic_list">
                    <a class="add_pic_btn" href="javascript:;" ng-click="addCasePic(b)"><img ng-show="b.pic" src="{{b.pic}}"/></a>
                    <div class="s_i_p">
                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
                    </div>
                </div>
			</div>
		</div>
            <p class="edit_tips">
            	<b class="fa fa-info-circle"></b> 配置说明：<br/>
            	选择默认样式时，第一张图片尺寸建议为500*500 第二,三张图片为200*200<br/>
                选择三列样式时图片尺寸建议为300*300以上的正方形
            </p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-case2-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor" ng-controller="caseController">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			<label>标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_title" ng-model="activeItem.params.title" value="{{activeItem.params.title}}" />
			</div>
			
		</div>
        <div class="form_item">
			<label>内容区标题</label>
			<div class="iput">
				<input type="text" style="width:420px" name="diy_editor_title" ng-model="activeItem.params.contentTitle" value="{{activeItem.params.contentTitle}}" />
			</div>
			
		</div>
        <div class="form_item">
			<label>内容区说明</label>
			<div class="iput">
				<textarea style="width:420px" name="diy_editor_case_desc" ng-model="activeItem.params.content" value="{{activeItem.params.content}}" ></textarea>
			</div>
			
		</div>
        <div class="form_item">
			<label>样式设置</label>
			<div class="iput pt_8">
				<input type="radio" name="align2" value="2" ng-model="activeItem.params.style"/>默认&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="align2" value="3" ng-model="activeItem.params.style"/>三列&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="form_item">
			<label>显示设置</label>
			<div class="iput pt_8">
				<input type="radio" name="position" value="1" ng-model="activeItem.params.position"/>左大图&nbsp;&nbsp;&nbsp;
                 <input type="radio" name="position" value="2" ng-model="activeItem.params.position"/>右大图&nbsp;&nbsp;&nbsp;
			</div>
		</div>
		<div class="form_item" >
			<div  ng-switch="activeItem.params.style">
				<div class="iput wput" ng-switch-when="2">
					<div class="sub_edit_item" ng-repeat="b in activeItem.params.pic_list">
	                    <a class="add_pic_btn" href="javascript:;" ng-click="addCasePic(b)"><img ng-show="b.pic" src="{{b.pic}}"/></a>
	                    <div class="s_i_p">
	                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
	                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
	                    </div>
	                </div>
				</div>
				<div class="iput wput" ng-switch-when="3">
	                <div class="sub_edit_item" ng-repeat="b in activeItem.params.pic_list_3">
	                    <a class="add_pic_btn" href="javascript:;" ng-click="addCasePic(b)"><img ng-show="b.pic" src="{{b.pic}}"/></a>
	                    <div class="s_i_p">
	                        <input type="text" placeholder="填写标题" ng-model="b.title"/><br/>
	                        <input type="text" placeholder="填写链接" ng-model="b.url"/>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
            <p class="edit_tips">
            	<b class="fa fa-info-circle"></b> 配置说明：<br/>
            	选择默认样式时，第一张图片尺寸建议为320*533 第二,三张图片为320*266.7<br/>
                选择三列样式时,第一张图片尺寸建议为320*533 第二,三,四张图片为320*177.7
            </p>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-notice-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
<!--         <div class="form_item"> -->
<!-- 			<label>标题</label> -->
<!-- 			<div class="iput"> -->
<!-- 				<textarea style="width:420px" ng-model="activeItem.params.content" placeholder="公告: 请填写内容,如果过长,将会在手机上滚动显示!">{{activeItem.params.content}}</textarea> -->
<!-- 			</div> -->
			
<!-- 		</div> -->
			<div class="form_item">
				<label>背景颜色</label>
				<div class="iput">
				<div data-color="bgColor" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.bgColor}"  ng-model="activeItem.params.bgColor"></div>
					<span class="tips">背景颜色只在手机端显示</span>
				</div>
			</div>
<!--         <div class="form_item"> -->
<!-- 			<label>字体颜色</label> -->
<!-- 			<div class="iput"> -->
<!-- 				<div data-color="color" class="color_picker" ng-click="colorPicker($event)"  ng-style="{'background-color':activeItem.params.color}"  ng-model="activeItem.params.color"></div> -->
<!-- 				<span class="tips"></span> -->
<!-- 			</div> -->
<!-- 		</div> -->
		<div class="form_item">
			<label>公告编辑</label>
			<div class="iput">
				<textarea style="width:420px" name="diy_editor_noticecontent" ng-model="activeItem.params.notice_content">{{activeItem.params.notice_content}}</textarea>
			</div>
		</div>
            <p class="edit_tips"><b class="fa fa-info-circle"></b> 为了美观，公告图标请控制大小</p>			
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-usercenter-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			个人中心固定模块，不可编辑<br/>
            只允许在底部添加DIY模块
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-goodsdetail-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			商品详情固定模块，不可编辑<br/>
            只允许在底部添加DIY模块
		</div>
	</div>
</div>
</script>
<script type="text/ng-template" id="widget-fixedmodule-editor.html">
<div>
	<!--页面标题设置-->
	<div class="app_editor">
		<em class="arrow-left"></em>
		
        <div class="form_item">
			固定模块，不可编辑<br/>
            只允许在底部添加DIY模块
		</div>
	</div>
</div>
</script>
    </form>
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
<?php 

if(config('COLOR_STYLE')=='blue_color') echo '
<link href="/public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
';
 ?>
<link href="/public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script> 
<script type="text/javascript" src="/public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script> 
<script type="text/javascript" src="/public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script> 
<script type="text/javascript">
var activeModels = '<?php echo isset($data["config"]) ? $data["config"] :""; ?>'=='null'?'':decodeURIComponent('<?php echo isset($data["config"]) ? $data["config"] :""; ?>');
var useFor = "<?php echo I('use'); ?>";
var editorUrl = {
  ue_upimg:'<?php echo U ( "home/Uploads/ue_upimg"); ?>',
  ue_mgimg:'<?php echo U ( "home/Uploads/ue_mgimg"); ?>',
  get_article_style:''
}
//
$(function(){    


  initUploadImg();
  initUploadFile();
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
  $('.toggle-data').bind("click",function(){ change_event(this) });
  
  var is_show=parseInt("<?php echo isset($data['is_show']) ? $data['is_show'] : ''; ?>");
  $("input[name='is_show'][value="+is_show+"]").prop("checked", true);
  var is_index=parseInt("<?php echo isset($data['is_index']) ? $data['is_index'] : ''; ?>");
  $("input[name='is_index'][value="+is_index+"]").prop("checked", true);
  
  var type="<?php echo isset($_GET['use']) ? $_GET['use'] : ''; ?>";
  if(type == 'index'){
    $("input[name='is_index'][value=1]").prop("checked", true);
    $("input[name='is_index'][value=0]").parent().hide();
  }
});
function callbackimg(fieldName,picId,src){
  uploadObj.pic = src;
  uploadObj.picId =picId;
  $('.temp_click').click();
   $('#cover_id_'+fieldName).attr('src',src);
   $('#cover_id_'+fieldName).attr('data-picid',picId);
   $('#banner_id_'+fieldName).attr('src',src);
}


</script>
<script type="text/javascript" src="/public/static/base/js/diy_page.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script> 
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
