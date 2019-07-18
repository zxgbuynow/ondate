<?php
/**
 * Calls数据模型
 */
class CallsTable {
    // 数据表模型配置
    public $config = [
      'name' => 'calls',
      'title' => '叫钟表',
      'search_key' => '',
      'add_button' => 1,
      'del_button' => 1,
      'search_button' => 1,
      'check_all' => 1,
      'list_row' => 20,
      'addon' => ''
  ];

    // 列表定义
    public $list_grid = [ ];

    // 字段定义
    public $fields = [
      'jsbn' => [
          'title' => '技师编号',
          'type' => 'string',
          'field' => 'varchar(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'sex' => [
          'title' => '性别',
          'type' => 'num',
          'field' => 'int(1) NULL',
          'remark' => '0女1男',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'room' => [
          'title' => '房间号',
          'type' => 'string',
          'field' => 'varchar(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'calltime' => [
          'title' => '呼叫时间',
          'type' => 'num',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'retime' => [
          'title' => '响应时间',
          'type' => 'datetime',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'status' => [
          'title' => '状态',
          'type' => 'bool',
          'field' => 'tinyint(2) NULL',
          'remark' => '0等待 1上钟 2退单 3完成 4注销',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'begin_time' => [
          'title' => '开始时间',
          'type' => 'datetime',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'end_time' => [
          'title' => '结束时间',
          'type' => 'datetime',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'art_id' => [
          'title' => '用户id',
          'type' => 'num',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'service_type' => [
          'title' => '服务类型',
          'type' => 'num',
          'field' => 'int(2) NULL',
          'remark' => '0足浴 1SPA',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'num' => [
          'title' => '数量',
          'type' => 'num',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'price' => [
          'title' => '消费金额',
          'type' => 'string',
          'field' => 'varchar(255) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'total' => [
          'title' => '总价',
          'type' => 'string',
          'field' => 'varchar(255) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'way' => [
          'title' => '叫钟类型',
          'type' => 'string',
          'field' => 'varchar(5) NULL',
          'remark' => '0排1点',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'type' => [
          'title' => '类型',
          'type' => 'bool',
          'field' => 'tinyint(2) NULL',
          'remark' => '0实物1服务',
          'is_show' => 1,
          'is_must' => 0
      ],
      'room_id' => [
          'title' => '房间id',
          'type' => 'num',
          'field' => 'int(10) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ]
  ];
}