# LINE通知連携セットアップ

LINE Notifyは2025年3月31日に終了済みのため、このデモではLINE公式アカウントのMessaging APIを使います。

## 必要な環境変数

サーバー側に以下を設定してください。ブラウザ側のJavaScriptやHTMLにはアクセストークンを置かないでください。

```env
LINE_CHANNEL_ACCESS_TOKEN=LINE Developersで発行したMessaging APIのチャネルアクセストークン
LINE_CHANNEL_SECRET=LINE DevelopersのMessaging APIチャネルシークレット
LINE_TO_USER_ID=通知を受け取るLINEユーザーID
```

## デプロイ構成

`api/line-notify.js` はVercel形式のServerless Functionとして動く想定です。

1. LINE DevelopersでMessaging APIチャネルを作成します。
2. チャネルアクセストークンを発行します。
3. 通知先ユーザーがLINE公式アカウントを友だち追加します。
4. デプロイ先の環境変数に `LINE_CHANNEL_ACCESS_TOKEN` と `LINE_CHANNEL_SECRET` を登録します。
5. LINE Developers ConsoleのWebhook URLに `https://あなたのドメイン/api/line-webhook` を設定します。
6. LINE公式アカウントへ自分のLINEからメッセージを送ります。
7. VercelのFunctionログ、またはWebhookレスポンスに出る `userId` を `LINE_TO_USER_ID` に設定します。
8. 予約パネルの「LINEで通知」ボタンから送信を確認します。

## User ID確認用Webhook

`api/line-webhook.js` は、LINEから届いたイベントの `source.userId` をログに出します。`LINE_CHANNEL_SECRET` を設定している場合は、LINE署名も検証します。

Webhook URL:

```text
https://あなたのドメイン/api/line-webhook
```

## 送信内容

通知には、選択中のロッカー名、徒歩目安、サイズ、利用時間、空き数、料金、CashPoint、近隣特典を含めます。

## 補足

別のAPIパスで運用する場合は、ページ読み込み前に以下を設定してください。

```html
<script>
  window.LOCKERLOOP_CONFIG = {
    LINE_NOTIFY_ENDPOINT: "https://example.com/api/line-notify"
  };
</script>
```
