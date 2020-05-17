/**
 * 日報
 *
 */

DROP TABLE IF EXISTS `nippos`;

CREATE TABLE `nippos` (
  `id`                        BIGINT  UNSIGNED  NOT NULL  AUTO_INCREMENT  COMMENT 'ID',
  `company_id`                BIGINT  UNSIGNED  NOT NULL                  COMMENT '企業ID',
  `tenpo_id`                  BIGINT  UNSIGNED  NOT NULL                  COMMENT '店舗ID',
  `date`                      DATE              NOT NULL                  COMMENT '日付',
  `weather`                   VARCHAR(100)                DEFAULT NULL    COMMENT '天気',
  `sales_cash`                INTEGER                     DEFAULT 0       COMMENT 'Ⅱ 本日売上額等 ①現金',
  `sales_credit`              INTEGER                     DEFAULT 0       COMMENT 'Ⅱ 本日売上額等 ②クレジット',
  `sales_kakeuri`             INTEGER                     DEFAULT 0       COMMENT 'Ⅱ 本日売上額等 ③掛売上',
  `sales_others`              INTEGER                     DEFAULT 0       COMMENT 'Ⅱ 本日売上額等 ④その他',
  `receipt_cnt`               TINYINT UNSIGNED            DEFAULT 0       COMMENT 'レシート枚数',
  `register`                  INTEGER                     DEFAULT 0       COMMENT 'Ⅵ 本日レジ現金残高',
  `balance`                   INTEGER                     DEFAULT 0       COMMENT 'Ⅶ 現金過不足（繰越金）',
  `status`                    TINYINT UNSIGNED            DEFAULT 1       COMMENT 'ステータス（処理中｜締め済み｜確認済み）',
  `is_deleted`                TINYINT UNSIGNED            DEFAULT 0       COMMENT '削除フラグ',
  `deleted`                   DATETIME                    DEFAULT NULL    COMMENT '削除日時',
  `updated`                   DATETIME                    DEFAULT NULL    COMMENT '更新日時',
  `created`                   DATETIME          NOT NULL                  COMMENT '作成日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日報';
