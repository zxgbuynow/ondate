<?php /*a:1:{s:53:"/data/httpd/wx/application/home/view/user/submit.html";i:1560254129;}*/ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>提交</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640px,user-scalable=no,target-densitydpi=device-dpi" />
    <link href="/public/static/supu/css.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src='/public/static/supu/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src='/public/static/supu/js.js'></script>
    <script>
        $(function () {
            $(".submit").click(function () {
                fade_out_pull();
            });

            $(".frame_no").click(function(){
                fade_out_hide();
            });
            $(".frame_yes").click(function(){
                location.href = "<?php echo U('start'); ?>";
            });

        });

    </script>
</head>
<body>
<div id="head">
    <div class="goback"></div>
    <div class="head_body">
        <div class="picture"></div>
        <div class="head_text">马小跳</div>
    </div>
</div>

<div id="body">
    <div class="list1" style="margin-top: 100px;">
        <div class="label">房间号</div>
        <div class="list_text">
            <input style="background: none" type="text" name="text1" size="12" maxlength="20">
        </div>
    </div>

    <div class="list1">
        <div class="label">人 数</div>
        <div class="list_text">
            <input style="background: none" type="text" name="text2" size="12" maxlength="20">
        </div>
    </div>

    <div class="list1">
        <div class="label">技师号</div>
        <div class="list_text">
            <input style="background: none" type="text" name="text3" size="12" maxlength="20">
        </div>
    </div>

    <div class="list1" style="border-bottom: 1px solid #333;">
        <div class="label">性 别</div>
        <div class="list_text">
            <div class="choose_radio">
                <input class="radio" name="sex" type="radio" value="1"/><label>男</label>
            </div>
            <div class="choose_radio">
                <input class="radio" name="sex" type="radio" value="0"  /><label>女</label>
            </div>
        </div>
    </div>
</div>

<!--遮罩层-->
<div class="outside_pull fade_out"></div>
<div class="frame fade_out">
    <div class="frame_title">确认提交？</div>
    <div class="frame_list">
        <div class="frame_cho frame_yes" style="border-right: 2px solid #ddd">确 认</div>
        <!--<div class="frame_border">|</div>-->
        <div class="frame_cho frame_no">取 消</div>
    </div>
</div>

<div class="submit">
    <img src="/public/static/supu/img/tijiao.png" />
</div>
</body>
</html>
