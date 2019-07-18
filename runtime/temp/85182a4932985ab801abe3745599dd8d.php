<?php /*a:2:{s:62:"/data/httpd/ondate/application/install/view/install/step1.html";i:1562590036;s:59:"/data/httpd/ondate/application/install/view/index/base.html";i:1562590036;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>WeiPHP 安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="/static/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="/install/css/install.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <script src="/static/jquery-1.10.2.min.js"></script>
        <script src="/static/bootstrap/js/bootstrap.js"></script>
    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
        ================================================== -->
        <div class="navbar navbar-inverse">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="nav-collapse collapse">
                    	<p class="install_logo"><span><img width="50px;" src="/install/images/install.png"/></span></p>
                    	<ul id="step" class="nav">
                    		
    <li class="done"><a href="javascript:;"><span>&nbsp;&nbsp;</span>安装协议</a></li>
    <li class="active"><a href="javascript:;"><span>2</span>环境检测</a></li>
    <li><a href="javascript:;"><span>3</span>创建数据库</a></li>
    <li><a href="javascript:;"><span>4</span><?php if(app('session')->get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?></a></li>
    <li><a href="javascript:;"><span>5</span>完成</a></li>

                    	</ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron masthead">
            <div class="container">
                
    <h1>环境检测</h1>
    <table class="table">
        <caption><h2>运行环境检查</h2></caption>
        <thead>
            <tr>
                <th>项目</th>
                <th>所需配置</th>
                <th>当前配置</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($env) || $env instanceof \think\Collection || $env instanceof \think\Paginator): $i = 0; $__LIST__ = $env;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($item[0]); ?></td>
                    <td><?php echo htmlentities($item[1]); ?></td>
                    <td><i class="ico-<?php echo htmlentities($item[4]); ?>">&nbsp;</i><?php echo htmlentities($item[3]); ?></td>       
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <table class="table">
        <caption><h2>依赖性</h2></caption>
        <thead>
            <tr>
                <th>名称</th>
				<th>类型</th>
                <th>检查结果</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($func) || $func instanceof \think\Collection || $func instanceof \think\Paginator): $i = 0; $__LIST__ = $func;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($item[0]); ?></td>
					<td><?php echo htmlentities($item[3]); ?></td>
                    <td><i class="ico-<?php echo htmlentities($item[2]); ?>">&nbsp;</i><?php echo htmlentities($item[1]); ?></td>
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
	<?php if(isset($dirfile)): ?>
    <table class="table">
        <caption><h2>目录、文件权限检查</h2></caption>
        <thead>
            <tr>
                <th>目录/文件</th>
                <th>所需状态</th>
                <th>当前状态</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($dirfile) || $dirfile instanceof \think\Collection || $dirfile instanceof \think\Paginator): $i = 0; $__LIST__ = $dirfile;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><?php echo htmlentities($item[3]); ?></td>
                    <td><i class="ico-success">&nbsp;</i>可写</td>
                    <td><i class="ico-<?php echo htmlentities($item[2]); ?>">&nbsp;</i><?php echo htmlentities($item[1]); ?></td>   
                </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
	<?php endif; ?>


            </div>
        </div>


        <!-- Footer
        ================================================== -->
        <footer class="footer">
            <div class="container">
                <div>
                	
    <a class="btn btn-success btn-large" href="<?php echo U('Index/index'); ?>">上一步</a>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <a class="btn btn-primary btn-large" href="<?php echo U('Install/step2'); ?>">下一步</a>

                </div>
            </div>
        </footer>
    </body>
</html>
