# Employee list

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](./LICENSE) ![PHP version](https://img.shields.io/badge/php-5.6-blue.svg) 
![Zend Framework](https://img.shields.io/badge/Zend%20Framework-3.0.1-blue.svg) ![Stable](https://img.shields.io/badge/status-stable-green.svg)

Simple application based on Zend Framework 3.
Create your own employee list

## Installation

Use php 5.6

- run composer install
- copy `/config/autoload/doctrine.local.php.sample` into `/config/autoload/doctrine.local.php` and set the database access credentials
- create mysql table `your_table_name` with the fields:
  id: primary key, autoincrement
  name: varchar
or run sql
```
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for test_tbl
-- ----------------------------
DROP TABLE IF EXISTS `test_tbl`;
CREATE TABLE `test_tbl`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
```
Done!

### License

App is [MIT licensed](./LICENSE).
