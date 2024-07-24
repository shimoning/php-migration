<?php
    /**
     * 環境変数を出力する
     */
    header('Content-Type: text/html; charset=UTF-8');

    echo '環境変数<br>';
    echo '<pre>' . print_r($_ENV, true) . '</pre>';
