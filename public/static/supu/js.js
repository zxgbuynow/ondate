//显示遮罩层和弹框
function fade_out_pull(jqid){
    if(jqid){
        $('#'+jqid).show();
        $('.outside_pull').show();
    }else{
        $('.fade_out').show();
    }
	
}

//隐藏遮罩层和弹框
function fade_out_hide(){
	$('.fade_out').hide();
}


