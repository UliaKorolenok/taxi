@extends('layouts.app')
@section('title')
<title>Контакты компании ТаврияЮг</title>
<meta name="description" content="ТаврияЮг - Трансферная служба междугороднего такси по Югу и центральной части России, СНГ" />
<meta name="keywords" content="такси номер, номер такси Крым" />
@endsection
@section('city')
Крым
@endsection
@section('css')
<link href="{{ asset('public/css/contact.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="banner">
    <div class="container">
        <div class="title">
            <h1>
                Контакты
            </h1>
        </div>
    </div>
</div>
<div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h3 class="text-left mt-1">Свяжитесь с нами любым удобным для вас способом!</h3>
                <p>
                    <a href="https://t.me/+375293200393"><i class="fa-brands fa-telegram"></i></a>
                    <a href="viber://add?number=375293200393"><i class="fa-brands fa-viber"></i></a>
                    <a href="https://wa.me/375293200393"><i class="fa-brands fa-whatsapp"></i></a>
                </p>
                <p>
                    <i class="fa-solid fa-envelope"></i> email@mail.ru
                </p>
                <p>
                    <i class="fa-solid fa-phone"></i> +7 (000) 000-00-00
                </p>
                <p>
                    <i class="fa-solid fa-phone"></i> +7 (000) 000-00-00
                </p>
                <p  class="mb-0">
                    Адрес: Республика Крым,
                </p>
                <p class="mt-1">
                    г. Алушта, ул. Ленина, д. 0
                </p>
                <p class="mt-1">
                   Время работы: круглосуточно
                </p>

            </div>
            <div class="col-6">

                <div class="form">
                    <h3>Возникли вопросы? Заполните форму</h3>
                    <form id="question" method="POST" class="question" autocomplete="off" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <p class="contact-form__message text-center"></p>
                        <div class="row">
                            <div class="col-12">
                                <div class="input_item">
                                    <input type="text" name="name" class="form-control" placeholder="Имя" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input_item">
                                    <input type="tel" name="phone" class="form-control" placeholder="Телефон" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="input_item">
                                    <input type="email" name="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-12">
                                <div class="input_item">
                                    <textarea type="text" name="question" class="form-control" placeholder="Вопрос"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="button">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="public/js/telegramform.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $(function() {
        $('input[type="tel"]').mask('+7(000)000-00-00');
    });
</script>    
@endsection