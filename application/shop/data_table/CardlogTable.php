<?php
/**
 * Cardlog数据模型
 */
class CardlogTable {
    // 数据表模型配置
    public $config = [
      'name' => 'cardlog',
      'title' => '会员卡操作记录',
      'search_key' => '',
      'add_button' => 1,
      'del_button' => 1,
      'search_button' => 1,
      'check_all' => 1,
      'list_row' => 20,
      'addon' => 'shop'
  ];

    // 列表定义
    public $list_grid = [ ];

    // 字段定义
    public $fields = [
      'addtime' => [
          'title' => '操作时间',
          'type' => 'string',
          'field' => 'varchar(25) NOT NULL',
          'is_show' => 1,
          'is_must' => 1
      ]
  ];
}