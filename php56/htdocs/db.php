<?php
    /**
     * DB アクセスのサンプル
     */
    header('Content-Type: text/html; charset=UTF-8');
    try {
        // DNS: Data Source Name = データソース名
        $dsn = 'mysql:host=mariadb55;port=3306;dbname=test;charset=utf8';

        // PDO: PHP Data Objects = データベース接続のためのインスタンス
        $pdo = new PDO($dsn, 'test', 'test');
        echo '接続できました!<br><br>';

        // クエリを実行
        $stmt = $pdo->query('SHOW TABLES'); // SHOW TABLE; テーブルの一覧を見る SQL 文
        $tables = [];
        while ($result = $stmt->fetch(PDO::FETCH_NUM)) { // 1行ずつデータを取得し result に入れる
            $tables[] = $result[0];
        }

        echo '現在存在しているテーブル: <br>';
        if (empty($tables)) {
            echo '<p>なし</p>';
        } else {
            echo '<ul>';
            foreach ($tables as $index => $table) {
                echo '<li>' . $index . ': ' . $table . '</li>';
            }
            echo '</ul>';
        }
    } catch (\Exception $th) {
        echo '接続失敗...<br><br>';
        echo $th->getMessage();
    }

    // phpMyAdmin
    echo '<hr>';
    echo '<p><a href="http://localhost:1080" target="_blank">phpMyAdmin でデータベースを管理</a></p>';
