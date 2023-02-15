
# project_template
Docker ComposeによるLaravelの開発環境（MySQL+phpMyAdmin）

## ファイルの設定
1. 任意のディレクトリでクローン
```
git clone https://github.com/e-value/project_template.git
```

2. `project_template`を開発するプロジェクト名に変更

3. 変更したプロジェクトのディレクトリに移動\
    `cd multi-auth`

4. VSCODEで起動し、`docker/app/000-default.`の2ヶ所の`multi-auth`を作成するプロジェクト名に変更

5. `docker-compose.yml`の`MYSQL_DATABASE`の`multi-auth`を作成するプロジェクト名に変更

```
MYSQL_DATABASE: multi-auth
MYSQL_USER: laravel_user
MYSQL_PASSWORD: laravel_pass
```
6. `docker-compose.yml`の`container_name`の`multi-auth`を作成するプロジェクト名に変更

```
container_name: multi-auth_app
container_name: multi-auth_db
container_name: multi-auth_phpmyadmin

```
## ビルドと起動
7. ビルド
```
docker compose build
```

8. コンテナを起動
```
docker compose up -d
```

9. コンテナ内に入る
```
docker compose exec app bash
```

## プロジェクト作成
10. ※multi-authは作成するproject名

```
composer create-project --prefer-dist laravel/laravel project-name "8.*"
```

11. プロジェクトの作業フォルダに入る\
    `cd multi-auth`

## .env設定

12. `.env`を以下のように編集する\
    ※multi-authには作成したプロジェクト名
```
DB_CONNECTION=mysql 
DB_HOST=multi-auth_db 
DB_PORT=3306 
DB_DATABASE=multi-auth
DB_USERNAME=laravel_user 
DB_PASSWORD=laravel_pass
```

13. トップ画面にアクセス\
http://localhost

14. マイグレーション
```
php artisan migrate
```

15. phpmyadminににアクセス\
id: `laravel_user`\
pass: `laravel_pass`\
http://localhost:8080/

## 作業時
16. ビルド
```
docker compose up -d
```
```
docker compose exec app bash
```
```
cd multi-auth
```
※multi-authは開発したプロジェクト名

