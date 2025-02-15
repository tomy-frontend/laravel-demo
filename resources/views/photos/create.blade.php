@extends('layouts.default')

@section('title', '画像アップロード')
@section('content')

@if (session()->has('success'))
    <p>{{session()->get('success')}}</p>
@endif

    <form action="{{ route('photos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="image">画像</label>
        <input type="file" name="image" id="image">
        <button type="submit">アップロード</button>
    </form>
@endsection