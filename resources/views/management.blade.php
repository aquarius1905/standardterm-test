@extends('layouts.default')
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/management.js') }}"></script>
<style>
  svg.w-5.h-5 {  /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>
@section('title', '管理システム')
@section('content')
<div class="search">
  <form class="search-form" action="{{ route('search') }}" method="get" id="search-form">
    @csrf
    <div>
      <div class="search-item">
        <label class="search-item-lbl">お名前</label>
        <input type="text" name="fullname" class="search-item-input" id="name" value="@if(isset($inputs) && isset($inputs['fullname'])){{ $inputs['fullname'] }}@endif">
        <label class="search-item-lbl search-item-gender-lbl">性別</label>
        <input type="radio" name="gender" id="all" class="radio-input" value="全て" "@if(!isset($inputs)) checked @elseif(isset($inputs['gender']) && ($inputs['gender'] == '全て')) checked @elseif (old('gender') == '全て') checked @endif">
        <label for="all" class="gender-lbl">全て</label>
        <input type="radio" name="gender" id="mail" class="radio-input" value="男性" "@if(isset($inputs) && isset($inputs['gender']) && ($inputs['gender'] == '男性')) checked @elseif (old('gender') == '男性') checked @endif">
        <label for="mail" class="gender-lbl">男性</label>
        <input type="radio" name="gender" id="femail" class="radio-input" value="女性" "@if(isset($inputs) && isset($inputs['gender']) && ($inputs['gender'] == '女性')) checked @elseif (old('gender') == '女性') checked @endif">
        <label for="femail" class="gender-lbl">女性</label>
      </div>
      <div class="search-item">
        <label class="search-item-lbl">登録日</label>
        <input type="date" name="created_at_from" class="search-item-input" id="created_at_from" value="@if(isset($inputs) && isset($inputs['created_at_from'])){{ $inputs['created_at_from'] }}@endif" min="1900-01-01">
        <label class="search-item-term-lbl">～</label>
        <input type="date" name="created_at_to" class="search-item-input" id="created_at_to" value="@if(isset($inputs) && isset($inputs['created_at_to'])){{ $inputs['created_at_to'] }}@endif" min="1900-01-01">
      </div>
      <div class="search-item">
        <label class="search-item-lbl">メールアドレス</label>
        <input type="text" name="email" class="search-item-input" id="email" value="@if(isset($inputs) && isset($inputs['email'])){{ $inputs['email'] }}@endif">
      </div>
    </div>
    <div class="btn-wrapper">
      <button type="submit" class="search-btn">検索</button>
      <a href="/management" class="reset-btn">リセット</a>
    </div>
  </form>
</div>
<div class="management-form">
  <div class="pagination-wrapper">
    {{ $items->links() }}
  </div>
  <table class="management-table">
    <tr class="header-tr">
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
      <th></th>
    </tr>
    @foreach ($items as $item)
    <tr>
      <td class="id-td">
        {{$item->id}}
      </td>
      <td>
        {{$item->fullname}}
      </td>
      <td class="gender-td">
        {{($item->gender === 1) ? '男性' : '女性' }}
      </td>
      <td>
        {{$item->email}}
      </td>
      <td class="opinion-td">
        <p class="opinion-short">{{$item->opinion}}</p>
        <p class="opinion-full">{{$item->opinion}}</p>
      </td>
      <td>
        <form action="{{ route('delete', ['id' => $item->id, 'page' => $items->currentPage(), 'inputs' => $inputs ]) }}" method="post" onsubmit="confirmDeletion(event)">
          @csrf
          <button type="submit" class="delete-btn">削除</button>
      </form>
      </td>
    </tr>
    @endforeach
  </table>
</div>
@endsection