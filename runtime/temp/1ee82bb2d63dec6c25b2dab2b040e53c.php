<?php /*a:2:{s:55:"/data/httpd/wx/application/admin/view/config/group.html";i:1553940778;s:55:"/data/httpd/wx/application/admin/view/publics/base.html";i:1553940778;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <title><?php echo htmlentities($meta_title); ?>|WeiPHP管理平台</title>
    <link href="/public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/base.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/common.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/module.css?v=<?php echo SITE_VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="/public/admin/css/style.css?v=<?php echo SITE_VERSION; ?>" media="all">
    <link rel="stylesheet" type="text/css" href="/public/admin/css/store.css?v=<?php echo SITE_VERSION; ?>" media="all">
	<link rel="stylesheet" type="text/css" href="/public/admin/css/<?php echo htmlentities(app('config')->get('COLOR_STYLE')); ?>.css?v=<?php echo SITE_VERSION; ?>" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/public/admin/js/jquery.mousewheel.js?v=<?php echo SITE_VERSION; ?>"></script>
    <!--<![endif]-->
    
</head>
<body <?php if(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty())): ?>style="padding-left:0;"<?php endif; ?>>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <?php if(config('SYSTEM_LOGO')) { ?>
        <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('<?php echo config('SYSTEM_LOGO'); ?>') no-repeat " >

        <?php  }else{  ?>
        <span class="logo" style="float: left;margin-left: 2px;width: 198px;height: 49px;background:url('/public/static/base/images/logo.png') no-repeat 0 -22px" >

        <?php } ?>
        </span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($top_menu['core_top_menu']) || $top_menu['core_top_menu'] instanceof \think\Collection || $top_menu['core_top_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_top_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
                <li data-id="<?php echo htmlentities($ca['id']); ?>" class="<?php echo htmlentities($ca['class']); ?>"><a href="<?php echo htmlentities($ca['url']); ?>" target="<?php echo htmlentities($ca['target']); ?>"><?php echo htmlentities($ca['title']); ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo htmlentities(get_nickname($mid)); ?>"><?php echo htmlentities(get_nickname($mid)); ?></em></li>
                <li><a href="<?php echo U('home/Index/index'); ?>">返回前台</a></li>
                <li><a href="<?php echo U('admin/User/updatePassword'); ?>">修改密码</a></li>
                <li><a href="<?php echo U('admin/User/updateNickname'); ?>">修改昵称</a></li>
                <li><a href="<?php echo U('admin/Publics/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <?php if(!(empty($top_menu['core_side_menu']) || (($top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator ) && $top_menu['core_side_menu']->isEmpty()))): ?>
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                    <!-- 子导航 -->
					<h3><i class="icon icon-unfold"></i><?php echo htmlentities($now_top_menu_name); ?></h3>                        
                        <ul class="side-sub-menu">
                            <?php if(is_array($top_menu['core_side_menu']) || $top_menu['core_side_menu'] instanceof \think\Collection || $top_menu['core_side_menu'] instanceof \think\Paginator): $i = 0; $__LIST__ = $top_menu['core_side_menu'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <li class="<?php echo htmlentities($vo['class']); ?>" data-id="<?php echo htmlentities($vo['id']); ?>"> <a class="item" href="<?php echo htmlentities($vo['url']); ?>" target="<?php echo htmlentities($vo['target']); ?>"> <?php echo htmlentities($vo['title']); ?> </a></li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>

                    <!-- /子导航 -->
            </div>
        
        <!-- /子导航 -->
    </div>
    <?php endif; ?>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!(empty($_show_nav) || (($_show_nav instanceof \think\Collection || $_show_nav instanceof \think\Paginator ) && $_show_nav->isEmpty()))): ?>
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <?php if(is_array($_nav) || $_nav instanceof \think\Collection || $_nav instanceof \think\Paginator): if( count($_nav)==0 ) : echo "" ;else: foreach($_nav as $k=>$v): if($i == count($_nav)): ?>
                    <span><?php echo htmlentities($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo htmlentities($k); ?>"><?php echo htmlentities($v); ?></a>&gt;</span>
                    <?php endif; ?>
                    <assign name="i" value="$i+1" />
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <!-- nav -->
            

            
   <div class="main-title">

        <!-- <div id="update_remind" style="clear:both; margin-bottom:10px;border:1px solid #33ab07; padding:10px; background-color:#d8f9cc; color:#33ab07; position:relative; display:none">
        	<a href="<?php echo U('update/index'); ?>">WeiPHP出升级包了，请及时升级！</a>
            <a href="javascript:;" title="关闭" style="color:#999; font-size:12px; position:absolute; top:5px; right:10px; text-decoration:none" onclick="set_cookie_close_version();">X</a>
        </div> -->
        <h2>网站设置</h2>
	</div>
		<div class="tab-wrap">
		<ul class="tab-nav nav">
		<?php if(is_array(app('config')->get('CONFIG_GROUP_LIST')) || app('config')->get('CONFIG_GROUP_LIST') instanceof \think\Collection || app('config')->get('CONFIG_GROUP_LIST') instanceof \think\Paginator): $i = 0; $__LIST__ = app('config')->get('CONFIG_GROUP_LIST');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?>

			<li <?php if($id == $key): ?>class="current"<?php endif; ?>><a href="<?php echo U('group?id='.$key); ?>"><?php echo htmlentities($group); ?>配置</a></li>

		<?php endforeach; endif; else: echo "" ;endif; ?>
		</ul>
		<div class="tab-content">

	<form action="<?php echo U('save'); ?>" method="post" class="form-horizontal">
		<?php if($id == 10): ?>
			<label class="item-label">当前状态：</label>
			<?php if(config("IS_QRCODE_LOGIN") == 1): ?>
				已开启
			<?php else: ?>
				未开启
			<?php endif; ?>
		<?php endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$config): $mod = ($i % 2 );++$i;?>
		<div class="form-item">
			<label class="item-label"><?php echo $config['title']; if(!empty($config['remark'])): ?><span class="check-tips">（<?php echo htmlentities($config['remark']); ?>）</span><?php endif; ?> </label>
			<div class="controls">
			<?php switch($config['type']): case "0": ?>
			<input type="text" class="text input-small" name="<?php echo htmlentities($config['name']); ?>" value="<?php echo htmlentities($config['value']); ?>">
			<?php break; case "1": ?>
			<input type="text" class="text input-large" name="<?php echo htmlentities($config['name']); ?>" value="<?php echo htmlentities($config['value']); ?>">
			<?php break; case "2": ?>
			<label class="textarea input-large">
				<textarea name="<?php echo htmlentities($config['name']); ?>"><?php echo htmlentities($config['value']); ?></textarea>
			</label>
			<?php break; case "3": ?>
			<label class="textarea input-large">
				<textarea name="<?php echo htmlentities($config['name']); ?>"><?php echo htmlentities($config['value']); ?></textarea>
			</label>
			<?php break; case "4": ?>
			<select name="<?php echo htmlentities($config['name']); ?>">
				<?php $_result=parse_config_attr($config['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo htmlentities($key); ?>" <?php if($config['value'] == $key): ?>selected<?php endif; ?>><?php echo htmlentities($vo); ?></option>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
			<?php break; ?>
			<?php endswitch; ?>

			</div>
		</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		<div class="form-item">
			<label class="item-label"></label>
			<div class="controls">
				<?php if(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty())): ?><button type="submit" disabled class="btn submit-btn disabled" target-form="form-horizontal">确 定</button><?php else: ?><button type="submit" class="btn submit-btn ajax-post" target-form="form-horizontal">确 定</button><?php endif; ?>

				<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
                <?php if(!(empty($more_button) || (($more_button instanceof \think\Collection || $more_button instanceof \think\Paginator ) && $more_button->isEmpty()))): if(is_array($more_button) || $more_button instanceof \think\Collection || $more_button instanceof \think\Paginator): $i = 0; $__LIST__ = $more_button;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <a class="btn" href="<?php echo htmlentities($vo['url']); ?>"><?php echo htmlentities($vo['title']); ?></a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                <?php endif; ?>
			</div>
		</div>
	</form>
			</div>
	</div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="https://www.weiphp.cn" target="_blank">WeiPHP</a>管理平台</div>
                <div class="fr">V<?php echo config('SYSTEM_UPDATRE_VERSION'); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
	var  IMG_PATH = "/public/admin/images";
	var  STATIC = "/public/static";
	var  ROOT = "/public";
	var  UPLOAD_PICTURE = "<?php echo U('home/File/upload_picture',array('session_id'=>session_id())); ?>";
	var  UPLOAD_FILE = "<?php echo U('home/File/upload',array('session_id'=>session_id())); ?>";
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "/public", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "/public", //项目公共目录地址
            "DEEP"   : "<?php echo config('URL_PATHINFO_DEPR'); ?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo config('URL_MODEL'); ?>", "<?php echo config('URL_CASE_INSENSITIVE'); ?>", "<?php echo config('URL_HTML_SUFFIX'); ?>"],
            "VAR"    : ["<?php echo config('VAR_MODULE'); ?>", "<?php echo config('VAR_CONTROLLER'); ?>", "<?php echo config('VAR_ACTION'); ?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/public/static/think.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script type="text/javascript" src="/public/static/jquery.dragsort-0.5.2.min.js"></script>
    <script type="text/javascript" src="/public/static/base/js/admin_common.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
<script type="text/javascript">
//官方升级地址
var cookie_close_version = 0;
$(function(){
	$.get("<?php echo U('update/getRemoteVersion'); ?>",{},function(res){
		if(res!=0){
			$('#update_remind').slideDown();
			cookie_close_version = res;
		}
	});
});
function set_cookie_close_version(){
	$.get("<?php echo U('update/set_cookie_close_version'); ?>",{cookie_close_version:cookie_close_version},function(){
		$('#update_remind').slideUp();
	})
}
</script>

</body>
</html>
