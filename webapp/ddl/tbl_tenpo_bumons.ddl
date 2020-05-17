/**
 * 店舗-部門
 *
 */

DROP TABLE IF EXISTS `tenpo_bumons`;

CREATE TABLE `tenpo_bumons` (
  `tenpo_id`                  BIGINT  UNSIGNED  NOT NULL                  COMMENT '店舗ID',
  `bumon`                     VARCHAR(255)      NOT NULL                  COMMENT '部門',
  `num`                       TINYINT UNSIGNED  NOT NULL                  COMMENT '表示順',
  FOREIGN KEY (`tenpo_id`) REFERENCES `tenpos`(`id`),
  UNIQUE (`tenpo_id`, `num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='店舗-部門';
