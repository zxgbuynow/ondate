<?php
namespace app\shop\controller;

use app\shop\controller\Base;
use think\Db;

class Order extends Base
{

    public $model;

    public function initialize()
    {
        $this->model = $this->getModel('shop_order');
        parent::initialize();
    }
    // 通用插件的列表模型
    public function lists()
    {
        $res['title'] = '订单管理';
        $res['url'] = U('Shop/Order/lists');
        $res['class'] = CONTROLLER_NAME == 'Order' ? 'current' : '';
        $nav[] = $res;

        $this->assign('nav', $nav);

        $map = [];
        $orderId = I('order_id/d', 0);
        if ($orderId) {
            $map['id'] = $orderId;
        }
        $room = I('room/d');
        $jsbn = I('jsbn/d');

        $st=I('start_time');
        $et=I('end_time');
        $mutif=false;
        if($room || $jsbn || $st || $et){
            $mutif=true;
        }
        $beiyong=M('room')->where(['cate_id'=>3,'status'=>0])->select();
        $this->assign('beiyong', $beiyong);
        $this->assign('room', $room);
        $this->assign('jsbn', $jsbn);
        $this->assign('mutif', $mutif);
        $search = input('key', '');
        $search=trim($search,'+');
        if ($search) {
            $this->assign('search', $search);

            $nickname_follow_ids = D('common/User')->searchUser($search);

            if (! empty($nickname_follow_ids)) {
                $map['uid'] = array(
                    'exp',
                    ' in (' . $nickname_follow_ids . ') '
                );
            } else {
                $map['order_number'] = array(
                    'like',
                    '%' . htmlspecialchars($search) . '%'
                );
            }
        }

        $this->assign('start_time', $st);
        $this->assign('end_time', $et);
        $startTime = strtotime($st);
        $map['cTime']  = array(
            'egt',
            $startTime
        );
        $endTime=$et;
        if (!empty($endTime)) {
            $endTime = strtotime($endTime) + 86400 - 1;
            $map['cTime'] = array(
                'between',
                array(
                    $startTime,
                    $endTime
                )
            );
        }

        $status = I('status/d', 1);
        $this->assign('status', $status);
        if ($status == 1) { // 待支付
            $map['pay_status'] = 0;
            $map['status_code'] =0;
        } else if ($status == 2) { // 已支付
            $map['status_code'] = [
                'in',
                '1,2'
            ];
        } else if ($status == 3) { // 待结单
            $map['status_code'] =3;
        } else if ($status == 4) { // 已结单
            $map['status_code'] = 4;
        } else if ($status == 5) { // 已取消
            $map['status_code'] = 5;
        }else if ($status == 9) { // 全部
            $map['status_code'] = [
                '<',
                '10'
            ];
        }

        $event_type = I('event_type/d', - 1);
        $this->assign('event_type', $event_type);
        if ($event_type != - 1) {
            $map['event_type'] = $event_type;
        }

        $map = $this->muti_search($map);

        session('common_condition', $map);

        $model = $this->model;
        $dataTable = D('common/Models')->getFileInfo($model);
        if ($dataTable === false) {
            $this->error($model['name'] . ' 的模型文件不存在');
        }

        $this->assign('add_button', $dataTable->config['add_button']);
        $this->assign('del_button', $dataTable->config['del_button']);
        $this->assign('search_button', $dataTable->config['search_button']);
        $this->assign('check_all', $dataTable->config['check_all']);

        // 解析列表规则
        $list_data = $this->_list_grid($model);
        $fields = $list_data['fields'];

        // 搜索条件
        $map = $this->_search_map($model, $list_data['db_fields']);
        $row = empty($model['list_row']) ? 20 : $model['list_row'];

        // 读取模型数据列表
        $_REQUEST = input('param.');
        if (empty($order) && isset($_REQUEST['order'])) {
            $order = I('order') . ' ' . I('by');
        }
        if ($model['name'] != 'user') {
            empty($fields) || in_array('id', $fields) || array_push($fields, 'id');
            empty($order) && $order = 'id desc';
        } else {
            empty($fields) || in_array('uid', $fields) || array_push($fields, 'uid');
            empty($order) && $order = 'uid desc';
        }
        // dump ( $order );
        $name = $dataTable->config['name'];
        $db_field = true;

        $wp_where = wp_where($map);
        $data = M($name)->field($db_field)
            ->where($wp_where)
            ->where('is_lock=1 or (is_lock=0 and refund>0)')
            ->order($order)
            ->paginate($row);

        $list_data = $this->parsePageData($data, $dataTable, $list_data);

        $orderDao = D('shop/Order');
        $type = 1;
        $goodsDao = D('shop/ShopGoods');
        foreach ($list_data['list_data'] as &$vo) {
            $param['id'] = $vo['id'];

            $order = $orderDao->getInfo($vo['id']);
            // dump($order);
            $vo = array_merge($vo, $order);
            $follow = getUserInfo($vo['uid']);
            isset($follow['uid']) && $param2['uid'] = $follow['uid'];

            $vo['headimgurl'] = $follow['headimgurl'];
            $vo['uid'] = isset($param2) ? '<a href="' . U('weixin/UserCenter/detail', $param2) . '">' . $follow['nickname'] . '</a>' : '';

            $vo['goods_title'] = '';
            $vo['num'] = 0;
            foreach ($vo['goods'] as &$vv) {
                $vo['num'] += $vv['num'];
                $vv['goods_title'] = '<div><img src="' . $vv['cover'] . '"/><span title="' . $vv['title'] . '">' . $vv['title'] . '</span></div>';
            }

            $vo['goods_title'] = isset($vo['goods_title']) ? $vo['goods_title'] : '';

            $vo['order_number'] = '<a href="' . U('Shop/Order/detail', $param) . '">' . $vo['order_number'] . '</a>';

            $vo['action'] = '<a href="' . U('Shop/Order/detail', $param) . '">订单详情</a>';
            if ($vo['status_code'] == 1 && $vo['send_type'] == 1) {
                $vo['action'] .= '<button class="border-btn btn-small ajax-get" data-ostate=' . $vo['order_state'] . ' data-href="' . U('Shop/Order/set_confirm', $param) . '">商家确认</button>';
            }
            if ($vo['refund'] == 1) {
                $vo['action'] .= '<a class="border-btn audit_refund" href="javascript:;" rel="' . $vo['id'] . '" data-content="' . $vo['refund_content'] . '">审核退款</a>';
            } else if ($vo['refund'] == 2) {
                $vo['action'] .= '       已退款';
            } else if ($vo['refund'] == 3) {
                $vo['action'] .= '       拒绝退款';
            }
        }
        // dump($list_data);
        $this->assign($list_data);

        return $this->fetch();
    }
    public function print2(){
        return $this->fetch();
    }
    private function muti_search($result)
    {
        $map = [];
        $start_price = input('start_price/d');
        $this->assign('start_price', $start_price);

        $end_price = input('end_price/d');
        $this->assign('end_price', $end_price);

        $field = 'sale_price';
        if ($start_price > 0 && $end_price > 0) {
            $map[$field] = [
                'between',
                $start_price . ',' . $end_price
            ];
        } elseif ($start_price > 0) {
            $map[$field] = [
                '>=',
                $start_price
            ];
        } elseif ($end_price > 0) {
            $map[$field] = [
                '<=',
                $end_price
            ];
        }

        $title = input('title');
        $this->assign('title', $title);

        if (! empty($title)) {
            $field = 'title';
            $map[$field] = [
                'like',
                "%{$title}%"
            ];
        }

        if (empty($map)) {
            return $result;
        }

        $map['wpid'] = get_wpid();
        $goods_ids = M('shop_goods')->alias('g')
            ->join('shop_goods_stock s', 's.goods_id = g.id and s.event_type=' . SHOP_EVENT_TYPE)
            ->where(wp_where($map))
            ->column('id');
        if (empty($goods_ids)) {
            return [
                'id' => 0
            ];
        }

        $order_ids = M('shop_order_goods')->whereIn('goods_id', $goods_ids)->column('order_id');
        if (empty($order_ids)) {
            return [
                'id' => 0
            ];
        } else {
            $result['id'] = [
                'in',
                $order_ids
            ];
        }

        return $result;
    }
    //订单支付信息（批量）
    public function pay_all_info(){
        $order_ids = I('order_ids', 0);
        $map['id']=explode(',',$order_ids);
        $info=M('shop_order')->where($map)->field('id,room,jsbn,total_price')->select();
        $ids=[];
        $jsbns=[];
        $room=[];
        $total=0;
        foreach ($info as $k=>$v){
            $ids[]=$v['id'];
            $jsbns[]=$v['jsbn'];
            $room[]=$v['room'];
            $total+=$v['total_price'];
        }
        $jsbns=array_unique($jsbns);
        $room=array_unique($room);
        $data['ids']=implode(',',$ids);
        $data['jsbn']=implode(',',$jsbns);
        $data['total_price']=$total;
        $data['room']=implode(',',$room);
        echo json_encode($data);
    }

    //订单支付信息（单笔）
    public function pay_info_back(){
        $order_id = I('order_id', 0);
        $map['id']=$order_id;
        $data=M('shop_order')->where($map)->field('id,room,jsbn,total_price')->find();
        echo json_encode($data);
    }
    //订单支付信息（单笔）
    public function pay_info(){
        $order_id = I('order_id', 0);
        $map['id']=$order_id;
        $data=M('shop_order')->where($map)->field('goods_datas,total_price')->find();
        $info=json_decode($data['goods_datas']);
        $row="<tr><td>".$info['title']."</td><td>".$info['sale_price']."</td><td>".$info['num']."</td><td>".$data['total_price']."</td></tr>";
        $info['row']=$row;
        $info['money']=$data['total_price'];
        echo json_encode($info);
    }
    //结单信息（批量）
    public function finish_info(){
        $order_ids = I('order_ids', 0);
        $map['id']=explode(',',$order_ids);
        $info=M('shop_order')->where($map)->field('id,room,jsbn,total_price')->select();
        $ids=[];
        $jsbns=[];
        $room=[];
        $total=0;
        foreach ($info as $k=>$v){
            $ids[]=$v['id'];
            $jsbns[]=$v['jsbn'];
            $room[]=$v['room'];
            $total+=$v['total_price'];
        }
        $jsbns=array_unique($jsbns);
        $room=array_unique($room);
        $data['ids']=implode(',',$ids);
        $data['jsbn']=implode(',',$jsbns);
        $data['total_price']=$total;
        $data['room']=implode(',',$room);
        echo json_encode($data);
    }
    //取消订单
    //TODO
    public function cancelOrder(){
        $order_id = I('id', 0);

       try {
           $map['id'] = $order_id;
           $updata['status_code'] = 5;
           $updata['opt'] = $this->mid;
           if (M('shop_order')->where($map)->update($updata)) {
               $data['code'] = 1;
               $data['msg'] = '操作成功';
///
               $maps['id'] = $order_id;
               $order_data = M('shop_order')->where($maps)->find();
               $map1['call_id'] = $order_data['call_id'];
              //被取消的订单不计算在内
               $num1 = M('shop_order')->where($map1)->where('status_code','<>',5)->count();
               $map2['call_id'] = $order_data['call_id'];
               $map2['pay_status'] = 1;
               //被取消的订单不计算在内
               $num2 = M('shop_order')->where($map2)->where('status_code','<>',5)->count();
               if ($num1 == $num2) {
                   //$calldata['status'] = 3;
                   $calldata['type'] = 3;
                   $map3['id'] = $order_data['call_id'];
                   M('calls')->where($map3)->update($calldata);

                   $map4['room'] = $order_data['room'];
                   $map4['type'] = [0, 1];//1已下钟未结账2已下钟已结账0未下钟
                   $cc = M('calls')->where($map4)->count();
                   if ($cc < 1) {
                       M('room')->where(['room_name' => $order_data['room']])->update(['status' => 0]);//更新房间状态
                   }
               }
///

           } else {
               $data['code'] = 2;
               $data['msg'] = '操作失败';
           }
           echo json_encode($data);
       }catch (Exception $e) {
           $data['code'] = 2;
           $data['msg'] = '操作失败,请稍后重试！';
           echo json_encode($data);
       }
    }
    //确认挂单
    public function gua_action(){
        $data=I('post.');
        $ids=explode(',',$data['ids']);
        try{
            foreach ($ids as $v){
                $retiem='';
                $call_id=M('shop_order')->where(['id'=>$v])->value('call_id');
                $retiem=M('calls')->where(['id'=>$call_id])->value('retime');
                if(empty($retiem)){
                    $info['type'] =2;
                    $info['msg'] = '失败！技师还未操作下钟！';
                    echo json_encode($info);
                    exit;
                }
            }
            foreach ($ids as $v){
                    $orderInfo=M('shop_order')->where(['id'=>$v])->find();
                    $orderUp['true_room']=$orderInfo['room'];
                    $orderUp['room']=$data['new_room'];
                    M('shop_order')->where(['id'=>$v])->update($orderUp);
                    $roomUp['status']=2;
                    M('room')->where(['room_name'=>$data['new_room']])->update($roomUp);
                    $roomUp1['status']=0;
                    M('room')->where(['room_name'=>$orderInfo['room']])->update($roomUp1);
                    $callUp['room']=$data['new_room'];
                    M('calls')->where(['id'=>$orderInfo['call_id']])->update($callUp);
            }
            $info['type']='1';
            $info['msg'] = '操作成功！';
            echo json_encode($info);
        }catch (Exception $e) {
            $info['type'] =2;
            $info['msg'] = '操作失败,请稍后重试！';
            echo json_encode($info);
        }

    }
    //确认支付
    public function pay_action(){
        $data=I('post.');
        $info['type']='1';
        $orderModel=M('shop_order');
        $ids=explode(',',$data['ids']);

        $where['id']=$ids;
        $where['pay_status']=0;
        $orderData['opt']=$this->mid;
        $orderData['pay_status']=1;
        $orderData['pay_type']=$data['pay_type'];
        $orderData['pay_time']=time();
        if($data['pay_type']==0){
            $info['type']='2';
            $info['msg']='请选择支付方式！';
            echo json_encode($info);
            exit;
        }
        try {
            //会员卡支付
            if ($data['pay_type'] == 4) {
                $cardModel = M('stores');
                if (empty($data['card_no'])) {
                    $info['type'] = '2';
                    $info['msg'] = '请输入卡号！';
                    echo json_encode($info);
                    exit;
                }
                $map['card_no'] = $data['card_no'];
                $m = $cardModel->where($map)->field('money')->find();
                if (empty($m)) {
                    $info['type'] = '2';
                    $info['msg'] = '卡号不存在！';
                    echo json_encode($info);
                    exit;
                }
                if ($m['money'] < $data['total_price']) {
                    $info['type'] = '2';
                    $info['msg'] = '余额不足，卡内余额：' . $m['money'] . '元';
                    echo json_encode($info);
                    exit;
                }
                $flag1 = $cardModel->where($map)->setDec('money', $data['total_price']);
                $time['last_time']=time();
                $cardModel->where($map)->update($time);
                $vip['card']=$data['card_no'];
                $vip['time']=time();
                $vip['add']=0-$data['total_price'];
                $vip['remark']=$data['remark'];
                $vip['opt']= $this->mid;
                M('vip_log')->insert($vip);
                $flag2 = $orderModel->where($where)->update($orderData);
                if ($flag1 && $flag2) {
                    $info['msg'] = '操作成功！';
                } else {
                    $info['type'] = '2';
                    $info['msg'] = '操作失败！';
                }


            } else {
                $orderModel->where($where)->update($orderData);
                $info['msg'] = '操作成功！';
            }
            foreach ($ids as $k => $v) {
                $maps['id'] = $v;
                $order_data = M('shop_order')->where($maps)->find();
                $map1['call_id'] = $order_data['call_id'];
                $map1['status_code'] =['<>',5];//被取消的订单不计算在内
                $num1 = M('shop_order')->where($map1)->count();
                $map2['call_id'] = $order_data['call_id'];
                $map2['pay_status'] = 1;
                $map2['status_code'] =['<>',5];//被取消的订单不计算在内
                $num2 = M('shop_order')->where($map2)->count();
                if ($num1 == $num2) {
                    //$calldata['status'] = 3;
                    $calldata['type'] = 2;
                    $map3['id'] = $order_data['call_id'];
                    M('calls')->where($map3)->update($calldata);

                    $map4['room'] = $order_data['room'];
                    $map4['type'] = [0, 1];//1已下钟未结账2已下钟已结账0未下钟
                    $cc = M('calls')->where($map4)->count();
                    if ($cc < 1) {
                        M('room')->where(['room_name' => $order_data['room']])->update(['status' => 0]);//更新房间状态
                    }
                }

            }
            echo json_encode($info);
        }catch (Exception $e) {
            $info['type'] =2;
            $info['msg'] = '操作失败,请稍后重试！';
            echo json_encode($info);
        }


    }
    //结订单
    public function finishOrder(){
        $order_id = I('id', 0);

            $map['id'] = $order_id;
            $updata['status_code'] = 4;
            $updata['opt'] = $this->mid;
            if (M('shop_order')->where($map)->update($updata)) {
                $data['code'] = 1;
                $data['msg'] = '操作成功';

            } else {
                $data['code'] = 2;
                $data['msg'] = '操作失败';
            }
            echo json_encode($data);

    }

    // 通用插件的删除模型
    public function del()
    {
        $id = I('id/d', 0);
        $orderDao = D('Shop/Order');
        $order = $orderDao->where('id', $id)->find();
        if ($order['pay_status'] == 0 && $order['is_lock'] == 1 && $order['status_code'] == 0) {
            $stockDao = D('shop/Stock');
            $sec = NOW_TIME - $order['cTime'];
            $goods = json_decode($order['goods_datas'], true);
            foreach ($goods as $g) {
                $orderRes = $stockDao->canelUnPayOrder($g['num'], $g['id'], $order['event_type']);
            }
        }
        $key = 'Order_getInfo_' . $id;
        S($key, null);
        // 返回代金券
        $wpid = get_wpid();
        $orderDao->giveBackExtr($id, $wpid);

        // 退款
        $orderDao->rebackPay($order);

        // 设置活动的订单状态
        if ($order['event_type'] == HAGGLE_EVENT_TYPE) {
            D('haggle/Order')->where('order_id', $id)->setField('is_pay', 3);
        } elseif ($order['event_type'] == COLLAGE_EVENT_TYPE) {
            D('collage/Order')->where('order_id', $id)->setField('is_pay', 3);
        } elseif ($order['event_type'] == SECKILL_EVENT_TYPE) {
            D('seckill/Order')->where('order_id', $id)->setField('is_pay', 3);
        }

        if ($orderDao->where('id', $id)->delete()) {
            // 清空缓存
            $this->success('删除成功');
        } else {
            $this->error('删除失败！');
        }
    }

    public function detail()
    {
        $id = I('id');
        $orderInfo = D('Shop/Order')->getInfo($id);
        if (empty($orderInfo)) {
            $this->error('该订单未支付或不存在');
        }
        if ($orderInfo['order_state'] != 1) {
            $extArr = json_decode($orderInfo['extra'], true);
            $orderInfo['order_state_msg'] = $extArr['order_state_msg'];
        }
        $this->assign('info', $orderInfo);

        if ($orderInfo['stores_id']) {
            $storeInfo = M('stores')->where('id', $orderInfo['stores_id'])->find();
        } else {
            $storeInfo = [];
        }
        $this->assign('store_info', $storeInfo);

        $addressInfo = D('shop/Address')->getInfo($orderInfo['address_id']);
        $this->assign('addressInfo', $addressInfo);

        $log_msg = '';
        $log_list = [];
        if ($orderInfo['send_type'] == 1 && $orderInfo['is_send']) {
            $res = D('Shop/Order')->getSendInfo($id);
            if ($res['resultcode'] != 200) {
                $log_msg = $res['reason'];
            } else {
                $log_list = $res['result']['list'];
            }
        }
        $this->assign('log_list', $log_list);
        $this->assign('log_msg', $log_msg);

        if ($orderInfo['pay_type'] == 90) {
            $title = empty($orderInfo['event_type']) ? '单个积分' : $orderInfo['event_type'] . '积分';
        } else {
            $title = empty($orderInfo['event_type']) ? '购买单价' : $orderInfo['event_type'] . '价格';
        }

        $this->assign('sale_price_title', $title);

        return $this->fetch();
    }

    public function do_send()
    {
        $orderDao = D('Shop/Order');
        $order_id = I('order_id');
        $orderInfo = $orderDao->getInfo($order_id);

        $save['send_code'] = I('send_code');
        if (empty($save['send_code'])) {
            $this->error('请选择物流公司');
        }

        $save['send_number'] = I('send_number');
        if (empty($save['send_number'])) {
            $this->error('请填写快递号');
        }

        $save['is_send'] = 1;
        $save['send_time'] = time();

        $res = $orderDao->where('id', $order_id)->update($save);
        if ($res !== false) {
            $orderDao->setStatusCode($order_id, 3);
            if ($orderInfo['event_type'] == 1) {
                D('collage/Order')->hasSend($orderInfo);
            } elseif ($orderInfo['event_type'] == 2) {
                D('seckill/Order')->hasSend($orderInfo);
            } elseif ($orderInfo['event_type'] == 3) {
                D('haggle/Order')->hasSend($orderInfo);
            }
            $this->success('发货成功');
        } else {
            $this->success('发货失败');
        }
    }

    // 设置为已自提
    function has_ziti()
    {
        $id = I('id');
        $save['is_send'] = 1;
        $save['status_code'] = 6;
        D('Shop/Order')->updateId($id, $save);

        $res = D('Shop/Order')->setStatusCode($id, $save['status_code'], true);
        if ($res) {
            $this->success('设置成功');
        } else {
            $this->success('设置失败');
        }
    }

    public function set_confirm()
    {
        $id = I('id');
        $res = D('Shop/Order')->setStatusCode($id, 2);
        if ($res) {
            $this->success('设置成功');
        } else {
            $this->success('设置失败');
        }
    }
    function audit_refund()
    {
        $id = input('refund_id/d');
        if (empty($id)) {
            return $this->error('错误操作，请重试！');
        }
        $status = input('status/d', 3);

        $refund = $status == 2 ? 2 : 3;

        // 启动事务
        Db::startTrans();
        try {
            $save['refund'] = $refund;
            if ($refund == 2) {
                // 释放商品库存
                $orderDao = D('Shop/Order');
                $order = $orderDao->where('id', $id)->find();
                if ($order['is_lock'] == 1) {
                    $save['is_lock'] = 0;

                    $stockDao = D('shop/Stock');
                    $sec = NOW_TIME - $order['cTime'];
                    $goods = json_decode($order['goods_datas'], true);
                    foreach ($goods as $g) {
                        $orderRes = $stockDao->canelOrder($g['num'], $g['id'], $order['event_type']);
                    }
                }

                // 设置活动的订单状态
                if ($order['event_type'] == HAGGLE_EVENT_TYPE) {
                    D('haggle/Order')->where('order_id', $id)->setField('is_pay', 3);
                } elseif ($order['event_type'] == COLLAGE_EVENT_TYPE) {
                    D('collage/Order')->where('order_id', $id)->setField('is_pay', 3);
                } elseif ($order['event_type'] == SECKILL_EVENT_TYPE) {
                    D('seckill/Order')->where('order_id', $id)->setField('is_pay', 3);
                }
                // 退款
                $rrrr = $orderDao->rebackPay($order);
                addWeixinLog($rrrr,'rebackPaymoney_'.$id);
                if (isset($rrrr['status']) && $rrrr['status']==0 && !empty($rrrr['msg'])){
                    exception($rrrr['msg']);
                }

            }

            $res = D('shop/Order')->updateId($id, $save);
            if ($res === false) {
                exception('审核操作失败，请稍等重试');
            }
            // 提交事务
            Db::commit();
        } catch (\Exception $e) {
            // 回滚事务
            Db::rollback();
            return $this->error($e->getMessage());
        }
        return $this->success('审核操作完成');
    }
}
