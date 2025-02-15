@extends('layouts.default')

@section('title', 'イベント登録')
@section('content')
<form action="{{route('events.store')}}" method="post">
    @csrf
    <label for="title">イベント名</label>
    <input type="text" name="title">
    <button type="submit">登録</button>
</form>

@endsection