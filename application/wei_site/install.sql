CREATE TABLE IF NOT EXISTS `wp_custom_reply_news` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '简介',
`cate_id`  int(10) unsigned NULL   COMMENT '所属类别',
`cover`  int(10) unsigned NULL   COMMENT '封面图片',
`content`  text NULL  COMMENT '内容',
`sort`  int(10) unsigned NULL   COMMENT '排序号',
`jump_url`  varchar(255) NULL  COMMENT '外链',
`author`  varchar(50) NULL  COMMENT '作者',
`cTime`  int(10) NULL  COMMENT '发布时间',
`view_count`  int(10) unsigned NULL   COMMENT '浏览数',
`wpid`  int(10) NOT NULL  COMMENT 'wpid',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('custom_reply_news','图文回复','0','','1','["keyword","keyword_type","title","intro","cate_id","cover","content","sort","jump_url","author"]','1:基础','','','','','id:5%ID\r\nkeyword:10%关键词\r\nkeyword_type|get_name_by_status:20%关键词类型\r\ntitle:30%标题\r\ncate_id:10%所属分类\r\nsort:7%排序号\r\nview_count:8%浏览数\r\nids:10%操作:[EDIT]|编辑,[DELETE]|删除','20','title','','1396061373','1466505161','1','MyISAM','wei_site');



CREATE TABLE IF NOT EXISTS `wp_weisite_cms` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`keyword`  varchar(100) NULL  COMMENT '关键词',
`keyword_type`  tinyint(2) NULL  COMMENT '关键词类型',
`title`  varchar(255) NOT NULL  COMMENT '标题',
`intro`  text NULL  COMMENT '简介',
`cate_id`  int(10) unsigned NULL   COMMENT '所属类别',
`cover`  int(10) unsigned NULL   COMMENT '封面图片',
`content`  text NULL  COMMENT '内容',
`sort`  int(10) unsigned NULL   COMMENT '排序号',
`cTime`  int(10) NULL  COMMENT '发布时间',
`view_count`  int(10) unsigned NULL   COMMENT '浏览数',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('weisite_cms','文章管理','0','','1','["keyword","keyword_type","title","intro","cate_id","cover","content","sort"]','1:基础','','','','','keyword:关键词\r\nkeyword_type|get_name_by_status:关键词类型\r\ntitle:标题\r\ncate_id:所属分类\r\nsort:排序号\r\nview_count:浏览数\r\nids:操作:[EDIT]&module_id=[pid]|编辑,[DELETE]|删除','20','title','','1396061373','1408326292','1','MyISAM','wei_site');



