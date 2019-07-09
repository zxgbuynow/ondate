<?php /*a:7:{s:65:"/data/httpd/ondate/application/weixin/view/user_center/lists.html";i:1562590036;s:59:"/data/httpd/ondate/application/common/view/base/common.html";i:1562590036;s:57:"/data/httpd/ondate/application/common/view/base/head.html";i:1562590036;s:59:"/data/httpd/ondate/application/common/view/base/header.html";i:1562590036;s:57:"/data/httpd/ondate/application/common/view/base/_nav.html";i:1562590036;s:59:"/data/httpd/ondate/application/common/view/base/footer.html";i:1562590036;s:56:"/data/httpd/ondate/application/common/view/base/var.html";i:1562590036;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8" />
<meta content="<?php echo config('WEB_SITE_KEYWORD'); ?>" name="keywords"/>
<meta content="<?php echo config('WEB_SITE_DESCRIPTION'); ?>" name="description"/>
<link rel="shortcut icon" href="<?php echo SITE_URL; ?>/favicon.ico">
<title><?php echo htmlentities((isset($page_title) && ($page_title !== '')?$page_title:'weiphp')); ?></title>
<link href="/static/font-awesome/css/font-awesome.min.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="/static/ymyui/css/ymyui.css">
<!-- <link rel="stylesheet" href="/static/bootstrap/css/bootstrap.css"> -->
<link href="/static/base/css/base.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/static/base/css/module.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link href="/static/base/css/weiphp.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet">
<link rel="stylesheet" href="//at.alicdn.com/t/font_727459_zyp88ew3c6.css"></link>

<!-- <link rel="stylesheet" src="/static/ymyui/css/ymyui.css"> -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
<script src="/static/bootstrap/js/html5shiv.js?v=<?php echo SITE_VERSION; ?>"></script>
<![endif]-->
<!--[if lt IE 9]>
<script type="text/javascript" src="/static/jquery-1.10.2.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script type="text/javascript" src="/static/jquery-2.0.3.min.js"></script>
<!--<![endif]-->
<!-- <script type="text/javascript" src="/static/bootstrap/js/bootstrap.min.js"></script> -->
<!-- 菜单下拉 -->
<script src="//cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
<script type="text/javascript" src="/static/ymyui/js/ymyui.min.js"></script>



<script type="text/javascript" src="/static/uploadify/jquery.uploadify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
<script type="text/javascript" src="/static/base/js/dialog.js?v=<?php echo SITE_VERSION; ?>"></script>

<script type="text/javascript" src="/static/webuploader-0.1.5/webuploader.min.js"></script>

<script type="text/javascript" src="/static/base/js/admin_common.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/static/base/js/admin_image.js?v=<?php echo SITE_VERSION; ?>"></script>
<script type="text/javascript" src="/static/masonry/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/static/jquery.dragsort-0.5.2.min.js"></script> 
<script src="//cdn.bootcss.com/limonte-sweetalert2/7.21.1/sweetalert2.all.min.js"></script>
<!-- 封装的jquery表单验证插件，依赖sweetalert2 -->
<script src="/static/default/lib/formverfiy.js"></script>
<script type="text/javascript">
var  IMG_PATH = "/static/base/images";
var  STATIC = "/static";
var  ROOT = "";
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
       		<img height="52" src="/static/base/images/logo.png"/>
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
      
        <style>
            .form-inline select{
               margin: 0;
               height:30px;
            }
            .form-group input{
                margin-bottom: 0;
            }
            .normal_tips {
              border: 0!important;
              margin: 20px;
            }
        </style>

  <div class="span9 page_message">
    <!--<section id="contents"> <?php  if(is_array($nav) && count($nav)>1) {  ?>
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
<?php endif; ?>-->
      <div class="table-bar">
        <div class="fl">
          <div class="tools"> <a href="javascript:void(0);" class="btn setting_group">设置用户组</a> &nbsp; <a href="<?php echo U ( 'home/AuthGroup/export?type='.$type.'&id='.$group_id ); ?>" class="btn">导出用户</a> &nbsp;
          <?php if($syc_wechat): ?><a href="<?php echo U('syc_auth_group'); ?>" class="btn tongbu">一键同步微信公众号粉丝</a> &nbsp;
             <?php endif; ?>
          </div>
        </div>
        <!-- 高级搜索 -->
        <div class="search-form fr cf">
          <div class="sleft" style="margin-right:10px;">
              <select name="group" style="border:none; padding:4px; margin:0;">
              <option value="<?php echo U ( 'weixin/UserCenter/lists',array('group_id'=>0,'isAjax'=>0,'isRadio'=>$isRadio,'type'=>$type)); ?>" <?php if($group_id == '0'): ?>selected<?php endif; ?> >全部用户</option>
                  <?php if(is_array($auth_group) || $auth_group instanceof \think\Collection || $auth_group instanceof \think\Paginator): $i = 0; $__LIST__ = $auth_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                      <option value="<?php echo U ( 'weixin/UserCenter/lists',array('group_id'=>$vo['id'],'isAjax'=>0,'isRadio'=>$isRadio,'type'=>$type)); ?>" <?php if($vo['id'] == $group_id): ?>selected<?php endif; ?> ><?php echo htmlentities($vo['title']); ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
              </select>
          </div>
          <div class="sleft">
            <input type="text" placeholder="请输编号、姓名" value="<?php echo htmlentities($search_key); ?>" class="search-input" name="key">
            <a id="search" href="javascript:;" class="sch-btn"><i class="btn-search"></i></a> </div>
        </div>
        <!-- 多维过滤 -->
      </div>

      

      <div class="row justify-content-between" style="margin-left: 0">
                <div class="form-inline form-group ml-4">
                          <label class="mr-1 ml-1" style="align-items: start;">
                                筛选时间：
                          </label>
                          <input style="width:175px" type="datetime" name="s_time" class="text time mr-1 ml-1" value="<?php echo input('s_time'); ?>" placeholder="请选择时间" />
                          ：
                          <input style="width:175px"  type="datetime" name="e_time" class="text time mr-1 ml-1" value="<?php echo input('e_time'); ?>" placeholder="请选择时间" />
                    <pre>  </pre>
                    
                    <label class="mr-1 ml-1" style="align-items: start;">
                        性别：
                    </label>
                    <select name="sex" style="max-width:150px;padding:0">
                        <option value="" <?php if(input('sex') == ''): ?>selected<?php endif; ?> >不限</option>
                        <option value="1" <?php if(input('sex') == '1'): ?>selected<?php endif; ?> >男</option>
                        <option value="2" <?php if(input('sex') == '2'): ?>selected<?php endif; ?> >女</option>

                    </select>
                    <pre>  </pre>

                    <a href="javascript:void(0);" class="btn search_duo" style="margin-left:10px">搜索</a>
                </div>

      </div>


      <!-- 数据列表 -->
      <div class="data-table">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead>
              <tr>
                <th class="row-selected row-selected"> <input type="checkbox" class="check-all regular-checkbox" id="checkAll">
                  <label for="checkAll"></label></th>
                <th>头像</th>
                <th>用户昵称</th>
                  <th>姓名</th>
                <th>性别</th>
                <th>编号</th>
                  <th>联系电话</th>
                <th>关注时间</th>
                <th>分组</th>
                <th>操作</th>
              </tr>
            </thead>

            <!-- 列表 -->
            <tbody>
              <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                  <td><input type="checkbox" id="check_<?php echo htmlentities($vo['uid']); ?>" name="ids[]" value="<?php echo htmlentities($vo['uid']); ?>" class="ids regular-checkbox">
                    <label for="check_<?php echo htmlentities($vo['uid']); ?>"></label></td>
                  <td><?php echo url_img_html($vo['headimgurl']); ?></td>
                  <td><?php echo htmlentities($vo['nickname']); ?></td>
                    <td><?php echo htmlentities($vo['truename']); ?></td>
                  <td><?php echo htmlentities($vo['sex_name']); ?></td>
                    <td>编号</td>
                <!--  <td><?php echo htmlentities($vo['province']); ?><?php echo htmlentities($vo['city']); ?></td>-->
                    <td><?php echo htmlentities($vo['mobile']); ?></td>
			      <td><?php echo htmlentities(time_format($vo['reg_time'])); ?></td>
                  <td><?php echo htmlentities($vo['group']); ?></td>
                  <td>
             <!--     <a href="<?php echo U ( 'weixin/UserCenter/detail',array('uid'=>$vo['uid'])); ?>" target="_self">详细资料</a>-->
                  <a href="<?php echo U ( 'weixin/UserCenter/edit_page',array('uid'=>$vo['uid'])); ?>" target="_self">查看</a>
                  <!--a href="<?php echo U('home/CreditData/lists',array('uid'=>$vo['uid'])); ?>" target="_self">积分记录</a-->
                  </td>
                </tr>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="page"> <?php echo (isset($_page) && ($_page !== '')?$_page:''); ?> </div>
    </section>
  </div>
   <!-- 用户分组弹框 -->
  <div class="group_html" style="display:none">
    	<div class="manage_group normal_dialog">
            <div class="content">
<!--            <select name="type" id="select_type" style="width:25%">
                    <option value="0">移入</option>
                    <option value="1">移出</option>
            </select>-->
            <select name="group" id="select_group" style="width:100%">
                <?php if(is_array($auth_group) || $auth_group instanceof \think\Collection || $auth_group instanceof \think\Paginator): $i = 0; $__LIST__ = $auth_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
            <div class="btn_wrap"><button class="btn setting_group" url="<?php echo U('changeGroup'); ?>" target-form="ids">确定</button></div>
            </div>
        </div>
    </div>
    <!-- 备注用户名 -->
    <div class="remark_html" style="display:none">
    	<div class="manage_group normal_dialog">
            <div class="content">
            <input name="remark" id="set_remark" value="" placeholder="请输入备注信息" class="text"  />
            <div class="btn_wrap"><button class="btn setting_remark" url="<?php echo U('set_remark'); ?>">确定</button></div>
            </div>
        </div>
    </div>



      <!-- 底部 -->
      <div class="wrap bottom" style="background:#fff; border-top:#ddd;">
    <p class="copyright">本系统由<a href="https://www.weiphp.cn" target="_blank">WeiPHP</a>强力驱动</p>
</div>

<script type="text/javascript">

(function(){
	var ThinkPHP = window.Think = {
		"ROOT"   : "", //当前网站地址
		"APP"    : "__APP__", //当前项目地址
		"PUBLIC" : "", //项目公共目录地址
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

	
    
<link href="/static/datetimepicker/css/datetimepicker.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
   <?php if(config('COLOR_STYLE')=='blue_color') echo '
   <link href="/static/datetimepicker/css/datetimepicker_blue.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
    '; ?>
  <link href="/static/datetimepicker/css/dropdown.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="/static/datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js?v=<?php echo SITE_VERSION; ?>" charset="UTF-8"></script>
  <script type="text/javascript">
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


	//search_type搜索功能
  $("#search").click(function(){
    var url = "<?php echo U ( 'weixin/UserCenter/lists',['key'=>'s_key','type'=>$type]); ?>";
    var key = $('[name="key"]').val();
    url = url.replace('s_key',key);

    url = url.replace(/[?&=]/g,'/');
				window.location.href = url;
  });

  	$(".search_duo").click(function(){
	    var url = "<?php echo U ( 'weixin/UserCenter/lists',['s_time'=>'s_s_time','e_time'=>'s_e_time','type'=>'s_type','sex'=>'s_sex']); ?>";
		var s_time  = $('[name="s_time"]').val();
		var e_time = $('[name="e_time"]').val();
		var type = "<?php echo input('type/d', 0); ?>";
		var sex = $('[name="sex"]').val();

		if(s_time == ''){
			url = url.replace('/s_time/s_s_time','');
		}else{
			url = url.replace('s_s_time',s_time);
		}

		if(e_time == ''){
			url = url.replace('/e_time/s_e_time','');
		}else{
			url = url.replace('s_e_time',e_time);
		}

		if(type == ''){
			url = url.replace('/tag_id/s_type','');
		}else{
			url = url.replace('s_type',type);
		}

		if(sex == ''){
			url = url.replace('/sex/s_sex','');
		}else{
			url = url.replace('s_sex',sex);
		}

	    url = url.replace(/[?&=]/g,'/');
				window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });
	$('select[name=group]').change(function(){
		location.href = this.value;
	});
	//设置分组
	$('.setting_group').click(function(){
		var html = $($('.group_html').html());
		query = $('.ids').serialize();
		if(query==""){
			alert('请选择用户');
			return;
		}
		$.Dialog.open('设置用户分组',{width:300,height:160},html);
		//$.thinkbox(html);
		$('button',html).click(function(){
			that = this;
			target = $(that).attr('url');
			var group = $('#select_group', html).val();
			query = query + "&group_id="+group ;//+ "&type="+$('#select_type', html).val();
			$(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
				location.reload();
				$('.thinkbox-modal-blackout-default,.thinkbox-default').hide();
            });
		})
	})
	//设置标签
	$('.setting_tag').click(function(){
    //用户标签弹框
		var html = $('<div class="manage_group normal_dialog">'+
                  '<div class="content">'+
                          '<?php if(is_array($tags) || $tags instanceof \think\Collection || $tags instanceof \think\Paginator): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>'+
                            '<div class="check-item"><input type="checkbox" class="regular-checkbox select_tag" value="<?php echo htmlentities($vo['id']); ?>" id="tag_<?php echo htmlentities($vo['id']); ?>" name="tags[]">'+
                              '<label for="tag_<?php echo htmlentities($vo['id']); ?>"></label><?php echo htmlentities($vo['title']); ?> </div>'+
                          '<?php endforeach; endif; else: echo "" ;endif; ?>'+
                  '<div class="btn_wrap"><button class="btn setting_tag" url="<?php echo U('changeTag'); ?>" target-form="ids">确定</button></div>'+
                  '</div>'+
              '</div>');
    query = $('.ids').serialize();
    if(query==""){
      alert('请选择用户');
      return;
    }
    $.Dialog.open('设置用户标签',{width:300,height:300},html);
    //$.thinkbox(html);
      var voList = $('.select_tag',html).html();
      //console.log(voList);
      if(voList==undefined){
        $('.content',html).html("<center>请先增加标签</center>")
      }
    $('button',html).click(function(){
      that = this;
      target = $(that).attr('url');
      var tags=''
      $('.select_tag', html).each(function() {
        if($(this).prop('checked'))  tags += $(this).val()+',';

            });
      if(tags==""){
        alert('请选择标签');
        return;
        }
			query = query + "&tags="+tags ;//+ "&type="+$('#select_type', html).val();
			$(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
				location.reload();
				$('.thinkbox-modal-blackout-default,.thinkbox-default').hide();
            });
		})
	})
	$('.set_remark').click(function(){
		var html = $($('.remark_html').html());
		var uid = $(this).attr('rel');
		$.post("<?php echo U('getUserRemark'); ?>",{'uid':uid},function(re){
			$("input[name='remark']").val(re);
		});
		$.Dialog.open('设置用户备注',{width:300,height:160},html);
		//$.thinkbox(html);
		$('button',html).click(function(){
			that = this;
			target = $(that).attr('url');
			query = "uid="+uid+"&remark="+$('#set_remark', html).val() ;//+ "&type="+$('#select_type', html).val();
			$(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
            $.post(target,query).success(function(data){
				location.reload();
				$('.thinkbox-modal-blackout-default,.thinkbox-default').hide();
            });
		})
	})

})
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
