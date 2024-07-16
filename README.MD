# PHP のバージョン移行を検証するためのLAMP環境

DockerCompose を利用した LAMP 環境。

## 構成
* apache + php5.4
* apache + php8.3
* mysql
* phpMyAdmin

## 利用前提条件
* Dockerが既にインストールされていること
  インストール方法: [Docker公式](https://docs.docker.jp/get-docker.html)
* コマンドラインツールが使えること
* インターネット利用環境にあること

## 利用方法
### 起動
1. docker が起動させる
2. コマンドラインで `docker-compose.yml` のあるディレクトリに移動する
3. `docker compose up -d` を入力し実行する (初回の場合時間がかかる)

### アクセス
ブラウザにてそれぞれの URL を入力する。

#### PHP5.4
`http://localhost:8054`

#### PHP8.3
`http://localhost:8083`

#### phpMyAdmin
`http://localhost:1080`
自動でログインされるようになっている。
初期状態で `test` というデータベースが作成されている。

#### データベース
ブラウザからアクセスする場合は phpMyAdmin を利用する。

PHPから利用する場合は以下のように設定する。
* host: db
* port: 3306
* username: test
* password: test
* database: test (もしくは自分で作成したもの)

##### 初期実行SQL
`db/initdb` のフォルダ内に *SQL* や *シェルスクリプト* を入れることで、初回起動時に実行される。
これは初めて docker を立ち上げた時のみ有効なので、それ以降にデータを入れたい場合は phpMyAdmin を利用する。
