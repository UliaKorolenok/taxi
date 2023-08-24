@extends('layouts.app')
@section('title')
<title>ТаврияЮг - админ-панель/title>
<meta name="robots" content="noindex, nofollow">
@endsection
@section('content')
<link href="{{ asset('public/css/home.css') }}" rel="stylesheet">
@if (Auth::user()->email == 'admin@gmail.com')

<div class="container">
    <div class="block-popup">
        <h3 class="mt-2 mb-4">Добавить заявку</h3>

        <form id="form-contact" method="POST" class="contact-form" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="preloader"></div>
            <p class="contact-form__message"></p>
            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <input name="name" type="text" class="form-control" placeholder="Имя">
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <input name="phone" type="tel" class="form-control" placeholder="Телефон">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col">
                    <div class="input_item">
                        <input name="date" type="date" class="form-control" placeholder="Дата">
                    </div>
                </div>
                <div class="col-6 col">
                    <div class="input_item">
                        <input name="time" type="time" class="form-control" placeholder="Время">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <select name="from" class="form-control">
                            <option value="-1">Откуда</option>
                            <option value="Адлер">Адлер</option>
                            <option value="Алупка">Алупка</option>
                            <option value="Алушта (портовый город)">Алушта (портовый город)</option>
                            <option value="Анапа">Анапа</option>
                            <option value="Армянск">Армянск</option>
                            <option value="Бахчисарай">Бахчисарай</option>
                            <option value="Брянск">Брянск</option>
                            <option value="Великий Новгород">Великий Новгород</option>
                            <option value="Владимир">Владимир</option>
                            <option value="Волгоград">Волгоград</option>
                            <option value="Вологда">Вологда</option>
                            <option value="Воронеж">Воронеж</option>
                            <option value="Геленджик">Геленджик</option>
                            <option value="Джанкой">Джанкой</option>
                            <option value="Джубга">Джубга</option>
                            <option value="Евпатория (портовый город)">Евпатория (портовый город)</option>
                            <option value="Казань">Казань</option>
                            <option value="Керчь (портовый город)">Керчь (портовый город)</option>
                            <option value="Краснодар">Краснодар</option>
                            <option value="Красноперекопск">Красноперекопск</option>
                            <option value="Липецк">Липецк</option>
                            <option value="Минеральные Воды">Минеральные Воды</option>
                            <option value="Москва">Москва</option>
                            <option value="Нижний Новгород">Нижний Новгород</option>
                            <option value="Новороссийск">Новороссийск</option>
                            <option value="Пенза">Пенза</option>
                            <option value="Псков">Псков</option>
                            <option value="Пятигорск">Пятигорск</option>
                            <option value="Ростов на Дону">Ростов на Дону</option>
                            <option value="Рязань">Рязань</option>
                            <option value="Саки">Саки</option>
                            <option value="Самара">Самара</option>
                            <option value="Санкт-Петербург">Санкт-Петербург</option>
                            <option value="Саратов">Саратов</option>
                            <option value="Севастополь (портовый город)">Севастополь (портовый город)</option>
                            <option value="Симферополь">Симферополь</option>
                            <option value="Смоленск">Смоленск</option>
                            <option value="Сочи">Сочи</option>
                            <option value="Судак">Судак</option>
                            <option value="Тамбов">Тамбов</option>
                            <option value="Темрюк">Темрюк</option>
                            <option value="Туапсе">Туапсе</option>
                            <option value="Тула">Тула</option>
                            <option value="Ульяновск">Ульяновск</option>
                            <option value="Феодосия (портовый город)">Феодосия (портовый город)</option>
                            <option value="Щёлкино">Щёлкино</option>
                            <option value="Ялта (портовый город)">Ялта (портовый город)</option>
                            <option value="Ярославль">Ярославль</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <select name="to" class="form-control">
                            <option value="-1">Куда</option>
                            <option value="Адлер">Адлер</option>
                            <option value="Алупка">Алупка</option>
                            <option value="Алушта (портовый город)">Алушта (портовый город)</option>
                            <option value="Анапа">Анапа</option>
                            <option value="Армянск">Армянск</option>
                            <option value="Бахчисарай">Бахчисарай</option>
                            <option value="Брянск">Брянск</option>
                            <option value="Великий Новгород">Великий Новгород</option>
                            <option value="Владимир">Владимир</option>
                            <option value="Волгоград">Волгоград</option>
                            <option value="Вологда">Вологда</option>
                            <option value="Воронеж">Воронеж</option>
                            <option value="Геленджик">Геленджик</option>
                            <option value="Джанкой">Джанкой</option>
                            <option value="Джубга">Джубга</option>
                            <option value="Евпатория (портовый город)">Евпатория (портовый город)</option>
                            <option value="Казань">Казань</option>
                            <option value="Керчь (портовый город)">Керчь (портовый город)</option>
                            <option value="Краснодар">Краснодар</option>
                            <option value="Красноперекопск">Красноперекопск</option>
                            <option value="Липецк">Липецк</option>
                            <option value="Минеральные Воды">Минеральные Воды</option>
                            <option value="Москва">Москва</option>
                            <option value="Нижний Новгород">Нижний Новгород</option>
                            <option value="Новороссийск">Новороссийск</option>
                            <option value="Пенза">Пенза</option>
                            <option value="Псков">Псков</option>
                            <option value="Пятигорск">Пятигорск</option>
                            <option value="Ростов на Дону">Ростов на Дону</option>
                            <option value="Рязань">Рязань</option>
                            <option value="Саки">Саки</option>
                            <option value="Самара">Самара</option>
                            <option value="Санкт-Петербург">Санкт-Петербург</option>
                            <option value="Саратов">Саратов</option>
                            <option value="Севастополь (портовый город)">Севастополь (портовый город)</option>
                            <option value="Симферополь">Симферополь</option>
                            <option value="Смоленск">Смоленск</option>
                            <option value="Сочи">Сочи</option>
                            <option value="Судак">Судак</option>
                            <option value="Тамбов">Тамбов</option>
                            <option value="Темрюк">Темрюк</option>
                            <option value="Туапсе">Туапсе</option>
                            <option value="Тула">Тула</option>
                            <option value="Ульяновск">Ульяновск</option>
                            <option value="Феодосия (портовый город)">Феодосия (портовый город)</option>
                            <option value="Щёлкино">Щёлкино</option>
                            <option value="Ялта (портовый город)">Ялта (портовый город)</option>
                            <option value="Ярославль">Ярославль</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="input_item">
                        <select class="form-control" name="rate">
                            <option value="-1">Выберите тариф</option>
                            <option value="стандарт">Стандарт</option>
                            <option value="комфорт">Комфорт</option>
                            <option value="бизнес">Бизнес</option>
                            <option value="минивэн">Минивэн</option>
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input_item">
                        <select class="form-control" name="count">
                            <option value="-1">Количество человек</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 radio">
                    <div class="input_i">
                        <p> Наличие детей</p>
                        <input type="radio" name="child" value="Да" checked>
                        <label>Да</label>
                        <input type="radio" name="child" value="Нет">
                        <label>Нет</label>
                    </div>
                </div>

                <div class="col-6 radio">
                    <div class="input_i">
                        <p> Наличие животных</p>
                        <input type="radio" name="animals" value="Да" checked>
                        <label>Да</label>
                        <input type="radio" name="animals" value="Нет">
                        <label>Нет</label>
                    </div>
                </div>
            </div>
            <div>
                <textarea name="notes" id="" placeholder="Примечания"></textarea>
                <p class="text">
                    * при наличии багажа, укажите его количество в примечании, а так же при наличии детей - их возраст.
                </p>
            </div>
            <div class="text-center mb-4"> <button type="submit" class="button">Добавить</button></div>
        </form>

    </div>
    <div class="overlay"></div>
</div>



<div class="home">
    <div class="container">
        <h3 class="mb-4">Необработанные заявки</h3>
        <div class="tabs">
            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
            <label for="tab-btn-1">Заявки</label>
            <input type="radio" name="tab-btn" id="tab-btn-2" value="">
            <label for="tab-btn-2">Звонки</label>
            <input type="radio" name="tab-btn" id="tab-btn-3" value="">
            <label for="tab-btn-3">Отзывы</label>
            <input type="radio" name="tab-btn" id="tab-btn-4" value="">
            <label for="tab-btn-4">Вопросы</label>

            <div id="content-1">
                <div class="row mb-2">
                    <div class="col-4">
                        <button class="btn btn-outline-dark openFormApp">Добавить заявку</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Дата</th>
                            <th>Время</th>
                            <th>Откуда</th>
                            <th>Куда</th>
                            <th>Тариф</th>
                            <th>Кол-во человек</th>
                            <th>Дети</th>
                            <th>Животные</th>
                            <th>Примечания</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appli as $el)
                        @if($el->processed == false)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td class="phone">{{$el->phone}}</td>
                            <td>{{$el->date}}</td>
                            <td>{{$el->time}}</td>
                            <td>{{$el->appFrom}}</td>
                            <td>{{$el->appTo}}</td>
                            <td>{{$el->appRate}}</td>
                            <td>{{$el->count}}</td>
                            <td>{{$el->child}}</td>
                            <td>{{$el->animals}}</td>
                            <td class="text">{{$el->notes}}</td>
                            <td>
                                <a href="updateApp/{{$el->id}}">Редакт.</a> / <a href="appProcessing/{{$el->id}}">Обработано</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Дата отправления заявки</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calls as $el)
                        @if($el->processed == false)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->dateSent}}</td>
                            <td>
                                 <a href="callProcessing/{{$el->id}}">Обработано</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Отзыв</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $el)
                        @if($el->processed == false)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->email}}</td>
                            <td class="text">{{$el->review}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content-4">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Вопрос</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($questions as $el)
                        @if($el->processed == false)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->email}}</td>
                            <td class="text">{{$el->question}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <h3 class="mb-4 mt-5">Обработанные заявки</h3>
        <div class="tabs">
            <input type="radio" name="tab-btn1" id="tab-btn-5" value="" checked>
            <label for="tab-btn-5">Заявки</label>
            <input type="radio" name="tab-btn1" id="tab-btn-6" value="">
            <label for="tab-btn-6">Звонки</label>
            <input type="radio" name="tab-btn1" id="tab-btn-7" value="">
            <label for="tab-btn-7">Отзывы</label>

            <div id="content-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Дата</th>
                            <th>Время</th>
                            <th>Откуда</th>
                            <th>Куда</th>
                            <th>Тариф</th>
                            <th>Кол-во человек</th>
                            <th>Дети</th>
                            <th>Животные</th>
                            <th>Примечания</th>
                            <th>Дата отпр заявки</th>
                            <th>Дата обработки</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appli as $el)
                        @if($el->processed == true)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->date}}</td>
                            <td>{{$el->time}}</td>
                            <td>{{$el->appFrom}}</td>
                            <td>{{$el->appTo}}</td>
                            <td>{{$el->appRate}}</td>
                            <td>{{$el->count}}</td>
                            <td>{{$el->child}}</td>
                            <td>{{$el->animals}}</td>
                            <td>{{$el->notes}}</td>
                            <td>{{$el->dateSent}}</td>
                            <td>{{$el->dateProcessing}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content-6">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Дата отправления заявки</th>
                            <th>Дата обработки</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($calls as $el)
                        @if($el->processed == true)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->dateSent}}</td>
                            <td>{{$el->dateProcessing}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div id="content-7">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Имя</th>
                            <th>Телефон</th>
                            <th>Email</th>
                            <th>Отзыв</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $el)
                        @if($el->processed == false)
                        <tr>
                            <td>{{$el->name}}</td>
                            <td>{{$el->phone}}</td>
                            <td>{{$el->email}}</td>
                            <td class="text">{{$el->review}}</td>

                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $(function() {
        $('input[type="tel"]').mask('+7(000)000-00-00');
    });

    $('.openFormApp').click(function(e) {
        $('.block-popup, .overlay').fadeIn();
    })
    $('.overlay').click(function(e) {
        $('.block-popup, .overlay').fadeOut();
    })

    $(".contact-form").submit(function(event) {
        event.preventDefault();

        // Сообщения формы
        let successSendText = "Сообщение успешно отправлено";
        let errorSendText = "Сообщение не отправлено. Попробуйте еще раз!";
        let requiredFieldsText = "Заполните поля с именем и телефоном";

        // Сохраняем в переменную класс с параграфом для вывода сообщений об отправке
        let message = $(this).find(".contact-form__message");

        let form = $("#" + $(this).attr("id"))[0];
        let fd = new FormData(form);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/addApp",
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
            beforeSend: () => {
                $(".preloader").addClass("preloader_active");
            },
            success: function success(res) {
                $(".preloader").removeClass("preloader_active");

                console.log(res);

                let respond = $.parseJSON(res);

                if (respond === "SUCCESS") {
                    message.text(successSendText).css("color", "#21d4bb");
                    setTimeout(() => {
                        message.text("");
                    }, 4000);
                    location.reload();
                } else if (respond === "NOTVALID") {
                    message.text(requiredFieldsText).css("color", "#d42121");
                    setTimeout(() => {
                        message.text("");
                    }, 3000);
                } else {
                    message.text(errorSendText).css("color", "#d42121");
                    setTimeout(() => {
                        message.text("");
                    }, 4000);
                }
            }
        });
    });
</script>
@endif
@endsection