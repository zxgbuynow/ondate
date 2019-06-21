<?php /*a:2:{s:57:"/data/httpd/wx/application/admin/view/attribute/edit.html";i:1553940778;s:55:"/data/httpd/wx/application/admin/view/publics/base.html";i:1553940778;}*/ ?>
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
            

            
	<div class="main-title cf">
		<h2><?php echo !empty($model['id']) ? '编辑' : '新增'; ?> [<?php echo htmlentities($model['title']); ?>] 属性 : <a href="<?php echo U('index','model_id='.$info['model_id']); ?>">返回列表</a></h2>
	</div>

	<!-- 标签页导航 -->
	<div class="tab-wrap">
		<ul class="tab-nav nav">
			<li data-tab="tab1" class="current"><a href="javascript:void(0);">基 础</a></li>
			<li data-tab="tab2"><a href="javascript:void(0);">高 级</a></li>
		</ul>
		<div class="tab-content">
			<!-- 表单 -->
			<form id="form" action="<?php echo U('update'); ?>" method="post" class="form-horizontal doc-modal-form">
				<!-- 基础 -->
				<div id="tab1" class="tab-pane in tab1">
					<div class="form-item cf">
						<label class="item-label">字段名<span class="check-tips">（请输入字段名 英文字母开头，长度不超过30）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="name" value="<?php echo htmlentities((isset($info['name']) && ($info['name'] !== '')?$info['name']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">字段标题<span class="check-tips">（请输入字段标题，用于表单显示）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="title" value="<?php echo htmlentities((isset($info['title']) && ($info['title'] !== '')?$info['title']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">字段类型<span class="check-tips">（用于表单中的展示方式）</span></label>
						<div class="controls">
							<select name="type" id="data-type">
								<option value="">----请选择----</option>
								<?php $_result=get_attribute_type();if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?>
								<option value="<?php echo htmlentities($key); ?>" rule="<?php echo htmlentities($type[1]); ?>"><?php echo htmlentities($type[0]); ?></option>
								<?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">字段定义<span class="check-tips">（字段属性的sql表示）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="field" value="<?php echo htmlentities((isset($info['field']) && ($info['field'] !== '')?$info['field']:'')); ?>" id="data-field">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">参数<span class="check-tips">（字段类型为布尔、单选、多选、枚举和级联选择时的定义数据，其它字段类型为空）</span></label>
						<div class="controls">
							<label class="textarea input-large">
								<textarea name="extra"><?php echo htmlentities((isset($info['extra']) && ($info['extra'] !== '')?$info['extra']:'')); ?></textarea>
							</label>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">默认值<span class="check-tips">（字段的默认值）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="value" value="<?php echo htmlentities((isset($info['value']) && ($info['value'] !== '')?$info['value']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">字段备注<span class="check-tips">(用于表单中的提示)</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="remark" value="<?php echo htmlentities((isset($info['remark']) && ($info['remark'] !== '')?$info['remark']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">是否显示<span class="check-tips">（是否显示在表单中）</span></label>
						<div class="controls">
							<select name="is_show">
								<option value="1">始终显示</option>
								<option value="2">新增显示</option>
								<option value="3">编辑显示</option>
                                <option value="5">条件控件</option>
                                <option value="4">隐藏值</option>
								<option value="0">不显示</option>
							</select>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">是否必填<span class="check-tips">（用于自动验证）</span></label>
						<div class="controls">
							<select name="is_must">
								<option value="0">否</option>
								<option value="1">是</option>
							</select>
						</div>
					</div>
                    </div>
                <div id="tab2" class="tab-pane tab2">
					<div class="form-item cf">
						<label class="item-label">验证方式</label>
						<div class="controls">
							<select name="validate_type">
								<option value="regex">正则验证</option>
								<option value="function">函数验证</option>
								<option value="unique">唯一验证</option>
								<option value="length">长度验证</option>
                                <option value="in">验证在范围内</option>
                                <option value="notin">验证不在范围内</option>
                                <option value="between">区间验证</option>
                                <option value="notbetween">不在区间验证</option>
							</select>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">验证规则<span class="check-tips">（根据验证方式定义相关验证规则）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="validate_rule" value="<?php echo htmlentities((isset($info['validate_rule']) && ($info['validate_rule'] !== '')?$info['validate_rule']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">出错提示</label>
						<div class="controls">
							<input type="text" class="text input-large" name="error_info" value="<?php echo htmlentities((isset($info['error_info']) && ($info['error_info'] !== '')?$info['error_info']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">验证时间</label>
						<div class="controls">
							<select name="validate_time">
                                <option value="3">始 终</option>
								<option value="1">新 增</option>
								<option value="2">编 辑</option>
								</select>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">自动完成方式</label>
						<div class="controls">
							<select name="auto_type">
								<option value="function">函数</option>
								<option value="field">字段</option>
								<option value="string">字符串</option>
							</select>
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">自动完成规则<span class="check-tips">（根据完成方式订阅相关规则）</span></label>
						<div class="controls">
							<input type="text" class="text input-large" name="auto_rule" value="<?php echo htmlentities((isset($info['auto_rule']) && ($info['auto_rule'] !== '')?$info['auto_rule']:'')); ?>">
						</div>
					</div>
					<div class="form-item cf">
						<label class="item-label">自动完成时间</label>
						<div class="controls">
							<select name="auto_time">
								<option value="3">始 终</option>
								<option value="1">新 增</option>
								<option value="2">编 辑</option>
							</select>
						</div>
					</div>
					<div id='file_check'>
						<div class="form-item cf">
							<label class="item-label">验证上传文件扩展名<span class="check-tips">（支持多个扩展名用','隔开）</span></label>
							<div class="controls">
								<input type="text" class="text input-large" name="validate_file_exts" value="<?php echo htmlentities((isset($info['validate_file_exts']) && ($info['validate_file_exts'] !== '')?$info['validate_file_exts']:'')); ?>">
							</div>
						</div>
						<div class="form-item cf">
							<label class="item-label">验证上传文件大小<span class="check-tips">（上传文件大小最大值，单位为字节）</span></label>
							<div class="controls">
								<input type="text" class="text input-large" name="validate_file_size" value="<?php echo htmlentities((isset($info['validate_file_size']) && ($info['validate_file_size'] !== '')?$info['validate_file_size']:'')); ?>">
							</div>
						</div>
					</div>
				</div>

				<!-- 按钮 -->
				<div class="form-item cf">
					<label class="item-label"></label>
					<div class="controls edit_sort_btn">
						<input type="hidden" name="id" value="<?php echo htmlentities((isset($info['id']) && ($info['id'] !== '')?$info['id']:0)); ?>"/>
						<input type="hidden" name="model_id" value="<?php echo htmlentities((isset($info['model_id']) && ($info['model_id'] !== '')?$info['model_id']:0)); ?>"/>
						<button class="btn submit-btn ajax-post no-refresh" type="submit" target-form="form-horizontal">确 定</button>
						<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
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
    
<script type="text/javascript" charset="utf-8">
Think.setValue('type', "<?php echo htmlentities((isset($info['type']) && ($info['type'] !== '')?$info['type']:'')); ?>");
Think.setValue('is_show', "<?php echo htmlentities((isset($info['is_show']) && ($info['is_show'] !== '')?$info['is_show']:1)); ?>");
Think.setValue('is_must', "<?php echo htmlentities((isset($info['is_must']) && ($info['is_must'] !== '')?$info['is_must']:0)); ?>");
Think.setValue('validate_time', "<?php echo htmlentities((isset($info['validate_time']) && ($info['validate_time'] !== '')?$info['validate_time']:3)); ?>");
Think.setValue('auto_time', "<?php echo htmlentities((isset($info['auto_time']) && ($info['auto_time'] !== '')?$info['auto_time']:3)); ?>");
Think.setValue('validate_type', "<?php echo htmlentities((isset($info['validate_type']) && ($info['validate_type'] !== '')?$info['validate_type']:'regex')); ?>");
Think.setValue('auto_type', "<?php echo htmlentities((isset($info['auto_type']) && ($info['auto_type'] !== '')?$info['auto_type']:'function')); ?>");
$(function(){
	showTab();
	var datatype = $('#data-type').find('option:selected').val();
	if(datatype=='file'){
		$('#file_check').show();
	}else{
		$('#file_check').hide();
	}
})
<?php if(ACTION_NAME == 'add'): ?>
$(function(){
	$('#data-type').change(function(){
		$('#data-field').val($(this).find('option:selected').attr('rule'));
		var datatype = $(this).find('option:selected').val();
		if(datatype=='file'){
			$('#file_check').show();
		}else{
			$('#file_check').hide();
		}
	});
})
<?php endif; ?>
</script>

</body>
</html>
