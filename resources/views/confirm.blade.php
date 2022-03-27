@extends('layouts.default')
@section('title', '内容確認')

@section('content')
<form class="form" name="confirm-form" action="{{ route('send') }}" method="POST">
  @csrf
  <div class="confirm-item">
    <p class="confirm-item-lbl">お名前</p>
    <p class="form-item-content">{{ $inputs['lastname'] }}　{{ $inputs['firstname'] }}</p>
    <input type="hidden" name="lastname" value="{{ $inputs['lastname'] }}" >
    <input type="hidden" name="firstname" value="{{ $inputs['firstname'] }}" >
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">性別</p>
    <p class="form-item-content">{{ $inputs['gender'] }}</p>
    <input type="hidden" name="gender" value="{{ $inputs['gender'] === '男性' ? 1 : 2 }}">
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">メールアドレス</p>
    <p class="form-item-content">{{ $inputs['email'] }}</p>
    <input type="hidden" name="email" value="{{ $inputs['email'] }}">
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">郵便番号</p>
    <p class="form-item-content">{{ $inputs['postcode'] }}</p>
    <input type="hidden" name="postcode" value="{{ $inputs['postcode'] }}">
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">住所</p>
    <p class="form-item-content">{{ $inputs['address'] }}</p>
    <input type="hidden" name="address" value="{{ $inputs['address'] }}">
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">建物名</p>
    <p class="form-item-content">{{ $inputs['building_name'] }}</p>
    <input type="hidden" name="building_name" value="{{ $inputs['building_name'] }}">
  </div>
  <div class="confirm-item">
    <p class="confirm-item-lbl">ご意見</p>
    <p class="form-item-content">{{ $inputs['opinion'] }}</p>
    <input type="hidden" name="opinion" value="{{ $inputs['opinion'] }}">
  </div>
  </div>
  <div class="btn-wrapper">
    <button type="submit" class="btn" name="action" value="send">送信</button>
    <button type="submit" class="modify-btn" name="action" value="back">修正する</button>
  </div>
</form>
@endsection
