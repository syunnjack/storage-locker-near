@extends('layouts.plain')

@section('title', $locker->name . ' の空き状況・口コミ | ' . config('app.name'))
@section('description', $locker->name . '（' . $locker->station_name . '）の場所・サイズ別空き状況の口コミ・写真付き口コミを確認できます。')

@push('structured-data')
<script type="application/ld+json">
{!! json_encode([
  '@@context' => 'https://schema.org',
  '@type' => 'BreadcrumbList',
  'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => config('app.name'), 'item' => url('/')],
      ['@type' => 'ListItem', 'position' => 2, 'name' => $locker->name, 'item' => url("/lockers/{$locker->id}")],
  ],
], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
<script type="application/ld+json">
{!! json_encode(array_filter([
  '@@context' => 'https://schema.org',
  '@type' => 'Place',
  'name' => $locker->name,
  'description' => trim($locker->station_name . ' ' . $locker->area_label),
  'geo' => [
      '@type' => 'GeoCoordinates',
      'latitude' => $locker->lat,
      'longitude' => $locker->lng,
  ],
]), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) !!}
</script>
@endpush

@section('content')
<div class="container my-4">
  <div class="card shadow-sm">
    <div class="card-body p-4">
      <h1 class="h3 fw-bold mb-3">{{ $locker->name }}</h1>
      <span class="badge bg-light text-dark border mb-2">{{ $locker->station_name }}</span>
      @if($locker->area_label)
        <p class="text-secondary small mb-1">場所: {{ $locker->area_label }}</p>
      @endif
      @if($locker->walk_time)
        <p class="text-secondary small mb-1">駅から: {{ $locker->walk_time }}</p>
      @endif
      @if($locker->notes)
        <p class="text-muted mb-2">{{ $locker->notes }}</p>
      @endif
      @if($locker->price_s || $locker->price_m || $locker->price_l)
        <p class="text-secondary small mb-4">
          参考価格
          @if($locker->price_s) ／ S: ¥{{ number_format($locker->price_s) }} @endif
          @if($locker->price_m) ／ M: ¥{{ number_format($locker->price_m) }} @endif
          @if($locker->price_l) ／ L: ¥{{ number_format($locker->price_l) }} @endif
          <br><small class="text-muted">投稿時点の情報です。実際の料金は現地の表示でご確認ください。</small>
        </p>
      @endif

      <div class="mb-3">
        <a href="{{ route('lockers.index') }}" class="btn btn-secondary">トップページに戻る</a>
      </div>

      @if (session('success'))
        <div class="alert alert-success py-2 small">{{ session('success') }}</div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger py-2 small">{{ $errors->first() }}</div>
      @endif

      <form method="POST" action="{{ route('lockers.favorite.toggle', $locker) }}" class="mb-4">
        @csrf
        @if ($isWatching)
          <button type="submit" class="btn btn-outline-secondary">🔕 通知をやめる</button>
        @else
          {{-- LINEの認証情報が未設定のうちは、押すとLINE側でエラーになるので出さない --}}
          @if (config('services.line.login_channel_id'))
          <button type="submit" class="btn btn-line">🔔 空きありの報告が投稿されたらLINEで通知</button>
          @else
            <button type="button" class="btn btn-secondary" disabled>🔔 空きありの報告が投稿されたらLINEで通知（準備中）</button>
          @endif
        @endif
      </form>

      <h2 class="h5 mb-2">サイズ別の空き状況</h2>
      <div class="mb-3">
        @php $statusBySize = $locker->latestStatusBySize(); @endphp
        @foreach(['S', 'M', 'L'] as $size)
          @php $report = $statusBySize[$size]; @endphp
          <div class="d-flex justify-content-between align-items-center border-bottom py-2">
            <div>
              <strong>{{ $size }}サイズ</strong>
              @if($report)
                <span class="badge ms-2 {{ $report->status === 'あり' ? 'badge-status-yes' : ($report->status === '残りわずか' ? 'badge-status-few' : 'badge-status-full') }}">{{ $report->status }}</span>
              @else
                <span class="text-muted ms-2 small">まだ報告なし</span>
              @endif
            </div>
            @if($report)
              <small class="text-muted">{{ $report->created_at->diffForHumans() }}時点</small>
            @endif
          </div>
        @endforeach
      </div>

      <h3 class="h6 mt-3 mb-2">空き状況を投稿する</h3>
      <form action="{{ route('lockers.availability-reports.store', $locker) }}" method="POST" class="bg-light p-3 rounded shadow-sm mb-4">
        @csrf
        <div style="position:absolute; left:-9999px;" aria-hidden="true">
          <label>ウェブサイト<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>
        <div class="row">
          <div class="col-6 mb-2">
            <label class="form-label small">サイズ <span class="text-danger">*</span></label>
            <select name="size" class="form-select form-select-sm" required>
              <option value="">選択してください</option>
              <option value="S">S</option>
              <option value="M">M</option>
              <option value="L">L</option>
            </select>
          </div>
          <div class="col-6 mb-2">
            <label class="form-label small">空き状況 <span class="text-danger">*</span></label>
            <select name="status" class="form-select form-select-sm" required>
              <option value="">選択してください</option>
              <option value="あり">空きあり</option>
              <option value="残りわずか">残りわずか</option>
              <option value="満">満</option>
            </select>
          </div>
        </div>
        <div class="mb-2">
          <label class="form-label small">ニックネーム（任意）</label>
          <input type="text" name="nickname" class="form-control form-control-sm" maxlength="30">
        </div>
        <div class="mb-2">
          <label class="form-label small">コメント（任意）</label>
          <textarea name="comment" class="form-control form-control-sm" rows="2" maxlength="500" placeholder="例：改札を出てすぐ左のブロックが空いていました"></textarea>
        </div>
        <button type="submit" class="btn btn-dark">投稿する</button>
      </form>

      <h3 class="h6 mt-3 mb-2">投稿履歴</h3>
      <div id="reportList" class="mb-5">
        @forelse($locker->availabilityReports as $report)
          <div class="border rounded p-3 mb-2 bg-white">
            <div class="d-flex justify-content-between align-items-center">
              <div>
                <span class="badge {{ $report->status === 'あり' ? 'badge-status-yes' : ($report->status === '残りわずか' ? 'badge-status-few' : 'badge-status-full') }}">{{ $report->size }}: {{ $report->status }}</span>
              </div>
              <span class="text-muted small">{{ $report->created_at->format('Y-m-d H:i') }}</span>
            </div>
            <div class="small text-muted mt-1">{{ $report->nickname }}</div>
            @if($report->comment)
              <p class="mb-0 mt-1">{{ $report->comment }}</p>
            @endif
          </div>
        @empty
          <p class="text-muted">まだ空き状況の投稿がありません。</p>
        @endforelse
      </div>

      <h3 class="h6 mt-4 mb-2">写真付き口コミを投稿する</h3>
      <p class="text-muted small">通路の様子や目印になるものの写真を投稿できます。人物が写らないようご配慮をお願いします。</p>
      <form action="{{ route('lockers.reviews.store', $locker) }}" method="POST" enctype="multipart/form-data" class="bg-light p-3 rounded shadow-sm">
        @csrf
        <div style="position:absolute; left:-9999px;" aria-hidden="true">
          <label>ウェブサイト<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
        </div>
        <div class="mb-2">
          <label class="form-label small">ニックネーム（任意）</label>
          <input type="text" name="nickname" class="form-control form-control-sm" maxlength="30">
        </div>
        <div class="mb-2">
          <label class="form-label small">評価</label>
          <select name="rating" class="form-select form-select-sm" required>
            <option value="">選択してください</option>
            <option value="5">★★★★★</option>
            <option value="4">★★★★☆</option>
            <option value="3">★★★☆☆</option>
            <option value="2">★★☆☆☆</option>
            <option value="1">★☆☆☆☆</option>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label small">口コミ</label>
          <textarea name="comment" class="form-control form-control-sm" rows="3" minlength="5" maxlength="1000" required></textarea>
        </div>
        <div class="mb-2">
          <label class="form-label small">写真（任意・人物が写らないもの）</label>
          <input type="file" name="photo" accept="image/*" class="form-control form-control-sm">
        </div>
        <button type="submit" class="btn btn-dark">投稿する</button>
      </form>

      <h3 class="h6 mt-5 mb-3">口コミ</h3>
      <div id="reviewList">
        @forelse($locker->reviews as $review)
          <div class="card mb-3 bg-light">
            @if($review->photo_path)
              <img src="{{ \Illuminate\Support\Facades\Storage::url($review->photo_path) }}" class="card-img-top" style="max-height:320px;object-fit:cover;" alt="{{ $locker->name }}の口コミ写真">
            @endif
            <div class="card-body">
              <div>{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }} <strong>{{ $review->nickname }}</strong></div>
              <p class="mb-1">{{ $review->comment }}</p>
              <small class="text-muted">投稿日: {{ $review->created_at->format('Y/m/d H:i') }}</small>
            </div>
          </div>
        @empty
          <p class="text-muted">まだ口コミはありません。</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection
