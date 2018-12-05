# 環境構築

## Docker-compose install
```
# Homebrew インストール (まだの場合)
$ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
# brewでインストール (まだの場合)
$ brew cask install docker
$ open /Applications/Docker.app
```

## コマンド
```
# 起動
$ docker-compose up -d
# 削除
$ docker-compose down
```

## .env
```
...
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cm_db
DB_USERNAME=cm_user
DB_PASSWORD=password

# Facebook Login(Test)
 FACEBOOK_APP_ID = 271409093570484
 FACEBOOK_APP_SECRET = 66450913d1e8044cd73b29ce62ff051d
 FACEBOOK_CALLBACK_URL = http://localhost/login/facebook/callback
...
```
