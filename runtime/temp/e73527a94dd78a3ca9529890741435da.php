<?php /*a:1:{s:58:"/data/httpd/wx/application/common/view/widget/cascade.html";i:1553940778;}*/ ?>
<div id="cascade_<?php echo htmlentities($name); ?>"></div>
<input type="hidden" name="<?php echo htmlentities($name); ?>" id="data_<?php echo htmlentities($name); ?>" value="<?php echo htmlentities($value); ?>" />
<script type="text/javascript" src="/public/static/json2select.js" ></script>
<script>
$("#cascade_<?php echo htmlentities($name); ?>").json2select(<?php echo $json; ?>,[<?php echo $default_value; ?>],'<?php echo htmlentities($name); ?>');
</script>