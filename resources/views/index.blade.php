@extends('layouts.default')
<script src="{{ asset('js/index.js') }}"></script>

@section('title', 'お問い合わせ')
@section('content')
<form class="form" id="form" action="{{ route('confirm') }}" method="POST">
  @csrf
  <div>
    <div class="form-item">
        <label class="form-item-lbl">お名前<span class="form-item-lbl-required"> ※</span></label>
        <div class="input-name-wrapper">
          <input type="text" name="lastname" class="form-item-input form-item-name-input" id="lastname" value="{{old('lastname')}}">
          <div class="lbl-name-wrapper">
            <label class="input-example">例）山田</label>
            <label class="error" id="lastname-error"></label>
            @error('lastname')<label class="error">{{ $message }}</label>@enderror
          </div>
        </div>
        <div class="input-name-wrapper">
          <input type="text" name="firstname" class="form-item-input form-item-name-input" id="firstname" value="{{old('firstname')}}">
          <div class="lbl-name-wrapper">
            <label class="input-example">例）太郎</label>
            <label class="error" id="firstname-error"></label>
            @error('firstname')<label class="error">{{ $message }}</label>@enderror
          </div>
        </div>
    </div>
  <div>
    <div class="form-item form-gender-item">
      <label class="form-item-lbl">性別<span class="form-item-lbl-required"> ※</span></label>
      <div class="form-item-radio">
        <input type="radio" name="gender" id="mail" class="radio-input" value="男性" {{ old('gender', '男性') == '男性' ? 'checked' : '' }}><label for="mail" class="gender-lbl">男性</label>
        <input type="radio" name="gender" id="femail" class="radio-input" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}><label for="femail" class="gender-lbl">女性</label>
      </div>
    </div>
    @error('gender')<p class="error">{{ $message }}</p>@enderror
  </div>
  <div>
    <div class="form-item">
      <label class="form-item-lbl">メールアドレス<span class="form-item-lbl-required"> ※</span></label>
      <div class="input-wrapper">
        <input type="email" name="email" class="form-item-input" id="email" value="{{old('email')}}">
        <div class="lbl-wrapper">
          <label class="input-example">例）test@example.com</label>
          <label class="error" id="email-error"></label>
          @error('email')<label class="error">{{ $message }}</label>@enderror
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="form-item">
      <label class="form-item-lbl">郵便番号<span class="form-item-lbl-required"> ※</span></label>
      <div class="input-wrapper">
        <div class="postcode-wrapper">
          <label for="postcode" class="postcode-lbl">&#12306;</label>
          <input type="text" name="postcode" class="form-item-input" id="postcode" value="{{old('postcode')}}" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
        </div>
        <div class="lbl-wrapper">
          <label class="input-example">例）123-4567</label>
          <label class="error" id="postcode-error"></label>
          @error('postcode')<label class="error">{{ $message }}</label>@enderror
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="form-item">
      <label class="form-item-lbl">住所<span class="form-item-lbl-required"> ※</span></label>
      <div class="input-wrapper">
        <input type="text" name="address" class="form-item-input" id="address" value="{{old('address')}}">
        <div class="lbl-wrapper">
          <label class="input-example">例）東京都渋谷区千駄ヶ谷1-2-3</label>
          <label class="error" id="address-error"></label>
          @error('address')<label class="error">{{ $message }}</label>@enderror
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="form-item">
      <label class="form-item-lbl">建物名</label>
      <div class="input-wrapper">
        <input type="text" name="building_name" class="form-item-input" id="building_name" value="{{old('building_name')}}">
        <div class="lbl-wrapper">
          <label class="input-example">例）千駄ヶ谷マンション101</label>
        </div>
      </div>
    </div>
  </div>
  <div>
    <div class="form-item form-opinion-item">
      <label class="form-item-lbl">ご意見<span class="form-item-lbl-required"> ※</span></label>
      <div class="input-wrapper">
        <textarea name="opinion" class="form-item-textarea" id="opinion">{{ old('opinion') }}</textarea>
        <div class="lbl-wrapper">
          <label class="error" id="opinion-error"></label>
          @error('opinion')<label class="error">{{ $message }}</label>@enderror
        </div>
      </div>
    </div>
  </div>
  <button type="submit" class="btn">確認</button>
</form>
@endsection