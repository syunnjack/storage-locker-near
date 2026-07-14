# LINE通知連携セットアップ

LINE Notifyは2025年3月31日に終了済みのため、このデモではLINE公式アカウントのMessaging APIを使います。

## 必要な環境変数

サーバー側に以下を設定してください。ブラウザ側のJavaScriptやHTMLにはアクセストークンを置かないでください。

```env
LINE_CHANNEL_ACCESS_TOKEN=LINE Developersで発行したMessaging APIのチャネルアクセストークン
LINE_TO_USER_ID=通知を受け取るLINEユーザーID
```

## デプロイ構成

`api/line-notify.js` はVercel形式のServerless Functionとして動く想定です。

1. LINE DevelopersでMessaging APIチャネルを作成します。
2. チャネルアクセストークンを発行します。
3. 通知先ユーザーがLINE公式アカウントを友だち追加します。
4. LINE Developers ConsoleのBasic settingsで自分のUser IDを確認し、`LINE_TO_USER_ID` に設定します。
5. デプロイ先の環境変数に `LINE_CHANNEL_ACCESS_TOKEN` と `LINE_TO_USER_ID` を登録します。
6. 予約パネルの「LINEで通知」ボタンから送信を確認します。

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
