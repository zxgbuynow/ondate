<?php /*a:1:{s:51:"/data/httpd/wx/application/home/view/user/time.html";i:1560254227;}*/ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>倒计时</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640px,user-scalable=no,target-densitydpi=device-dpi" />
    <link href="/public/static/supu/css.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src='/public/static/supu/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src='/public/static/supu/js.js'></script>
    <script>
        $(function () {
            var second = '4000';//4000秒
            blogtime(second);

            function blogtime(cha) {
                //一天=24小时 一小时=60分钟 一分钟=60秒 一秒=1000毫秒
                var xs = parseInt(cha / (60 * 60) % 24);
                var fz = parseInt(cha / 60 % 60);
                var miao = parseInt(cha % 60);

                if (parseInt(xs) < 10) {
                    var xs = '0' + parseInt(xs);
                } else {
                    var xs = parseInt(xs);
                }
                if (parseInt(fz) < 10) {
                    var fz = '0' + parseInt(fz);
                } else {
                    var fz = parseInt(fz);
                }
                if (parseInt(miao) < 10) {
                    var miao = '0' + parseInt(miao);
                } else {
                    var miao = parseInt(miao);
                }
                var time = xs + ':' + fz + ':' + miao;
                $("#data").text(time);
//                document.getElementById('blog_data').innerHTML=xs + ':' + fz + ':' + miao;
                cha = cha - 1;
                setTimeout(function () {
                    blogtime(cha);
                }, 1000);
            }

            $(".submit").click(function () {
                fade_out_pull();
            });

            $(".frame_no").click(function () {
                fade_out_hide();
            });
            $(".frame_yes").click(function () {
                location.href = "<?php echo U('info'); ?>";
            });


        });


        function go_back() {
            location.href = "/public/static/supu/start.html";
        }



    </script>
</head>
<body>
<div id="head">
    <div class="goback" onclick="go_back()"><img src="/public/static/supu/img/fanhui.png"></div>
    <div class="head_body">
        <div class="picture"></div>
        <div class="head_text">马小跳</div>
    </div>
</div>
<div id="body">
    <div class="body_head">998号房</div>
    <div class="body_head">马小跳跳跳跳</div>
    <div id="data" class="body_time">112221</div>
</div>

<!--遮罩层-->
<div class="outside_pull fade_out"></div>
<div class="frame fade_out">
    <div class="frame_title">确认结束？</div>
    <div class="frame_list">
        <div class="frame_cho frame_yes" style="border-right: 2px solid #ddd">确 认</div>
        <!--<div class="frame_border">|</div>-->
        <div class="frame_cho frame_no">取 消</div>
    </div>
</div>

<div class="submit">
    <img src="/public/static/supu/img/jieshu.png" />
</div>
</body>
</html>
