CREATE TABLE IF NOT EXISTS `wp_signin_log` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
`score`  int(10) NOT NULL  COMMENT '积分',
`wpid`  varchar(255) NOT NULL  COMMENT 'wpid',
`sTime`  int(10) UNSIGNED NOT NULL  COMMENT '签到时间',
`uid`  varchar(255) NOT NULL  COMMENT '用户ID',
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci CHECKSUM=0 ROW_FORMAT=DYNAMIC DELAY_KEY_WRITE=0;
INSERT INTO `wp_model` (`name`,`title`,`extend`,`relation`,`need_pk`,`field_sort`,`field_group`,`attribute_list`,`template_list`,`template_add`,`template_edit`,`list_grid`,`list_row`,`search_key`,`search_list`,`create_time`,`update_time`,`status`,`engine_type`,`addon`) VALUES ('SignIn_Log','签到记录','0','','1','','1:基础','','','','','','10','uid','','0','0','0','MyISAM','sing_in');



