# Storage Locker Near

駅周辺のコインロッカーを、地図・口コミ・空き状況で探せるLaravelアプリです。

## 主な機能

- ロッカー投稿（駅名、場所、サイズ別料金、徒歩時間）
- 駅・現在地ベースの検索
- S/M/L別の空き状況レポート投稿
- ロッカー詳細ページでの口コミ投稿
- LINEログイン連携によるお気に入り登録
- お気に入りロッカーに「空きあり」報告が出た際のLINE通知
- sitemap.xml / robots.txt / OGP / JSON-LD対応

## 技術スタック

- Laravel 12
- Blade + Bootstrap 5
- SQLite（開発時デフォルト）
- Vite
- LINE Login / LINE Messaging API

## セットアップ

```bash
composer install
npm install
copy .env.example .env
php artisan key:generate
```

SQLiteファイルを使う場合:

```bash
type nul > database\database.sqlite
php artisan migrate
```

## 開発起動

```bash
php artisan serve
npm run dev
```

## テスト・ビルド

```bash
php artisan test
npm run build
```

## 本番デプロイ（GitHub Actions）

`main` への push で [`.github/workflows/deploy.yml`](.github/workflows/deploy.yml) が実行されます。

事前に以下の Repository Secrets を設定してください。

- APP_KEY
- SSH_HOST
- SSH_USERNAME
- SSH_PRIVATE_KEY
- DEPLOY_PATH

## LINE通知の設定

必要な環境変数:

- LINE_LOGIN_CHANNEL_ID
- LINE_LOGIN_CHANNEL_SECRET
- LINE_LOGIN_REDIRECT_URI
- LINE_MESSAGING_CHANNEL_ACCESS_TOKEN
- LINE_MESSAGING_CHANNEL_SECRET

詳細は `LINE_SETUP.md` を参照してください。

## 定期通知コマンド

空きあり報告の通知は、以下のコマンドで実行します。

```bash
php artisan availability:check-watches
```

サーバーではcronで定期実行してください。
