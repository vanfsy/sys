/**
 * 管理者
 *
 */

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id`                        BIGINT  UNSIGNED  NOT NULL  AUTO_INCREMENT  COMMENT 'ID',
  `password`                  VARCHAR(100)      NOT NULL                  COMMENT 'パスワード',
  `email`                     VARCHAR(100)      NOT NULL                  COMMENT 'メールアドレス',
  `name`                      VARCHAR(100)      NOT NULL                  COMMENT '管理者名',
  `status`                    TINYINT UNSIGNED            DEFAULT 0       COMMENT 'ステータス',
  `last_logined`              DATETIME                    DEFAULT NULL    COMMENT '最終ログイン日時',
  `is_deleted`                TINYINT UNSIGNED            DEFAULT 0       COMMENT '削除フラグ',
  `deleted`                   DATETIME                    DEFAULT NULL    COMMENT '削除日時',
  `updated`                   DATETIME                    DEFAULT NULL    COMMENT '更新日時',
  `created`                   DATETIME          NOT NULL                  COMMENT '作成日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理者';

LOCK TABLES `admins` WRITE;
/**/
INSERT INTO `admins` (`id`, `password`, `email`, `name`, `created`) VALUES (1, SHA1(CONCAT('k_shoji@s-creates.com', 'password', 'StyleCreateStyle')), 'k_shoji@s-creates.com', 'スタイルクリエイツ', NOW());
INSERT INTO `admins` (`id`, `password`, `email`, `name`, `created`) VALUES (2, SHA1(CONCAT('tanaka@skc.ne.jp', 'zeirishijimusho', 'StyleCreateStyle')), 'tanaka@skc.ne.jp', 'システム管理者', NOW());
/**/
UNLOCK TABLES;
