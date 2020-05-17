/**
 * 日報-預金
 *
 */

DROP TABLE IF EXISTS `nippo_deposits`;

CREATE TABLE `nippo_deposits` (
  `nippo_id`                  BIGINT  UNSIGNED  NOT NULL                  COMMENT '日報ID',
  `kamoku`                    VARCHAR(255)      NOT NULL                  COMMENT '科目',
  `amount`                    INTEGER                     DEFAULT 0       COMMENT '金額',
  `num`                       TINYINT UNSIGNED  NOT NULL                  COMMENT '表示順',
  FOREIGN KEY (`nippo_id`) REFERENCES `nippos`(`id`),
  UNIQUE (`nippo_id`, `num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='日報-預金';
