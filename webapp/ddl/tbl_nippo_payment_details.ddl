/**
 * 日報-支払
 *
 */

DROP TABLE IF EXISTS `nippo_payment_details`;

CREATE TABLE `nippo_payment_details` (
  `nippo_id`                  BIGINT  UNSIGNED  NOT NULL                  COMMENT '日報ID',
  `nippo_payment_num`         TINYINT UNSIGNED  NOT NULL                  COMMENT '日報-支払 表示順',
  `kamoku`                    VARCHAR(100)                DEFAULT NULL    COMMENT '科目',
  `amount`                    INTEGER                     DEFAULT 0       COMMENT '金額',
  `tekiyo`                    VARCHAR(100)                DEFAULT NULL    COMMENT '摘要',
  `bumon`                     VARCHAR(100)                DEFAULT NULL    COMMENT '部門',
  `num`                       TINYINT UNSIGNED  NOT NULL                  COMMENT '表示順',
  FOREIGN KEY (`nippo_id`) REFERENCES `nippos`(`id`),
  UNIQUE (`nippo_id`, `nippo_payment_num`, `num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日報-支払-明細';
