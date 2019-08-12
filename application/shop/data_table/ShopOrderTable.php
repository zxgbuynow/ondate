<?php
/**
 * ShopOrder数据模型
 */
class ShopOrderTable {
    // 数据表模型配置
    public $config = [
        'name' => 'shop_order',
        'title' => '订单记录',
        'search_key' => 'key:请输入订单编号或客户昵称',
        'add_button' => 1,
        'del_button' => 1,
        'search_button' => 1,
        'check_all' => 1,
        'list_row' => 20,
        'addon' => 'shop'
    ];

    // 列表定义
    public $list_grid = [
        'order_number' => [
            'title' => '订单编号',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'goods' => [
            'title' => '下单商品',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'uid' => [
            'title' => '客户',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'total_price' => [
            'title' => '总价',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'cTime' => [
            'title' => '下单时间',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'common' => [
            'title' => '支付类型',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'status_code' => [
            'title' => '订单跟踪',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ],
        'urls' => [
            'title' => '操作',
            'come_from' => 0,
            'width' => '',
            'is_sort' => 0
        ]
    ];

    // 字段定义
    public $fields = [
        'uid' => [
            'title' => '用户id',
            'field' => 'int(10) unsigned NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'order_number' => [
            'title' => '订单编号',
            'field' => 'varchar(255) NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'goods_datas' => [
            'title' => '商品序列化数据',
            'field' => 'text NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'remark' => [
            'title' => '备注',
            'field' => 'text NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'cTime' => [
            'title' => '订单时间',
            'field' => 'int(10) NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'total_price' => [
            'title' => '总价',
            'field' => 'decimal(10,2) NULL',
            'type' => 'string'
        ],
        'address_id' => [
            'title' => '配送信息',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'is_send' => [
            'title' => '是否发货',
            'field' => 'int(10) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'send_code' => [
            'title' => '快递公司编号',
            'field' => 'varchar(255) NULL',
            'type' => 'string'
        ],
        'send_number' => [
            'title' => '快递单号',
            'field' => 'varchar(255) NULL',
            'type' => 'string'
        ],
        'send_type' => [
            'title' => '发货类型',
            'field' => 'char(10) NULL',
            'type' => 'string'
        ],
        'wpid' => [
            'title' => 'wpid',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'openid' => [
            'title' => 'OpenID',
            'field' => 'varchar(255) NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'pay_status' => [
            'title' => '支付状态',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'pay_type' => [
            'title' => '支付类型',
            'field' => 'tinyint(2) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'is_new' => [
            'title' => '是否为新订单',
            'field' => 'tinyint(2) NULL',
            'type' => 'string',
            'value' => 1
        ],
        'status_code' => [
            'title' => '订单跟踪状态码',
            'field' => 'char(50) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'is_lock' => [
            'title' => '数量是否锁定',
            'field' => 'int(10) NULL',
            'type' => 'string',
            'value' => 1
        ],
        'erp_lock_code' => [
            'title' => 'ERP锁定商品编号',
            'field' => 'text NULL',
            'type' => 'string'
        ],
        'mail_money' => [
            'title' => '邮费金额',
            'field' => 'float NULL',
            'type' => 'string',
            'value' => 0
        ],
        'stores_id' => [
            'title' => '门店编号',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'pay_time' => [
            'title' => '支付时间',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'send_time' => [
            'title' => '发货时间',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'extra' => [
            'title' => '扩展参数',
            'field' => 'text NULL',
            'type' => 'string'
        ],
        'order_state' => [
            'title' => '订单状态',
            'field' => 'int(10) NULL',
            'type' => 'string',
            'value' => 1
        ],
        'out_trade_no' => [
            'title' => '支付的订单号',
            'field' => 'varchar(100) NULL',
            'type' => 'string'
        ],
        'event_type' => [
            'title' => '订单来源',
            'field' => 'tinyint(2) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'event_id' => [
            'title' => '活动ID',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'is_original' => [
            'title' => '活动中是否原价购买',
            'field' => 'tinyint(2) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'refund' => [
            'title' => 're',
            'field' => 'tinyint(1) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'jsbn' => [
            'title' => '技师编号',
            'field' => 'varchar(255) NOT NULL',
            'type' => 'string',
            'is_must' => 1
        ],
        'category_id' => [
            'title' => '订单类别',
            'field' => 'int(10) NULL',
            'type' => 'string'
        ],
        'room' => [
            'title' => '房间编号',
            'field' => 'varchar(10) NULL',
            'type' => 'string'
        ],
        'update_at' => [
            'title' => 'test',
            'field' => 'timestamp NOT NULL',
            'type' => 'string',
            'is_must' => 1,
            'value' => 'CURRENT_TIMESTAMP'
        ],
        'notice_erp' => [
            'title' => '为0时不需要推送，大于0时需要推送',
            'field' => 'int(11) NULL',
            'type' => 'string',
            'value' => 0
        ],
        'refund_content' => [
            'title' => 'test',
            'field' => 'varchar(255) NULL',
            'type' => 'string'
        ],
        'pay_money' => [
            'title' => '实付价格',
            'field' => 'decimal(10,2) NULL',
            'type' => 'string'
        ],
        'dec_money' => [
            'title' => '优惠价格',
            'field' => 'decimal(10,2) NULL',
            'type' => 'string'
        ]
    ];
}