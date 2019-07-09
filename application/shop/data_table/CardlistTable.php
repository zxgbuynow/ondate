<?php
/**
 * Cardlist数据模型
 */
class CardlistTable {
    // 数据表模型配置
    public $config = [
      'name' => 'cardlist',
      'title' => '会员卡信息',
      'search_key' => '',
      'add_button' => 1,
      'del_button' => 1,
      'search_button' => 1,
      'check_all' => 1,
      'list_row' => 20,
      'addon' => 'shop'
  ];

    // 列表定义
    public $list_grid = [
      'name' => [
          'title' => '姓名',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 1
      ],
      'card_no' => [
          'title' => '卡号',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 1
      ],
      'money' => [
          'title' => '余额',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 1
      ]
  ];

    // 字段定义
    public $fields = [
      'mobile' => [
          'title' => '联系电话',
          'type' => 'string',
          'field' => 'varchar(25) NOT NULL',
          'is_show' => 1,
          'is_must' => 1,
          'placeholder' => '请输入内容'
      ],
      'name' => [
          'title' => '姓名',
          'type' => 'string',
          'field' => 'varchar(25) NOT NULL',
          'is_show' => 1,
          'is_must' => 1,
          'placeholder' => '请输入内容'
      ],
      'card_no' => [
          'title' => '卡号',
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
      ],
      'addtime' => [
          'title' => '创建时间',
          'type' => 'string',
          'field' => 'varchar(25) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'lasttime' => [
          'title' => '最后消费时间',
          'type' => 'string',
          'field' => 'varchar(25) NULL',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ]
  ];
}