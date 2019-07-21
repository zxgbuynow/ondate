<?php
/**
 * Stores数据模型
 */
class StoresTable {
    // 数据表模型配置
    public $config = [
      'name' => 'stores',
      'title' => '会员卡信息',
      'search_key' => 'phone:按手机号搜索',
      'add_button' => 1,
      'del_button' => 1,
      'search_button' => 1,
      'check_all' => 1,
      'list_row' => 20,
      'addon' => 'shop'
  ];

    // 列表定义
    public $list_grid = [
      'card_no' => [
          'title' => '会员卡号',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0,
          'name' => 'card_no',
          'function' => '',
          'raw' => 0,
          'href' => [ ]
      ],
      'phone' => [
          'title' => '联系电话',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0,
          'name' => 'phone',
          'function' => '',
          'raw' => 0,
          'href' => [ ]
      ],
      'money' => [
          'title' => '余额',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0,
          'name' => 'money',
          'function' => '',
          'raw' => 0,
          'href' => [ ]
      ],
      'last_time' => [
          'title' => '最后消费时间',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0,
          'name' => 'last_time',
          'function' => '',
          'raw' => 0,
          'href' => [ ]
      ],
      'urls' => [
          'title' => '操作',
          'come_from' => 1,
          'width' => '',
          'is_sort' => 0,
          'href' => [
              '0' => [
                  'title' => '编辑',
                  'url' => '[EDIT]'
              ],
              '1' => [
                  'title' => '删除',
                  'url' => '[DELETE]'
              ]
          ],
          'name' => 'urls',
          'function' => '',
          'raw' => 0
      ]
  ];

    // 字段定义
    public $fields = [
      'name' => [
          'title' => '店名',
          'field' => 'varchar(100) NULL',
          'type' => 'string',
          'placeholder' => '请输入内容'
      ],
      'opt' => [
          'title' => '创建者',
          'type' => 'string',
          'field' => 'varchar(25) NULL',
          'is_show' => 0,
          'is_must' => 0
      ],
      'phone' => [
          'title' => '联系电话',
          'field' => 'varchar(30) NULL',
          'type' => 'string',
          'placeholder' => '请输入内容'
      ],
      'card_no' => [
          'title' => '卡号',
          'type' => 'string',
          'field' => 'varchar(50) NOT NULL',
          'is_must' => 1,
          'placeholder' => '请输入内容'
      ],
      'open_time' => [
          'title' => '创建时间',
          'type' => 'string',
          'field' => 'varchar(50) NULL',
          'placeholder' => '请输入内容'
      ],
      'card_type' => [
          'title' => '会员卡类型',
          'type' => 'string',
          'field' => 'varchar(25) NULL',
          'placeholder' => '请输入内容'
      ],
      'password' => [
          'title' => '会员卡密码',
          'type' => 'string',
          'field' => 'varchar(255) NULL',
          'placeholder' => '请输入内容'
      ],
      'last_time' => [
          'title' => '最后消费时间',
          'type' => 'string',
          'field' => 'varchar(25) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'money' => [
          'title' => '余额',
          'type' => 'string',
          'field' => 'varchar(25) NOT NULL',
          'is_show' => 1,
          'is_must' => 1,
          'placeholder' => '请输入内容'
      ]
  ];
}