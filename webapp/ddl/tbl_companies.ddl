/**
 * 企業
 *
 */

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `id`                        BIGINT  UNSIGNED  NOT NULL  AUTO_INCREMENT  COMMENT 'ID',
  `name`                      VARCHAR(100)      NOT NULL                  COMMENT '企業名',
  `settlement_month`          TINYINT UNSIGNED  NOT NULL                  COMMENT '決算月',
  `note`                      TEXT                        DEFAULT NULL    COMMENT '備考',
  `kamoku_sales`              TEXT                        DEFAULT NULL    COMMENT '科目マスタ（売上）',
  `kamoku_sales_debt`         TEXT                        DEFAULT NULL    COMMENT '科目マスタ（売上債務）',
  `kamoku_deposit`            TEXT                        DEFAULT NULL    COMMENT '科目マスタ（預金）',
  `kamoku_purchase`           TEXT                        DEFAULT NULL    COMMENT '科目マスタ（仕入）',
  `kamoku_expense`            TEXT                        DEFAULT NULL    COMMENT '科目マスタ（経費）',
  `bumon`                     TEXT                        DEFAULT NULL    COMMENT '部門マスタ',
  `is_deleted`                TINYINT UNSIGNED            DEFAULT 0       COMMENT '削除フラグ',
  `deleted`                   DATETIME                    DEFAULT NULL    COMMENT '削除日時',
  `updated`                   DATETIME                    DEFAULT NULL    COMMENT '更新日時',
  `created`                   DATETIME          NOT NULL                  COMMENT '作成日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='企業';
