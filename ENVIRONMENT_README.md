# 環境構築

## Docker-compose install
```
# Homebrew インストール (まだの場合)
$ /usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
# brewでインストール (まだの場合)
$ brew cask install docker
$ open /Applications/Docker.app
```

# npm or yarn

nodeを使う場合  
```
# SEE: https://qiita.com/Alex_mht_code/items/422f5ce10d9c9d5729b7
```

Yarnを使う場合  
```
$ brew install yarn
```

# composer

```
# SEE: https://qiita.com/naoki_koreeda/items/726598a938f3c211ff49
$ brew install composer
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
# 設定方法 https://iriedev.kibe.la/@irie-dev/105
FACEBOOK_APP_ID = @@@@@@@@@@@@@@
FACEBOOK_APP_SECRET = @@@@@@@@@@@@@@@
FACEBOOK_CALLBACK_URL = http://localhost/facebook/callback
...
```
