@extends('layouts.app')
@section('content')
@section('css')
<link href="{{ asset('css/error.css') }}" rel="stylesheet">
@endsection
<div class="error404">
    <div class="container">
        <p>Упс, страница не найдена!</p>
        <p> <a href="/">Вернуться на главную</a></p>
    </div>
</div>
@endsection
