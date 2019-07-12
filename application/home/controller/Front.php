<?php
// +----------------------------------------------------------------------
// | WeiPHP [ 公众号和小程序运营管理系统 ]
// +----------------------------------------------------------------------
// | Copyright (c) 2017 http://www.weiphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 凡星 <weiphp@weiphp.cn> <QQ:203163051>
// +----------------------------------------------------------------------
namespace app\home\controller;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class Front extends Home
{
    public $sReqTimeStamp, $sReqNonce, $sEncryptMsg;

    // 系统首页
    public function index()
    {
        // if (!HAS_INDEX) {
        //     $this->redirect('user/login');
        // }
        // $newsFields = 'id,title,content,cTime';
        // $newsLists = D('solution/News')->getNewsLists([], $newsFields, 4);
        // $this->assign('newsLists', $newsLists);
        return $this->fetch();
        return view();
    }

    
}
