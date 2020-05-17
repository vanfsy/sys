/**
 * データベース作成
 *
 */

CREATE DATABASE tanakakaikei CHARACTER SET utf8;

GRANT ALL PRIVILEGES ON tanakakaikei.* TO tanakakaikei@localhost IDENTIFIED BY 'tanakakaikei' WITH GRANT OPTION;

FLUSH PRIVILEGES;
