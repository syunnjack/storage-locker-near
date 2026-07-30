@extends('layouts.plain')

@section('title', 'このサイトについて | ' . config('app.name'))
@section('description', config('app.name') . 'の運営方針、データの取り扱い、口コミ・LINE通知の仕組みについて説明しています。')

@section('content')
<div class="container my-4" style="max-width: 720px;">
  <h1 class="h4 fw-bold mb-4">このサイトについて</h1>

  <section class="mb-4">
    <h2 class="h6">サイトの目的</h2>
    <p class="text-muted small">
      「{{ config('app.name') }}」は、駅周辺のコインロッカーの場所を地図から探せる投稿型サイトです。新しいロッカーは誰でもログイン不要・匿名で投稿でき、
      実際にその場にいる利用者がサイズ別の空き状況を投稿することで情報が更新されていきます。
      当サイトはロッカー事業者と提携しておらず、公式のリアルタイム在庫データは保有していません。
    </p>
  </section>

  <section class="mb-4">
    <h2 class="h6">空き状況の投稿について</h2>
    <p class="text-muted small">
      掲載しているサイズ別の空き状況（あり/残りわずか/満）は、すべて利用者からの投稿によるものです。運営による事実確認は行っておらず、
      投稿された時点の情報のため、実際に到着した時点では状況が変わっている場合があります。荷物を預ける前に、必ず現地で最新の状況をご確認ください。
      参考価格として表示している金額も投稿者による申告であり、実際の料金は現地の表示で確認してください。
    </p>
  </section>

  <section class="mb-4">
    <h2 class="h6">写真・プライバシーへの配慮について</h2>
    <p class="text-muted small">
      写真付き口コミでは、通路の様子や目印になるものの写真投稿を想定しており、人物が写った写真は投稿しないようお願いしています。
      不適切な写真を発見した場合は速やかに削除などの対応を行います。
    </p>
  </section>

  <section class="mb-4">
    <h2 class="h6">LINE通知について</h2>
    <p class="text-muted small">
      各ロッカーのページから「🔔 空きありの報告が投稿されたらLINEで通知」を選ぶと、LINEログインのうえそのロッカーを通知対象として登録できます。
      「残りわずか」「満」の報告では通知せず、「空きあり」の報告があった時だけお知らせすることで、探している方に必要な情報だけをお届けします。
      これも利用者投稿に基づく通知であり、公式の在庫確認ではない点にご注意ください。
    </p>
  </section>

  <section class="mb-4">
    <h2 class="h6">口コミ・投稿について</h2>
    <p class="text-muted small">
      口コミ（写真を含む）や新規ロッカーの投稿は、どなたでもログイン不要で行えます。投稿内容は運営による事前確認を行わず即時反映されますが、
      不適切な投稿を発見した場合は内容を精査のうえ削除などの対応を行います。
    </p>
  </section>

  <a href="{{ route('lockers.index') }}" class="d-block text-center text-muted mt-4">トップページに戻る</a>
</div>
@endsection
