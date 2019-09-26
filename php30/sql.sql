--初登録 テスト
-- "":ダブルクォーテーションをSQLでは使えない
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES('田崎','test1@jp','ないよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES('田中','test2@jp','ないよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES('田巻','test10@jp','ないよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES('田畑','test20@jp','ないよ',sysdate())
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES('田沖','test13@jp','ないよ',sysdate())
--datetimaの値：sysdate()の関数で現在日時を取得できる
--vscodeはわかりやすい→コピー→MySQLの構造横、SQLに貼り付けて実行
--演習
INSERT INTO gs_bm_table(bookname,bookURL,comment,indate) VALUES('BIG MIS TAKES','amazon.jp','藤野さん推薦本',sysdate())
INSERT INTO gs_bm_table(bookname,bookURL,comment,indate) VALUES('アフターデジタル','amazon.jp','世耕経産大臣推薦本',sysdate())
INSERT INTO gs_bm_table(bookname,bookURL,comment,indate) VALUES('Deep Tech','amazon.jp','SDGs時代の必読書',sysdate())
INSERT INTO gs_bm_table(bookname,bookURL,comment,indate) VALUES('モチベーション革命','amazon.jp','現代版モチベーションマネージメント本',sysdate())

---データ取得
-- * アスタリスクは全てのデータを(から)
SELECT name,indate,email FROM gs_an_table
SELECT * FROM gs_an_table WHERE id = 1
--条件検索ができる
SELECT * FROM gs_an_table WHERE id = 1 OR id = 2
--曖昧検索ができる
SELECT * FROM gs_an_table WHERE email LIKE '%test1%'
--最新データの検索
SELECT * FROM gs_an_table ORDER BY id DESC
SELECT * FROM gs_an_table ORDER BY id DESC LIMIT 3

-- 登録時の設定(内の配置名には：コロンが必須)
INSERT INTO gs_an_table(name,email,naiyou,indate) VALUES(:name,:email,:naiyou,sysdate())
