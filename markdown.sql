
--新建数据库markdown
CREATE DATABASE markdown DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--选择要操作的数据库
USE markdown;
--新建表md_main
CREATE TABLE `md_main` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
-- Records 
INSERT INTO `md_main` VALUES ('2', 'hello123', '#hello\n#world123');
INSERT INTO `md_main` VALUES ('4', 'test123', '#hello\n##hi\n#world');
INSERT INTO `md_main` VALUES ('8', '123', '[TOCM]\n#hello\n#321');
INSERT INTO `md_main` VALUES ('10', 'hehe111', '#hehe123\n#呵呵\n#已基本ok');
INSERT INTO `md_main` VALUES ('9', 'hello11111', 'hello111111231');
INSERT INTO `md_main` VALUES ('11', '哈哈哈', '#hello\n##hi\n#你好\n##**好呀**');