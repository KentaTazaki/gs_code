-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2019 年 10 月 03 日 23:21
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `naiyou` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `name`, `email`, `naiyou`, `indate`) VALUES
(1, '田崎', 'kenta@jp', 'ないよ', '2019-09-22 01:22:01'),
(2, '田崎', 'test1@jp', 'ないよ', '2019-09-22 01:26:24'),
(3, '田中', 'test2@jp', 'ないよ', '2019-09-22 01:26:24'),
(4, '田巻', 'test10@jp', 'ないよ', '2019-09-22 01:26:24'),
(5, '田畑', 'test20@jp', 'ないよ', '2019-09-22 01:26:25'),
(6, '田沖', 'test13@jp', 'ないよ', '2019-09-22 01:26:25'),
(7, 'kentatazaki', 'dream.color.variations@gmail.com', 'MySQL&PHP初送信', '2019-09-22 03:24:38'),
(8, '佐藤', '123@jp', '', '2019-09-23 00:44:46'),
(9, '佐藤', '123@jp', '', '2019-09-23 00:59:01'),
(10, '鈴木', 'abc@com', '', '2019-09-23 00:59:23'),
(11, '宮本武蔵', 'musasi@go', '大和', '2019-09-26 00:59:40');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `bookname` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `bookurl` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `bookname`, `bookurl`, `comment`, `indate`) VALUES
(1, 'BIG MIS TAKES', 'amazon.jp', '藤野さん推薦本', '2019-09-22 02:13:50'),
(2, 'アフターデジタル', 'amazon.jp', '世耕経産大臣推薦本', '2019-09-22 02:19:03'),
(3, 'Deep Tech', 'amazon.jp', 'SDGs時代の必読書', '2019-09-22 02:19:03'),
(4, 'モチベーション革命', 'amazon.jp', '現代版モチベーションマネージメント本', '2019-09-22 02:19:03');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'kenta', 'idtest', 'pwtest', 1, 0),
(2, 'tazaki', 'test', 'test', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルのAUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
