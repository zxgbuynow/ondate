<?php /*a:1:{s:65:"/data/httpd/wx/application/common/view/widget/dynamic_select.html";i:1553940778;}*/ ?>
<div id="dynamic_select_<?php echo htmlentities($name); ?>"></div>
<select name="<?php echo htmlentities($name); ?>">
	<option value="0" class="toggle-data" toggle-data="<?php echo htmlentities($first_option); ?>"><?php echo htmlentities($first_option); ?></option>
	<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
	<option value="<?php echo htmlentities($key); ?>" class="toggle-data"
		toggle-data="<?php echo htmlentities(get_hide_attr($vo)); ?>"
		<?php if($default_value == $key): ?>selected<?php endif; ?>
		><?php echo htmlentities(clean_hide_attr($vo)); ?>
	</option>
	<?php endforeach; endif; else: echo "" ;endif; ?>
</select>