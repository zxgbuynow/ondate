<?php
namespace app\home\controller;

use app\common\controller\ApiBase;
use decrypdata;
use \think\Request;
use \think\Db;
use think\Model;

class Api extends ApiBase
{

	function initialize()
    {
        parent::initialize();
        $this->autoLogin();

    }


    function index()
    {
    	header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: token, Origin, X-Requested-With, Content-Type, Accept, Authorization");
        header('Access-Control-Allow-Methods: POST,GET,PUT,DELETE');
        // 接口请求日志记录 TODO
        $params = input();
        //获得定义接口
        $api =  array_flip(config()['apis']['api']);
        if (isset($params['method'])) {
            //判断是否存在该方法
            $func = $api[$params['method']];
            if (method_exists($this,$func)) {
                return $this->$func($params);
            }else{
                return api_error($params['method'].'方法不存在');
            }
            
        }else{
            return api_error('method参数缺失');
        }


    }

    /**
     * 数据初始化
     * @param  [type]
     * @return [type]
     */
    static function autoLogin()
    {
    	$user = M('user')->find();
    	session('userinfo',$user);

        //查找用户并插入队列
        $user = M('art')->count();
        $userInfo = M('art')->select();
        $queue = M('user_queue')->count();
        $queueInfo = M('user_queue')->column('user_id','postion');
        if ($user>$queue) {
            foreach ($userInfo as $key => $value) {
                if (!isset($queueInfo[$value['id']])) {
                    $current = M('user_queue')->count();
                    $save['created_time'] = time();
                    $save['user_id'] = $value['id'];
                    $save['sex'] = $value['sex'];
                    $save['status'] = 1;
                    $save['type'] = 0;
                    $save['postion'] = $current+1;
                    $save['service_type'] = $value['type'];
                    $save['jsbn'] = $value['jsbn'];
                    M('user_queue')->insert($save);
                }
            }
        }
        return true;
    	// return api_success($user);
    }
    /**
     * 楼层 + 房间 + 房间（服务中人数）
     * @param string
     */
    public function homeIndex($params)
    {
    	$cate = M('room_cate')->order('order ASC')->select();
    	$rooms = M('room')->order('order ASC')->select();

    	//组数据
    	$roomsarr = [];
    	foreach ($rooms as $key => &$value) {
    		$cparams['status'] = ['in','0,1'];
    		$cparams['room_id'] = $value['id'];
    		$calls = M('calls')->where($cparams)->limit(3)->select();
    		array_walk($calls,function(&$v,$k){
    			$v['sex'] = $v['sex']==0?'女':'男';
    			$v['time'] = $v['calltime']?date('H:i',$v['calltime']):'waiting';
    		});
    		$value['calls'] = $calls;
    		$value['fee'] = number_format(M('calls')->where($cparams)->sum('price'),2) ;
    		$roomsarr[$value['cate_id']][] = $value; 
    	}
    	//全部
    	$all[0] = ['id'=>0,'cate_name'=>'全部','order'=>0];
    	$cateall = array_merge($all,$cate);
    	foreach ($cateall as $key => &$value) {
    		if ($value['id']==0) {
    			$value['room'] = $rooms;
    		}else{
    			$value['room'] = $roomsarr[$value['id']];
    		}
    		
    	}
    	$ret['data'] = $cateall;
    	return api_success($ret);
    }

    /**
     * 队列
     * @param  [type]
     * @return [type]
     */
    public function homeQueue($params)
    {
    	$queue =  M('user_queue')->field('service_type,type,id,sex as gender,jsbn as number,status')->order('postion ASC')->select();
    	$ret = [];
    	foreach ($queue as $key => $value) {
    		$value['gender'] = $value['gender']==0?'女':'男';
    		$value['statusDesc'] = $value['type']==0?'空闲':($value['type']==1?'排':($value['type']==2?'点':'注销'));
    		$ret[$value['service_type']]['list'][] = $value;
    		if ($value['type']==0) {
    			$ret[$value['service_type']]['free'][] = $value;
    		}
    	}
    	//计数
    	//浴
    	if (isset($ret[0])) {
    		$count0 = isset($ret[0]['free'])?count($ret[0]['free']):0;
    		$ret[0]['tcount'] = $count0.'/'.count($ret[0]['list']);
    	}
    	//SPA
    	if (isset($ret[1])) {
    		$count1 = isset($ret[1]['free'])?count($ret[1]['free']):0;
    		$ret[1]['tcount'] = $count1.'/'.count($ret[1]['list']);
    	}

    	return api_success($ret);
    }

    /**
     * [queueList 技师状况]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public function queueList($params)
    {

    	$queue =  M('user_queue')->field('service_type,type,id,sex as artificerGender,jsbn as artificerNumber,status,postion,user_id')->order('postion ASC')->select();
    	foreach ($queue as $key => &$value) {
    		$value['artificerGender'] = $value['service_type']==0?'足浴':'SPA';
    		$value['artificerType'] = $value['artificerGender']==0?'男':'女';
    		$value['status'] = $value['type']==0?'空闲':($value['type']==1?'排钟':($value['type']==2?'点钟':'注销'));
    		$value['onClock'] = $value['type']==0?'空闲':($value['type']==1?'排钟':($value['type']==2?'点钟':'注销'));
    		$value['order'] = $value['postion'];
    		$value['index'] = $value['postion'];
    		if ($value['type']==0||$value['type']==2) {
    			$value['serviceType']='';
				$value['callTime']='';
				$value['beginTime']='';
    		}else{
    			$param['status'] = array('in','0,1');
    			$param['art_id'] = $value['user_id'];
    			$goodid = M('calls')->where($param)->value('goods_id');
    			$value['serviceType'] = $goodid?M('shop_goods')->where(['id'=>$goodid])->value('title'):'';
				$value['callTime'] = M('calls')->where($param)->value('calltime');;
				$value['beginTime'] = M('calls')->where($param)->value('begin_time');;
    		}
    	}
    	$ret['data'] = $queue;
    	return api_success($ret); 

    }

    /**
     * 服务项目
     * @param  [type]
     * @return [type]
     */
    public function goodslist($params)
    {
    	$goods['data']  = M('shop_goods')->where(['type'=>1])->select();
    	foreach ($goods['data'] as $key => &$value) {
    		$value['duration'] = '60'; 
    		$value['fee'] = intval($value['cost_price']); 
    	}
    	return api_success($goods);
    }

    /**
     * [roomlist 房间列表]
     * @param  [type] $params [description]
     * @return [type]         [description]
     */
    public function roomList($params)
    {
    	if (isset($params['free'])) {
    		$ret['data'] = M('room')->where(['status'=>0])->order('order ASC')->select();
            if (isset($params['room_id'])) {
                $room[] = M('room')->where(['id'=>$params['room_id']])->find();
                $ret['data'] = array_merge($ret['data'],$room);
            }
    		return api_success($ret);
    	}
    	$ret['data'] = M('room')->order('order ASC')->select();
    	return api_success($ret);
    }
    /**
     * 技师列表
     * @param  [type]
     * @return [type]
     */
    public function artList($params)
    {
    	$art['data']  = Db::table('wp_art')->alias('a')->join('user_queue b','a.id = b.user_id')->where(['a.status'=>1,'b.type'=>0])->select();

        foreach ($art['data'] as $key => &$value) {
            $value['username'] = $value['jsbn'];
        }
    	return api_success($art);
    }

    /**
     * 添加等待
     * @param  [type]
     * @return [type]
     */
    public function waitAdd($params)
    {
    	
    	if (isset($params['id'])&&$params['id']>0) {
    		$params['modife_time'] = time();
	    	$params['user_id'] = session('userinfo')['uid'];
	    	$id = $params['id'];
	    	unset($params['method']);
	    	unset($params['id']);
	    	if (M('waite')->where(['id'=>$id])->update($params)) {
	    		return api_success('编辑成功');
	    	}
    	}
    	$params['created_time'] = time();
    	$params['user_id'] = session('userinfo')['uid'];
    	unset($params['method']);
    	if (M('waite')->insert($params)) {
            //房间状态
            $p['id'] = $params['room_id'];
            M('room')->where($p)->update(['status'=>1]);
    		return api_success('添加成功');
    	}

    	return api_error('添加失败');

    }

    /**
     * 删除等待
     * @param  [type]
     * @return [type]
     */
    public function waitDel($params)
    {
    	if (!$params['id']) {
    		return api_error('参数缺少');
    	}
        $waite = M('waite')->where(['id'=>$params['id']])->find();
    	if (M('waite')->where(['id'=>$params['id']])->delete()) {

            M('room')->where(['id'=>$waite['room_id']])->update(['status'=>0]);
    		return api_success('删除成功');
    	}
    	return api_error('删除失败');
    }


    /**
     * 等待列表
     * @param  [type]
     * @return [type]
     */
    public function waitList($params)
    {
    	if (isset($params['id'])) {
    		$info['data'] =  M('waite')->field('waite_num as waitCount,jsno as artificerNumber,room_id,goods_id,user_id,created_time,level,way,service_type,id')->where(['id'=>$params['id']])->find();
    		$info['data']['roomNumber'] = M('room')->where(['id'=>$info['data']['room_id']])->value('room_name');
    		$info['data']['type'] = $info['data']['way']==0?'排钟':'点钟';
    		$info['data']['serviceType'] = M('shop_goods')->where(['id'=>$info['data']['goods_id']])->value('title');
    		$info['data']['time'] = date('H:i',$info['data']['created_time']);
    		$info['data']['levelkey'] = $info['data']['level'];
    		$info['data']['level'] = $info['data']['level']==0?'一般':'优先';
    		$info['data']['operator'] = M('user')->where(['uid'=>$info['data']['user_id']])->value('nickname');
    		return api_success($info);
    	}
    	$ret['list'] =  M('waite')->field('waite_num as waitCount,jsno as artificerNumber,room_id,goods_id,user_id,created_time,level,way,service_type,id')->select();
    	foreach ($ret['list'] as $key => &$value) {
    		$value['roomNumber'] = M('room')->where(['id'=>$value['room_id']])->value('room_name');
    		$value['type'] = $value['way']==0?'排钟':'点钟';
    		$value['serviceType'] = M('shop_goods')->where(['id'=>$value['goods_id']])->value('title');
    		$value['time'] = date('H:i',$value['created_time']);
    		$value['level'] = $value['level']==0?'一般':'优先';
    		$value['operator'] = M('user')->where(['uid'=>$value['user_id']])->value('nickname');
    	}
    	//统计
    	$ret['wr'] = M('waite')->group('room_id')->count();
    	$ret['wp'] = M('waite')->sum('waite_num');
    	return api_success(['data'=>$ret]);
    }

    /**
     * 编辑等待列表
     * @param  [type]
     * @return [type]
     */
    public function waitEdit($params)
    {

    	if (!$params['id']) {
    		return api_error('参数缺少');
    	}
    	$params['modife_time']  = time();
    	$params['user_id'] = intval ( session ( 'mid_' . get_pbid () ) );
    	unset($params['method']);
    	if (M('waite')->update($params)) {
    		return api_success('编辑成功');
    	}

    	
    	return api_error('编辑失败');

    }

    /**
     * 安排技师
     * @param  [type]
     * @return [type]
     */
    public function makeArt($params)
    {
    	$room  = $params['roomid'];
    	$service_type  = $params['goodid'];

    	$userinfo = M('art')->where(['id'=>$params['id']])->find();
    	$goods  = M('shop_goods')->where(['id'=>$service_type])->find();
    	$rooms  = M('room')->where(['id'=>$room])->find();

    	//参数处理
    	if ($params['system']=='systemChange') {
    		$woman = intval($params['woman']);
    		$man = intval($params['man']);
    		$secret = intval($params['secret']);
    		$wantTot = $woman+$man+$secret;
    		$total = M('user_queue')->where(['type'=>0])->count();
    		$freeman = M('user_queue')->where(['type'=>0,'sex'=>1])->count();
    		$freewoman = M('user_queue')->where(['type'=>0,'sex'=>0])->count();
    		//先算总人数
    		// $difw = $freewoman>$woman?0:($freewoman-$woman);
    		if ($wantTot>$total) {
    			return api_error('需求技师不够，当前技师：女'.$freewoman.'男'.$freeman);
    		}
    		//男
    		if ($man>$freeman) {
    			return api_error('需求技师不够，当前技师：男'.$freeman);
    		}
    		//女
    		if ($woman>$freewoman) {
    			return api_error('需求技师不够，当前技师：女'.$freewoman);
    		}
            //算房间座位
            if ($rooms['seats']<($woman+$man+$secret)) {
                return api_error('房间座位数'.$rooms['seats']);
            }
            
    		//安排
    		try {
                $msg = '';
                M('room')->where(['id'=>$room])->update(['status'=>2]);
    			if ($woman) {
                    //优化处理SPA和足浴分开安排
                    
    				$makew = M('user_queue')->where(['type'=>0,'sex'=>0])->order('postion ASC')->limit($woman)->column('id');
    				M('user_queue')->where('id','in',$makew)->update(['type'=>1]);

    				foreach ($makew as $key => $value) {
    					$userinfo = M('art')->where(['id'=>$value])->find();
    					$save['jsbn'] = $userinfo['jsbn'];
				    	$save['sex'] = $userinfo['sex'];
				    	$save['art_id'] = $userinfo['id'];
				    	$save['service_type'] = $service_type;
				    	$save['way'] = 0;
				    	$save['status'] = 0;
				    	$save['num'] = 1;
				    	$save['price'] = $goods['cost_price'];
				    	$save['total'] = $goods['cost_price'];
				    	$save['room'] = $rooms['room_name'];
				    	$save['room_id'] = $rooms['id'];
				    	M('calls')->insert($save);

                        //语音推送
                        // sleep(1);
                        $calls = M('calls')->where(['art_id'=>$userinfo['id']])->find();
                        $msg .= '请技师'.$calls['jsbn'].'到'.$calls['room'].'房间';
                        
    				}
                    
    			}
    			if ($man) {
    				$makem = M('user_queue')->where(['type'=>0,'sex'=>1])->order('postion ASC')->limit($man)->column('id');
    				M('user_queue')->where('id','in',$makem)->update(['type'=>1]);
    				foreach ($makem as $key => $value) {
    					$userinfo = M('art')->where(['id'=>$value])->find();
    					$save['jsbn'] = $userinfo['jsbn'];
				    	$save['sex'] = $userinfo['sex'];
				    	$save['art_id'] = $userinfo['id'];
				    	$save['service_type'] = $service_type;
				    	$save['way'] = 0;
				    	$save['status'] = 0;
				    	$save['num'] = 1;
				    	$save['price'] = $goods['cost_price'];
				    	$save['total'] = $goods['cost_price'];
				    	$save['room'] = $rooms['room_name'];
				    	$save['room_id'] = $rooms['id'];
				    	M('calls')->insert($save);

                        //语音推送
                        // sleep(1);
                        $calls = M('calls')->where(['art_id'=>$userinfo['id']])->find();
                        $msg .= '请技师'.$calls['jsbn'].'到'.$calls['room'].'房间';
                        
    				}
                    // $this->push_wm_msg('1',$msg);
    			}
    			
    			//不限制
    			if ($secret) {
    				$secret = M('user_queue')->where(['type'=>0])->order('postion ASC')->limit($secret)->column('id');
    				M('user_queue')->where('id','in',$secret)->update(['type'=>1]);
    				foreach ($secret as $key => $value) {
    					$userinfo = M('art')->where(['id'=>$value])->find();
    					$save['jsbn'] = $userinfo['jsbn'];
				    	$save['sex'] = $userinfo['sex'];
				    	$save['art_id'] = $userinfo['id'];
				    	$save['service_type'] = $service_type;
				    	$save['way'] = 0;
				    	$save['status'] = 0;
				    	$save['num'] = 1;
				    	$save['price'] = $goods['cost_price'];
				    	$save['total'] = $goods['cost_price'];
				    	$save['room'] = $rooms['room_name'];
				    	$save['room_id'] = $rooms['id'];
				    	M('calls')->insert($save);

                        //语音推送
                        // sleep(1);
                        $calls = M('calls')->where(['art_id'=>$userinfo['id']])->find();
                        $msg .= '请技师'.$calls['jsbn'].'到'.$calls['room'].'房间';
                        
    				}
                    // $this->push_wm_msg('1',$msg);
    			}
                //删除等待信息
                M('waite')->where(['room_id'=>$room])->delete();
    			$this->push_wm_msg('1',$msg);

    		} catch (Exception $e) {
    			return api_error('操作失败，请稍后重试');
    		}
    		return api_success('操作成功');
    	}
    	try {
            if (!M('user_queue')->where(['user_id'=>$params['id'],'type'=>0])->find()) {
                return  api_error('当前技师非空闲');
            }
            M('room')->where(['id'=>$room])->update(['status'=>2]);
    		//主动选择
	    	M('user_queue')->where(['user_id'=>$params['id']])->update(['type'=>2]);
	    	//生成服务信息
	    	$save['jsbn'] = $userinfo['jsbn'];
	    	$save['sex'] = $userinfo['sex'];
	    	$save['art_id'] = $userinfo['id'];
	    	$save['service_type'] = $service_type;
	    	$save['way'] = 1;
	    	$save['status'] = 0;
	    	$save['num'] = 1;
	    	$save['price'] = $goods['cost_price'];
	    	$save['total'] = $goods['cost_price'];
	    	$save['room'] = $rooms['room_name'];
	    	$save['room_id'] = $rooms['id'];
	    	M('calls')->insert($save);
            //删除等待信息
            M('waite')->where(['room_id'=>$room])->delete();
            //语音推送
            $calls = M('calls')->where(['art_id'=>$userinfo['id']])->find();
            $msg = '请技师'.$calls['jsbn'].'到'.$calls['room'].'房间';
            $this->push_wm_msg('1',$msg);
            M('calls')->where(['id'=>$calls['id']])->update(['calltime'=>time()]);
    	} catch (Exception $e) {
    		return api_error('操作失败，请稍后重试');
    	}
    	
    	return api_success('操作成功');
    }

    /**
     * 修改排序
     * @param  [type]
     * @return [type]
     */
    public function queueOrder($params)
    {
    	//是否Lock
    	if (M('user_queue')->where(['type'=>1])->find()) {
    		return api_error('队列暂时锁定，请稍后重试');
    	}

    	//修改位置 取到前一位
    	if (!$params['id']||!$params['positionid']) {
    		return api_error('参数缺少');
    	}
    	//第一位不做操作
    	if ($params['positionid']==1) {
    		return api_success('第一位不做操作');
    	}
    	//取前一位ID
    	$cp['postion'] = $params['positionid']-1;
    	$preid = M('user_queue')->where($cp)->value('id');
    	try {
            add_debug_log(M('user_queue')->select(),'queueOrder');
    		//降1
    		M('user_queue')->where(['id'=>$preid])->update(['pre_postion',$cp['postion']]);
    		M('user_queue')->where(['id'=>$preid])->setInc('postion',1);
    		//升1
    		M('user_queue')->where(['id'=>$params['id']])->update(['pre_postion',$params['positionid']]);
    		M('user_queue')->where(['id'=>$params['id']])->setDec('postion',1);
            add_debug_log(M('user_queue')->select(),'queueOrder');
    	} catch (Exception $e) {
    		return api_error('操作失败');
    	}
    	return api_success('操作成功');

    }
    /**
     * 呼叫
     * @param  [type]
     * @return [type]
     */
    public function queueCall($params)
    {
    	if (!$params['artid']||!$params['id']) {
    		return api_error('参数缺少');
    	}
    	try {
            //取数据
            $callp['art_id'] = $params['artid'];
            $callp['status'] = 0;
            $calls = M('calls')->where(['art_id'=>$params['artid']])->find();
            $msg = '请技师'.$calls['jsbn'].'到'.$calls['room'].'房间';
    		$this->push_wm_msg('1',$msg);
            M('calls')->where(['id'=>$calls['id']])->update(['calltime'=>time()]);
    	} catch (Exception $e) {
    		return api_error('呼叫失败');
    	}
    	
    	return api_success('呼叫成功');
    }
    /**
     * 注销
     * @param  [type]
     * @return [type]
     */
    public function queueLogout($params)
    {
    	if (!$params['artid']) {
    		return api_error('参数缺少');
    	}

    	try {
    		M('art')->where(['id'=>$params['id']])->update(['status'=>0]);
    		M('user_queue')->where(['user_id'=>$params['id']])->update(['type'=>3]);
    	} catch (Exception $e) {
    		return api_error('注销失败');
    	}

    	return api_success('注销成功');
    }
    /**
     * 房间祥情
     * @param  [type]
     * @return [type]
     */
    public function orderList($params)
    {
    	if (!isset($params['roomid'])) {
    		return api_error('参数缺少');
    	}

    	$cparams['room_id'] = $params['roomid'];
    	$cparams['status'] = ['in','0,1'];
    	$calls = M('calls')->where($cparams)->select();

		$index = 1;
    	foreach ($calls as $key => &$value) {
    		$value['index'] = $index;
    		$value['type'] = '服务';
    		$value['serviceName'] = $value['service_type']==0?'足浴':'SPA';
    		$goodsinfo = M('shop_goods')->where(['id'=>$value['goods_id']])->find();
    		$value['fee'] = number_format($goodsinfo['cost_price'],2);
    		$value['total'] = 1;
    		$value['cancelTotal'] = 0;
    		$value['tatalFee'] =  number_format($goodsinfo['cost_price'],2);
    		$value['artificerNumber'] = $value['jsbn'];
    		$value['beginTime'] = $value['begin_time'];
    		$value['endTime'] = $value['end_time'];
    		$value['way'] = $value['way']==0?'排钟':'点钟';
    		$value['status'] = $value['status']==0?'等待上钟':'上钟';
    		$value['time']  = date('m/d H:i',$value['calltime']);
            $value['callTime']  = date('m/d H:i',$value['calltime']);
    		$value['operator'] = M('user')->where(['uid'=>$value['operator']])->value('nickname');
    		$index ++;
    	}
    	$ret['data'] = $calls;
    	return api_success($ret);
    }

    /**
     * 下钟
     * @param  [type]
     * @return [type]
     */
    public function orderFinsh($params)
    {
    	if (!$params['id']) {
    		return api_error('参数缺少');
    	}

    	if (M('calls')->where(['id'=>$params['id']])->update(['status'=>3])) {
            $call = M('calls')->where(['id'=>$params['id']])->find();
            M('room')->where(['id'=>$call['room_id']])->update(['status'=>0]);
            M('user_queue')->where(['user_id'=>$call['art_id']])->update(['type'=>0]);

            if ($call['way']==0) {//如果是排
                //查看当前排钟人数
                if (M('user_queue')->where(['type'=>1])->count()>1) {
                    return api_success('下钟成功');
                }
                add_debug_log(M('user_queue')->select(),'queueOrder');
                //更新位置
                $queue = M('user_queue')->where(['user_id'=>$call['art_id']])->find();
                $postion = $queue['postion'];
                $queuecount = M('user_queue')->count();
                //更新当前技师位置
                M('user_queue')->where(['user_id'=>$call['art_id']])->update(['postion'=>$queuecount,'pre_postion'=>$postion]);
                $start = $queue+1;
                for ($i=$queuecount; $i <= $start; $i--) { 
                    M('user_queue')->where(['postion'=>$i])->update(['postion'=>$i-1,'pre_postion'=>$i]);
                }
                add_debug_log(M('user_queue')->select(),'queueOrder');
            }
    		return api_success('下钟成功');
    	}
    	return api_error('下钟失败');
    }

    /**
     * 撤钟
     * @param  [type]
     * @return [type]
     */
    public function orderRefund($params)
    {
    	if (!$params['id']) {
    		return api_error('参数缺少');
    	}

    	if (M('calls')->where(['id'=>$params['id']])->update(['status'=>2])) {
            $call = M('calls')->where(['id'=>$params['id']])->find();
            M('room')->where(['id'=>$call['room_id']])->update(['status'=>0]);
            M('user_queue')->where(['user_id'=>$call['art_id']])->update(['type'=>0]);
            
    		return api_success('退单成功');
    	}
    	return api_error('退单失败');
    }

    /**
     * 换房间
     * @param  [type]
     * @return [type]
     */
    public function orderExRoom($params)
    {
    	if (!$params['id']||!$params['roomid']) {
    		return api_error('参数缺少');
    	}
    	//取得房间编号
    	$room = M('room')->where(['id'=>$params['roomid']])->value('room_name');
    	if (M('calls')->where(['id'=>$params['id']])->update(['room_id'=>$params['roomid'],'room'=>$room])) {
    		return api_success('换房成功');
    	}
    	return api_error('换房失败');
    }

    /**
     * 技师状况
     * @param  [type]
     * @return [type]
     */
    public function artStatement($params)
    {	
    	//上 ， 空， 请假
    	$statement['free'] = M('user_queue')->where(['type'=>0])->count();
    	$statement['work'] = M('user_queue')->where('type','in','1,2')->count();

    	$statement['unline'] = M('user_queue')->where(['type'=>3])->count();

    	return api_success($statement);
    }
}
