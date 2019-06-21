<?php /*a:7:{s:56:"/data/httpd/wx/application/shop/view/goods/addorder.html";i:1559685914;s:55:"/data/httpd/wx/application/common/view/base/common.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/head.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/header.html";i:1553940778;s:53:"/data/httpd/wx/application/common/view/base/_nav.html";i:1553940778;s:55:"/data/httpd/wx/application/common/view/base/footer.html";i:1553940778;s:52:"/data/httpd/wx/application/common/view/base/var.html";i:1553940778;}*/ ?>
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
    .card .col-sm-6 {
        padding: 1em;
    }
    .param-tpl {
        margin-right: 1em;
        border-radius: 0;
        border: 0;
    }
    .param-tpl .item {
        margin-bottom: 1em;
    }
    .param-tpl .custom-radio {
        background: #f0f1f2;
        height: 40px;
        line-height: 40px;
        padding-left: 2.5em;
    }

    .data-table thead {
        background-color: #f0f1f2;
        color: #404040;
    }
    .param-content {
        border: 1px solid #f0f1f2;
        padding: 1em;
    }
    .param-content p {
        line-height: 2;
    }

</style>
<!-- 标签页导航 -->
<div class="span9 page_message">
    <section id="contents">
        <!--<?php  if(is_array($nav) && count($nav)>1) {  ?>
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
        <?php  !empty($post_url) || $post_url = U('edit?model='.$model['id'], $get_param); ?>
        <form id="form" action="<?php echo U ( 'shop/Goods/pc_order'); ?>" method="post" class="form-horizontal form-center">
            <div class="tab-content">
                <!-- 表单 -->
                <div class="card bg-light mb-3">
                    <div class="card-header">商品信息</div>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="form-group row cf">
                            <label class="col-sm-2"> <span class="need_flag">*</span> 商品名称 </label>
                            <div class="col-sm-8">
                                <input type="text" class="text input-large" name="title" readonly value="<?php echo htmlentities((isset($data['title']) && ($data['title'] !== '')?$data['title']:'')); ?>">
                                <input type="hidden"  name="goods_id" value="<?php echo htmlentities($data['goods_id']); ?>">
                                <input type="hidden"  name="category_id" value="<?php echo htmlentities($category_id); ?>">

                            </div>
                        </div>
                        <div class="form-group row cf toggle-imgs">
                            <label class="col-sm-2"> <span class="need_flag">*</span> 商品图片 </label>
                            <div class="mult_imgs col-sm-8">
                               <?php if(!(empty($data['imgs']) || (($data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator ) && $data['imgs']->isEmpty()))): if(is_array($data['imgs']) || $data['imgs'] instanceof \think\Collection || $data['imgs'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['imgs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <img width="100" height="100" src="<?php echo htmlentities(get_cover_url($vo)); ?>" />
                                        <input type="hidden" name="imgs[]" value="<?php echo htmlentities($vo); ?>" />
                                        <em>&nbsp;</em>
                                    <?php endforeach; endif; else: echo "" ;endif; ?> <?php endif; ?>
                                <!--<div class=" uploadrow2 mult" data-max="9" title="点击上传图片" rel="imgs" style="float: none">
                                    <input type="file" id="upload_picture_imgs">
                                </div>-->
                               <!-- <span class="form-text text-muted">（可以上传多个图片,拖曳改变顺序，第一张为商品封面图，建议上传500*500正方形图片）</span> --></div>
                        </div>
                        <div class="form-group row cf toggle-market_price">
                            <label class="col-sm-2"> <span class="need_flag">*</span>单价 </label>
                            <div class="col-sm-8">
                                <input type="number" class="text input-large"  readonly name="market_price" value="<?php echo htmlentities((isset($data['market_price']) && ($data['market_price'] !== '')?$data['market_price']:'0')); ?>">
                            </div>
                        </div>
                        <div class="form-group row cf">
                            <label class="col-sm-2">数量</label>
                            <div class="col-sm-8">
                                <input type="text" class="text input-large" name="num" value="1">
                              </div>
                        </div>
                    </div>
                    </p>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header">下单信息</div>
                    <div class="card-body">
                        <p class="card-text">
                        <div class="form-item-spec">
                            <div class="form-group row cf">
                                <label class="col-sm-2"> <span class="need_flag">*</span> 技师编号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="text input-large" name="jsbn" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-item-spec">
                            <div class="form-group row cf">
                                <label class="col-sm-2"> <span class="need_flag">*</span> 房间编号</label>
                                <div class="col-sm-8">
                                    <input type="text" class="text input-large" name="room" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-item-spec">
                            <div class="form-group row cf">
                                <label class="col-sm-2"> <span class="need_flag"></span> 备注</label>
                                <div class="col-sm-8">
                                    <input type="text" class="text input-large" name="remark" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>
                </div>

            </div>
<!--            <div class="card bg-light mb-3">
                <div class="card-header">商品详情</div>
                <div class="card-body"> <?php $content = isset($data['content']) ? $data['content'] : ''; ?>
                    <label class="textarea">
                        <textarea name="content" style="height:150px;"><?php echo htmlentities($content); ?></textarea>
                        <?php echo W('common/editor/adminArticleEdit', array('name'=>'content','value'=>$content)); ?> </label>
                    <span class="form-text text-muted">（当该商品设置了自定义商品详情页面时，在公众号中自定义的内容会覆盖上面编辑器的内容）</span> </div>
            </div>-->
</div>
<div id="extra_fields"></div>
<!-- flied item end -->

<div class="form-item form_bh" style="text-align:center"> <?php if(!(empty($data['id']) || (($data['id'] instanceof \think\Collection || $data['id'] instanceof \think\Paginator ) && $data['id']->isEmpty()))): ?>
    <input type="hidden" name="id" value="<?php echo htmlentities((isset($data['id']) && ($data['id'] !== '')?$data['id']:0)); ?>">
    <?php endif; ?>
    <input type="hidden" name="is_show" value="" />
    <button style="margin-right: 30px"  class="btn submit-btn" type="button" target-form="form-horizontal" onclick="do_submit(1)"><?php echo htmlentities((isset($submit_name) && ($submit_name !== '')?$submit_name:'确定下单')); ?></button>
</div>
</form>
<table style="display:none">
    <tr id="default_tr">
        <td align="center" style="width:14%;padding-left:9%;padding-right: 0"><span class="td_key">分类sort_id_cn</span></td>
        <td style="width:70%;padding-left:0;"> <?php if(!(empty($cate_data['first']) || (($cate_data['first'] instanceof \think\Collection || $cate_data['first'] instanceof \think\Paginator ) && $cate_data['first']->isEmpty()))): ?>
            <select style="margin: 6px 30px" name="cate_first[sort_id]" class='class_first' data-sort='sort_id' onchange="select_cate(this,sort_id)">


                <?php if(is_array($cate_data['first']) || $cate_data['first'] instanceof \think\Collection || $cate_data['first'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_data['first'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>


                <option value="<?php echo htmlentities($vo['id']); ?>"><?php echo htmlentities($vo['title']); ?></option>


                <?php endforeach; endif; else: echo "" ;endif; ?>


            </select>
            <?php if(is_array($cate_data['first']) || $cate_data['first'] instanceof \think\Collection || $cate_data['first'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate_data['first'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <select class='class_second_sort_id' name="cate_second[sort_id]" id="cate_second_<?php echo htmlentities($vo['id']); ?>_sort_id" data-count="<?php echo isset($cate_data['second'][$vo['id']]) && is_array($cate_data['second'][$vo['id']])?count($cate_data['second'][$vo['id']]):0; ?>" style="display:none;">


                <?php  $fid=$vo['id']; if(isset($cate_data['second'][$fid]) && $cate_data['second'][$fid]){ foreach($cate_data['second'][$fid] as $dd){ echo '


                <option value="'.$dd['id'].'">'.$dd['title'].'</option>

                '; } }  ?>


            </select>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            <input type='hidden' name="select_cate_second[sort_id]" id="select_cate_second_sort_id" value='' />
            <?php else: ?>
            <input type='hidden' name='no_cate' value='1' />
            <?php endif; ?> </td>
        <td style="width:10%"><input type="hidden" name="cate_ids[sort_id]" value="" />
            <a href="javascript:void(0);" onclick="remove_tr(this)">删除</a></td>
    </tr>
</table>
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
    function  Chinese(num) {
        var  N  =   [    "零",  "一",  "二",  "三",  "四",  "五",  "六",  "七",  "八",  "九",  "十"];
        var  str  =  num.toString();
        var  len  =  num.toString().length;
        var  C_Num  =   [];
        for (var  i  =  0;  i  <  len;  i++) {         C_Num.push(N[str.charAt(i)]);     }
        return  C_Num.join('');
    }

    function add_tr() {
        var no_cate = $("input[name='no_cate']").val();
        if (no_cate == 1) {
            if (confirm('还没有商品分类，前往添加')) {
                window.location.href = "<?php echo U ( 'Shop/Category/lists'); ?>";
                return false;
            } else {
                return false;
            }
        }
        var count = 1;

        var aTr = $('#list_data_tbody tr').length;
        if (aTr > 1) {
            var last_count = $('#list_data_tbody').find('tr').eq(-2).attr('data-sort')
            count = parseInt(last_count) + 1;
            //console.log(count);
        }
        re = new RegExp("sort_id", "g");
        str = $('#default_tr').html().replace(/sort_id_cn/g, Chinese(count)).replace(re, count);
        $('.class_second_sort_id').eq(0).show()
        //console.log(str);
        var html = '<tr class="list_tr" data-sort="' + count + '">' + str + '</tr>';
        if (count == 1)
            $('#list_data_tbody tr').before(html);
        else
            $('.list_tr:last').after(html);
    }

    function do_submit(is_show) {
        $("input[name='is_show']").val(is_show);
        var url = $("#form").attr("action");
        var data = $("#form").serialize();

        $.post(url, data, function(res) {
            if (res.code == 1) {
                updateAlert(res.msg + ' 页面即将自动跳转~', 'alert-success');
                setTimeout(function() {
                    if (res.url) {
                        location.href = res.url;
                    } else {
                        location.reload();
                    }
                }, 500);
            } else {
                updateAlert(res.msg, 'alert-error');
            }

        })
    }
    function changeCate(fid, sort_id) {
        if(sort_id=='sort_id') return false;

        var id = '#cate_second_' + fid + '_' + sort_id
        console.log(id)

        $('.class_second_' + sort_id).hide();
        $(id).show();
        var sfcid = $(id + ' option:selected').val();
        var dataCount = $(id).attr('data-count');
        if (parseInt(dataCount) <= 0) {
            $(id).hide();
        }
        $("#select_cate_second_" + sort_id).val(sfcid);
        $(id).change(function() {
            var sval = $(this).val();
            $("#select_cate_second_" + sort_id).val(sval);
        });
    }
    function remove_tr(_this) {
        $(_this).parent().parent().remove();

        var count = 0;
        $('.td_key').each(function() {
            if (count > 1) {
                count = count + 1;
                $(this).html('分类' + count);
            }
        });
    }

    function select_cate(_this, sort_id) {
        var val = $(_this).val();
        changeCate(val, sort_id);
    }

    function callbackimg(fieldName, picId, src) {
        $('#input_' + fieldName).val(picId);
        $('#cover_id_' + fieldName).attr('src', src);
    }

    function set_price(_this) {}

    function set_num(_this) {
        var num = 0;
        $('.numclass').each(function() {
            var nn = parseInt($(this).val());
            num = num + nn;
        })
        $("input[name='stock']").val(num);
    }

    $(function() {
        initUploadImg();
        $('.class_first').each(function() {
            $(this).change(function() {
                var sort_id = $(this).data('sort');
                var catefid = $(this).val();
                changeCate(catefid, sort_id);
            });
            var sort_id = $(this).data('sort');
            var catefid = $(this).val();
            changeCate(catefid, sort_id);
        });
    });
    //添加参数
    $(function addParm() {
        /*  var i = 1;
          $('#item-parm tr').each(function(){i++;});*/
        var id = -1;
        $('#addParmBtn').click(function() {
            id--
            console.log(id);
            var strhtml = '<td><input type="text" class="text" name="goods_param_title[' + id + ']" value="" style="width:120px;margin-bottom:0;"></td><td><input type="text" class="text" name="goods_param_value[' + id + ']" value="" style="width:120px;margin-bottom:0;"></td>';
            var $item = $('<tr>' + strhtml + '</tr>')
            var $aDel = $('<td><a class="border-btn" href="javascript:;" onClick="delParm(this);">删除</a></td>')
            $item.appendTo($('#item-parm'));
            $aDel.appendTo($item)
        })
    })

    function delParm(_this) {
        $(_this).parents('tr').remove();
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
