<?php /*a:1:{s:58:"/data/httpd/wx/application/common/view/widget/express.html";i:1553940778;}*/ ?>
                <div class="form-group row cf toggle-express">
                    <label class="col-sm-2"><span class="need_flag">*</span>配送方式</label>
                    <div class="col-sm-8">
                        <div class="check-item">
                        <?php $key = 1; ?>
                          <input type="checkbox" class="regular-checkbox send_type" value="1" id="send_type_1" name="send_type[]"
                          <?php if(in_array(($key), is_array($data['send_type'])?$data['send_type']:explode(',',$data['send_type']))): ?>checked="checked"<?php endif; ?> >
                          <label for="send_type_1"></label>邮寄 
                         </div>
                        <div class="check-item">
                        <?php $key = 2; ?>
                          <input type="checkbox" class="regular-checkbox send_type" value="2" id="send_type_2" name="send_type[]"
                          <?php if(in_array(($key), is_array($data['send_type'])?$data['send_type']:explode(',',$data['send_type']))): ?>checked="checked"<?php endif; ?> >
                          <label for="send_type_2"></label>自提 
                         </div> 
                        <span class="form-text text-muted">至少要选择一种方式</span>
                    </div>
                    
                </div>
                <div class="form-group row cf toggle-express" style="display:none" id="express_box">
                    <label class="col-sm-2">
                        邮费 </label>
                    <div class="col-sm-8">                        
                    <?php if(empty($data['express_type']) || (($data['express_type'] instanceof \think\Collection || $data['express_type'] instanceof \think\Paginator ) && $data['express_type']->isEmpty())): ?>
                        <input type="number" class="text" name="express" value="<?php echo htmlentities((isset($data['express']) && ($data['express'] !== '')?$data['express']:'')); ?>"> 
                        <span class="form-text text-muted">为0或者空表示免邮费</span>
                        <?php else: ?>
                        <input type="number" class="text" name="express" value="0" readonly="readonly"> 
                        <span class="form-text text-muted">使用积分秒杀时不能设置邮费</span>                        
                        <?php endif; ?>
                                                
                    </div>
                    
                </div>   
<div class="form-group row cf toggle-stores" id="stores_box">
                    <label class="col-sm-2">
                        自提门店 </label>
                    <div class="col-sm-8">
                        <div class="check-item">
                        <?php $key = 0; isset($data['is_all_store']) || $data['is_all_store']=0; ?>
                          <input type="radio" class="regular-radio is_all_store" value="0" id="is_all_store_0" name="is_all_store"
                          <?php if($data['is_all_store'] == '0'): ?>checked="checked"<?php endif; ?> >
                          <label for="is_all_store_0"></label> 全部门店
                         </div>
                        <div class="check-item">
                        <?php $key = 2; ?>
                          <input type="radio" class="regular-radio is_all_store" value="1" id="is_all_store_1" name="is_all_store"
                          <?php if($data['is_all_store'] == '1'): ?>checked="checked"<?php endif; ?> >
                          <label for="is_all_store_1"></label> 指定门店
                         </div>
<div class="data-table" id="shops_item">
          	<div id='all_store_list' style="display:none">
          	<?php if(!(empty($store_data) || (($store_data instanceof \think\Collection || $store_data instanceof \think\Paginator ) && $store_data->isEmpty()))): ?>
                  		<select >
                  			<?php if(is_array($store_data) || $store_data instanceof \think\Collection || $store_data instanceof \think\Paginator): $i = 0; $__LIST__ = $store_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
                  				<option value="<?php echo htmlentities($key); ?>" ><?php echo htmlentities($ss); ?></option>
                  			<?php endforeach; endif; else: echo "" ;endif; ?>
                  		</select>
                  	<?php else: ?>
                  	<a href="<?php echo U('shop/stores/lists'); ?>" style="font-size: 12px;color:#aaa;margin-left:10px;">没还有创建门店，点击创建</a>
                  	<?php endif; ?>
          	</div>

            <table cellspacing="1" style="width:auto;">
              <tbody id="item-store">
                <?php if(!(empty($store_lists) || (($store_lists instanceof \think\Collection || $store_lists instanceof \think\Paginator ) && $store_lists->isEmpty()))): if(is_array($store_lists) || $store_lists instanceof \think\Collection || $store_lists instanceof \think\Paginator): $i = 0; $__LIST__ = $store_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): $mod = ($i % 2 );++$i;?>
                 <tr  class="item-tr">
                  <td>
                  	<?php if(!(empty($store_data) || (($store_data instanceof \think\Collection || $store_data instanceof \think\Paginator ) && $store_data->isEmpty()))): ?>
                  		<select name="goods_store_title[<?php echo htmlentities($pp['link_id']); ?>]">
                  			<?php if(is_array($store_data) || $store_data instanceof \think\Collection || $store_data instanceof \think\Paginator): $i = 0; $__LIST__ = $store_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
                  				<option value="<?php echo htmlentities($key); ?>" <?php if($key == $pp['id']): ?>selected=selected<?php endif; ?>><?php echo htmlentities($ss); ?></option>
                  			<?php endforeach; endif; else: echo "" ;endif; ?>
                  		</select>
                  	<?php else: ?>
                  	<a href="<?php echo U('shop/stores/lists'); ?>" style="font-size: 12px;color:#aaa;margin-left:10px;">没还有创建门店，点击创建</a>
                  	<?php endif; ?>
                  </td>
                  <td><a class="border-btn" href="javascript:;" onClick="delStore(this);">删除</a></td>
                    </tr>
                  <?php endforeach; endif; else: echo "" ;endif; else: ?>
                   <tr  class="item-tr">
                   <td>
                  	<?php if(!(empty($store_data) || (($store_data instanceof \think\Collection || $store_data instanceof \think\Paginator ) && $store_data->isEmpty()))): ?>
                  		<select name="goods_store_title[-1]">
                  			<?php if(is_array($store_data) || $store_data instanceof \think\Collection || $store_data instanceof \think\Paginator): $i = 0; $__LIST__ = $store_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ss): $mod = ($i % 2 );++$i;?>
                  				<option value="<?php echo htmlentities($key); ?>"><?php echo htmlentities($ss); ?></option>
                  			<?php endforeach; endif; else: echo "" ;endif; ?>
                  		</select>
                  	<?php else: ?>
                  	<a href="<?php echo U('shop/stores/lists'); ?>" style="font-size: 12px;color:#aaa;margin-left:10px;">没还有创建门店，点击创建</a>
                  	<?php endif; ?>
                  </td>
                  <td><a class="border-btn" href="javascript:;" onClick="delStore(this);">删除</a></td>                  
                   </tr>
                  <?php endif; ?>
             
              </tbody>
            </table>
            <a id="addStoreBtn" class="btn" href="javascript:;" style="margin:15px 0 0 30px;">添加所属门店</a>
          </div>
                    </div>
                    
                </div>                  
<script type="text/javascript">

$(function() {	
    $('.is_all_store').bind('click',function(){ is_all_store();	});
	is_all_store();
	
	$('.send_type').bind('click',function(){ send_type();	});
	send_type();
})
function is_all_store(){
	var val = $('input[name="is_all_store"]:checked').val();
	if(val==0){
		$('#shops_item').hide();
		$('.shops_data').each(function(index, element) {
            $(this).remove();
        });
	}else{
		$('#shops_item').show();
	}
}
function send_type(){
	$('#express_box').hide()
	$('#stores_box').hide()
	$('#shops_item').hide()
	$('.send_type').each(function(i,e) {
        if($(e).is(":checked")){
			 var val = $(e).val();
			 if(val==1){
				 $('#express_box').show()
			 }else{
				 $('#stores_box').show()
				 is_all_store()
			 }
		}
    });
}

//添加所属门店
$(function addStore() {
    var htmlstore = '';

    /*  var i = 1;
      $('#item-parm tr').each(function(){i++;});*/
    var id = -1;
    $('#addStoreBtn').click(function() {
        id--;
        htmlstore = $('#all_store_list select').html();
        if (htmlstore == undefined) {
            htmlstore = $('#all_store_list').html();
        } else {
            htmlstore = '<select name="goods_store_title[' + id + ']">' + htmlstore + '</select>';
        }

        var strhtml = '<td>' + htmlstore + '</td>';
        var $item = $('<tr>' + strhtml + '</tr>')
        var $aDel = $('<td><a class="border-btn" href="javascript:;" onClick="delStore(this);">删除</a></td>')
        $item.appendTo($('#item-store'));
        $aDel.appendTo($item)
    })
})

function delStore(_this) {
    $(_this).parents('tr').remove();
}
</script>