<?php /*a:23:{s:56:"/data/httpd/ondate/application/shop/view/wap/center.html";i:1562590036;s:61:"/data/httpd/ondate/application/shop/view/wap/common_file.html";i:1562590036;s:69:"/data/httpd/ondate/application/shop/view/diy_template/allDisplay.html";i:1562590036;s:65:"/data/httpd/ondate/application/shop/view/diy_template/header.html";i:1562590036;s:67:"/data/httpd/ondate/application/shop/view/diy_template/richtext.html";i:1562590036;s:64:"/data/httpd/ondate/application/shop/view/diy_template/goods.html";i:1562590036;s:72:"/data/httpd/ondate/application/shop/view/diy_template/mutipic_goods.html";i:1562590036;s:65:"/data/httpd/ondate/application/shop/view/diy_template/banner.html";i:1562590036;s:73:"/data/httpd/ondate/application/shop/view/diy_template/mutipic_banner.html";i:1562590036;s:66:"/data/httpd/ondate/application/shop/view/diy_template/piclist.html";i:1562590036;s:64:"/data/httpd/ondate/application/shop/view/diy_template/blank.html";i:1562590036;s:64:"/data/httpd/ondate/application/shop/view/diy_template/title.html";i:1562590036;s:66:"/data/httpd/ondate/application/shop/view/diy_template/textnav.html";i:1562590036;s:65:"/data/httpd/ondate/application/shop/view/diy_template/picnav.html";i:1562590036;s:70:"/data/httpd/ondate/application/shop/view/diy_template/searchgoods.html";i:1562590036;s:68:"/data/httpd/ondate/application/shop/view/diy_template/blankline.html";i:1562590036;s:63:"/data/httpd/ondate/application/shop/view/diy_template/case.html";i:1562590036;s:64:"/data/httpd/ondate/application/shop/view/diy_template/case2.html";i:1562590036;s:65:"/data/httpd/ondate/application/shop/view/diy_template/notice.html";i:1562590036;s:69:"/data/httpd/ondate/application/shop/view/diy_template/usercenter.html";i:1562590036;s:70:"/data/httpd/ondate/application/shop/view/diy_template/goodsdetail.html";i:1562590036;s:70:"/data/httpd/ondate/application/shop/view/diy_template/fixedmodule.html";i:1562590036;s:57:"/data/httpd/ondate/application/shop/view/wap/_footer.html";i:1562590036;}*/ ?>
 <!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        

        <script src="/static/default/lib/flexible/flexible.min.js"></script>
<!-- 
        <link rel="stylesheet" href="/static/default/lib/jquery-weui/weui.min.css">
        <link rel="stylesheet" href="/static/default/lib/jquery-weui/jquery-weui.min.css">
        <link rel="stylesheet" href="/static/default/lib/swiper/swiper-4.3.3.min.css">
        <link rel="stylesheet" href="/static/default/lib/animate.css">
        <link rel="stylesheet" href="/static/default/css/iconfont.css"> -->
        <link rel="stylesheet" href="/static/default/dist/main.css">
        <link href="/static/diy_page.css?v=<?php echo SITE_VERSION; ?>" rel="stylesheet" type="text/css">

        <title><?php echo htmlentities($page_title); ?></title>
    <script type="text/javascript">
		//静态变量
		var SITE_URL = "<?php echo SITE_URL; ?>";
		var CARD_URL = "<?php echo U('card/wap/member_center'); ?>";
		var IMG_PATH = "/shop/images";
		var STATIC_PATH = "/static";
		var WX_APPID = '<?php if(!(empty($jsapiParams['appId']) || (($jsapiParams['appId'] instanceof \think\Collection || $jsapiParams['appId'] instanceof \think\Paginator ) && $jsapiParams['appId']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['appId']); ?><?php endif; ?>';
		var	WXJS_TIMESTAMP='<?php if(!(empty($jsapiParams['timestamp']) || (($jsapiParams['timestamp'] instanceof \think\Collection || $jsapiParams['timestamp'] instanceof \think\Paginator ) && $jsapiParams['timestamp']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['timestamp']); ?><?php endif; ?>'; 
		var NONCESTR= '<?php if(!(empty($jsapiParams['nonceStr']) || (($jsapiParams['nonceStr'] instanceof \think\Collection || $jsapiParams['nonceStr'] instanceof \think\Paginator ) && $jsapiParams['nonceStr']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['nonceStr']); ?><?php endif; ?>'; 
		var SIGNATURE= '<?php if(!(empty($jsapiParams['signature']) || (($jsapiParams['signature'] instanceof \think\Collection || $jsapiParams['signature'] instanceof \think\Paginator ) && $jsapiParams['signature']->isEmpty()))): ?><?php echo htmlentities($jsapiParams['signature']); ?><?php endif; ?>'; 
	</script>        
        
    <script src="/static/default/lib/jquery-3.3.1.min.js"></script>
    <script src="/static/default/lib/swiper/swiper-4.3.3.min.js"></script>  
    
    <script src="/static/default/lib/jweixin-1.0.0.js"></script>   
    <script src="/static/base/js/dialog.js"></script>
    <script src="/static/flipsnap.min.js"></script>
    <script src="/static/mobile_module.js"></script>     

    
    <script src="/static/angular.min.js"></script>
    <script src="/static/shop.js?v=<?php echo SITE_VERSION; ?>"></script>
    <script src="/static/default/lib/weui/weui.min.js"></script>
    <script src="/static/default/lib/jquery-weui/jquery-weui.min.js"></script>
    
    
    

    </head>

<body ng-controller="commonCtrl">
    
    
    <body class="my-center">
          <div class="wrap">
             <!-- 头部区域 -->
             <div class="my-center-head flex">
               <div class="my-center-head-img">
                 <img src="<?php echo htmlentities($myinfo['headimgurl']); ?>">
               </div>
               <p><?php echo htmlentities($myinfo['nickname']); ?></p>
             </div>

             <!-- 四个 -->
             <div class="u-border-b">
                <div class="weui-grids flex center-icon-lg">
                    <a href="<?php echo U('my_order?type=2'); ?>" class="weui-grid">
                          <div class="weui-grid__icon icon-center-lg1">
                              
                          </div>
                          <p class="weui-grid__label">待付款</p>
                      </a>
                      <a href="<?php echo U('my_order?type=3'); ?>" class="weui-grid">
                          <div class="weui-grid__icon icon-center-lg2">
                              
                          </div>
                          <p class="weui-grid__label">待收货</p>
                      </a>
                      <a href="<?php echo U('my_order?type=4'); ?>" class="weui-grid">
                          <div class="weui-grid__icon icon-center-lg3">
                              
                          </div>
                          <p class="weui-grid__label">待评价</p>
                      </a>
                      <a href="<?php echo U('my_order'); ?>" class="weui-grid">
                          <div class="weui-grid__icon icon-center-lg4">
                              
                          </div>
                          <p class="weui-grid__label">全部订单</p>
                      </a>
                  </div>
             </div>
             
             
             


             <!-- 八个 -->
             <div class="weui-grids center-icon-md">
                     <a href="<?php echo U('coupon/wap/personal'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md1">
                            
                         </div>
                         <p class="weui-grid__label">优惠劵</p>
                     </a>
                     <a href="<?php echo U('card/wap/member_center'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md2">
                            
                         </div>
                         <p class="weui-grid__label">会员卡</p>
                     </a>
                     <a href="<?php echo U('my_collect'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md3">
                            
                         </div>
                         <p class="weui-grid__label">我的收藏</p>
                     </a>
                     <a href="<?php echo U('my_track'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md4">
                            
                         </div>
                         <p class="weui-grid__label">我的足迹</p>
                     </a>
                     <a href="<?php echo U('add_address?is_choose=0'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md5">
                            
                         </div>
                         <p class="weui-grid__label">我的地址</p>
                     </a>
                     <a href="<?php echo U('my_comment'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md6">
                            
                         </div>
                         <p class="weui-grid__label">我的评价</p>
                     </a>
                     <a href="<?php echo U('service'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md7">
                            
                         </div>
                         <p class="weui-grid__label">联系客服</p>
                     </a>

                     <a href="<?php echo U('collage/wap/my_collage'); ?>" class="weui-grid">
                         <div class="weui-grid__icon icon-center-md8">
                            
                         </div>
                         <p class="weui-grid__label">我的拼团</p>
                     </a>
                 </div>
            <script type="text/ng-template" id="widget-header-display.html">
	<div class="titlebar">{{module.params.title}}</div>
</script>
<script type="text/ng-template" id="widget-richtext-display.html">
	<div class="diy_richtext" ng-style="{'background-color':module.params.bgColor,'color':module.params.color,'font-size':module.params.fontsize+'px','text-align':module.params.align}" ng-bind-html="module.params.content|to_trusted"></div>
</script>
<script type="text/ng-template" id="widget-goods-display.html">
	<div class="goods_list"  ng-switch="module.params.list_style">
<ul class="big_list" ng-switch-when="1">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
        	<p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
        </a>
    </li>
</ul>
<ul class="small_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}" class="goods_img">
        	<img ng-if="m.img" src="{{m.img}}"/>
        </a>
        <a  href="{{m.url}}" class="info">
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <p class="btn_p" ng-show="module.params.show_btn"><span class="btn">立即购买</span></p>
        </a>
    </li>
</ul>
<ul class="list_1_2" ng-switch-when="3">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
            <div class="info">
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <p class="btn_p" ng-show="module.params.show_btn"><span class="btn">立即购买</span></p>
            </div>
    	</a>
    </li>
</ul>
<ul class="common_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.goods_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.img" src="{{m.img}}"/>
            <p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
    	</a>
    </li>
</ul>
</div>
</script>
<script type="text/ng-template" id="widget-mutipic_goods-display.html">
  
<section class="mutipic_goods" data-colGoods="{{module.params.colGoods}}" id="mutipic_goods{{module.index}}" ng-show="module.params.goods_list.length">
<ul>
    <li ng-repeat="m in module.params.goods_list track by $index" on-finish-render-filters>
    	<a href="{{m.url}}">
        	<div class="goods-img"><img ng-if="m.img" src="{{m.img}}"/></div>
        	<p class="title">{{m.title}}</p>
            <p class="price" ng-show="module.params.show_price">¥{{m.market_price}}</p>
            <span class="btn" ng-show="module.params.show_btn">立即购买</span>
        </a>
    </li>
</ul>
    <span class="mutipic_banner_identify" style="left:auto;top:0;right:0;">
        <span  class="pointer">
        </span>       
    </span>
</section>

</script>
<script type="text/ng-template" id="widget-banner-display.html">
	<div class="default_div" ng-show="!module.params.banner_list.length">请幻灯片图片</div>
<section class="banner" ng-show="module.params.banner_list.length" id="banner{{module.index}}">
    <ul>
    	<li ng-repeat="b in module.params.banner_list" on-finish-render-filters>
            <div class="upload-img-box">
                <a href="{{b.url}}"><img src="{{b.pic}}"/></a>
            </div>
            <span ng-show="module.params.show_title" class="title">{{b.title}}</span>
        </li>
    </ul>
    <span class="identify">
        <span ng-show="module.params.show_cursor" class="pointer">
			<em ng-repeat="b in module.params.banner_list"></em>
        </span>       
    </span>
</section>
</script>
<script type="text/ng-template" id="widget-mutipic_banner-display.html">
	<div class="default_div" ng-show="!module.params.banner_list.length">请幻灯片图片</div>
<section class="mutipic_banner" data-col="{{module.params.col}}" id="mutipic_banner_{{module.index}}" ng-show="module.params.banner_list.length">
    <ul>
    	<li ng-repeat="b in module.params.banner_list track by $index" on-finish-render-filters>
            <a href="{{b.url}}"><img src="{{b.pic}}"/></a>
            <span ng-show="module.params.show_title" class="title">{{b.title}}</span>
        </li>
    </ul>
    <span class="mutipic_banner_identify">
        <span ng-show="module.params.show_cursor" class="pointer">
        </span>       
    </span>

    

</section>
</script>
<script type="text/ng-template" id="widget-piclist-display.html">
	<div class="pic_list"  ng-switch="module.params.list_style">
<div class="default_div" ng-show="!module.params.pic_list.length">请添加图片</div>
<ul class="one_colum_list" ng-switch-when="1">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
        	<p class="title" ng-show="module.params.show_title">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="two_colum_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="three_colum_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="four_colum_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
</script>
<script type="text/ng-template" id="widget-blank-display.html">
	<div class="blank_div" ng-style="{'height':module.params.height}"></div>
  </script>
 <script type="text/ng-template" id="widget-title-display.html">
	<div class="diy_title" ng-style="{'background-color':module.params.bgColor}">
	<p class="title" ng-style="{'color':module.params.maincolor,'text-align':module.params.align}">{{module.params.title}}</p>
    <p class="subtitle" ng-style="{'color':module.params.subcolor,'text-align':module.params.align}">{{module.params.subtitle}}</p>
</div>
  </script>
  <script type="text/ng-template" id="widget-textnav-display.html">
	<div class="text_nav_list" ng-switch="module.params.text_nav_style">
<div class="default_div" ng-show="!module.params.text_nav_list.length">请添加导航</div>
<ul ng-switch-when="1">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
            <em></em>
        </a>
    </li>
</ul>
<ul class="two_text_nav_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="three_text_nav_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
<ul class="four_text_nav_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.text_nav_list">
    	<a href="{{m.url}}" ng-style="{'background-color':module.params.bgColor}">
        	<p class="title" ng-style="{'color':module.params.color}">{{m.title}}</p>
        </a>
    </li>
</ul>
</div>
  </script>
   <script type="text/ng-template" id="widget-picnav-display.html">
	<div class="pic_nav_list"  ng-switch="module.params.nav_style">
<div class="default_div" ng-show="!module.params.pic_nav_list.length">请添加导航</div>
<ul class="two_nav_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="three_nav_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="four_nav_list" ng-switch-when="4">
    <li ng-repeat="m in module.params.pic_nav_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
  </script>
  <script type="text/ng-template" id="widget-searchgoods-display.html">
	<div class="diy_search_goods">
	<form action="<?php echo U ( 'Shop/Wap/lists'); ?>" target="_blank" method="post">
        <input type="text" name="search_key" value="" placeholder="请输入关键词搜索商品"/>
        <button type="sbumit"></button>
    </form>
</div>
  </script>
  <script type="text/ng-template" id="widget-blankline-display.html">
	<div class="blank_line_div" ng-style="{'border-color':module.params.borderColor,'border-style':module.params.borderStyle,'border-bottom-width':module.params.borderWidth+'px'}"></div>
  </script>
  <script type="text/ng-template" id="widget-case-display.html">
	<div class="case_box">
<p class="case_title">{{module.params.title}}</p>
<div  ng-switch="module.params.style">
<ul class="case_default_list" ng-switch-when="2">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
<ul class="case_three_list" ng-switch-when="3">
    <li ng-repeat="m in module.params.pic_list">
    	<a href="{{m.url}}">
        	<img ng-if="m.pic" src="{{m.pic}}"/>
            <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
    	</a>
    </li>
</ul>
</div>
<p class="case_content_title">{{module.params.contentTitle}}</p>
<div class="case_content">{{module.params.content}}</div>
</div>
  </script>
  <script type="text/ng-template" id="widget-case2-display.html">
  <div class="case_box2">
<p class="case_title">{{module.params.title}}</p>
<div  ng-switch="module.params.style">
    <div  ng-switch-when="2">
        <div  ng-switch="module.params.position">
            <ul class="case_default_list2" ng-switch-when="1">
                <li ng-repeat="m in module.params.pic_list">
                	<a href="{{m.url}}">
                    	<img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                	</a>
                </li>
            </ul>
            <ul class="case_default_list2" ng-switch-when="2">
                <li ng-repeat="m in module.params.pic_list" style="float: right">
                    <a href="{{m.url}}">
                        <img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div  ng-switch-when="3">
        <div  ng-switch="module.params.position">
            <ul class="case_three_list2" ng-switch-when="1">
                <li ng-repeat="m in module.params.pic_list_3">
                	<a href="{{m.url}}">
                    	<img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                	</a>
                </li>
            </ul>
            <ul class="case_three_list2" ng-switch-when="2">
                <li ng-repeat="m in module.params.pic_list_3" style="float:right">
                    <a href="{{m.url}}">
                        <img ng-if="m.pic" src="{{m.pic}}"/>
                        <p class="title" ng-show="module.params.show_title">{{m.title}}</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<p class="case_content_title">{{module.params.contentTitle}}</p>
<div class="case_content">{{module.params.content}}</div>
</div>
  </script>
  <script type="text/ng-template" id="widget-notice-display.html">
	<div class="diy_notice">
	<div class="notice_box" ng-style="{'background-color':module.params.bgColor,'color':module.params.color}">
    	<div class="scrollNotice">
        	<span class="js-scroll-notice" ng-bind-html="module.params.notice_content|to_trusted"></span>
        </div>
    </div>
</div>
  </script>
  <script type="text/ng-template" id="widget-usercenter-display.html">
	<div class="fixed_module">
	<h6>个人中心固定模块</h6>
    <p>个人中心页</p>
</div>
  </script>
  <script type="text/ng-template" id="widget-goodsdetail-display.html">
	<div class="shot_div">
	<img src="/static/base/images/goods_detail_shot.png"/>
</div>
  </script>
<script type="text/ng-template" id="widget-fixedmodule-display.html">
	<div class="fixed_module">
	<h6>{{module.params.title}}</h6>
    <p>{{module.params.desc}}</p>
</div>
</script>
<script type="text/javascript">
var dataConfig = '<?php echo htmlentities((isset($diyData['config']) && ($diyData['config'] !== '')?$diyData['config']:'')); ?>';
if(dataConfig!=""){
	initDiy(dataConfig);
}
</script>

            
          </div>
          <!-- 底部导航 -->
          <!-- 底部导航 -->
<div class="bottom-nav ui-border-t">
  <a href="<?php echo U('shop/wap/index'); ?>" class="bottom-nav-item">
    <!-- icon -->
    <slot name="b-icon1">
      <div class="bottom-nav-item-img icon_index_<?php echo htmlentities($highlight['index']); ?>">
      </div>
      <small class="<?php echo htmlentities($highlight['index']); ?>">首页</small>
    </slot>
  </a>

  <a href="<?php echo U('shop/wap/category'); ?>" class="bottom-nav-item">
    <!-- icon -->
    <slot name="b-icon2">
    <div class="bottom-nav-item-img icon_category_<?php echo htmlentities($highlight['category']); ?>">
      
    </div>
    <small class="<?php echo htmlentities($highlight['category']); ?>">分类</small>
  </slot>
  </a>

  <a href="<?php echo U('shop/wap/service',['come_from'=>'nav']); ?>" class="bottom-nav-item">
    <!-- icon -->
    <slot name="b-icon3">
    <div class="bottom-nav-item-img icon_service_<?php echo htmlentities($highlight['service']); ?>">
      
      
    </div>
    <small class="<?php echo htmlentities($highlight['service']); ?>">客服</small>

    <span class="weui-badge <?php if($new_msg_count > '0'): ?>active<?php endif; ?>" style="position: absolute;top: 0em;right: .4rem;"><?php echo htmlentities((isset($new_msg_count) && ($new_msg_count !== '')?$new_msg_count:'0')); ?></span>



    </slot>
  </a>

  <a href="<?php echo U('shop/wap/cart'); ?>" class="bottom-nav-item">
    <div class="bottom-nav-item-img icon_car_<?php echo htmlentities($highlight['cart']); ?>">
    </div>
    <small class="<?php echo htmlentities($highlight['cart']); ?>">购物车</small>
    <span class="weui-badge <?php if($cart_count > '0'): ?>active<?php endif; ?>" style="position: absolute;top: 0em;right: .4rem;"><?php echo htmlentities((isset($cart_count) && ($cart_count !== '')?$cart_count:'0')); ?></span>
  </a>

  <a href="<?php echo U('shop/wap/center'); ?>" class="bottom-nav-item">
    <!-- icon -->
    <slot name="b-icon5">
    <div class="bottom-nav-item-img icon_center_<?php echo htmlentities($highlight['center']); ?>">
      
    </div>
    <small class="<?php echo htmlentities($highlight['center']); ?>">个人中心</small>
  </slot>
  </a>
</div>


    </body>

    
    


    <script src="/static/default/lib/jquery-weui/fastclick.js"></script>
    <script src="/static/default/lib/lazyload.min.js"></script>  
    <script src="/static/default/js/function.js"></script>


</body>

</html>
