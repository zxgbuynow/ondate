<?php
/**
 * Exam数据模型
 */
class ExamTable {
    // 数据表模型配置
    public $config = [
      'name' => 'exam',
      'title' => '考试试卷',
      'search_key' => 'title:请输入试卷标题搜索',
      'add_button' => 1,
      'del_button' => 1,
      'search_button' => 1,
      'check_all' => 1,
      'list_row' => 10,
      'addon' => ''
  ];

    // 列表定义
    public $list_grid = [
      'id' => [
          'title' => '试卷id',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'keyword' => [
          'title' => '关键词',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'keyword_type' => [
          'title' => '关键词匹配类型',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'title' => [
          'title' => '试卷标题',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'start_time' => [
          'title' => '开始时间',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'end_time' => [
          'title' => '结束时间',
          'come_from' => 0,
          'width' => '',
          'is_sort' => 0
      ],
      'urls' => [
          'title' => '操作',
          'come_from' => 1,
          'width' => '',
          'is_sort' => 0,
          'href' => [
              '0' => [
                  'title' => '复制链接',
                  'url' => 'show&exam_id=[id]'
              ],
              '1' => [
                  'title' => '编辑',
                  'url' => '[EDIT]'
              ],
              '2' => [
                  'title' => '删除',
                  'url' => '[DELETE]'
              ],
              '3' => [
                  'title' => '题目管理',
                  'url' => 'exam_question&target=_blank&id=[id]'
              ],
              '4' => [
                  'title' => '考生成绩',
                  'url' => 'exam_answer&target=_blank&id=[id]'
              ],
              '5' => [
                  'title' => '试卷预览',
                  'url' => 'preview&id=[id]&target=_blank'
              ]
          ]
      ]
  ];

    // 字段定义
    public $fields = [
      'keyword' => [
          'title' => '关键词',
          'field' => 'varchar(100) NOT NULL',
          'type' => 'string',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'keyword_type' => [
          'title' => '关键词匹配类型',
          'field' => 'tinyint(2) NOT NULL',
          'type' => 'select',
          'is_show' => 1,
          'extra' => '0:完全匹配
1:左边匹配
2:右边匹配
3:模糊匹配',
          'placeholder' => '请输入内容'
      ],
      'title' => [
          'title' => '试卷标题',
          'field' => 'varchar(255) NOT NULL',
          'type' => 'string',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'intro' => [
          'title' => '封面简介',
          'field' => 'text NOT NULL',
          'type' => 'textarea',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'cover' => [
          'title' => '封面图片',
          'field' => 'int(10) UNSIGNED NOT NULL',
          'type' => 'picture',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'finish_tip' => [
          'title' => '结束语',
          'field' => 'text NOT NULL',
          'type' => 'string',
          'remark' => '为空默认为：考试完成，谢谢参与',
          'is_show' => 1,
          'placeholder' => '请输入内容'
      ],
      'mTime' => [
          'title' => '修改时间',
          'field' => 'int(10) NOT NULL',
          'type' => 'datetime',
          'auto_rule' => 'time',
          'auto_time' => 3,
          'auto_type' => 'function',
          'placeholder' => '请输入内容'
      ],
      'cTime' => [
          'title' => '发布时间',
          'field' => 'int(10) UNSIGNED NOT NULL',
          'type' => 'datetime',
          'auto_rule' => 'time',
          'auto_time' => 1,
          'auto_type' => 'function',
          'placeholder' => '请输入内容'
      ],
      'wpid' => [
          'title' => 'wpid',
          'field' => 'varchar(255) NOT NULL',
          'type' => 'string',
          'auto_rule' => 'get_wpid',
          'auto_time' => 1,
          'auto_type' => 'function',
          'placeholder' => '请输入内容'
      ],
      'start_time' => [
          'title' => '考试开始时间',
          'field' => 'int(10) NULL',
          'type' => 'datetime',
          'remark' => '为空表示什么时候开始都可以',
          'is_show' => 2,
          'placeholder' => '请输入内容'
      ],
      'end_time' => [
          'title' => '考试结束时间',
          'field' => 'int(10) NULL',
          'type' => 'datetime',
          'remark' => '为空表示不限制结束时间',
          'is_show' => 2,
          'placeholder' => '请输入内容'
      ]
  ];
}