/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dptrainer

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-11-18 06:02:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for dpft_estilos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_estilos`;
CREATE TABLE `dpft_estilos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `level_requerido` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_estilos
-- ----------------------------
INSERT INTO `dpft_estilos` VALUES ('1', 'Jiu-Jitsu', 'http://dpft.ml/imagens/jiujitsu.png', '0');

-- ----------------------------
-- Table structure for dpft_estilos_movimentos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_estilos_movimentos`;
CREATE TABLE `dpft_estilos_movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movimento` varchar(255) DEFAULT NULL,
  `id_estilo` varchar(255) DEFAULT NULL,
  `level_requerido` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_estilos_movimentos
-- ----------------------------
INSERT INTO `dpft_estilos_movimentos` VALUES ('1', '1', '1', '0');

-- ----------------------------
-- Table structure for dpft_movimentos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_movimentos`;
CREATE TABLE `dpft_movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `descricao` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_movimentos
-- ----------------------------
INSERT INTO `dpft_movimentos` VALUES ('1', 'Arm Lock', 'Finalizacao de braco', 'A chave de braço é um bloqueio articular simples ou duplo que hiperestende (estender em excesso), hiperflexiona (flexiona em excesso), a rotação da articulação do cotovelo e / ou articulação do ombro.\r\nUma chave de braço que hiperflexiona com rotação da articulação do ombro é referida como uma chave de ombro ou Shoulder Lock, e uma chave de braço que hiperestende a articulação do cotovelo é chamada de Chave de Braço, Arm Lock ou Armbar.\r\nA obtenção de um Arm Lock requer o uso eficaz de alavancagem do corpo inteiro, a fim de iniciar e garantir um bloqueio no braço alvo evitando que o adversário escape do bloqueio. Ao utilizar todo o seu corpo para aplicar o arm lock você evita fazer força desnecessariamente e consegue um poder maior no golpe.');

-- ----------------------------
-- Table structure for dpft_movimentos_passos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_movimentos_passos`;
CREATE TABLE `dpft_movimentos_passos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_movimento` int(11) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `passos` longtext,
  PRIMARY KEY (`id`,`id_movimento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_movimentos_passos
-- ----------------------------
INSERT INTO `dpft_movimentos_passos` VALUES ('1', '1', 'youtube', '{\"url\":\"https://www.youtube.com/watch?v=4TE63JZebXM\"}');
INSERT INTO `dpft_movimentos_passos` VALUES ('2', '1', 'imagens', '{\"passos\":[{\"url\":\"http://dpft.ml/imagens/p1.png\"},{\"url\":\"http://dpft.ml/imagens/p2.png\"},{\"url\":\"http://dpft.ml/imagens/p3.png\"}]}');

-- ----------------------------
-- Table structure for dpft_perfis
-- ----------------------------
DROP TABLE IF EXISTS `dpft_perfis`;
CREATE TABLE `dpft_perfis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `avatar_url` varchar(255) NOT NULL DEFAULT 'http://dpft.ml/images/avatar.jpeg',
  `title` varchar(80) NOT NULL DEFAULT 'Noob',
  `level` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`avatar_url`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_perfis
-- ----------------------------
INSERT INTO `dpft_perfis` VALUES ('1', '1', 'default', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('4', '16', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('5', '17', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('6', '18', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('7', '19', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('8', '20', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('9', '21', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('10', '22', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('11', '23', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('12', '24', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');
INSERT INTO `dpft_perfis` VALUES ('13', '25', 'http://dpft.ml/images/avatar.jpeg', 'Noob', '0');

-- ----------------------------
-- Table structure for dpft_perfis_estilos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_perfis_estilos`;
CREATE TABLE `dpft_perfis_estilos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_estilo` int(11) NOT NULL,
  `treinos` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_perfis_estilos
-- ----------------------------
INSERT INTO `dpft_perfis_estilos` VALUES ('1', '1', '1', '1');

-- ----------------------------
-- Table structure for dpft_perfis_movimentos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_perfis_movimentos`;
CREATE TABLE `dpft_perfis_movimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) DEFAULT NULL,
  `id_movimento` int(11) DEFAULT NULL,
  `treinos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_perfis_movimentos
-- ----------------------------
INSERT INTO `dpft_perfis_movimentos` VALUES ('1', '1', '1', '1');

-- ----------------------------
-- Table structure for dpft_ranks
-- ----------------------------
DROP TABLE IF EXISTS `dpft_ranks`;
CREATE TABLE `dpft_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(255) DEFAULT NULL,
  `rank` varchar(255) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_ranks
-- ----------------------------
INSERT INTO `dpft_ranks` VALUES ('0', '0', 'Noob', 'http://forum.curvefever.com/sites/default/files/ideas13Jul/noob%20copy.png');
INSERT INTO `dpft_ranks` VALUES ('2', '1', 'Menos Noob', 'http://forum.curvefever.com/sites/default/files/ideas13Jul/noob%20copy.png');

-- ----------------------------
-- Table structure for dpft_ranks_requerimentos
-- ----------------------------
DROP TABLE IF EXISTS `dpft_ranks_requerimentos`;
CREATE TABLE `dpft_ranks_requerimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` varchar(255) DEFAULT NULL,
  `requerimento` varchar(255) DEFAULT 'nada',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_ranks_requerimentos
-- ----------------------------
INSERT INTO `dpft_ranks_requerimentos` VALUES ('1', '0', 'nada');
INSERT INTO `dpft_ranks_requerimentos` VALUES ('2', '1', '{\"movimentos\":[{\"id\":\"1\"}]}');

-- ----------------------------
-- Table structure for dpft_users
-- ----------------------------
DROP TABLE IF EXISTS `dpft_users`;
CREATE TABLE `dpft_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(90) NOT NULL,
  `email` varchar(120) NOT NULL,
  `senha` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `data_registro` datetime NOT NULL,
  `ultimo_login` datetime NOT NULL DEFAULT '1601-01-02 12:25:18',
  `tentativas_login` int(255) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique` (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of dpft_users
-- ----------------------------
INSERT INTO `dpft_users` VALUES ('1', 'William Moraes', 'will.moraes.96@gmail.com', 'ed8b3b35fd848ba5f84e332c18bf2e7b9d91b52b67a0a06a5d1ef4cd3b0dc8e0', '2f8c857743e0dfbdf6177b971c6d8ae8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('16', 'Gwvrgild Hssiabkx', 'Svkzgwxs@Apxpszmc.com', '6b6038a1b248b7458a16cf0acc9a72d82487fe99d824db25e0a68e30ce2f1844', '5d167389f99d00c41a290fc22cfa9cbd', '2016-11-02 23:50:21', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('17', 'Kkolffmp Oqaowqdm', 'Sselrkyu@Fnsquziq.com', '79bdad451922409d2e27131a236cb2eb99a4e6fe2f6e5003b134d459ae70873d', 'a5982083b2e5f56484a6def5989e0c2b', '2016-11-02 23:51:00', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('18', 'Cwnxpvcm Igpjbznt', 'Sadpfgsl@Pfccnjxi.com', '7dc8f8e4db265dafb7dc3c426bce98d53a92da43e9cffca51602231b8d2f7828', '3ab558e117f59e98770c4804e8466f6a', '2016-11-03 00:04:10', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('19', 'Osjjaxfn Jnnpsfoz', 'Yxsphoip@Tdhpwehq.com', 'a8f3a9625de01d6970624bfed39be3b255d31c49176d05ce61a6a13d14438136', '4cbaa5f2eadee4d0e6a163dd9629fd3f', '2016-11-03 00:38:38', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('20', 'Qmmuwrez Jgrsqtpv', 'Yaczeyrs@Aowzmbuo.com', 'f3ba64df3987d9780c246b173ba70ad334b1e4fcf17833c57a0c62ed4ba32f4a', '7426c78c85c4e444bed6a162e8be8663', '2016-11-03 00:53:38', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('21', 'Pofzzwcv Gbcojthy', 'Dyyhrxjf@Ycmqkhra.com', '324f62f8f4bb1689e3faf5e48945660ef0ba3a759732e168477b0158ac610691', '63e68b6302388954ed3d329b534b52f4', '2016-11-03 00:54:38', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('22', 'Wivcadxd Rrjcehyb', 'Mqixqxsv@Bytytrbd.com', '4d7f499368426c6915cdee47f09b7808f6602ff9fc26da71e9ee44406c866f4f', '1d7ebb4b1351cfed9fc97f1df89ec056', '2016-11-03 00:55:00', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('23', 'Eduardo Oliveira', 'evargasoliveir@gmail.com', 'b50f042ea5908524c152b871cbfe118ed60cacb856ccd2ca25873fe9918d20de', '2b618319d50607f3607e380ba31aafe1', '2016-11-03 00:57:39', '0000-00-00 00:00:00', '0');
INSERT INTO `dpft_users` VALUES ('24', 'Teste testado', 'teste@testemail.com', '70ae1808028b3a30c6780e0684ec3d0d09b4471e6562ba04a1c831f1edfaedef', '3989e29560545c42da92f17c95cfc1f8', '2016-11-03 14:07:52', '1601-01-02 12:25:18', '0');
INSERT INTO `dpft_users` VALUES ('25', 'Marjana Oliveira', 'marjanachagas@gmail.com', 'e1698f108f63f43592b1f687559dc0aecf1acaed6814010683fc1b020a026541', 'b0b79bdf8148a45c5702191aaea1ea3d', '2016-11-03 19:03:25', '1601-01-02 12:25:18', '0');
