/**
 * 日報-支払
 *
 */

DROP TABLE IF EXISTS `nippo_payments`;

CREATE TABLE `nippo_payments` (
  `nippo_id`                  BIGINT  UNSIGNED  NOT NULL                  COMMENT '日報ID',
  `photo`                     TEXT              NOT NULL                  COMMENT '写真',
  `amount`                    INTEGER                     DEFAULT 0       COMMENT '金額',
  `name`                      VARCHAR(255)                DEFAULT NULL    COMMENT '購入店名',
  `num`                       TINYINT UNSIGNED  NOT NULL                  COMMENT '表示順',
  FOREIGN KEY (`nippo_id`) REFERENCES `nippos`(`id`),
  UNIQUE (`nippo_id`, `num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日報-支払';
