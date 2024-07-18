# PHP のバージョン移行を検証するためのLAMP環境
DockerCompose を利用した LAMP 環境。

## 構成
* apache + php5.4
* apache + php5.6
* apache + php8.3
* mysql8.0
* mariadb5.5
* phpMyAdmin

## 利用前提条件
* Dockerが既にインストールされていること
  * インストール方法: [Docker公式](https://docs.docker.jp/get-docker.html)
* コマンドラインツールが使えること
* インターネット利用環境にあること

## 利用方法
### 起動
1. Docker を起動させる
2. コマンドラインで `docker-compose.yml` のあるディレクトリに移動する
3. `docker compose up -d` を入力し実行する (初回の場合時間がかかる)

### アクセス
ブラウザにてそれぞれの URL を入力する。

#### PHP5.4
`http://localhost:8054`

##### ドキュメント配置
プログラムやhtml などは次の箇所に配置する。

`php54/htdocs`


#### PHP5.6
`http://localhost:8056`

##### ドキュメント配置
プログラムやhtml などは次の箇所に配置する。

`php56/htdocs`

#### PHP8.3
`http://localhost:8083`

##### ドキュメント配置
プログラムやhtml などは次の箇所に配置する。

`php83/htdocs`

#### phpMyAdmin
`http://localhost:1080`

自動でログインされるようになっている。
初期状態で `test` というデータベースが作成されている。

認証は不要だが、必要だった場合は以下を入力する。
- username: admin
- password: password

### データベース
ブラウザからアクセスする場合は phpMyAdmin を利用する。

PHPから利用する場合は以下のように設定する。

#### MySQL 8.0
* host: mysql80
* port: 3306
* username: test
* password: test
* database: test (もしくは自分で作成したもの)

#### MariaDB 5.5
* host: mariadb5.5
* port: 3306
* username: test
* password: test
* database: test (もしくは自分で作成したもの)

### ホストからコマンドラインで接続
#### MySQL 8.0
`mysql -u test -p -h 127.0.0.1 -P 13306`

#### MariaDB 5.5
`mysql -u test -p -h 127.0.0.1 -P 13307`

### ゲストにログイン後コマンドラインで接続
`mysql -u test -p`

##### 初期実行SQL
以下のフォルダ内に *SQL* や *シェルスクリプト* を入れることで、初回起動時に実行される。
* `mysql80/initdb`
* `mariadb55/initdb`

これは初めて docker を立ち上げた時のみ有効なので、それ以降にデータを入れたい場合は phpMyAdmin を利用する。

## よく使うコマンド
### サーバーを起動する
`docker-compose up -d`

(`-d` をつけないと、ゲストのログがずっと流れ続け、 Ctrl+C で抜けると自動で stop してしまう)

### サーバー停止する
#### 全部
`docker-compose stop`

#### 特定のコンテナ
`docker-compose stop container_name`

### サーバーを削除する
#### サーバーだけ削除
`docker-compose down`
以下のものは消えない。
* イメージ
* ボリューム

#### ボリュームも削除
`docker-compose down -v`
