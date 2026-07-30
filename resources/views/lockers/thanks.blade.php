@extends('layouts.plain')

@section('content')
<div class="container text-center mt-5">
  <h1 class="h4 mb-3">🙌 投稿ありがとうございます！</h1>
  <p class="mb-4 text-muted">{{ config('app.name') }}に反映されました。</p>
  <a href="{{ route('lockers.index') }}" class="btn btn-locker">トップへ戻る</a>
</div>
@endsection
