<?php
    /**
     * DB アクセスのサンプル
     */
    header('Content-Type: text/html; charset=UTF-8');
    try {
        // リソース作成
        $resource = mysqli_connect('mysql80', 'test', 'test', 'test', 3306);
        echo '接続できました!<br><br>';

        // クエリを実行
        $res = mysqli_query($resource, 'SHOW TABLES'); // SHOW TABLE; テーブルの一覧を見る SQL 文
        $tables = [];
        while ($result = mysqli_fetch_assoc($res)) { // 1行ずつデータを取得し result に入れる
            $tables[] = array_shift($result);
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
