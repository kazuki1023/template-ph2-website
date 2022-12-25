DROP DATABASE IF EXISTS posse;
CREATE DATABASE posse;
use posse;

-- quiestionsテーブルの作成
DROP TABLE IF EXISTS questions;
CREATE TABLE questions (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  content VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '問題文',
  image VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '問題画像',
  supplement VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '引用'
);

-- answersテーブルの作成
DROP TABLE IF EXISTS choices;
CREATE TABLE choices (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  question_id INT NOT NULL COMMENT '問題特定番号',
  name VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '選択肢',
  valid TINYINT NOT NULL COMMENT '正誤判定'
);
-- usersテーブルの作成
DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  name VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT '名前',
  email VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL COMMENT 'メールアドレス',
  password VARCHAR(255) COLLATE utf8mb3_general_ci NOT NULL NOT NULL COMMENT 'パスワード'
);
-- hoursテーブルの作成
DROP TABLE IF EXISTS hours;
CREATE TABLE hours (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  date DATETIME COMMENT '学習日',
  date_id INT COMMENT '学習日のid',
  hours INT COMMENT '学習時間'
);
-- contentsテーブルの作成
DROP TABLE IF EXISTS contents;
CREATE TABLE contents (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  date DATETIME COMMENT '学習日',
  date_id INT COMMENT '学習日のid',
  content VARCHAR(255) COMMENT '学習コンテンツ'
);
-- langugesテーブルの作成
DROP TABLE IF EXISTS languages;
CREATE TABLE languages (
  id INT AUTO_INCREMENT PRIMARY KEY COMMENT 'ID',
  date DATETIME COMMENT '学習日',
  date_id INT COMMENT '学習日のid',
  language VARCHAR(255) COMMENT '学習言語'
);

INSERT INTO `hours` VALUES
(1, '2022-12-20', 20221220, 3),
(2, '2022-12-21', 20221221, 4),
(3, '2022-12-22', 20221222, 6);


INSERT INTO `contents` VALUES
(1, '2022-12-20', 20221220, "N予備校"),
(2, '2022-12-21', 20221221, "ドットインストール"),
(3, '2022-12-21', 20221221, "ドットインストール"),
(4, '2022-12-22', 20221222, "POSSE課題"),
(5, '2022-12-22', 20221222, "POSSE課題"),
(6, '2022-12-22', 20221222, "POSSE課題");



INSERT INTO `languages` VALUES
(1, '2022-12-20', 20221220, "CSS"),
(2, '2022-12-21', 20221221, "CSS"),
(3, '2022-12-21', 20221221, "PHP"),
(4, '2022-12-22', 20221222, "CSS"),
(5, '2022-12-22', 20221222, "PHP"),
(6, '2022-12-22', 20221222, "SQL");

