/**
 * 店舗
 *
 */

DROP TABLE IF EXISTS `tenpos`;

CREATE TABLE `tenpos` (
  `id`                        BIGINT  UNSIGNED  NOT NULL  AUTO_INCREMENT  COMMENT 'ID',
  `company_id`                BIGINT  UNSIGNED  NOT NULL                  COMMENT '企業ID',
  `name`                      VARCHAR(100)      NOT NULL                  COMMENT '店舗名',
  `tel`                       VARCHAR(100)                DEFAULT NULL    COMMENT '電話番号',
  `postal`                    VARCHAR(100)                DEFAULT NULL    COMMENT '郵便番号',
  `prefecture`                TINYINT UNSIGNED            DEFAULT NULL    COMMENT '都道府県',
  `address`                   VARCHAR(255)                DEFAULT NULL    COMMENT '所在地',
  `note`                      TEXT                        DEFAULT NULL    COMMENT '備考',
  `kamoku_sales_cash_kari`      TEXT                      DEFAULT NULL    COMMENT '使用科目（現金売上／借方）',
  `kamoku_sales_credit_kari`    TEXT                      DEFAULT NULL    COMMENT '使用科目（クレジット／借方）',
  `kamoku_sales_kakeuri_kari`   TEXT                      DEFAULT NULL    COMMENT '使用科目（掛売上／借方）',
  `kamoku_sales_others_kari`    TEXT                      DEFAULT NULL    COMMENT '使用科目（掛売回収／借方）',
  `kamoku_deposit_kari`         TEXT                      DEFAULT NULL    COMMENT '使用科目（現金預入額等／借方）',
  `kamoku_payment_kari`         TEXT                      DEFAULT NULL    COMMENT '使用科目（現金支払額等／借方）',
  `kamoku_sales_cash_kashi`     TEXT                      DEFAULT NULL    COMMENT '使用科目（現金売上／貸方）',
  `kamoku_sales_credit_kashi`   TEXT                      DEFAULT NULL    COMMENT '使用科目（クレジット／貸方）',
  `kamoku_sales_kakeuri_kashi`  TEXT                      DEFAULT NULL    COMMENT '使用科目（掛売上／貸方）',
  `kamoku_sales_others_kashi`   TEXT                      DEFAULT NULL    COMMENT '使用科目（掛売回収／貸方）',
  `kamoku_deposit_kashi`        TEXT                      DEFAULT NULL    COMMENT '使用科目（現金預入額等／貸方）',
  `kamoku_payment_kashi`        TEXT                      DEFAULT NULL    COMMENT '使用科目（現金支払額等／貸方）',
  `is_operated`               TINYINT UNSIGNED            DEFAULT 0       COMMENT '稼働フラグ',
  `is_deleted`                TINYINT UNSIGNED            DEFAULT 0       COMMENT '削除フラグ',
  `deleted`                   DATETIME                    DEFAULT NULL    COMMENT '削除日時',
  `updated`                   DATETIME                    DEFAULT NULL    COMMENT '更新日時',
  `created`                   DATETIME          NOT NULL                  COMMENT '作成日時',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店舗';
