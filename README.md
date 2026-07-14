# LockerLoop CashPoint

近くの空きコインロッカーを探し、予約パス発行と地域送客のキャッシュポイント化までを見せる静的プロトタイプです。

## 機能

- 駅周辺ロッカーのエリア・サイズ・空き状況検索
- 予約料金、手数料、CashPoint還元の即時計算
- 運営者向け稼働率・月間粗利予測ダッシュボード
- LINE Messaging APIによる予約パス通知連携

## LINE通知

LINE Notifyは終了済みのため、`api/line-notify.js` でLINE Messaging APIのpush messageを使います。

必要な環境変数:

```env
LINE_CHANNEL_ACCESS_TOKEN=
LINE_TO_USER_ID=
```

詳しくは [LINE_SETUP.md](./LINE_SETUP.md) を参照してください。
