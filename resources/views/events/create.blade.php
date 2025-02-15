@extends('layouts.default')

@section('title', 'イベント登録')
@section('content')

{{-- sessionに保存したメッセージを一時的に表示 --}}
@if(session()->has('success'))
    <p>{{session()->get('success')}}</p>
@endif

<form action="{{route('events.store')}}" method="post">
    @csrf
    <label for="title">イベント名</label>
    <input type="text" name="title">
    <button type="submit">登録</button>
</form>

@endsection