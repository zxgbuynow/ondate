<?php /*a:1:{s:51:"/data/httpd/wx/application/home/view/user/info.html";i:1560254345;}*/ ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title>TODO supply a title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=640px,user-scalable=no,target-densitydpi=device-dpi" />
    <link href="/public/static/supu/css.css" type="text/css" rel="stylesheet"/>
    <script type="text/javascript" src='/public/static/supu/jquery-1.10.2.min.js'></script>
    <script type="text/javascript" src='/public/static/supu/js.js'></script>
    <script>
        $(function () {

            $(".list2").click(function () {
                $(".list2").removeClass("bgcolor2");
                $(this).addClass("bgcolor2");
            })

            $(".frame_no").click(function () {
                fade_out_hide();
            });

            $(".but_hujiao").click(function () {
                fade_out_pull("is_hujiao");
            });

            $(".but_chehui").click(function () {
                fade_out_pull("is_chehui");
            });

            $(".but_zhuxiao").click(function () {
                fade_out_pull("is_zhuxiao");
            });

            $(".frame_zx").click(function () {
                alert('注销成功');
                fade_out_hide()
            });
            $(".frame_hj").click(function () {
                alert('呼叫成功');
                fade_out_hide()
            });
            $(".frame_ch").click(function () {
                alert('撤回成功');
                fade_out_hide()
            });



        });
        function go_back() {
            location.href = "./time.html";
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

<div id="body" style="overflow: auto;">
    <div class="list2 bgcolor1" >
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1208号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间:2019-06-05 20:00</div>
            </div>
        </div>
    </div>
    <div class="list2 bgcolor1">
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1209号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间：2019-06-05 20:00</div>
            </div>
        </div>
    </div>
    <div class="list2 bgcolor1">
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1208号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间：2019-06-05 20:00</div>
            </div>
        </div>
    </div>
    <div class="list2 bgcolor1">
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1208号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间：2019-06-05 20:00</div>
            </div>
        </div>
    </div>
    <div class="list2 bgcolor1">
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1208号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间：2019-06-05 20:00</div>
            </div>
        </div>
    </div>
    <div class="list2 bgcolor1">
        <div class="list2_tp">
            <div class="list2_tp_picture"></div>
        </div>
        <div class="list2_body">
            <div class="list2_body_top">
                <div class="list2_body_top_label">马小跳</div>
                <div class="list2_body_top_text">1208号</div>
            </div>
            <div class="list2_body_top">
                <div class="list2_body_top_label2">856号房间</div>
                <div class="list2_body_top_text2">呼叫时间：2019-06-05 20:00</div>
            </div>
        </div>
    </div>
</div>

<!--遮罩层-->
<div class="outside_pull fade_out"></div>
<div class="frame fade_out" id="is_hujiao">
    <div class="frame_title">确认呼叫？</div>
    <div class="frame_list">
        <div class="frame_cho frame_hj" style="border-right: 2px solid #ddd">确 认</div>
        <!--<div class="frame_border">|</div>-->
        <div class="frame_cho frame_no">取 消</div>
    </div>
</div>
<div class="frame fade_out" id="is_chehui">
    <div class="frame_title">确认撤回？</div>
    <div class="frame_list">
        <div class="frame_cho frame_ch" style="border-right: 2px solid #ddd">确 认</div>
        <!--<div class="frame_border">|</div>-->
        <div class="frame_cho frame_no">取 消</div>
    </div>
</div>
<div class="frame fade_out" id="is_zhuxiao">
    <div class="frame_title">确认注销？</div>
    <div class="frame_list">
        <div class="frame_cho frame_zx" style="border-right: 2px solid #ddd">确 认</div>
        <!--<div class="frame_border">|</div>-->
        <div class="frame_cho frame_no">取 消</div>
    </div>
</div>

<div class="foot">
    <div class="foot_list but_hujiao">
        <img src="/public/static/supu/img/hujiao.png" />
    </div>
    <div class="foot_list but_chehui">
        <img src="/public/static/supu/img/chehui.png" />
    </div>
    <div class="foot_list but_zhuxiao">
        <img src="/public/static/supu/img/zhuxiao.png" />
    </div>

</div>
</body>
</html>
