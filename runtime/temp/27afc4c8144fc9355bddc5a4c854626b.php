<?php /*a:6:{s:54:"/data/httpd/wx/application/shop/view/order/detail.html";i:1559485277;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
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
      
        <style>
            .f_i{
                margin-bottom: 10px;
            }
            .f_i label{
                margin-right: 1rem;
            }
            .alert-primary {
              color: #666;
              background-color: #f7f7f7;
              border-color: #f7f7f7;
            }
            .alert.alert-primary p {
              border-bottom: 1px dashed #eee;
              padding: 10px 0;
            }
            .alert.alert-primary a {
              margin: 10px 0;
            }
        </style>
<div class="span9 page_message">
  <section id="contents">
    <div class="event-order"> 
<div class="data-table pt-4 mb-4">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead style="background-color:transparent">
              <tr>
    
                <th>订单号</th>
                <th>下单时间</th>
          <!--      <th>配送方式</th>
                <th>配送时间</th>-->
                <th>支付方式</th>
                <th>支付单号</th>
              </tr>
            </thead>
            <!-- 列表 -->
            <tbody>
            

            <tr>
  
              <td><?php echo htmlentities($info['order_number']); ?></td>
              <td><?php echo htmlentities(time_format($info['cTime'])); ?></td>
            <!--  <td><?php if($info['send_type'] == '2'): ?>自提<?php else: ?>邮寄<?php endif; ?></td>
              <td><?php echo htmlentities(time_format($info['send_time'])); ?></td>-->
              <?php if(empty($info['pay_status']) || (($info['pay_status'] instanceof \think\Collection || $info['pay_status'] instanceof \think\Paginator ) && $info['pay_status']->isEmpty())): ?>
              <td>未支付</td>
              <td> - </td>
              <?php else: ?>
              <td><?php echo htmlentities($info['common']); ?></td>
              <td><?php echo htmlentities($info['out_trade_no']); ?></td>              
              <?php endif; ?>
            </tr>

              </tbody>
            
          </table>
        </div>
      </div>    
      <!-- 商品信息 -->
      <div class="data-table pt-4 mb-4">
        <div class="table-striped">
          <table cellspacing="1">
            <!-- 表头 -->
            <thead style="background-color:transparent">
              <tr>
                <th></th>
                <th>商品名称</th>
                 <!-- <th>主石重量</th>
                  <th>证书号</th>
                   <th>模号</th>
                    <th>条码号</th>
                     <th>金重</th> -->
                <th>数量</th>
                <th>单价</th>
          <!--      <th><?php echo htmlentities($sale_price_title); ?></th>-->
                <th>小计</th>
              </tr>
            </thead>
            <!-- 列表 -->
            <tbody>
            
            <?php if(is_array($info['goods']) || $info['goods'] instanceof \think\Collection || $info['goods'] instanceof \think\Paginator): $i = 0; $__LIST__ = $info['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?>
            <tr>
              <td class="max-w-sm"><img src="<?php echo htmlentities($goods['cover']); ?>"></td>
              <td><?php echo htmlentities($goods['title']); ?></td>
              <td><?php echo htmlentities($goods['num']); ?></td>
              <td><?php echo htmlentities($goods['market_price']); ?></td>
     <!--         <td><?php echo htmlentities($goods['sale_price']); ?></td>-->
              <td> <span class="red_text_bg" style="font-size: large;" ><?php echo wp_money_format($goods['num']*$goods['sale_price']); ?></span></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
              </tbody>
            
          </table>
        </div>
      </div>
      
      <!-- 其它信息 -->
      <div class="container-fliud px-4">
        <div class="row"> 
          <!-- 收货信息 -->
          <div class="col-sm-6">
            <div class="card" style="">
              <div class="card-header">技师信息：</div>
              <div class="card-body">
                <p class="card-text">
                <ul>
                 <!-- <li>收货：<?php if(!(empty($addressInfo['truename']) || (($addressInfo['truename'] instanceof \think\Collection || $addressInfo['truename'] instanceof \think\Paginator ) && $addressInfo['truename']->isEmpty()))): ?><?php echo htmlentities($addressInfo['truename']); ?><?php endif; ?></li>-->
                  <li>联系方式：<?php if(!(empty($addressInfo['mobile']) || (($addressInfo['mobile'] instanceof \think\Collection || $addressInfo['mobile'] instanceof \think\Paginator ) && $addressInfo['mobile']->isEmpty()))): ?><?php echo htmlentities($addressInfo['mobile']); ?><?php endif; ?></li>
<!--                  <li>收货地址：<?php if(!(empty($addressInfo['address']) || (($addressInfo['address'] instanceof \think\Collection || $addressInfo['address'] instanceof \think\Paginator ) && $addressInfo['address']->isEmpty()))): ?><?php echo htmlentities($addressInfo['address']); ?><?php endif; if(!(empty($addressInfo['address_detail']) || (($addressInfo['address_detail'] instanceof \think\Collection || $addressInfo['address_detail'] instanceof \think\Paginator ) && $addressInfo['address_detail']->isEmpty()))): ?><?php echo htmlentities($addressInfo['address_detail']); ?><?php endif; ?></li>-->
                  <li>订单备注：<?php if(empty($info['remark']) || (($info['remark'] instanceof \think\Collection || $info['remark'] instanceof \think\Paginator ) && $info['remark']->isEmpty())): ?>无<?php else: ?><?php echo htmlentities($info['remark']); ?><?php endif; ?></li>
                </ul>
                </p>
              </div>
            </div>
          </div>
          <!-- 付款信息 -->
          <div class="col-sm-6">
            <div class="card" style="">
              <div class="card-header">付款信息：</div>
              <div class="card-body">
                <p class="card-text">
                <ul>
                  <li>商品总价：<?php echo htmlentities($info['total_price']); ?></li>
                  <?php if($info['send_type'] == '1'): ?>
                  <li>邮费：<?php echo htmlentities($info['mail_money']); ?></li>
                  <?php endif; ?>
                  <li>优惠抵扣：<?php echo htmlentities($info['dec_money']); ?></li>
                  <li>优惠后金额：<?php echo htmlentities($info['total_price']-$info['dec_money']); ?></li>
                  <li>实际支付：<?php echo htmlentities($info['pay_money']); ?></li>
                </ul>
                </p>
              </div>
            </div>
          </div>
        </div>
        <?php if($info['refund']>0): ?>
        <div class="card-body mr-4" style="color:#000">退款状态：<?php echo htmlentities($info['refund_title']); ?></div>
        <div class="card-body mr-4" style="color:#000">退款理由：<?php echo htmlentities($info['refund_content']); ?></div>        
        <?php elseif($info['pay_status']==0): ?>
        <div class="card-body mr-4" style="color:#000">等待买家支付</div>
        <?php else: ?>
        <div class="card mt-3 wuliu">
          <div class="card-header">物流信息：</div>
          <div class="card-body">
            <p class="card-text"> <?php if($info['send_type'] == '2'): ?>
            <div class="alert alert-primary" role="alert">
              <p class="mr-4">收货方式：自提</p>
              <p>自提门店：<?php echo htmlentities($store_info['name']); ?></p>
              <p>门店地址：<?php echo htmlentities($store_info['address']); ?></p>
              <p>门店电话：<?php echo htmlentities($store_info['phone']); ?></p>
              <?php if($info['is_send'] == '0'): ?> <a href="<?php echo U('has_ziti',['id'=>$info['id']]); ?>" class="btn ajax-get">确认已自提</a> <?php endif; ?> </div>
            <?php else: if($info['is_send']==0): ?>
            <div class="card-body mr-4">等待卖家发货</div>
            <form id="sendDiv" action="<?php echo U('do_send'); ?>" method="post">
              <div class="tab_content" id="tab1_content">
                <div class="f_i">
                  <label>物流公司</label>
                  <select name="send_code" style="height:40px;width:206px;">
                    <option>请选择物流公司</option>
                    <option value="sf">顺丰</option>
                    <option value="sto">申通</option>
                    <option value="yt">圆通</option>
                    <option value="yd">韵达</option>
                    <option value="tt">天天</option>
                    <option value="ems">EMS</option>
                    <option value="zto">中通</option>
                    <option value="ht">汇通</option>
                    <option value="qf">全峰</option>
                  </select>
                </div>
                <div class="f_i" >
                  <label>快递单号</label>
                  <input type="text" name="send_number" />
                </div>
                <input type="hidden" name="order_id" value="<?php echo htmlentities($info['id']); ?>" />
                <button style="margin-left: 75px" class="btn submit-btn1" type="button" id='check_do_send'>发 货</button>
              </div>
            </form>
            <?php else: ?>
            <div class="alert alert-primary" role="alert">
              <p class="text-primary mr-4">收货方式：邮寄</p>
              <p class="text-primary mr-4">物流公司：<?php echo htmlentities($info['send_code_name']); ?></p>
              <p>快递单号：<?php echo htmlentities($info['send_number']); ?></p>
            </div>
            <?php if(!empty($log_msg)): ?>
            <div class="card-body mr-4">物流信息获取失败：<?php echo htmlentities($log_msg); ?></div>
            <?php else: ?>
            <ul class="border p-2 px-4" style="background: #f7f7f7;">
              <?php if(is_array($log_list) || $log_list instanceof \think\Collection || $log_list instanceof \think\Paginator): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($i % 2 );++$i;?>
              <li class=""> <span class="mr-2 text-secondary"> <?php echo htmlentities($log['datetime']); ?> </span> <span> 【<?php echo htmlentities($log['zone']); ?>】 <?php echo htmlentities($log['remark']); ?> </span> </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?><?php endif; ?><?php endif; ?>
            </p>
          </div>
        </div>
        <?php endif; ?> </div>
    </div>
  </section>
</div>
<script type="text/javascript">
$(function(){
	$('#check_do_send').click(function(){
		var state= "<?php echo htmlentities($info['order_state']); ?>";
		if(state != 1){
			if(confirm('该订单状态有异常，是否继续？')){
				$("#sendDiv").submit();
			}
		}else{
			$("#sendDiv").submit();
		}
	})
})
</script> 



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
