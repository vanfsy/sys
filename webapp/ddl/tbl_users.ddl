/**
 * ユーザー
 *
 */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id`                        BIGINT  UNSIGNED  NOT NULL  AUTO_INCREMENT  COMMENT 'ID',
  `company_id`                BIGINT  UNSIGNED  NOT NULL                  COMMENT '企業ID',
  `tenpo_id`                  BIGINT  UNSIGNED            DEFAULT NULL    COMMENT '店舗ID',
  `login_id`                  VARCHAR(100)      NOT NULL                  COMMENT 'ログインID',
  `password`                  VARCHAR(100)      NOT NULL                  COMMENT 'パスワード',
  `drowssap`                  VARCHAR(100)      NOT NULL                  COMMENT 'ドローサップ',
  `name`                      VARCHAR(100)      NOT NULL                  COMMENT 'ユーザー名',
  `auth`                      TINYINT UNSIGNED  NOT NULL                  COMMENT '権限（店舗｜企業）',
  `last_logined`              DATETIME                    DEFAULT NULL    COMMENT '最終ログイン日時',
  `is_deleted`                TINYINT UNSIGNED            DEFAULT 0       COMMENT '削除フラグ',
  `deleted`                   DATETIME                    DEFAULT NULL    COMMENT '削除日時',
  `updated`                   DATETIME                    DEFAULT NULL    COMMENT '更新日時',
  `created`                   DATETIME          NOT NULL                  COMMENT '作成日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ユーザー';
