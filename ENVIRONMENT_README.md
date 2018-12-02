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
...
```
