# Laravel-intern

## セットアップ手順

1. Dockerを立ち上げる
```shell
$ docker-compose build
```
```shell
$ docker-compose up -d
```

2. 次のコマンドを実行し、Dockerのwebコンテナに入る
```shell
$ docker-compose exec web bash
```

3. 次のコマンドを実行し、必要なパッケージをインストールする
```shell
$ composer install
```

4. 次のコマンドを実行し，「.env」ファイルの APP_KEY を生成する
```shell
$ php artisan key:generate
```

5. 次のコマンドを実行し，public/storage から storage/app/public へシンボリックリンクを張る
```shell
$ php artisan storage:link
```

## よく使うコマンド一覧

### コントローラの作成
```shell
$ php artisan make:controller UserController
```
UserControllerは好きな名前にしてください。但し、最初の文字は大文字にしてControllerを名前の後ろに付ける必要があります。<br>
コマンドの末尾に「--resource」を付けると、自動的にindex, create, show, edit, update, destroyが作成されます。

### モデルの作成
```shell
$ php artisan make:model User
```
Userは好きな名前にしてください。但し、最初の文字は大文字にする必要があります。<br>
また、中間テーブルのモデルを作成する場合は、各モデルの名前を付ける必要があります。<br>
<br>
例) CommentモデルとCategoryモデルの場合...
```shell
$ php artisan make:model CommentCategory
```

### マイグレーションの作成
```shell
$ php artisan make:migration create_comments_table
```
新しくマイグレーションを作成する場合は、「create_」という文字列を先頭に付けてください。<br>
また、「_table」という文字列を末尾に付けてください。<br>
**各単語毎に_で区切る必要がありますが、そんなことを毎回しなくても良くなる裏技があります。**
```shell
$ php artisan make:model Comment --migration
```
モデル作成のコマンドの末尾に「--migration」を付けると、モデルファイルと一緒に命名規則に沿ったマイグレーションファイルを作成してくれます。<br>
「--seeder」だと、モデルファイルと一緒に命名規則に沿ったシーダーファイルを作成してくれます。<br>
**中間テーブルのマイグレーションを自動作成する場合はファイル名が複数形になるので、名前を単数形に修正する必要があります。**

### シーダーの作成
```shell
$ php artisan make:seeder UsersSeeder
```
命名規則は以下の通りです。
- 最初の文字は大文字
- 関連するモデルの名前を入れる
- 関連するモデルが単体のモデルの場合は複数形に、中間テーブルは単数形にする
```php
# Commentモデルの場合(複数形)
$ php artisan make:seeder CommentsSeeder

# CommentCategoryモデルの場合(単数形)
$ php artisan make:seeder CommentCategorySeeder
```
- Seederを名前の後ろに付ける

### ルートの確認
```shell
$ php artisan route:list
```
現在、./server/routes/web.phpに設定されているルートが確認出来ます。