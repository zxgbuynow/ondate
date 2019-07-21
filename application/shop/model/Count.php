<?php
namespace app\shop\model;

use app\common\model\Base;

/**
 * count模型
 */
class Count extends Base
{

    protected $table = DB_PREFIX . 'goods_count';

    public function getCharts_order($param)
    {
        // $where['cTime']=array();
        $listAll = M('shop_order')->where('wpid', WPID)
            //->whereBetween('cTime', $param['stime'] . ',' . $param['etime'])
            ->where('cTime','>',$param['stime'])
            ->where('cTime','<',$param['etime'])
            ->field("FROM_UNIXTIME(cTime,'%Y%m%d') as date,sum(total_price) as num")
            ->group('date')
            ->select();

        $re = [];
        foreach ($listAll as $v) {
            $re[$v['date']] = (int)$v['num'];
        }
        // dump($listAll);exit;
        $xtime = $param['stime'];
        while ($xtime <= $param['etime']) {
            $key_time = time_format($xtime, 'Ymd'); // echo $key_time.'/';
            $res[] = isset($re[$key_time]) && $re[$key_time] > 0 ? $re[$key_time] : 0;
            $xtime = $xtime + 86400;
        }  //dump(WPID);exit;
        return $res;
    }
    /*
     * 分条件获取统计信息
     */
    public function getCharts($param)
    {
        $listAll = M('shop_track')->where('wpid', WPID)
            ->whereBetween('create_at', $param['stime'] . ',' . $param['etime'])
            ->field("FROM_UNIXTIME(create_at,'%Y%m%d') as date,count(1) as num")
            ->group('date')
            ->select();


        $re = [];
        foreach ($listAll as $v) {
            $re[$v['date']] = $v['num'];
        }
        $xtime = $param['stime'];
        while ($xtime <= $param['etime']) {
            $key_time = time_format($xtime, 'Ymd'); // echo $key_time.'/';
            $res[] = isset($re[$key_time]) && $re[$key_time] > 0 ? $re[$key_time] : 10;
            $xtime = $xtime + 86400;
        }  //dump($res);exit;
        return $res;
    }

    /*
     * 添加统计信息
     */
    public function count($id)
    {
        $check_map = array(
            'uid' => intval(session('mid_'.get_pbid())),
            'day_time' => time_format(NOW_TIME, 'Ymd'),
            'good_id' => $id
        );
        if (! $this->where(wp_where($check_map))->value('id')) {
            $check_map['time'] = NOW_TIME;
            $this->insert($check_map);
        }
    }
}
