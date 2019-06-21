<?php /*a:2:{s:52:"/data/httpd/wx/application/admin/view/menu/edit.html";i:1553940778;s:55:"/data/httpd/wx/application/admin/view/publics/base.html";i:1553940778;}*/ ?>
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
            

            
<script type="text/javascript" src="/public/static/uploadify/jquery.uploadify.min.js"></script>
    <div class="main-title cf">
        <h2>编辑<?php echo htmlentities($nav_title); ?>菜单</h2>
    </div>
    <!-- 标签页导航 -->
<div class="tab-wrap">

    <div class="tab-content">
    <!-- 表单 -->
    <?php  isset($post_url) || $post_url = U('edit?model='.$model['id']); ?>
    <form id="form" action="<?php echo htmlentities($post_url); ?>" method="post" class="form-horizontal">

            <?php if(is_array($fields) || $fields instanceof \think\Collection || $fields instanceof \think\Paginator): $i = 0; $__LIST__ = $fields;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['is_show'] == 4): ?>
                <input type="hidden" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>">
                <?php endif; if($field['is_show'] == 1 || $field['is_show'] == 3 || ($field['is_show'] == 5 && I($field['name']) )): ?>
                  <div class="form-item cf toggle-<?php echo htmlentities($field['name']); ?>">
                    <label class="item-label">
                    <?php if(!(empty($field['is_must']) || (($field['is_must'] instanceof \think\Collection || $field['is_must'] instanceof \think\Paginator ) && $field['is_must']->isEmpty()))): ?><span class="need_flag">*</span><?php endif; ?>
                    <?php echo htmlentities($field['title']); ?>
                    <span class="check-tips">
                      <?php if(!(empty($field['remark']) || (($field['remark'] instanceof \think\Collection || $field['remark'] instanceof \think\Paginator ) && $field['remark']->isEmpty()))): ?>（<?php echo $field['remark']; ?>）<?php endif; ?>
                      </span></label>
                    <div class="controls">
                        <?php switch($field['type']): case "num": ?>
                          <input type="number" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>">
                            <?php break; case "string": ?>
                                <input type="text" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>">
                            <?php break; case "textarea": ?>
                                <label class="textarea input-large">
                                <textarea name="<?php echo htmlentities($field['name']); ?>"><?php echo htmlentities($data[$field['name']]); ?></textarea>
                                </label>
                            <?php break; case "datetime": ?>
                          <input type="datetime" autocomplete="off" name="<?php echo htmlentities($field['name']); ?>" class="text input-large time" value="<?php echo htmlentities(time_format($data[$field['name']])); ?>" placeholder="请选择时间" />
                        <?php break; case "date": ?>
                          <input type="datetime" autocomplete="off" name="<?php echo htmlentities($field['name']); ?>" class="text input-large date" value="<?php echo htmlentities(time_format($data[$field['name']],'Y-m-d')); ?>" placeholder="请选择时间" />
                        <?php break; case "bool": ?>
                          <select name="<?php echo htmlentities($field['name']); ?>">
                            <?php $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> <option value="<?php echo htmlentities($key); ?>" class="toggle-data" toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
                              <?php if($data[$field['name']] == $key): ?>selected<?php endif; ?>
                              ><?php echo htmlentities(clean_hide_attr($vo)); ?>
                              </option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                        <?php break; case "select": ?>
                          <select name="<?php echo htmlentities($field['name']); ?>">
                            <?php $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> <option value="<?php echo htmlentities($key); ?>" class="toggle-data" toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
                              <?php if($data[$field['name']] == $key): ?>selected<?php endif; ?>
                              ><?php echo htmlentities(clean_hide_attr($vo)); ?>
                              </option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                          </select>
                        <?php break; case "cascade": ?>
                        
                        <?php echo W('common/cascade/cascade', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break; case "dynamic_select": ?>
                        
                        <?php echo W('common/dynamic_select/dynamic_select', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break; case "dynamic_checkbox": ?>
                        
                        <?php echo W('common/dynamic_checkbox/dynamic_checkbox', array('name'=>$field['name'],'value'=>$data[$field['name']],'extra'=>$field['extra'])); break; case "radio": $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                          	<div class="check-item">
							<!--[if !IE]><!-->
								  <input type="radio" class="regular-radio toggle-data" value="<?php echo htmlentities($key); ?>" id="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>" name="<?php echo htmlentities($field['name']); ?>" toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
								  <?php if($data[$field['name']] == $key): ?>checked="checked"<?php endif; ?> />
								  <label for="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>"></label><?php echo htmlentities(clean_hide_attr($vo)); ?>
							  <!--<![endif]-->
							   <!--[if IE]>
							       <input type="radio" value="<?php echo htmlentities($key); ?>"
								   id="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>" name="<?php echo htmlentities($field['name']); ?>" class="toggle-data" toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
								  <?php if($data[$field['name']] == $key): ?>checked="checked"<?php endif; ?>/>
								  <label for="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>"></label><?php echo htmlentities(clean_hide_attr($vo)); ?>
							   <![endif]-->
                             </div>
                          <?php endforeach; endif; else: echo "" ;endif; break; case "checkbox": $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                          	<div class="check-item">
                              <input type="checkbox" class="regular-checkbox toggle-data" value="<?php echo htmlentities($key); ?>" id="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>" name="<?php echo htmlentities($field['name']); ?>[]" toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
                              <?php if(in_array(($key), is_array($data[$field['name']])?$data[$field['name']]:explode(',',$data[$field['name']]))): ?>checked="checked"<?php endif; ?> >
                              <label for="<?php echo htmlentities($field['name']); ?>_<?php echo htmlentities($key); ?>"></label><?php echo htmlentities(clean_hide_attr($vo)); ?>
                             </div>
                          <?php endforeach; endif; else: echo "" ;endif; break; case "editor": ?>
                          <label class="textarea">
                            <textarea name="<?php echo htmlentities($field['name']); ?>" style="width:405px; height:100px;"><?php echo htmlentities($data[$field['name']]); ?></textarea>
                            <?php echo W('common/editor/adminArticleEdit', array('name'=>$field['name'],'value'=>$data[$field['name']])); ?> </label>
                        <?php break; case "picture": ?>
                          <div class="controls uploadrow2" data-max="1" title="点击修改图片" rel="<?php echo htmlentities($field['name']); ?>">
                            <input type="file" id="upload_picture_<?php echo htmlentities($field['name']); ?>">
                            <input type="hidden" name="<?php echo htmlentities($field['name']); ?>" id="cover_id_<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(!(empty($data[$field['name']]) || (($data[$field['name']] instanceof \think\Collection || $data[$field['name']] instanceof \think\Paginator ) && $data[$field['name']]->isEmpty()))): ?>
                                <div class="upload-pre-item2"><img width="100" height="100" src="<?php echo htmlentities(get_cover_url($data[$field['name']])); ?>"/></div>
                                <em class="edit_img_icon">&nbsp;</em>
                              <?php endif; ?>
                            </div>
                          </div>
                        <?php break; case "file": ?>
                          <div class="controls upload_file" rel="<?php echo htmlentities($field['name']); ?>">
                            <input type="file" id="upload_file_<?php echo htmlentities($field['name']); ?>">
                            <input type="hidden" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>"/>
                            <div class="upload-img-box">
                              <?php if(isset($data[$field['name']])): ?>
                                <div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo htmlentities(get_table_field($data[$field['name']],'id','name','File')); ?></div>
                              <?php endif; ?>
                            </div>
                          </div>

                        <?php break; default: ?>
                            <input type="text" class="text input-large" name="<?php echo htmlentities($field['name']); ?>" value="<?php echo htmlentities($data[$field['name']]); ?>">
                        <?php endswitch; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; endif; else: echo "" ;endif; ?>

        <div class="form-item cf">
            <input type="hidden" name="id" value="<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>">
            <button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <a class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</a>
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
    
<link href="/public/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
<?php if(config('COLOR_STYLE')=='blue_color') echo '<link href="/public/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">'; ?>
<link href="/public/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script>
<script type="text/javascript">
$('#submit').click(function(){
    $('#form').submit();
});

$(function(){
	 initUploadImg();
	initUploadFile();
	 })
$(function(){    $('.time').datetimepicker({
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

	//$('.toggle-data').bind("click",function(){ change_event(this) });
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
</script>

</body>
</html>
