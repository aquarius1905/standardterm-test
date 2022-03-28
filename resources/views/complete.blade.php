@extends('layouts.default')

@section('content')
<div class="complete-form">
  <p class="complete-content">ご意見いただきありがとうございました。</p>
  <div class="btn-wrapper">
    <form action="{{ route('index') }}" method="get">
      <button class="btn">トップページへ</button>
    </form>
  </div>
</div>
@endsection