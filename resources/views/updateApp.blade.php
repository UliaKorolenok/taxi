@extends('layouts.app')
@section('content')
<link href="{{ asset('public/css/home.css') }}" rel="stylesheet">
<div class="update">
    <div class="container">
        <h3 class="mb-4">Редактировать заявку</h3>

        <form action="{{$app->id}}" method="POST">
            @csrf


            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <label>Имя</label>
                        <input name="name" type="text" value="{{$app->name}}" class="form-control" placeholder="Имя">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <label>Телефон</label>
                        <input name="phone" type="tel" value="{{$app->phone}}" class="form-control" placeholder="Телефон">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col">
                    <div class="input_item">
                        <label>Дата</label>
                        <input name="date" type="date" value="{{$app->date}}" class="form-control" placeholder="Дата">
                    </div>
                </div>
                <div class="col-6 col">
                    <div class="input_item">
                        <label>Время</label>
                        <input name="time" type="time" value="{{$app->time}}" class="form-control" placeholder="Время">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <label>Откуда</label>
                        <input name="appFrom" type="text" value="{{$app->appFrom}}" class="form-control" placeholder="Откуда">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <label>Куда</label>
                        <input name="appTo" type="text" value="{{$app->appTo}}" class="form-control" placeholder="Куда">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <label>Тариф</label>
                        <input name="rate" type="text" value="{{$app->appRate}}" class="form-control" placeholder="Тариф">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <label>Количество человек</label>
                        <input name="count" type="number" value="{{$app->count}}" class="form-control" placeholder="Количество человек">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 radio">
                    <label>Наличие детей</label>
                    <input name="child" type="text" value="{{$app->child}}" class="form-control">
                </div>

                <div class="col-6 radio">
                    <div class="input_i">
                        <label>Наличие животных</label>
                        <input name="animals" type="text" value="{{$app->animals}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <label>Примечания</label>
                    <textarea name="notes" id="" placeholder="Примечания">{{$app->notes}}</textarea>
                </div>
            </div>
            <div class="text-center mb-4"> <button type="submit" class="button">Сохранить</button></div>
        </form>

    </div>
</div>

@endsection