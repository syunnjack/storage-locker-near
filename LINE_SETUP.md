# LINE連携セットアップ

Storage Locker Near は Laravel アプリとして LINE Login と LINE Messaging API を使います。

## 必要な環境変数

`.env` に以下を設定します。

```env
LINE_LOGIN_CHANNEL_ID=
LINE_LOGIN_CHANNEL_SECRET=
LINE_LOGIN_REDIRECT_URI=https://あなたのドメイン/line/callback
LINE_MESSAGING_CHANNEL_ACCESS_TOKEN=
LINE_MESSAGING_CHANNEL_SECRET=
```

## LINE Developers 側の設定

1. LINE Login チャネルを作成し、コールバックURLに `/line/callback` を設定
2. Messaging API チャネルを作成し、Webhook URL に `/line/webhook` を設定
3. Messaging API チャネルアクセストークン（長期）を発行
4. チャネルシークレットを `.env` に設定

## アプリ側のルート

- ログイン開始: `/line/login`
- コールバック: `/line/callback`
- Webhook受信: `/line/webhook`
- お気に入り通知ON/OFF: `/lockers/{locker}/favorite`

## 動作確認

1. ロッカー詳細ページで「LINE通知」ボタンを押す
2. LINEログイン完了後、対象ロッカーがお気に入り登録される
3. 空き報告を投稿した後、次のコマンドを実行

```bash
php artisan availability:check-watches
```

1. お気に入りユーザーへ「空きあり」のLINE通知が届くことを確認

## 注意点

- `LINE_LOGIN_REDIRECT_URI` は LINE Developers の設定値と完全一致させる
- Webhook URL は HTTPS 必須
- 本番では cron で `availability:check-watches` を定期実行する
