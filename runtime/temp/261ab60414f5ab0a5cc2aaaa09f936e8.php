<?php /*a:2:{s:52:"/data/httpd/wx/application/home/view/index/copy.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;}*/ ?>
<!doctype html>
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


    <style>
        html,body {
            background: #fff;
        }
        .reg_box {
            width: 100%;
            padding: 15px;
            margin: 0;
        }
        .reg_box .alert {
            padding-left: 10px;

        }
        table {width: 100%}
        table tr {height: 45px;}
        table thead tr {background: #f9f9f9}
        table tbody td {border-bottom: 1px solid #ececec;}
        table th,table td {padding-left: 10px}
    </style>
</head>
<body>
<!-- 头部 -->
<!-- 提示 -->
<div id="top-alert" class="top-alert-tips alert-error" style="display: none;">
    <a class="close" href="javascript:;"><b class="fa fa-times-circle"></b></a>
    <div class="alert-content">这是内容</div>
</div>
<section class="reg_box small_wrap">
    <div class="alert">请正确复制相应的公众号的地址，复制错会导致系统无法获取用户信息</div>

    <table>
        <thead>
        <tr>
            <th>公众号</th>
            <th>地址</th>
            <th>复制</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td><?php echo htmlentities($vo['public_name']); ?></td>
            <td><?php echo htmlentities($vo['url']); ?></td>
            <td><a class="list_copy_public_link" id="copyPublicLink_<?php echo htmlentities($vo['id']); ?>"   data-clipboard-text="<?php echo htmlentities($vo['url']); ?>">复制地址</a></td>
        </tr>

        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    
</section>
</body>
</html>
