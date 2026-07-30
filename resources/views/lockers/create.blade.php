@extends('layouts.plain')

@section('title', 'ロッカーの場所を投稿する - ' . config('app.name'))
@section('description', '地図をタップして場所を選び、駅周辺のコインロッカーの名称・目印などを投稿できます。ログイン不要・匿名で投稿可能です。')

@section('content')
<div class="container my-4">
  <h1 class="h4 mb-3">➕ ロッカーの場所を投稿する</h1>
  <p class="text-muted small mb-3">地図をタップして場所を選択し、必要事項を入力してください。ログイン不要で投稿できます。</p>

  <div id="map" style="height: 360px;" class="rounded shadow-sm border mb-3"></div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('lockers.store') }}" class="bg-light p-3 rounded shadow-sm">
    @csrf
    <div style="position:absolute; left:-9999px;" aria-hidden="true">
      <label>ウェブサイト<input type="text" name="website" tabindex="-1" autocomplete="off"></label>
    </div>

    <div class="mb-3">
      <label class="form-label">駅名 <span class="text-danger">*</span></label>
      <input type="text" name="station_name" value="{{ old('station_name') }}" class="form-control" placeholder="例：静岡駅" required>
    </div>

    <div class="mb-3">
      <label class="form-label">ロッカーの名称・目印 <span class="text-danger">*</span></label>
      <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="例：北口地下道 B" required>
    </div>

    <div class="mb-3">
      <label class="form-label">場所の説明（任意）</label>
      <input type="text" name="area_label" value="{{ old('area_label') }}" class="form-control" placeholder="例：北口・地下道">
    </div>

    <div class="mb-3">
      <label class="form-label">駅からの徒歩目安（任意）</label>
      <input type="text" name="walk_time" value="{{ old('walk_time') }}" class="form-control" placeholder="例：徒歩3分">
    </div>

    <div class="row mb-3">
      <div class="col-4">
        <label class="form-label small">S参考価格（任意）</label>
        <input type="number" name="price_s" value="{{ old('price_s') }}" class="form-control" min="0" max="100000">
      </div>
      <div class="col-4">
        <label class="form-label small">M参考価格（任意）</label>
        <input type="number" name="price_m" value="{{ old('price_m') }}" class="form-control" min="0" max="100000">
      </div>
      <div class="col-4">
        <label class="form-label small">L参考価格（任意）</label>
        <input type="number" name="price_l" value="{{ old('price_l') }}" class="form-control" min="0" max="100000">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">ひとことメモ（任意）</label>
      <textarea name="notes" rows="2" class="form-control" maxlength="500" placeholder="例：雨の日でも濡れずに行けます">{{ old('notes') }}</textarea>
    </div>

    <div class="row mb-3">
      <div class="col-6">
        <label class="form-label">緯度 <span class="text-danger">*</span></label>
        <input type="text" id="lat" name="lat" value="{{ old('lat') }}" class="form-control" readonly required>
      </div>
      <div class="col-6">
        <label class="form-label">経度 <span class="text-danger">*</span></label>
        <input type="text" id="lng" name="lng" value="{{ old('lng') }}" class="form-control" readonly required>
      </div>
    </div>

    <button type="submit" class="btn btn-locker w-100">登録する</button>
  </form>
</div>
@endsection

@section('scripts')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const map = L.map('map').setView([35.6812, 139.7671], 8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker;
    map.on('click', function (e) {
      const lat = e.latlng.lat.toFixed(7);
      const lng = e.latlng.lng.toFixed(7);
      document.getElementById('lat').value = lat;
      document.getElementById('lng').value = lng;

      if (marker) {
        marker.setLatLng(e.latlng);
      } else {
        marker = L.marker(e.latlng).addTo(map);
      }
    });
  });
</script>
@endsection
