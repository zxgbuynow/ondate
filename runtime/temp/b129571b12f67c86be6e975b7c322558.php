<?php /*a:9:{s:53:"/data/httpd/wx/application/shop/view/order/lists.html";i:1559892894;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/_nav.html";i:1553940778;s:59:"/data/httpd/wx/application/shop/view/goods/muti_search.html";i:1559685564;s:51:"/data/httpd/wx/application/shop/view/order/pay.html";i:1559910874;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
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
      
<style type="text/css">
    .btn.setting_remark{
        margin: 0 .5em;
    }
    .li_main img{
        width:70px;
        height:70px;
        margin-right: 10px;
    }
    .li_bottom>div{
        float: right;
        margin-right:2em;
    }
    .status>a:not(.border-btn){
        margin-right:1em;
    }
</style>
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

        <ul class="tab-nav nav">            
            <li id="1"><a  href="<?php echo U('lists',array('status'=>1)); ?>">待支付<span class="arrow fa fa-sort-up"></span></a></li>
            <li id="2"><a  href="<?php echo U('lists',array('status'=>2)); ?>">已支付<span class="arrow fa fa-sort-up"></span></a></li>
            <li id="3"><a  href="<?php echo U('lists',array('status'=>3)); ?>">待确认<span class="arrow fa fa-sort-up"></span></a></li>
            <li id="4"><a  href="<?php echo U('lists',array('status'=>4)); ?>">已完成<span class="arrow fa fa-sort-up"></span></a></li>
            <li id="5"><a  href="<?php echo U('lists',array('status'=>5)); ?>">退款<span class="arrow fa fa-sort-up"></span></a></li>
            <li id="0"><a  href="<?php echo U('lists',array('status'=>0)); ?>">全部<span class="arrow fa fa-sort-up"></span></a></li>
            <li><a href="<?php echo U('shop/comment/lists'); ?>">商品评价<span class="arrow fa fa-sort-up"></span></a></li>
        </ul>
        <div class="table-bar" style="padding: 0 .5em;">
      <div class="fl"> 
        <div class="tools">
        <a id="tools_<?php echo SHOP_EVENT_TYPE; ?>" class="btn active" href="<?php echo U('lists',array('status'=>$status,'event_type'=>SHOP_EVENT_TYPE)); ?>">订单列表</a>
      <!--  <a id="tools_<?php echo SECKILL_EVENT_TYPE; ?>" class="btn active" href="<?php echo U('lists',array('status'=>$status,'event_type'=>SECKILL_EVENT_TYPE)); ?>">秒 杀</a>
        <a id="tools_<?php echo COLLAGE_EVENT_TYPE; ?>"class="btn active" href="<?php echo U('lists',array('status'=>$status,'event_type'=>COLLAGE_EVENT_TYPE)); ?>">拼 团</a>        
        <a id="tools_<?php echo HAGGLE_EVENT_TYPE; ?>"class="btn active" href="<?php echo U('lists',array('status'=>$status,'event_type'=>HAGGLE_EVENT_TYPE)); ?>">砍 价</a>   -->
        </div>
        </div>

        <!-- 高级搜索 -->

        <div class="search-form fr cf">

          <div class="sleft">
          
            <?php empty($search_key) && $search_key=$model['search_key'];empty($search_key) && $search_key='title';unset($get_param[$search_key]); if(isset( $get_param[$search_key]))unset( $get_param[$search_key]); $search_url = U('lists', $get_param); unset($get_param[$search_key]); ?>
            
            <input type="text" name="<?php echo htmlentities($search_key); ?>" class="search-input" value="<?php echo I($search_key); ?>" placeholder="<?php echo htmlentities($placeholder); ?>">
            <a class="sch-btn" href="javascript:;" id="search" url="<?php echo htmlentities($search_url); ?>"><i class="btn-search"></i></a> </div>
        </div>
<style type="text/css">
            .sleft{
                height:32px;
                margin-right:20px;
            }

            .condition{
                float: left;
                min-width: 0px;
                margin-bottom: 10px;
            }
            .search-input:focus{
                border:1px solid #006fd8;
            }
			.muti_search{ margin-top:45px;}
            .search-input{width: 100px}
        </style>
<!-- 高级搜索 -->
<form class="muti_search cf" action="<?php echo htmlentities((isset($search_url) && ($search_url !== '')?$search_url:'')); ?>" id="muth_search_form">
  <div style="line-height: 30px;">
<!--    <div class="condition">
      <span>商品价格：</span>
      <input type="number" name="start_price" class="search-input input-small" value="<?php echo htmlentities((isset($start_price) && ($start_price !== '')?$start_price:'')); ?>">
      <span>至</span>
      <input type="number" name="end_price" class="search-input input-small" value="<?php echo htmlentities((isset($end_price) && ($end_price !== '')?$end_price:'')); ?>">
    </div>-->
    <div class="condition">
      <span>技师编号：</span>
      <input type="text" name="jsbn" class="search-input" value="<?php echo htmlentities((isset($jsbn) && ($jsbn !== '')?$jsbn:'')); ?>">
    </div>
      <div class="condition">
          <span>房间号：</span>
          <input type="text" name="room" class="search-input" value="<?php echo htmlentities((isset($room) && ($room !== '')?$room:'')); ?>">
      </div>
    <div class="condition">
      <span>商品名称：</span>
      <input type="text" name="title" class="search-input" value="<?php echo htmlentities((isset($title) && ($title !== '')?$title:'')); ?>">
    </div>
    <div class="condition">
    <button type="button" class="sch-btn btn" href="javascript:;" id="muti_search" style="padding: 10px;">搜索</button>
    </div>
  </div>
</form>
<script type="text/javascript">
$(function(){
	//搜索功能
	$("#muti_search").click(function(){
		var data = $('#muth_search_form').serializeArray();
		//console.log(data)
		var query = '/';
		for(var i = 0; i< data.length; i++){
			if(data[i]['value']!=''){
			   query += data[i]['name'] + '/'+data[i]['value']+'/'
			}
		}
		//console.log(query)
		var url = "<?php echo htmlentities($search_url); ?>"+query;
		//console.log(url)
		
		url = url.replace(/[?&=]/g,'/');
				window.location.href = url;
	});

})
</script>  

      </div>

      <!-- 数据列表 -->
      <div class="data-table">
      <ul class="article_card_list">
              <?php if(is_array($list_data) || $list_data instanceof \think\Collection || $list_data instanceof \think\Paginator): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                <li >
                  <div class="li_top" colspan="6"><?php if($check_all): ?><input class="ids regular-checkbox" type="checkbox" value="<?php echo htmlentities($data['id']); ?>" name="ids[]" id="check_<?php echo htmlentities($data['id']); ?>"><label for="check_<?php echo htmlentities($data['id']); ?>"></label>&nbsp;&nbsp;<?php endif; ?>编号:<?php echo $data['id']; ?> -订单号 : <?php echo $data['order_number']; ?> &nbsp;&nbsp;&nbsp;&nbsp;下单时间：<?php echo htmlentities(time_format($data['cTime'])); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!(empty($data['pay_time']) || (($data['pay_time'] instanceof \think\Collection || $data['pay_time'] instanceof \think\Paginator ) && $data['pay_time']->isEmpty()))): ?>付款时间：<?php echo htmlentities(time_format($data['pay_time'])); ?>
                  &nbsp;&nbsp;<?php endif; ?><span class="colorless">|</span>&nbsp;&nbsp;&nbsp;<span class="li_top_u"><img width="30" src="<?php echo htmlentities($data['headimgurl']); ?>"/><?php echo $data['uid']; ?></span>
                  </div>
                    <div class="li_main" style="display: flex;">
                        <table width="100%">
                            <tr>
                                <td style="width:20%;">名称</td>
                                <td style="width:10%;">房间</td>
                                <td style="width:10%;">技师号</td>
                                <td style="width:10%;">单价</td>
                                <td style="width:10%;">数量</td>
                                <td style="width:10%;">总金额</td>
                                <td style="width:10%;">状态</td>
                                <td>操作</td>

                            </tr>
                            <?php if(is_array($data['goods']) || $data['goods'] instanceof \think\Collection || $data['goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$g): $mod = ($i % 2 );++$i;?>
                            <tr class="tab_body">
                                <td><?php echo $g['goods_title']; ?></td>
                                <td><?php echo htmlentities($data['room']); ?></td>
                                <td><?php echo htmlentities($data['jsbn']); ?></td>
                                <td><?php echo $g['market_price']; ?></td>
                                <td>x<?php echo htmlentities($g['num']); ?></td>
                                <td><?php echo htmlentities($data['total_price']); ?></td>
                                <td><span style="color: red;"><?php echo htmlentities($data['status_code_name']); ?></span></td>
                                <td>
                                    <button type="button" class="btn btn-info"  data-toggle="modal" onclick="return get_edit_info(<?php echo htmlentities($data['id']); ?>)" data-target="#addUserModal">支付订单</button>
                                    <button type="button" class="btn btn-info"  data-toggle="modal" onclick="return cancel(<?php echo htmlentities($data['id']); ?>)" data-target="#addUserModal">取消订单</button>

                                </td>

                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
<!--                    <div class="li_bottom" style="overflow: hidden;line-height: 2.5em;padding-bottom: 10px;">
                        <div class="status"style="margin-right:1em"><a href="">订单失效</a>
                        </div>
                        <div class="status"style="margin-right:1em"><?php echo $data['action']; ?>
                        </div>
&lt;!&ndash;                        <div class="status"style="margin-right:1em"><a href="">订单支付</a>
                        </div>&ndash;&gt;
                        <button type="button" class="btn btn-info" style="float: right" data-toggle="modal" onclick="return get_edit_info(<?php echo htmlentities($data['id']); ?>)" data-target="#addUserModal">支付</button>
                        <div class="total_price" style="="><?php if($data['pay_type'] == '90'): ?><?php echo htmlentities($data['total_price']); ?>积分<?php else: ?>总金额：¥<?php echo wp_money_format($data['pay_money']); ?><?php endif; ?>
           &lt;!&ndash;                 <?php if(!(empty($data['event_type']) || (($data['event_type'] instanceof \think\Collection || $data['event_type'] instanceof \think\Paginator ) && $data['event_type']->isEmpty()))): ?>
                            <span class="red_text_bg" style="width: 10%"><?php echo htmlentities($data['event_type']); ?></span>
                            <?php endif; ?>&ndash;&gt;
                        </div>
                        <div class="num">数量：x<?php echo htmlentities($data['num']); ?></div>

                        <div class="status_name" style="display:inline-flex">状态：
                            <span class="red_text_bg" ><?php echo htmlentities($data['status_code_name']); ?></span>
                            <span style="color: #A7A4A7; display: block; ">
&lt;!&ndash;                      		<?php if($data['order_state'] == 1): ?>
                      			（正常）
                      		<?php elseif($data['order_state'] == 2): ?>
                      			（支付异常）
                      		<?php else: ?>
                      			（关闭）
                      		<?php endif; ?>&ndash;&gt;
                      	</span>
                        </div>
                    </div>-->
                </li>
          <br>
              <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
      </div>
      <div class="page"> <?php echo (isset($_page) && ($_page !== '')?$_page:''); ?> </div>
    </section>
  </div>
<!-- 模态框示例（Modal） -->
<form method="post" action="<?php echo U('pay_action'); ?>" class="form-horizontal" role="form" id="form_data" onsubmit="return check_form()" style="margin: 20px;">
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        ×
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                       订单支付
                    </h4>
                </div>
                <div class="alert alert-success" id="msg" style="display: none;">
                    <strong>操作成功!</strong>
                </div>
                <div class="alert alert-danger" id="msg2" style="display: none;">
                    <strong>错误!</strong>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="user_id" class="col-sm-3 control-label">技师编号</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="jsbn" name="jsbn" value="{jsbn}">
                                <input type="hidden" id="id" name="id" value="{id}">
                                <input type="hidden" id="romm" name="room" value="{room}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">总金额</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="total_price" value="" id="total_price"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-3 control-label">支付方式</label>
                            <div class="col-sm-9">
                             <select name="pay_type" id="pay_type">
                                 <option value="0">请选择</option>
                                 <option value="1">微信</option>
                                 <option value="2">支付宝</option>
                                 <option value="3">现金</option>
                                 <option value="4">会员卡</option>
                                 <option value="5">免单</option>
                                 <option value="6">其他</option>
                             </select>
                            </div>
                        </div>
                        <div class="form-group" style="display: none" id="card">
                            <label for="lastname" class="col-sm-3 control-label">请输入卡号</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="card_no" value="" id="card_no"
                                >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remark" class="col-sm-3 control-label">备注</label>
                            <div class="col-sm-9">
                                <input type="text"  class="form-control" name="remark" value="" id="remark">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                    <button type="button" id="sub" class="btn btn-primary"  onclick="return pay_cation()">
                        确认支付
                    </button><span id="tip"> </span>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>
</form>
<script>
    $("#pay_type").change(function(){
        var t=$("#pay_type option:selected").val();
        if(t==4){
            $("#card").show();
        }else{
            $("#card").hide();
        }
    });
    //确认支付
    $("#sub").click(function(){
        var id=$('#id').val();
        var total_price =$('#total_price').val();
        var jsbn=$('#jsbn').val();
        var pay_type=$("#pay_type option:selected").val();
        $.ajax(
            {
                url: "<?php echo U('pay_action'); ?>",
                data:{"id":id,"total_price":total_price,"jsbn":jsbn,"pay_type":pay_type},
                type: "post",
                beforeSend:function()
                {
                    // $("#tip").html("<span style='color:blue'>正在处理...</span>");
                    return true;
                },
                success:function(data)
                {
                    var data = data;

                    var data_obj = eval("("+data+")");
                    if(data_obj.typ==2)
                    {
                     $('#msg2').hide();
                     $('#msg').show();
                     location.reload();
                    }

                   if(data_obj.typ==1) {
                       $("#msg2").html("<strong>请选择支付方式！</strong>");
                       $('#msg2').show();
                      //  $("#tip").html("<span style='color:red'>请选择支付方式！</span>");
                        //  alert('操作失败');
                    }
                },
                error:function()
                {
                    alert('请求出错');
                },
                complete:function()
                {
                    // $('#tips').hide();
                }
            });
    });

     // 支付頁面
     function get_edit_info(order_id)
     {
         if(!order_id)
         {
             alert('Error！');
             return false;
         }
         // var form_data = new Array();
         $.ajax(
             {
                 url: "<?php echo U('pay_info'); ?>",
                 data:{"order_id":order_id},
                 type: "post",
                 beforeSend:function()
                 {
                     // $("#tip").html("<span style='color:blue'>正在处理...</span>");
                     return true;
                 },
                 success:function(data)
                 {
                     if(data)
                     {
                         // 解析json数据
                         var data = data;

                         var data_obj = eval("("+data+")");

                         // 赋值
                         $("#jsbn").val(data_obj.jsbn);
                         $("#id").val(data_obj.id);
                         $("#total_price").val(data_obj.total_price);
                         $("#address").val(data_obj.address);

                         // 将input元素设置为readonlyid
                         $('#jsbn').attr("readonly","readonly")
                         $('#total_price').attr("readonly","total_price")
                         // location.reload();
                     }
                     else
                     {
                         $("#tip").html("<span style='color:red'>失败，请重试</span>");
                         //  alert('操作失败');
                     }
                 },
                 error:function()
                 {
                     alert('请求出错');
                 },
                 complete:function()
                 {
                     // $('#tips').hide();
                 }
             });

         return false;
     }
</script>
<div class="audit_refund_html" style="display:none">
    <div class="manage_group normal_dialog">
        <div class="content">
                <div>
                        <p class="audit_content"></p>
                </div>
                        </div>

    </div>
    <div class="btn_wrap" style="text-align: center"><button class="btn setting_remark " onclick="audit_refund(2)" >退款</button><button class="btn setting_remark active"  onclick="audit_refund(3)">拒绝退款</button></div>

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
$(document).ready(function () {
	var status = "<?php echo htmlentities($status); ?>"
	$("#"+status).addClass("current");
});
var refund_id = 0
$(function(){
	var event_type = "<?php echo htmlentities($event_type); ?>"
    $('#tools_'+event_type).removeClass('active');

	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
        if(query == '' ){
			url="<?php echo U('lists'); ?>";
        }
		url = change_search_url(url);
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });

    $(".btn-small").each(function(){
    	var url = $(this).attr('data-href');
    	var state=$(this).attr('data-ostate');
    	$(this).click(function(){
    		if(state != 1){
    			if(confirm('该订单状态有异常，是否继续？')){
    				window.location.href=url;
    			}
    		}else{
    			window.location.href=url;
    		}
    	});
    });
	//高级搜索
    $(".audit_refund").click(function(){
		refund_id = $(this).attr('rel')
		var refund_content = $(this).attr('data-content')

        var html = $($('.audit_refund_html').html());
		
		
		$('.audit_content', html).html(refund_content)		
		
        $.Dialog.open('审核退款',{width:400,height:200},html);
    });
})

function audit_refund(status){
	var url = "<?php echo U('audit_refund'); ?>"
	$.post(url,{refund_id:refund_id,status:status},function(res){
		if(res.code==1){
			updateAlert(res.msg + ' 页面即将自动刷新~', 'alert-success');
			window.location.href=window.location.href;
		}else{
			updateAlert(res.msg);
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
