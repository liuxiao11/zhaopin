/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.5.53 : Database - guangjian
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`guangjian` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `guangjian`;

/*Table structure for table `app_addons` */

DROP TABLE IF EXISTS `app_addons`;

CREATE TABLE `app_addons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL COMMENT '插件名或标识',
  `title` varchar(20) NOT NULL DEFAULT '' COMMENT '中文名',
  `description` text COMMENT '插件描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `config` text COMMENT '配置',
  `author` varchar(40) DEFAULT '' COMMENT '作者',
  `version` varchar(20) DEFAULT '' COMMENT '版本号',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `has_adminlist` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有后台列表',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='插件表';

/*Data for the table `app_addons` */

insert  into `app_addons`(`id`,`name`,`title`,`description`,`status`,`config`,`author`,`version`,`create_time`,`has_adminlist`,`sort`) values (20,'Example','示列','这是一个临时描述',1,'null','无名','0.1',1426727529,0,0);

/*Table structure for table `app_auth_group` */

DROP TABLE IF EXISTS `app_auth_group`;

CREATE TABLE `app_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `rules` text,
  `sort` int(11) NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_auth_group` */

insert  into `app_auth_group`(`id`,`title`,`status`,`rules`,`sort`) values (1,'超级管理员','on','60,61,64,73,72,71,63,68,69,70,62,67,66,65,75,77,82,80,76,79,78,53,54,55,83,59,58,57,56,11,12,15,21,26,25,24,14,20,19,22,23,35,13,18,17,16,34,33',10),(4,'运营者','on','53,54,55,59,58,57,56',10);

/*Table structure for table `app_auth_group_access` */

DROP TABLE IF EXISTS `app_auth_group_access`;

CREATE TABLE `app_auth_group_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_auth_group_access` */

/*Table structure for table `app_auth_rule` */

DROP TABLE IF EXISTS `app_auth_rule`;

CREATE TABLE `app_auth_rule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `top_id` tinyint(4) NOT NULL COMMENT '顶层id',
  `level` tinyint(4) NOT NULL COMMENT '层级',
  `title` varchar(20) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `sort` int(11) NOT NULL DEFAULT '10',
  `condition` varchar(100) DEFAULT '',
  `position` enum('list','right','bottom') NOT NULL DEFAULT 'list',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_auth_rule` */

insert  into `app_auth_rule`(`id`,`pid`,`top_id`,`level`,`title`,`name`,`type`,`status`,`sort`,`condition`,`position`) values (11,0,11,1,'后台配置','config',1,'on',10,'','list'),(12,11,11,2,'权限设置','authconfig',1,'on',10,'','list'),(13,12,11,3,'权限菜单','admin/rule/rule_list',1,'on',10,'','list'),(14,12,11,3,'用户组','admin/rule/group_list',1,'on',10,'','list'),(15,12,11,3,'管理员列表','admin/rule/member_list',1,'on',10,'','list'),(16,13,11,4,'添加子节点','admin/rule/add_rule',1,'on',10,'','right'),(17,13,11,4,'修改节点','admin/rule/edit_rule',1,'on',10,'','right'),(18,13,11,4,'删除节点','admin/rule/del_rule',1,'on',10,'','right'),(19,14,11,4,'添加分组','admin/rule/add_group',1,'on',10,'','bottom'),(20,14,11,4,'修改分组','admin/rule/edit_group',1,'on',10,'','right'),(21,15,11,4,'用户赋权限','admin/rule/member_power',1,'on',10,'','right'),(22,14,11,4,'删除分组','admin/rule/del_group',1,'on',10,'','right'),(23,14,11,4,'权限','admin/rule/power',1,'on',10,'','right'),(24,15,11,4,'添加管理员','admin/rule/add_member',1,'on',10,'','bottom'),(25,15,11,4,'修改管理员','admin/rule/edit_member',1,'on',10,'','right'),(26,15,11,4,'删除','admin/rule/del_member',1,'on',10,'','right'),(33,13,11,4,'添加节点','admin/rule/create',1,'on',10,'','bottom'),(34,13,11,4,'更新排序','admin/rule/updatesort',1,'on',10,'','bottom'),(35,14,11,4,'更新排序','admin/group/updatesort',1,'on',10,'','bottom'),(53,0,53,1,'资讯管理','news',1,'on',10,'','list'),(54,53,53,2,'资讯管理','admin/news',1,'on',10,'','list'),(55,54,53,3,'资讯列表','admin/news/news_list',1,'on',10,'','list'),(56,55,53,4,'添加资讯','admin/news/add_news',1,'on',10,'','right'),(57,55,53,4,'删除','admin/news/del_news',1,'on',10,'','right'),(58,55,53,4,'修改','admin/news/edit_news',1,'on',10,'','right'),(59,55,53,4,'上传图片','admin/news/upload',1,'on',10,'','right'),(60,0,60,1,'会员库','user',1,'on',10,'','list'),(61,60,60,2,'会员列表','admin/user',1,'on',10,'','list'),(62,61,60,3,'人才列表','admin/user/person',1,'on',10,'','list'),(63,61,60,3,'建企列表','admin/user/company',1,'on',10,'','list'),(64,61,60,3,'猎头列表','admin/user/headhunt',1,'on',10,'','list'),(65,62,60,4,'添加','admin/user/add_person',1,'on',10,'','right'),(66,62,60,4,'修改','admin/user/edit_person',1,'on',10,'','right'),(67,62,60,4,'删除','admin/user/del_person',1,'on',10,'','right'),(68,63,60,4,'添加','admin/user/add_company',1,'on',10,'','right'),(69,63,60,4,'修改','admin/user/edit_company',1,'on',10,'','right'),(70,63,60,4,'删除','admin/user/del_company',1,'on',10,'','right'),(71,64,60,4,'添加','admin/user/add_headhunt',1,'on',10,'','right'),(72,64,60,4,'修改','admin/user/edit_headhunt',1,'on',10,'','right'),(73,64,60,4,'删除','admin/user/del_headhunt',1,'on',10,'','right'),(75,0,75,1,'简历-招聘','invite',1,'on',10,'','list'),(76,75,75,2,'简历管理','admin/resume',1,'on',10,'','list'),(77,75,75,2,'招聘管理','admin/invite',1,'on',10,'','list'),(78,76,75,3,'兼职简历','admin/resume/part',1,'on',10,'','list'),(79,76,75,3,'全职简历','admin/resume/full',1,'on',10,'','list'),(80,77,75,3,'兼职招聘','admin/invite/part',1,'on',10,'','list'),(82,77,75,3,'全职招聘','admin/invite/full',1,'on',10,'','list'),(83,55,53,4,'推荐','admin/news/recommend',1,'on',10,'','right');

/*Table structure for table `app_city` */

DROP TABLE IF EXISTS `app_city`;

CREATE TABLE `app_city` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(120) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3410 DEFAULT CHARSET=utf8;

/*Data for the table `app_city` */

insert  into `app_city`(`id`,`pid`,`name`,`type`) values (2,1,'北京',1),(3,1,'安徽',1),(4,1,'福建',1),(5,1,'甘肃',1),(6,1,'广东',1),(7,1,'广西',1),(8,1,'贵州',1),(9,1,'海南',1),(10,1,'河北',1),(11,1,'河南',1),(12,1,'黑龙江',1),(13,1,'湖北',1),(14,1,'湖南',1),(15,1,'吉林',1),(16,1,'江苏',1),(17,1,'江西',1),(18,1,'辽宁',1),(19,1,'内蒙古',1),(20,1,'宁夏',1),(21,1,'青海',1),(22,1,'山东',1),(23,1,'山西',1),(24,1,'陕西',1),(25,1,'上海',1),(26,1,'四川',1),(27,1,'天津',1),(28,1,'西藏',1),(29,1,'新疆',1),(30,1,'云南',1),(31,1,'浙江',1),(32,1,'重庆',1),(33,1,'香港',1),(34,1,'澳门',1),(35,1,'台湾',1),(36,3,'安庆',2),(37,3,'蚌埠',2),(38,3,'巢湖',2),(39,3,'池州',2),(40,3,'滁州',2),(41,3,'阜阳',2),(42,3,'淮北',2),(43,3,'淮南',2),(44,3,'黄山',2),(45,3,'六安',2),(46,3,'马鞍山',2),(47,3,'宿州',2),(48,3,'铜陵',2),(49,3,'芜湖',2),(50,3,'宣城',2),(51,3,'亳州',2),(53,4,'福州',2),(54,4,'龙岩',2),(55,4,'南平',2),(56,4,'宁德',2),(57,4,'莆田',2),(58,4,'泉州',2),(59,4,'三明',2),(60,4,'厦门',2),(61,4,'漳州',2),(62,5,'兰州',2),(63,5,'白银',2),(64,5,'定西',2),(65,5,'甘南',2),(66,5,'嘉峪关',2),(67,5,'金昌',2),(68,5,'酒泉',2),(69,5,'临夏',2),(70,5,'陇南',2),(71,5,'平凉',2),(72,5,'庆阳',2),(73,5,'天水',2),(74,5,'武威',2),(75,5,'张掖',2),(76,6,'广州',2),(77,6,'深圳',2),(78,6,'潮州',2),(79,6,'东莞',2),(80,6,'佛山',2),(81,6,'河源',2),(82,6,'惠州',2),(83,6,'江门',2),(84,6,'揭阳',2),(85,6,'茂名',2),(86,6,'梅州',2),(87,6,'清远',2),(88,6,'汕头',2),(89,6,'汕尾',2),(90,6,'韶关',2),(91,6,'阳江',2),(92,6,'云浮',2),(93,6,'湛江',2),(94,6,'肇庆',2),(95,6,'中山',2),(96,6,'珠海',2),(97,7,'南宁',2),(98,7,'桂林',2),(99,7,'百色',2),(100,7,'北海',2),(101,7,'崇左',2),(102,7,'防城港',2),(103,7,'贵港',2),(104,7,'河池',2),(105,7,'贺州',2),(106,7,'来宾',2),(107,7,'柳州',2),(108,7,'钦州',2),(109,7,'梧州',2),(110,7,'玉林',2),(111,8,'贵阳',2),(112,8,'安顺',2),(113,8,'毕节',2),(114,8,'六盘水',2),(115,8,'黔东南',2),(116,8,'黔南',2),(117,8,'黔西南',2),(118,8,'铜仁',2),(119,8,'遵义',2),(120,9,'海口',2),(121,9,'三亚',2),(122,9,'白沙',2),(123,9,'保亭',2),(124,9,'昌江',2),(125,9,'澄迈县',2),(126,9,'定安县',2),(127,9,'东方',2),(128,9,'乐东',2),(129,9,'临高县',2),(130,9,'陵水',2),(131,9,'琼海',2),(132,9,'琼中',2),(133,9,'屯昌县',2),(134,9,'万宁',2),(135,9,'文昌',2),(136,9,'五指山',2),(137,9,'儋州',2),(138,10,'石家庄',2),(139,10,'保定',2),(140,10,'沧州',2),(141,10,'承德',2),(142,10,'邯郸',2),(143,10,'衡水',2),(144,10,'廊坊',2),(145,10,'秦皇岛',2),(146,10,'唐山',2),(147,10,'邢台',2),(148,10,'张家口',2),(149,11,'郑州',2),(150,11,'洛阳',2),(151,11,'开封',2),(152,11,'安阳',2),(153,11,'鹤壁',2),(154,11,'济源',2),(155,11,'焦作',2),(156,11,'南阳',2),(157,11,'平顶山',2),(158,11,'三门峡',2),(159,11,'商丘',2),(160,11,'新乡',2),(161,11,'信阳',2),(162,11,'许昌',2),(163,11,'周口',2),(164,11,'驻马店',2),(165,11,'漯河',2),(166,11,'濮阳',2),(167,12,'哈尔滨',2),(168,12,'大庆',2),(169,12,'大兴安岭',2),(170,12,'鹤岗',2),(171,12,'黑河',2),(172,12,'鸡西',2),(173,12,'佳木斯',2),(174,12,'牡丹江',2),(175,12,'七台河',2),(176,12,'齐齐哈尔',2),(177,12,'双鸭山',2),(178,12,'绥化',2),(179,12,'伊春',2),(180,13,'武汉',2),(181,13,'仙桃',2),(182,13,'鄂州',2),(183,13,'黄冈',2),(184,13,'黄石',2),(185,13,'荆门',2),(186,13,'荆州',2),(187,13,'潜江',2),(188,13,'神农架林区',2),(189,13,'十堰',2),(190,13,'随州',2),(191,13,'天门',2),(192,13,'咸宁',2),(193,13,'襄樊',2),(194,13,'孝感',2),(195,13,'宜昌',2),(196,13,'恩施',2),(197,14,'长沙',2),(198,14,'张家界',2),(199,14,'常德',2),(200,14,'郴州',2),(201,14,'衡阳',2),(202,14,'怀化',2),(203,14,'娄底',2),(204,14,'邵阳',2),(205,14,'湘潭',2),(206,14,'湘西',2),(207,14,'益阳',2),(208,14,'永州',2),(209,14,'岳阳',2),(210,14,'株洲',2),(211,15,'长春',2),(212,15,'吉林',2),(213,15,'白城',2),(214,15,'白山',2),(215,15,'辽源',2),(216,15,'四平',2),(217,15,'松原',2),(218,15,'通化',2),(219,15,'延边',2),(220,16,'南京',2),(221,16,'苏州',2),(222,16,'无锡',2),(223,16,'常州',2),(224,16,'淮安',2),(225,16,'连云港',2),(226,16,'南通',2),(227,16,'宿迁',2),(228,16,'泰州',2),(229,16,'徐州',2),(230,16,'盐城',2),(231,16,'扬州',2),(232,16,'镇江',2),(233,17,'南昌',2),(234,17,'抚州',2),(235,17,'赣州',2),(236,17,'吉安',2),(237,17,'景德镇',2),(238,17,'九江',2),(239,17,'萍乡',2),(240,17,'上饶',2),(241,17,'新余',2),(242,17,'宜春',2),(243,17,'鹰潭',2),(244,18,'沈阳',2),(245,18,'大连',2),(246,18,'鞍山',2),(247,18,'本溪',2),(248,18,'朝阳',2),(249,18,'丹东',2),(250,18,'抚顺',2),(251,18,'阜新',2),(252,18,'葫芦岛',2),(253,18,'锦州',2),(254,18,'辽阳',2),(255,18,'盘锦',2),(256,18,'铁岭',2),(257,18,'营口',2),(258,19,'呼和浩特',2),(259,19,'阿拉善盟',2),(260,19,'巴彦淖尔盟',2),(261,19,'包头',2),(262,19,'赤峰',2),(263,19,'鄂尔多斯',2),(264,19,'呼伦贝尔',2),(265,19,'通辽',2),(266,19,'乌海',2),(267,19,'乌兰察布市',2),(268,19,'锡林郭勒盟',2),(269,19,'兴安盟',2),(270,20,'银川',2),(271,20,'固原',2),(272,20,'石嘴山',2),(273,20,'吴忠',2),(274,20,'中卫',2),(275,21,'西宁',2),(276,21,'果洛',2),(277,21,'海北',2),(278,21,'海东',2),(279,21,'海南',2),(280,21,'海西',2),(281,21,'黄南',2),(282,21,'玉树',2),(283,22,'济南',2),(284,22,'青岛',2),(285,22,'滨州',2),(286,22,'德州',2),(287,22,'东营',2),(288,22,'菏泽',2),(289,22,'济宁',2),(290,22,'莱芜',2),(291,22,'聊城',2),(292,22,'临沂',2),(293,22,'日照',2),(294,22,'泰安',2),(295,22,'威海',2),(296,22,'潍坊',2),(297,22,'烟台',2),(298,22,'枣庄',2),(299,22,'淄博',2),(300,23,'太原',2),(301,23,'长治',2),(302,23,'大同',2),(303,23,'晋城',2),(304,23,'晋中',2),(305,23,'临汾',2),(306,23,'吕梁',2),(307,23,'朔州',2),(308,23,'忻州',2),(309,23,'阳泉',2),(310,23,'运城',2),(311,24,'西安',2),(312,24,'安康',2),(313,24,'宝鸡',2),(314,24,'汉中',2),(315,24,'商洛',2),(316,24,'铜川',2),(317,24,'渭南',2),(318,24,'咸阳',2),(319,24,'延安',2),(320,24,'榆林',2),(321,25,'上海',2),(322,26,'成都',2),(323,26,'绵阳',2),(324,26,'阿坝',2),(325,26,'巴中',2),(326,26,'达州',2),(327,26,'德阳',2),(328,26,'甘孜',2),(329,26,'广安',2),(330,26,'广元',2),(331,26,'乐山',2),(332,26,'凉山',2),(333,26,'眉山',2),(334,26,'南充',2),(335,26,'内江',2),(336,26,'攀枝花',2),(337,26,'遂宁',2),(338,26,'雅安',2),(339,26,'宜宾',2),(340,26,'资阳',2),(341,26,'自贡',2),(342,26,'泸州',2),(343,27,'天津',2),(344,28,'拉萨',2),(345,28,'阿里',2),(346,28,'昌都',2),(347,28,'林芝',2),(348,28,'那曲',2),(349,28,'日喀则',2),(350,28,'山南',2),(351,29,'乌鲁木齐',2),(352,29,'阿克苏',2),(353,29,'阿拉尔',2),(354,29,'巴音郭楞',2),(355,29,'博尔塔拉',2),(356,29,'昌吉',2),(357,29,'哈密',2),(358,29,'和田',2),(359,29,'喀什',2),(360,29,'克拉玛依',2),(361,29,'克孜勒苏',2),(362,29,'石河子',2),(363,29,'图木舒克',2),(364,29,'吐鲁番',2),(365,29,'五家渠',2),(366,29,'伊犁',2),(367,30,'昆明',2),(368,30,'怒江',2),(369,30,'普洱',2),(370,30,'丽江',2),(371,30,'保山',2),(372,30,'楚雄',2),(373,30,'大理',2),(374,30,'德宏',2),(375,30,'迪庆',2),(376,30,'红河',2),(377,30,'临沧',2),(378,30,'曲靖',2),(379,30,'文山',2),(380,30,'西双版纳',2),(381,30,'玉溪',2),(382,30,'昭通',2),(383,31,'杭州',2),(384,31,'湖州',2),(385,31,'嘉兴',2),(386,31,'金华',2),(387,31,'丽水',2),(388,31,'宁波',2),(389,31,'绍兴',2),(390,31,'台州',2),(391,31,'温州',2),(392,31,'舟山',2),(393,31,'衢州',2),(394,32,'重庆',2),(395,33,'香港',2),(396,34,'澳门',2),(397,35,'台湾',2),(500,2,'东城区',2),(501,2,'西城区',2),(502,2,'海淀区',2),(503,2,'朝阳区',2),(504,2,'崇文区',2),(505,2,'宣武区',2),(506,2,'丰台区',2),(507,2,'石景山区',2),(508,2,'房山区',2),(509,2,'门头沟区',2),(510,2,'通州区',2),(511,2,'顺义区',2),(512,2,'昌平区',2),(513,2,'怀柔区',2),(514,2,'平谷区',2),(515,2,'大兴区',2),(516,2,'密云县',2),(517,2,'延庆县',2),(3401,3,'合肥',2),(3409,0,'国外',0);

/*Table structure for table `app_company` */

DROP TABLE IF EXISTS `app_company`;

CREATE TABLE `app_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '公司资料表',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `company_name` varchar(255) NOT NULL COMMENT '公司名称',
  `company_scale` tinyint(4) NOT NULL COMMENT '公司规模',
  `contact` varchar(50) NOT NULL COMMENT '联系人',
  `tel` bigint(11) NOT NULL COMMENT '联系电话',
  `province` varchar(50) NOT NULL COMMENT '所在省',
  `city` varchar(50) NOT NULL COMMENT '所在市',
  `address` varchar(255) NOT NULL COMMENT '详细地址',
  `intro` varchar(255) NOT NULL COMMENT '公司简介',
  `img` varchar(255) NOT NULL COMMENT 'logo',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `app_company` */

insert  into `app_company`(`id`,`user_id`,`company_name`,`company_scale`,`contact`,`tel`,`province`,`city`,`address`,`intro`,`img`,`update_time`,`create_time`) values (11,93,'北京点能达科技有限公司',1,'高胜亮',15210679468,'2','503','高碑店12312','阿斯顿发送到发送到发送到发','/upload/user/b_01.jpg',1547615515,1547615515);

/*Table structure for table `app_headhunt` */

DROP TABLE IF EXISTS `app_headhunt`;

CREATE TABLE `app_headhunt` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '公司资料表',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `company_name` varchar(255) NOT NULL COMMENT '公司名称',
  `company_scale` tinyint(4) NOT NULL COMMENT '公司规模',
  `contact` varchar(50) NOT NULL COMMENT '联系人',
  `tel` bigint(11) NOT NULL COMMENT '联系电话',
  `province` int(10) NOT NULL COMMENT '所在省',
  `city` int(10) NOT NULL COMMENT '所在市',
  `address` varchar(255) NOT NULL COMMENT '详细地址',
  `intro` varchar(255) NOT NULL COMMENT '公司简介',
  `img` varchar(255) NOT NULL COMMENT 'logo',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `app_headhunt` */

insert  into `app_headhunt`(`id`,`user_id`,`company_name`,`company_scale`,`contact`,`tel`,`province`,`city`,`address`,`intro`,`img`,`update_time`,`create_time`) values (12,99,'北京点能达科技有限公司',2,'高胜亮1',15210679468,2,503,'高碑店12312','发大事发生的发生','/upload/user/b_01.jpg',1547615640,1547615640);

/*Table structure for table `app_hooks` */

DROP TABLE IF EXISTS `app_hooks`;

CREATE TABLE `app_hooks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `name` varchar(40) NOT NULL DEFAULT '' COMMENT '钩子名称',
  `description` text COMMENT '描述',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '类型',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `addons` varchar(255) NOT NULL DEFAULT '' COMMENT '钩子挂载的插件 ''，''分割',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_hooks` */

insert  into `app_hooks`(`id`,`name`,`description`,`type`,`update_time`,`addons`,`status`) values (17,'pageHeader',NULL,1,0,'Example1',1);

/*Table structure for table `app_invite_full` */

DROP TABLE IF EXISTS `app_invite_full`;

CREATE TABLE `app_invite_full` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '全职招聘信息',
  `type` tinyint(4) NOT NULL COMMENT '1是人才 2是建企 3是猎头',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `phone` bigint(11) NOT NULL COMMENT '手机号',
  `cat` tinyint(4) NOT NULL COMMENT '职位类别（全职只有一层）',
  `work_years` tinyint(4) NOT NULL COMMENT '工作年限',
  `education` tinyint(4) NOT NULL COMMENT '学历',
  `intro` varchar(1024) NOT NULL COMMENT '职位描述',
  `work_province` varchar(30) NOT NULL COMMENT '工作省份',
  `work_city` varchar(30) NOT NULL COMMENT '工作市',
  `salary` tinyint(4) NOT NULL COMMENT '薪资',
  `scan` int(10) NOT NULL DEFAULT '0' COMMENT '浏览',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为未审核 2为已审核',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `app_invite_full` */

insert  into `app_invite_full`(`id`,`type`,`title`,`user_id`,`phone`,`cat`,`work_years`,`education`,`intro`,`work_province`,`work_city`,`salary`,`scan`,`status`,`update_time`,`create_time`) values (2,2,'全职招聘222',93,13911074975,2,2,2,'大大沙发沙发','28','346',4,3,2,1547782725,1547782596),(3,2,'全职招聘3333',93,13911074975,2,2,1,'阿萨德法师发放','2','501',3,0,2,1547782724,1547782619),(4,2,'全职招聘444',93,13911074975,2,2,1,'阿斯顿发送到发斯蒂芬','2','500',4,0,2,1547782723,1547782653),(5,2,'全职招聘555',93,13911074975,1,1,2,'打发第三方','2','500',2,0,2,1547782722,1547782682),(6,2,'全职招聘111',93,13911074975,2,4,2,'大法师打发斯蒂芬','3','41',5,4,2,1547794719,1547794501);

/*Table structure for table `app_invite_part` */

DROP TABLE IF EXISTS `app_invite_part`;

CREATE TABLE `app_invite_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '兼职招聘信息',
  `type` tinyint(4) NOT NULL COMMENT '1是人才 2是建企 3是猎头',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `phone` bigint(11) NOT NULL COMMENT '手机号',
  `call` varchar(30) NOT NULL COMMENT '称呼',
  `company_name` varchar(255) NOT NULL COMMENT '公司名称',
  `cat_one` tinyint(4) NOT NULL COMMENT '职位类别第一层',
  `cat_two` tinyint(4) NOT NULL COMMENT '职位类别第二层',
  `salary` tinyint(4) NOT NULL COMMENT '薪资',
  `company_province` varchar(50) NOT NULL COMMENT '公司所在省',
  `company_city` varchar(50) NOT NULL COMMENT '公司所在市',
  `intro` varchar(1024) NOT NULL COMMENT '特殊需求',
  `scan` int(10) NOT NULL DEFAULT '0' COMMENT '浏览',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1未审核 2已审核',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `app_invite_part` */

insert  into `app_invite_part`(`id`,`type`,`title`,`user_id`,`phone`,`call`,`company_name`,`cat_one`,`cat_two`,`salary`,`company_province`,`company_city`,`intro`,`scan`,`status`,`update_time`,`create_time`) values (1,2,NULL,93,13911074975,'白建伟','北京点能达科技有限公司',1,1,2,'2','512','阿斯顿发送到发斯蒂芬',0,2,1547784276,1547784147),(2,2,NULL,93,13911074975,'白建伟','点能达111',2,1,3,'2','503','阿斯顿发送到发顺丰的',0,2,1547784275,1547784179),(3,2,NULL,93,13911074975,'白建伟','点能达222',3,1,3,'2','512','阿斯顿发顺丰大撒地方',0,2,1547784274,1547784209),(4,2,NULL,93,13911074975,'白建伟','点能达333',1,1,4,'2','503','阿斯顿发顺丰大',0,2,1547784273,1547784238),(5,2,NULL,93,13911074975,'白建伟','点能达444',1,2,3,'2','514','大沙发沙发',1,2,1547784272,1547784265),(6,2,'标题标题标题标题2',93,13911074975,'白建伟','北京点能达科技有限公司',1,2,4,'5','63','大事发生的发生地方',0,1,1547794315,1547794315);

/*Table structure for table `app_member` */

DROP TABLE IF EXISTS `app_member`;

CREATE TABLE `app_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` tinyint(4) unsigned NOT NULL COMMENT '分组id',
  `account` varchar(32) NOT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `tel` varchar(11) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `nickname` varchar(32) NOT NULL,
  `status` enum('on','off') NOT NULL DEFAULT 'on',
  `time` int(10) NOT NULL COMMENT '注册时间',
  `last_log_time` int(10) NOT NULL COMMENT '上次登录时间',
  `num` int(10) DEFAULT NULL,
  `recycle` enum('on','off') NOT NULL DEFAULT 'on',
  `sort` int(11) NOT NULL DEFAULT '10',
  `last_log_ip` varchar(32) DEFAULT NULL,
  `update_time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_member` */

insert  into `app_member`(`id`,`gid`,`account`,`pass`,`tel`,`email`,`nickname`,`status`,`time`,`last_log_time`,`num`,`recycle`,`sort`,`last_log_ip`,`update_time`) values (1,1,'admin','e8567dbe206e0240e06f1edde026be3a','13911074975',NULL,'超级管理员','on',1426641072,1546416223,1606,'on',0,'127.0.0.1',NULL),(2,4,'baishuo','a3a25e7edecca31dc81647f3534b9852','',NULL,'baishuo','on',0,0,NULL,'on',10,NULL,NULL);

/*Table structure for table `app_member_active` */

DROP TABLE IF EXISTS `app_member_active`;

CREATE TABLE `app_member_active` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '后台账户操作记录',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1确认付款2退卡3续费4换手机号',
  `uid` int(10) NOT NULL DEFAULT '0' COMMENT '操作员id',
  `vip_id` int(10) NOT NULL DEFAULT '0' COMMENT 'vipid',
  `ramark` text NOT NULL COMMENT '备注',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `app_member_active` */

/*Table structure for table `app_member_behavior` */

DROP TABLE IF EXISTS `app_member_behavior`;

CREATE TABLE `app_member_behavior` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) DEFAULT NULL,
  `account` varchar(64) DEFAULT NULL,
  `msg` text NOT NULL,
  `time` int(10) NOT NULL,
  `ip` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=174637 DEFAULT CHARSET=utf8;

/*Data for the table `app_member_behavior` */

insert  into `app_member_behavior`(`id`,`user`,`account`,`msg`,`time`,`ip`) values (174574,'超级管理员','admin','添加节点：用户管理',1543484931,'127.0.0.1'),(174575,'超级管理员','admin','添加节点：人才管理',1543485081,'127.0.0.1'),(174576,'超级管理员','admin','添加节点：猎头管理',1543485145,'127.0.0.1'),(174577,'超级管理员','admin','添加节点：公司管理',1543485173,'127.0.0.1'),(174578,'超级管理员','admin','修改节点：人才管理',1543485193,'127.0.0.1'),(174579,'超级管理员','admin','修改节点：人才管理',1543485203,'127.0.0.1'),(174580,'超级管理员','admin','修改节点：猎头管理',1543485260,'127.0.0.1'),(174581,'超级管理员','admin','修改节点：公司管理',1543485270,'127.0.0.1'),(174582,'超级管理员','admin','修改节点：人才管理',1543485615,'127.0.0.1'),(174583,'超级管理员','admin','添加节点：人才列表',1543485632,'127.0.0.1'),(174584,'超级管理员','admin','修改节点：人才列表',1543485710,'127.0.0.1'),(174585,'登陆','admin','账号 [admin] 登陆系统',1543496986,'127.0.0.1'),(174586,'超级管理员','admin','修改节点：人才列表',1543497606,'127.0.0.1'),(174587,'超级管理员','admin','修改节点：人才列表',1543497639,'127.0.0.1'),(174588,'超级管理员','admin','添加节点：添加人才',1543497663,'127.0.0.1'),(174589,'超级管理员','admin','修改节点：删除',1543497731,'127.0.0.1'),(174590,'超级管理员','admin','修改节点：人才列表',1543497888,'127.0.0.1'),(174591,'超级管理员','admin','添加节点：删除',1543497908,'127.0.0.1'),(174592,'登陆','admin','账号 [admin] 登陆系统',1543542988,'127.0.0.1'),(174593,'登陆','admin','账号 [admin] 登陆系统',1543552151,'127.0.0.1'),(174594,'登陆','admin','账号 [admin] 登陆系统',1543553151,'127.0.0.1'),(174595,'登陆','admin','账号 [admin] 登陆系统',1543556764,'127.0.0.1'),(174596,'尝试登陆','null','尝试账号 [root] ，尝试密码 [112112]',1543895610,'127.0.0.1'),(174597,'登陆','admin','账号 [admin] 登陆系统',1543895617,'127.0.0.1'),(174598,'超级管理员','admin','添加节点：咨询管理',1543895621,'127.0.0.1'),(174599,'超级管理员','admin','修改节点：资讯管理',1543895646,'127.0.0.1'),(174600,'超级管理员','admin','添加节点：资讯管理',1543896103,'127.0.0.1'),(174601,'超级管理员','admin','添加节点：资讯列表',1543896133,'127.0.0.1'),(174602,'超级管理员','admin','添加节点：添加',1543896585,'127.0.0.1'),(174603,'超级管理员','admin','修改节点：添加资讯',1543896617,'127.0.0.1'),(174604,'超级管理员','admin','修改节点：添加',1543896634,'127.0.0.1'),(174605,'超级管理员','admin','修改节点：添加',1543896649,'127.0.0.1'),(174606,'超级管理员','admin','修改节点：添加',1543897589,'127.0.0.1'),(174607,'超级管理员','admin','修改节点：添加',1543897794,'127.0.0.1'),(174608,'超级管理员','admin','修改节点：添加',1543897807,'127.0.0.1'),(174609,'超级管理员','admin','修改节点：添加',1543897822,'127.0.0.1'),(174610,'超级管理员','admin','修改节点：添加资讯',1543897831,'127.0.0.1'),(174611,'登陆','admin','账号 [admin] 登陆系统',1543985539,'127.0.0.1'),(174612,'登陆','admin','账号 [admin] 登陆系统',1543990173,'127.0.0.1'),(174613,'超级管理员','admin','添加节点：删除',1543993941,'127.0.0.1'),(174614,'超级管理员','admin','添加节点：asdf',1543994732,'127.0.0.1'),(174615,'超级管理员','admin','删除 [auth_rule] 表中的：1条数据',1543994744,'127.0.0.1'),(174616,'超级管理员','admin','添加节点：修改',1543995074,'127.0.0.1'),(174617,'超级管理员','admin','修改节点：修改',1543995262,'127.0.0.1'),(174618,'超级管理员','admin','修改节点：修改',1543995370,'127.0.0.1'),(174619,'超级管理员','admin','修改节点：添加资讯',1543996483,'127.0.0.1'),(174620,'登陆','admin','账号 [admin] 登陆系统',1544074003,'127.0.0.1'),(174621,'登陆','admin','账号 [admin] 登陆系统',1544089407,'127.0.0.1'),(174622,'尝试登陆','null','尝试账号 [adming] ，尝试密码 [112112]',1544144927,'127.0.0.1'),(174623,'登陆','admin','账号 [admin] 登陆系统',1544144932,'127.0.0.1'),(174624,'超级管理员','admin','删除 [auth_rule] 表中的：1条数据',1544148704,'127.0.0.1'),(174625,'超级管理员','admin','修改节点：公司管理',1544148814,'127.0.0.1'),(174626,'超级管理员','admin','添加节点：建企管理',1544148840,'127.0.0.1'),(174627,'超级管理员','admin','修改节点：建企管理',1544148852,'127.0.0.1'),(174628,'超级管理员','admin','修改节点：建企列表',1544148862,'127.0.0.1'),(174629,'超级管理员','admin','添加节点：修改',1544150141,'127.0.0.1'),(174630,'登陆','admin','账号 [admin] 登陆系统',1544414714,'127.0.0.1'),(174631,'登陆','admin','账号 [admin] 登陆系统',1544513579,'127.0.0.1'),(174632,'登陆','admin','账号 [admin] 登陆系统',1544578195,'127.0.0.1'),(174633,'登陆','admin','账号 [admin] 登陆系统',1546392763,'127.0.0.1'),(174634,'尝试登陆','null','尝试账号 [1391107497] ，尝试密码 [Bjw60962731]',1546415166,'127.0.0.1'),(174635,'尝试登陆','null','尝试账号 [1391107497] ，尝试密码 [Bjw60962731]',1546415238,'127.0.0.1'),(174636,'登陆','admin','账号 [admin] 登陆系统',1546416223,'127.0.0.1');

/*Table structure for table `app_member_ship` */

DROP TABLE IF EXISTS `app_member_ship`;

CREATE TABLE `app_member_ship` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '会员表的id',
  `name` varchar(32) NOT NULL COMMENT '真是姓名',
  `sex` enum('男','女') NOT NULL DEFAULT '男',
  `photo` varchar(64) NOT NULL COMMENT '用户头像',
  `signature` varchar(128) NOT NULL COMMENT '个性签名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_member_ship` */

/*Table structure for table `app_news` */

DROP TABLE IF EXISTS `app_news`;

CREATE TABLE `app_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` int(10) DEFAULT NULL COMMENT '管理员id',
  `type` tinyint(4) NOT NULL COMMENT '1为政策解读 2为资质行情 3为职场资讯',
  `title` varchar(125) NOT NULL COMMENT '标题',
  `description` varchar(255) NOT NULL COMMENT '描述',
  `keywords` varchar(255) NOT NULL COMMENT '关键字',
  `author` varchar(30) NOT NULL COMMENT '作者',
  `img` varchar(255) NOT NULL COMMENT '封面图',
  `content` text NOT NULL COMMENT '内容',
  `recommend` tinyint(4) DEFAULT '1' COMMENT '1为不推荐，2为推荐',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8;

/*Data for the table `app_news` */

insert  into `app_news`(`id`,`mid`,`type`,`title`,`description`,`keywords`,`author`,`img`,`content`,`recommend`,`update_time`,`create_time`) values (110,1,1,'江苏省住建厅:总承包企业覆盖范围内可直接承揽专包工程!','为进一步落实建筑业“放管服”改革要求，推动建筑业快速发展，根据《国务院办公厅关于促进建筑业持续健康发展的意见》（国办发〔2017〕19号）“选择部分地区开展试点，对信用良好、具有相关专业技术能力、能够提供足额担保的企业，在其资质类别内放宽承揽业务范围限制”','专包工程','wwwww','/upload/news/chinasbzx.com_cert.png','<p>　江苏省住房和城乡建设厅关于试行调整部分建筑业企业资质承包工程范围的通知</p><p>　　为进一步落实建筑业“放管服”改革要求，推动建筑业快速发展，根据《国务院办公厅关于促进建筑业持续健康发展的意见》（国办发〔2017〕19号）“选择部分地区开展试点，对信用良好、具有相关专业技术能力、能够提供足额担保的企业，在其资质类别内放宽承揽业务范围限制”，《省政府关于促进建筑业改革发展的意见》（苏政发〔2017〕151号）“扩大承接业务范围，对信誉良好、具有相关专业技术能力、能够提供足额担保的企业，允许其在资质类别内承接高一等级资质相应的业务”、“取得施工总承包资质的企业，可以承接总承包资质覆盖范围内的专业承包工程”的精神，按照住房城乡建设部关于在我省开展建筑业改革综合试点的要求，现就我省试行调整部分建筑业企业资质承包工程范围事宜通知如下：</p><p>　　NO.1：调整部分专业承包资质承包工程范围　　先行在不涉及建筑主体结构的部分二级专业承包资质中调整承包工程的范围。　　符合下列条件的二级专业承包资质企业可以承接一级资质相应的业务。</p><p>　　（一）试行资质类别　　电子与智能化工程专业承包、防水防腐保温工程专业承包、城市及道路照明工程专业承包、环保工程专业承包。　　（二）企业信誉良好　　自2017年11月24日《省政府关于促进建筑业改革发展的意见》（苏政发〔2017〕151号）实施之日起无下列行为：</p><p>　　1．因拖欠民工工资被县级以上建设行政主管部门通报的；</p><p>　　2．因违反建筑市场相关规定被县级以上建设行政主管部门行政处罚或者限制市场准入的。　　试行期间，企业发生上述情形的，从通报或者决定作出之日起，在纠正违法行为，消除不良影响，恢复信用前，不得承接新的试点工程。　　（三）具有相关专业技术能力　　项目负责人具备拟承接工程所需的相应专业的注册建造师资格，并主持完成过本类别资质二级以上标准要求的工程业绩不少于2项；企业近5年内承担过本类别资质二级以上标准要求的工程业绩不少于2类。未发生过质量安全事故，且上述业绩已在全国建筑市场监管公共服务平台备案。　　（四）能够提供足额履约担保　　企业以银行担保、保证保险等方式提供合同总价10%的履约担保。　　发包单位在发包相应专业工程业务时，对企业是否具备上述条件进行审查，并对审查结果负责。发包单位不得拒绝符合上述条件的企业承揽相应工程业务。　　NO.2：取得施工总承包资质的企业，可以承接总承包资质覆盖范围内的专业承包工程　　（一）试行资质类别　　具有建筑工程、市政公用工程、机电工程施工总承包资质的企业，可以对总承包范围内不高于总承包资质等级的专业承包工程自行施工，不再需要具备相应的专业承包工程资质；也可以将专业承包工程依法分包给具有相应资质的专业承包企业。　　（二）总承包资质覆盖范围　　1．建筑工程施工总承包资质：覆盖地基基础工程、起重设备安装工程、电子与智能化工程、消防设施工程、建筑装修装饰工程、建筑机电安装工程、建筑幕墙工程专业承包资质的工程范围；　　2．市政公用工程施工总承包资质：覆盖城市及道路照明工程、桥梁工程、隧道工程、环保工程、机场场道工程专业承包资质的工程范围；　　3．机电工程施工总承包资质：覆盖起重设备安装工程、建筑机电安装工程专业承包资质的工程范围。　　上述三类施工总承包资质均覆盖总承包范围内的防水防腐保温工程、特种工程、模板脚手架专业承包工程。　　（三）具有施工总承包资质的企业，未取得覆盖范围内的专业承包资质，不得承接其他施工总承包企业依法分包的专业工程或者建设单位依法发包的专业工程。　　NO.3：其他事宜　　（一）各地建设主管部门要对本通知试行的情况进行重点跟踪，强化对试点工程项目的工程质量和安全监督管理，督促工程建设各方主体责任落实到位。　　（二）本试行办法自2019年3月1日起试行。试行过程中，省住房和城乡建设厅将根据试行情况和国家工程审批制度改革以及资质管理制度改革的要求，对本试行办法进行调整或者终止试行。</p>',1,NULL,1547717276),(111,1,2,'2019年注册监理工程师挂靠价格一年多少钱?','   有人说监理工程师证书是建筑行业最不值钱的证书，也有人说监理工程师前途光明，监理工程师证书含金量一直在提升，监理工程师挂靠多少钱一年?是否值钱呢?','注册监理工程师挂靠价格一年多少钱?','eeee','/upload/news/20190110094808_95148.jpg','<p><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;&nbsp;&nbsp; 有人说监理工程师证书是建筑行业最不值钱的证书，也有人说监理工程师前途光明，监理工程师证书含金量一直在提升，监理工程师挂靠多少钱一年?是否值钱呢?</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; &nbsp;&nbsp;2019年注册监理工程师挂靠价格一年多少钱?</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;　 &nbsp;建设部监理工程师 3-3.5万/年（挂章+5000）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; &nbsp; 水利部监理工程师 3万/年（总监）5-6千/年（普通不带职称）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; &nbsp; 交通部监理工程师 红本9千/年蓝本6-7千/年</span></p><p><img title=\"1547717609688678.jpg\" alt=\"20190110095343_22547.jpg\" src=\"/upload/ueditor/php/upload/image/20190117/1547717609688678.jpg\"/></p>',1,NULL,1547717625),(112,1,3,'一级建造师中，哪些专业的挂靠价格会上涨?','需求量增加较多。新标准中多个专业要求有机​电一建，需求量自然增加。市政专业一建数量比公路略少，但市政企业远多于公路企业，并且近几年资质审批中，公路资质审批数量也远少于市政资质，东部省份一年能过10多个市政资质，也就过一两个公路资质。','一级建造师','一级建造师','/upload/news/29081547686240.jpg','<h1 style=\"margin: 10px 0px 15px; padding: 0px; text-align: center; color: rgb(85, 85, 85); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: &quot;microsoft yahei&quot;; font-size: 22px; font-style: normal; font-weight: normal; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级建造师中，哪些专业的挂靠价格会上涨?</h1><p>一级建造师中，哪些专业的挂靠价格会上涨?<br/>1、机电市政<br/>需求量增加较多。新标准中多个专业要求有机电一建，需求量自然增加。市政专业一建数量比公路略少，但市政企业远多于公路企业，并且近几年资质审批中，公路资质审批数量也远少于市政资质，东部省份一年能过10多个市政资质，也就过一两个公路资质。市政资质原来不要求本专业一建，现在要求了，市政企业数量众多，要全部换成本专业，需求量也就增加了。<br/>2、公路工程<br/>人数较多的专业，但需求量没有变化。公路新旧资质都要求15个本专业一建，众多资质中，旧标准中公路资质要求本专业。新标准对一建专业要求不变，数量要求不变，需求量就没有什么变化了。<br/>3、水利水电<br/>需求量增加，但不如机电市政多。水利一级原来就要求本专业一建15个，新标准没变化;水利二级资质要求6个一建，但水利二级资质的企业不如市政多，水利一级建造师需求数量增加，但不如机电、市政增幅那么大。<br/>4、建筑工程<br/>需求数量变化不大的热门专业。原标准只是要求一级资质项目经理的数量不能少于12人，不限制专业，但是新标准要求建筑工程一级建造师不少于9人。不过随着房地产市场的发展渐趋稳，房建企业数量新增的速度不会太快。也有部分朋友会犹豫，到底要不要报考一级建造师。如果是行业内的，一建证书是越早拿到越好了，毕竟一建师建筑类职业资格考试，也是从业上岗的必备证书，早点拿到证书就能早点获得高额收入，何乐而不为呢?</p>',1,NULL,1547717959),(113,1,2,'2019年一、二级建造师挂靠价格怎么样?还可观吗?','一、二级建造师挂靠价格一直深受大家关注的，同时建筑行业对一、二级建造师的需求量也很大，一般初入行业的人首选也是考取建造师。那么2019年建造师挂靠价格行情如何呢？','二级建造师​挂靠价格','二级建造师挂靠价格','/upload/news/20190110094808_95148.jpg','<p><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一、二级建造师挂靠价格一直深受大家关注的，同时建筑行业对一、二级建造师的需求量也很大，一般初入行业的人首选也是考取建造师。那么2019年建造师挂靠价格行情如何呢？</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; 2019年</span>一、二级建造师挂靠价格<span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">怎么样?还可观吗?</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; 2019年一级建造师挂靠价格：</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级房建建造师 1.3-1.8万/年（挂章2.5-3）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级机电建造师 2.5-3.5万/年（挂章+0.5-1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级公路建造师 3.5-4.5万/年（挂章+1-1.5）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级市政建造师 3-3.5万/年（挂章+1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级港口航道建造师 5.5-6万/年（挂章+1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级水利水电建造师 4.5-5万/年（挂章+1）</span><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"></span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级矿业建造师 2-3万/年（挂章+1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级铁路工程师 5-6万/年（挂章+1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级通信与广电建造师 3.5-4万/年（挂章+1）</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级民航建造师 10-13万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp; &nbsp; 2019年二级建造师挂靠价格：</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">江苏二级房建 初始6千-7千/年，转注8千-1万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">江苏二级机电 初始1-1.3万/年，转注1.5-2万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">江苏二级市政 初始1-1.3万/年，转注1.5-2.2万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">江苏二级公路 1.5-2万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">江苏二级水利水电 2-2.5万/年</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">一级建造师行业领先级别证书，并且含金量较高，其挂靠价格也是相当可观，但近一两年，由于受226文件影响和专业的限制，市场价格有所波动。但对于每年的一级建造师考试，其通过率相对较低，远远不能满足市场需求。因此，来年一级建造师挂靠价格将不会有下滑趋势，但在一定的范围内有所变化也属于正常现象。&nbsp;</span></p>',1,NULL,1547718056),(114,1,2,'2019年辽宁二建市政挂靠一年多少钱?','  二级建造师这几年在建筑行业中比较吃香，那么每个地区的二级建造师挂靠价格行情是什么样的?大家关心的二级建造师挂靠行情又怎么样了呢?','辽宁二建市政挂靠一年多少钱','方','/upload/news/76621547632294.jpg','<p>&nbsp; 二级建造师这几年在建筑行业中比较吃香，那么每个地区的二级建造师挂靠价格行情是什么样的?大家关心的二级建造师挂靠行情又怎么样了呢?<br/>&nbsp; 2019年辽宁二建市政挂靠一年多少钱?<br/>&nbsp;&nbsp; 辽宁二建市政挂靠价格：5.5-8千/年</p>',2,1547780054,1547718209),(115,1,2,'2019年广西二建市政挂靠价格如何？','   二级建造师是建筑行业很多企业施工单位非常急需的一种证书，那么每个地区的二级建造师挂靠价格不一样这也是由于很多种因素引起的，今天我们要说的地区是广西，2019年广西二建市政挂靠价格。','2019年广西二建市政挂靠价格如何？','sss','/upload/news/42701547705097.jpg','<p>&nbsp;&nbsp; 二级建造师是建筑行业很多企业施工单位非常急需的一种证书，那么每个地区的二级建造师挂靠价格不一样这也是由于很多种因素引起的，今天我们要说的地区是广西，2019年广西二建市政挂靠价格。<br/>&nbsp;&nbsp;&nbsp; 2019年广西二建市政挂靠价格<br/>&nbsp;&nbsp;&nbsp; 广西二建市政挂靠价格：0.93-1.3万/年</p><p></p>',1,NULL,1547718273),(116,1,1,'手握一级建造师证书，可以从事这些职业！','现在越来越多的人考一级建造师证书。大部分人考取这个证书是为了挂靠。但是，考教师资格证这么麻烦要经历报名、复习，考试等等环节。这么麻烦难道只能用来挂靠。下面，小编就来让到手的一级建造师证书，发挥大用处!','一级建造师证书','一级建造师证书','/upload/news/29081547686240.jpg','<p style=\"margin: 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">现在越来越多的人考一级建造师证书。大部分人考取这个证书是为了挂靠。但是，考教师资格证这么麻烦要经历报名、复习，考试等等环节。这么麻烦难道只能用来挂靠。下面，小编就来让到手的一级建造师证书，发挥大用处!</span></p><p><img width=\"300\" class=\"normal\" style=\"margin: 0px auto; border: 0px currentColor; border-image: none; display: block;\" src=\"https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=910965832,1482965638&fm=173&app=49&f=JPEG?w=300&h=200&s=29E5EF065EB227BDFB311F3D0300807C\" data-loaded=\"0\" data-loadfunc=\"0\"/></p><p style=\"margin: 26px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">一、考事业单位</span></span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">公务员竞争压力一直是很大的，想必大家都知道，千里挑一的岗位遍地都是，但是如果岗位中多一项要求，就会减少很多竞争对手，在一些建筑单位，甚至是房建局等，那么有一级建造师证书，你就少了很多竞争对手!</span></p><p><img width=\"297\" class=\"normal\" style=\"margin: 0px auto; border: 0px currentColor; border-image: none; display: block;\" src=\"https://ss1.baidu.com/6ONXsjip0QIZ8tyhnq/it/u=670929391,4046707857&fm=173&app=49&f=JPEG?w=297&h=164&s=BB22698042D2B596DB149DEA03009091\" data-loaded=\"0\" data-loadfunc=\"0\"/></p><p style=\"margin: 26px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">二、职称评审</span></span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">很多考一级建造师证书的考生自身需要职称评审的情况。可能你各项福利待遇都很好，但是对于很多人来说像高级职称还是很困难的。但是，现在很多评审中，证书也是加金的一方面，对于一级建造师证书，帮助评审职称是很好的筹码。</span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">三、办理户口</span></span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">这里说的户口是像北京，上海等大城市的户口，一直是很多人梦寐以求的。毕竟不只是自己，以后自己的家人买房， 孩子读书都是保障所在的。在像上海这样的大城市，对于一级建造师工程师都是有引进的制度，办理户口。</span></p><p><img width=\"450\" class=\"normal\" style=\"margin: 0px auto; border: 0px currentColor; border-image: none; display: block;\" src=\"https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=3331803989,1679408214&fm=173&app=49&f=JPEG?w=450&h=281&s=F7963C8F5AB06DAFF9B5C8E003007033\" data-loaded=\"0\" data-loadfunc=\"0\"/></p><p style=\"margin: 26px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">四、</span><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">一些培训机构</span></span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">现在一级建造师考试还是很热门的。如果能考过一级建造师，自己还可以帮助其他想要考证的人。去一些培训机构，当一个老师，每个月的收入也是过万的。加上证书的挂靠，所以也是妥妥的中薪阶级。</span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"><span class=\"bjh-strong\" style=\"color: rgb(51, 51, 51); font-size: 18px; font-weight: 700;\">五、其他的工作</span><span class=\"bjh-br\"></span></span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">可能，你现在本身就已经有一些工作，或者是即将退休。那么将一级建造师证书以资质的形式，放在一些单位，也不用承担什么风险，一样每个月可以领取薪水。</span></p><p style=\"margin: 22px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\"></span></p><p><img width=\"331\" class=\"normal\" style=\"margin: 0px auto; border: 0px currentColor; border-image: none; display: block;\" src=\"https://ss2.baidu.com/6ONYsjip0QIZ8tyhnq/it/u=2951815835,2597860488&fm=173&app=49&f=JPEG?w=331&h=224&s=E71A77860B224A8E98D9A0D20100C0B1\" data-loaded=\"0\" data-loadfunc=\"0\"/></p><p style=\"margin: 26px 0px 0px; padding: 0px; text-align: justify; color: rgb(51, 51, 51); text-transform: none; line-height: 24px; text-indent: 0px; letter-spacing: normal; font-family: arial; font-size: 16px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\"><span class=\"bjh-p\">其实，说白了，有一级建造师证书，以后不用吃喝范畴了，目前一级建造师证书的待遇等各方面将越来越好，无论怎么样，对于自己都是很大的帮助。不过一级建造师证书也不是那么容易过的，如果没有专业老师辅导，以及科学的学习方法，很多的考生一直难以考过的。所以，报考世纪明德教育培训，19年帮你拿到一建证书。</span></p><p></p>',2,1547780053,1547718337),(117,1,2,'一级建造师中，哪些专业的挂靠价格会上涨?','一级建造师中，哪些专业的挂靠价格会上涨?','挂靠价格','挂靠价格','/upload/news/29081547686240 (1).jpg','<p>一级建造师中，哪些专业的挂靠价格会上涨?<br/>1、机电市政<br/>需求量增加较多。新标准中多个专业要求有机电一建，需求量自然增加。市政专业一建数量比公路略少，但市政企业远多于公路企业，并且近几年资质审批中，公路资质审批数量也远少于市政资质，东部省份一年能过10多个市政资质，也就过一两个公路资质。市政资质原来不要求本专业一建，现在要求了，市政企业数量众多，要全部换成本专业，需求量也就增加了。<br/>2、公路工程<br/>人数较多的专业，但需求量没有变化。公路新旧资质都要求15个本专业一建，众多资质中，旧标准中公路资质要求本专业。新标准对一建专业要求不变，数量要求不变，需求量就没有什么变化了。<br/>3、水利水电<br/>需求量增加，但不如机电市政多。水利一级原来就要求本专业一建15个，新标准没变化;水利二级资质要求6个一建，但水利二级资质的企业不如市政多，水利一级建造师需求数量增加，但不如机电、市政增幅那么大。<br/>4、建筑工程<br/>需求数量变化不大的热门专业。原标准只是要求一级资质项目经理的数量不能少于12人，不限制专业，但是新标准要求建筑工程一级建造师不少于9人。不过随着房地产市场的发展渐趋稳，房建企业数量新增的速度不会太快。也有部分朋友会犹豫，到底要不要报考一级建造师。如果是行业内的，一建证书是越早拿到越好了，毕竟一建师建筑类职业资格考试，也是从业上岗的必备证书，早点拿到证书就能早点获得高额收入，何乐而不为呢?</p>',1,NULL,1547718439),(118,1,1,'2019年注册咨询工程师挂靠一年多少钱?','每一年注册咨询工程师考试都给很多考生带来的波动不小，考生们关注的焦点莫过于注册咨询工程师挂靠价格会怎么样?2019年注册咨询工程师挂靠一年多少钱?','2019年注册咨询工程师挂靠一年多少钱?','2019','/upload/news/21451547599506.jpg','<p>每一年注册咨询工程师考试都给很多考生带来的波动不小，考生们关注的焦点莫过于注册咨询工程师挂靠价格会怎么样?2019年注册咨询工程师挂靠一年多少钱?<br/>环境工程专业 1-1.3万/年（初始)2-2.2万/年（转注）<br/>市政公用工程专业 1-1.5万/年(初始）2-2.2万/年（转注）<br/>建筑工程/建筑材料专业 8千-1万/年（初始）1.5万/年（转注）<br/>工程经济 7-8千/年（初始）1.2-1.8万/年（转注）<br/>公路专业 1-1.5万/年(初始）2-2.5万/年（转注）<br/>机械/电子专业 7-8千/年（初始）1.2-1.5万/年（转注）<br/>通讯专业 8千-1万/年（初始）1.5万/年（转注）<br/>轻工/纺织专业 8千-1万/年（初始）1.5万/年（转注）<br/>化工/医药专业 8千-1万/年（初始）1.5万/年（转注）<br/>城市规划专业 1-1.2万/年（初始）1.8-2万/年（转注）<br/>林/农业专业 1-1.2万/年（初始）1.8-2万/年（转注）<br/>水利/水利水电 1-1.2万/年（初始）1.8-2万/年（转注）<br/>民航专业 1.5万/年（初始）2-2.5万/年（转注）<br/>新能源专业 1.5-1.8万/年（初始）3万/年（转注）<br/>火电专业 1-1.2万/年（初始）2.5-3.5万/年（转注）</p>',1,NULL,1547718497),(119,1,1,'工程造价和工程监理有哪些区别？','工程造价主要是学习工程概预算这些的，主要是工程运营上的。毕业后可以到施工单位、业主单位、造价咨询公司等做一名造价工程师。','工程造价和工程监理有哪些区别？','www','/upload/news/20190110095343_22547.jpg','<p><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">工程造价和工程监理有哪些区别？</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">1、工程造价主要是学习工程概预算这些的，主要是工程运营上的。毕业后可以到施工单位、业主单位、造价咨询公司等做一名造价工程师。</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">2、工程监理主要走的是监理路线，毕业后可以到监理公司从监理员做起，将来会成为总监。</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">3、工程造价和工程监理的方向完全不同，这个要看个人的性格以及兴趣爱好。</span><br style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\" data-filtered=\"filtered\"/><span style=\"text-align: left; color: rgb(51, 51, 51); text-transform: none; text-indent: 0px; letter-spacing: normal; font-family: Arial, Verdana; font-size: 14px; font-style: normal; font-weight: 400; word-spacing: 0px; float: none; display: inline !important; white-space: normal; orphans: 2; widows: 2; background-color: rgb(255, 255, 255); font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial;\">4、从目前市场和个人经验来看的话工程造价的前景和工作选择范围更好。</span></p>',2,1547780052,1547718565),(120,1,1,'一级建造师已经满大街了！二级建造师还有必要考吗？真别这么想！','2018年一级建造师考试的成绩已经在1月3日公布，据说今年的通过率还是很高的。在网上的评论和网友的反应情况来看，今年一级建造师考试和造价工程师考试的通过率相较于往年来说还是比较高的。','二级建造师','建造师','/upload/news/16741547621536.png','<p>2018年一级建造师考试的成绩已经在1月3日公布，据说今年的通过率还是很高的。在网上的评论和网友的反应情况来看，今年一级建造师考试和造价工程师考试的通过率相较于往年来说还是比较高的。从事建设工程行业的朋友不难发现，通过每年的考试现在身边的一级建造师证书持有人员确实比之前多了很多，那么在这种情况下二级建造师考试还有必要参加吗？</p><p><br/>一级建造师考试<br/>其实一级建造师考试和二级建造师考试都是建设工程行业中从事项目经理岗位证书的两个考试，只是二级建造师相对于一级建造师来说执业范围稍微局限一些而已。具体来说就是二级建造师的项目经理部承接的工程相对较小一些，但是在满足工程条件要求的前提下是二级建造师还是一级建造师担任项目经理都是可以的。</p><p><br/>一级建造师考试<br/>再有就是即使有些朋友已经考取的一级建造师证书但是也未必可以担任项目经理岗位，毕竟工程建设事关重大。项目经理的任命不仅仅是看你有没有通过一级建造师考试或者二级建造师考试，能力才是最终要的。而有些时候越是在项目部中承担重要岗位的越是没有时间准备一级建造师考试的学习，在这种情况下先通过二级建造师的考试取得执业资格还是很有必要的。毕竟二级建造师考试的难度相对一级建造师考试来说还是比较容易的。</p><p><br/></p><p>一级建造师考试<br/>所以笔者认为，从事建设工程行业的朋友在达到二级建造师报考条件的情况下还是应该参加二级建造师考试的！</p><p></p>',2,1547780051,1547718900),(121,1,1,'2019一级建造师如何逆袭？这些方法将助你快速拿证！','对于大多数想要获取一级建造师证书的考生来讲，可能感觉获取证书来说是遥远的存在。在距离2019年一级建造师考试的时间可能还有大半年的时间，是否获取证书，可能对于大部分的考生都不敢爽快应答。','2019一级建造师','考试','/upload/news/78611547687587.jpg','<p>对于大多数想要获取一级建造师证书的考生来讲，可能感觉获取证书来说是遥远的存在。在距离2019年一级建造师考试的时间可能还有大半年的时间，是否获取证书，可能对于大部分的考生都不敢爽快应答。</p><p><br/>对于一建考试的怯弱，源于对于这个考试认知受限</p><p>一级建造师的证书真的很难拿到吗?</p><p>答案是否定的。</p><p>历年来，在一级建造师考试中很多都是固定的题目或者是课本上基础的题目。也就是说，只要你踏实肯学，找到合适的方式，获取证书也不是没有办法的 。</p><p>而很多人因为很多次参加一建考试，对于拿证已经开始怯弱，主要是因为在考试认知上出现了问题。</p><p>对于很多想要获取一建证书的考生，我们现在不是要思考这个证书有多难，重要的还是如何考取好的分数，获取证书，特别是一些已经通过几门考试的考生，今年拿证才是终极目标，赢得一建证书。</p><p>但你知道一级建造师究竟考什么吗?出题人用什么方式给证吗?一建考试有哪些“潜规则”?哪些题型有高分答题模式吗?</p><p>一级建造师考试，很多的时候是取决于每个人的学习能力，而学习能力取决于，能否构建健全的知识体系，在世纪明德教育学习的考生，都有属于自己的学习体系!</p><p>2019年一级建造师考试学习已经开始，逆向学习法这个视频课，揭示了一些零基础的考生如何更加省时省力，拿到证书的成功秘笈，其实很多考生并不是没有能力取得帧数，而是从一开始选择的方法不对，时间又不够，导致考试成绩不佳，所以一定要从根源解决问题</p><p><br/></p><p><br/>一个已经通过一建考试几门课程的考生，通常自己还是有一些学习方法，如果直接说，让其他的一些科目能够，或许会觉得有一些难度，当你自己掌握一些方法，知道自身的问题在那里，其实你就会发现并没有想象的那么夸张。</p><p>特别是对于已经取得不错成绩的中等生，但也常存在各种问题，使他们把属于自己能力范畴内的分数丢失。下面我们来看看这些问题都有哪些?</p><p>1.基础知识掌握不扎实</p><p>常言道“万丈高楼从地起”，如果自己学习的地基做不好，房子就没有稳定性，考证同样是如此。</p><p>对于一级建造师考试，考生应该各科目学习上，每一节、每一章的知识点都是逐渐深入的，若是基础知识掌握不扎实，就很难在成绩上有较大的提升。</p><p>2.学习的时候，不讲究方式方法</p><p>大部分考生在复习时，都是按照在以前读书的方式来学习，特别是第一次参加考试的童鞋，复习都没有重点，今天复习这里，明天复习那里，没有一点针对性。有的时候，明明有些章节没有掌握，总想着往前走，导致问题越积越多。</p><p>长此以往，分数没有提升不说，多次的考试还可能对学习失去了信心和动力。</p><p><br/></p><p><br/>3.没有专业的老师指导</p><p>当然，还有一些考生自身的学习能力很强，但是平时里做题不少，特别是没有专业的老师讲解。遇到不会的题型，不知道怎么解决就跳过了，长期这样堆积，导致很多的问题没弄懂。等到考试时，题型稍微转换一下，就会无所适从，所以，一般培训的考生，可以及时的和老师交流，解决自己的问题。</p><p>上述就是很多考生一直没有通过考试，获取证书的问题所在，不知道你是不是这样。下面，小编也为大家介绍几种方法，帮助自身提升成绩。</p><p>1.回归课本为主</p><p>对于一些已经通过一些科目的考生，可以根据自己的丢分情况，找到适合自己的备考方向。基础差的童鞋，最好是报培训班，跟随老师的思路走，更快的通过考试。</p><p>对于一级建造师的考试，各个科目都是按照教材层层关联的，希望基础不好的同学以课本为主，配套练习课本后的练习题，多做题，逐渐吃透课本，也渐渐提高信心。</p><p><br/></p><p><br/>2.合理利用错题集</p><p>其实，整理属于自己的错题集十分必要，它会一针见血地指出学习漏洞，也是快速提升的最好办法。</p><p>所以一定要把错题集利用起来，通过错题的整理，来查明自己学习上的不足之处。</p><p>当然错题的积累是需要时间的，世纪明德教育的考生在线答题，系统自动整理错题，只需要简单点击，就知道自身的错题情况，大大的节省自己的复习时间。</p><p>3.学习，循序渐进</p><p>对于一建学习以自身为主导的过程，可能会和教学进度有所出入。</p><p>很多的考生报考培训班，想着自己马上就能考取高分，通过考试，说实话，这基本是不可能的。特别是像一级建造师这种国家统考的证书。需要考生及早的学习，逐渐的学习，掌握基础，逐渐的加深考取高分。</p><p>切记：平日里进行的各种小测验，只是用来检测自己不足的工具，不要因一时分数高低导致心态出现问题。</p><p><br/></p><p><br/>希望广大的考生在距离19年考试的这段时间内，都能够充分调动自己的学习积极性，全身心的投入到学习当中，不浪费每一天每一分。<br/></p><p></p>',1,1547779217,1547718967);

/*Table structure for table `app_person` */

DROP TABLE IF EXISTS `app_person`;

CREATE TABLE `app_person` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '公司资料表',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `sex` tinyint(4) NOT NULL COMMENT '1为男 2为女',
  `id_card` varchar(24) NOT NULL COMMENT '身份证号',
  `province` int(10) NOT NULL DEFAULT '0' COMMENT '所在省',
  `city` int(10) NOT NULL DEFAULT '0' COMMENT '所在城市',
  `intro` varchar(255) NOT NULL COMMENT '个人简介',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `app_person` */

insert  into `app_person`(`id`,`user_id`,`name`,`sex`,`id_card`,`province`,`city`,`intro`,`update_time`,`create_time`) values (9,92,'白建伟',1,'110226198705184716',2,514,'afasfasfdasdf',1547525276,1547516596);

/*Table structure for table `app_resume_full` */

DROP TABLE IF EXISTS `app_resume_full`;

CREATE TABLE `app_resume_full` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '全职简历表',
  `type` tinyint(4) NOT NULL COMMENT '1是人才 2是建企 3是猎头',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(32) NOT NULL COMMENT '姓名',
  `phone` bigint(11) NOT NULL COMMENT '手机号',
  `cat` tinyint(4) NOT NULL COMMENT '职位类别（全职只有一层）',
  `work_province` int(10) NOT NULL DEFAULT '0' COMMENT '工作省份',
  `work_city` int(10) NOT NULL DEFAULT '0' COMMENT '工作市',
  `salary` int(10) NOT NULL COMMENT '期望薪资',
  `intro` varchar(255) NOT NULL COMMENT '职位描述',
  `scan` int(10) NOT NULL COMMENT '浏览次数',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1为未审核 2为审核',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

/*Data for the table `app_resume_full` */

insert  into `app_resume_full`(`id`,`type`,`title`,`user_id`,`name`,`phone`,`cat`,`work_province`,`work_city`,`salary`,`intro`,`scan`,`status`,`update_time`,`create_time`) values (22,1,NULL,92,'白建伟',13911074975,1,2,502,1500,'111231231231',0,2,1547784592,1547697049),(23,1,NULL,92,'白建伟1',13911074976,2,2,502,5000,'fasdfasdfasdf',0,2,1547530466,1547518362),(25,1,'标题标题标题标题1',92,'白建伟',13911074975,5,7,97,5000,'案发生的发生发大水发',0,2,1547801056,1547801056),(26,1,'添加',92,'白建伟',13911074975,3,7,98,2000,'asdfasdfasf',3,2,1547801076,1547801076);

/*Table structure for table `app_resume_full_thress` */

DROP TABLE IF EXISTS `app_resume_full_thress`;

CREATE TABLE `app_resume_full_thress` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '全职简历的工作经验表',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `resume_id` int(10) NOT NULL COMMENT '简历id',
  `school_name` varchar(255) NOT NULL COMMENT '学校名称',
  `education` tinyint(4) NOT NULL COMMENT '学历',
  `subject` varchar(50) NOT NULL COMMENT '专业',
  `start_time` varchar(30) NOT NULL COMMENT '开始时间',
  `end_time` varchar(30) NOT NULL COMMENT '结束时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `app_resume_full_thress` */

insert  into `app_resume_full_thress`(`id`,`user_id`,`resume_id`,`school_name`,`education`,`subject`,`start_time`,`end_time`,`create_time`) values (2,58,8,'北京联合大学',4,'软件工程','2008-9','2012-07',1544409842);

/*Table structure for table `app_resume_full_two` */

DROP TABLE IF EXISTS `app_resume_full_two`;

CREATE TABLE `app_resume_full_two` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '全职简历的工作经验表',
  `user_id` int(10) NOT NULL COMMENT '用户id',
  `resume_id` int(10) NOT NULL COMMENT '简历id',
  `company_name` varchar(255) NOT NULL COMMENT '公司名称',
  `positio_name` varchar(50) NOT NULL COMMENT '职位名称',
  `salary` tinyint(4) NOT NULL COMMENT '薪资',
  `start_time` varchar(30) NOT NULL COMMENT '开始时间',
  `end_time` varchar(30) NOT NULL COMMENT '结束时间',
  `work_content` varchar(1024) NOT NULL COMMENT '工作内容',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `app_resume_full_two` */

insert  into `app_resume_full_two`(`id`,`user_id`,`resume_id`,`company_name`,`positio_name`,`salary`,`start_time`,`end_time`,`work_content`,`create_time`) values (2,58,8,'北京点能达科技有限公司','CAD制图',4,'2018-9','2019-12','工作内容工作内容工作内容工作内容工作内容工作内容工作内容工作内容工作内容工作内容工作内容工作内容',1544409811);

/*Table structure for table `app_resume_part` */

DROP TABLE IF EXISTS `app_resume_part`;

CREATE TABLE `app_resume_part` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL COMMENT '1是人才 2是建企 3是猎头',
  `title` varchar(100) DEFAULT NULL COMMENT '标题',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(30) NOT NULL COMMENT '真实姓名',
  `phone` bigint(20) NOT NULL COMMENT '手机号',
  `cert_province` int(10) NOT NULL DEFAULT '0' COMMENT '证书省份',
  `cert_city` int(10) NOT NULL DEFAULT '0' COMMENT '证书市',
  `salary` int(11) NOT NULL COMMENT '期望薪资',
  `job_title` tinyint(4) NOT NULL COMMENT '职称',
  `cat_one` tinyint(4) NOT NULL COMMENT '职位类别第一层',
  `cat_two` tinyint(4) NOT NULL COMMENT '职位类别第二层',
  `intro` varchar(1024) NOT NULL COMMENT '详细说明',
  `scan` int(11) NOT NULL COMMENT '浏览次数',
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '1未审核 2已审核',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `app_resume_part` */

insert  into `app_resume_part`(`id`,`type`,`title`,`user_id`,`name`,`phone`,`cert_province`,`cert_city`,`salary`,`job_title`,`cat_one`,`cat_two`,`intro`,`scan`,`status`,`update_time`,`create_time`) values (30,3,NULL,99,'白建伟',13911074975,2,501,18000,2,2,1,'阿斯顿发斯蒂芬111111111',0,2,1547714849,1547627883),(31,3,NULL,99,'白建伟',13911074975,2,514,3000,3,2,1,'fasdfasdfasdf',0,2,0,1547628031),(32,1,'标题标题标题标题12',92,'白建伟',13911074975,2,502,5000,2,1,2,'法师打发斯蒂芬',1,2,1547794088,1547794029);

/*Table structure for table `app_user` */

DROP TABLE IF EXISTS `app_user`;

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) DEFAULT '0' COMMENT '1为人才2为建企3为猎头',
  `phone` bigint(20) NOT NULL COMMENT '手机号',
  `nickname` varchar(50) DEFAULT NULL COMMENT '昵称',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `person` int(11) DEFAULT '0' COMMENT '被人才浏览的数量',
  `company` int(11) DEFAULT '0' COMMENT '被建企浏览的数量',
  `headhunting` int(11) DEFAULT '0' COMMENT '被猎头浏览的数量',
  `delivery` int(11) DEFAULT '0' COMMENT '投递职位次数（人才）',
  `status` tinyint(4) DEFAULT '1' COMMENT '1为正常2不可用',
  `update_time` int(10) DEFAULT NULL COMMENT '更新时间',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `app_user` */

insert  into `app_user`(`id`,`type`,`phone`,`nickname`,`password`,`person`,`company`,`headhunting`,`delivery`,`status`,`update_time`,`create_time`) values (92,1,13911074975,'白说','a3a25e7edecca31dc81647f3534b9852',0,0,0,0,1,1547516596,1547516596),(93,2,13911074975,'建企','a3a25e7edecca31dc81647f3534b9852',0,0,0,0,1,1547615515,1547615515),(99,3,13911074975,'白说','a3a25e7edecca31dc81647f3534b9852',0,0,0,0,1,1547615640,1547615640);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
