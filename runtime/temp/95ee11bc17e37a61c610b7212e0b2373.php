<?php /*a:1:{s:58:"/data/httpd/wx/application/home/view/file/system_pics.html";i:1553940778;}*/ ?>
<div class="pic_category">
	<?php if(is_array($cateList) || $cateList instanceof \think\Collection || $cateList instanceof \think\Paginator): $i = 0; $__LIST__ = $cateList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ca): $mod = ($i % 2 );++$i;?>
		<a <?php if(isset($ca['current'])&&$ca['current']): ?>class="current"<?php else: ?>onclick="switchPicCate(this,2);"<?php endif; ?> data-href="<?php echo U('home/File/system_pics',array('dir'=>$ca['dir'])); ?>"><?php echo htmlentities($ca['cate']); ?></a>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<ul class="upload_piclist">
	<?php if(is_array($picList) || $picList instanceof \think\Collection || $picList instanceof \think\Paginator): $i = 0; $__LIST__ = $picList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		<li class="upload-pre-item22" data-id="<?php echo htmlentities($vo['id']); ?>" onClick="toggleCheck(this)"><img src="<?php echo htmlentities($vo['url']); ?>" width="100" height="100"/><span class="ck-ico"></span><input type="hidden" value="<?php echo htmlentities($vo['id']); ?>"/></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>