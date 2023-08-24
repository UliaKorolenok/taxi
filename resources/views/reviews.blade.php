@extends('layouts.app')
@section('title')
<title>Отзывы компании ТаврияЮг</title>
<meta name="description" content="ТаврияЮг - Трансферная служба междугороднего такси по Югу и центральной части России, СНГ" />
<meta name="keywords" content="отзывы, отзывы о такси крым" />
@endsection
@section('city')
Крым
@endsection
@section('css')
<link href="{{ asset('public/css/reviews.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="banner">
    <div class="container">
        <div class="title">
            <h1>
                Отзывы 
            </h1>
        </div>
    </div>
</div>
<div class="reviews">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="review">
                    <div class="row">
                        <div class="col-5">
                            <h4>Ольга</h4>
                        </div>
                        <div class="col-7">
                            <h4>★★★★★</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            17.06.2022
                        </div>
                    </div>
                    <div class="row">
                        <p>
                            Большое спасибо за поездку, всё было супер! Комфортная машина, вежливый водитель, всю дорогу слушали мой плейлист. Уже забронировала обратную поездку.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4 ">
                <div class="review ">
                    <div class="row">
                        <div class="col-5">
                            <h4>Евгения</h4>
                        </div>
                        <div class="col-7">
                            <h4>★★★★★</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            20.08.2022
                        </div>
                    </div>
                    <div class="row">
                        <p class="mt-4">
                            Удобный интерфейс сайта, получилось быстро и без проблем заказать машину.
                        </p>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="review">
                    <div class="row">
                        <div class="col-5">
                            <h4>Руслан</h4>
                        </div>
                        <div class="col-7">
                            <h4>★★★★★</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            08.09.2022
                        </div>
                    </div>
                    <div class="row">
                        <p class="mt-3">
                            Очень понравилась поездка, всю дорогу разговаривали с водителем, не заметил как пролетели 4 часа, всем советую
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="form">
        <div class="container">
            <div class="boxForm">
                <div class="title">
                    <h2>
                        Оставьте отзыв
                    </h2>
                </div>

                <form method="POST" class="sendReview" id="sendReview" autocomplete="off" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <p class="contact-form__message text-center"></p>
                    <div class="row markS">
                        <div class="col-12">
                            <div class="input_item">
                                <h3>
                                    Ваша оценка
                                </h3>
                                <div class="rating-area">
                                    <input type="radio" id="star-5" name="mark" value="5">
                                    <label for="star-5" title="Оценка «5»"></label>
                                    <input type="radio" id="star-4" name="mark" value="4">
                                    <label for="star-4" title="Оценка «4»"></label>
                                    <input type="radio" id="star-3" name="mark" value="3">
                                    <label for="star-3" title="Оценка «3»"></label>
                                    <input type="radio" id="star-2" name="mark" value="2">
                                    <label for="star-2" title="Оценка «2»"></label>
                                    <input type="radio" id="star-1" name="mark" value="1">
                                    <label for="star-1" title="Оценка «1»"></label>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <textarea type="text" name="review" class="form-control" placeholder="Отзыв"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="button">Оставить отзыв</button>
                </form>
            </div>
        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>
    $(function() {
        $('input[type="tel"]').mask('+7(000)000-00-00');
    });

    (function($) {
        $(".sendReview").submit(function(event) {

            event.preventDefault();

            let successSendText = "Отзыв успешно отправлен";
            let errorSendText = "Отзыв не отправлен. Попробуйте еще раз!";
            let requiredFieldsText = "Пожалуйста, заполните все поля!";
            let requiredFieldMark = "Пожалуйста, поставте оценку!";

            let message = $(this).find(".contact-form__message");

            let form = $("#" + $(this).attr("id"))[0];
            let fd = new FormData(form);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/sendReview",
                type: "POST",
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: () => {
                    $(".preloader").addClass("preloader_active");
                },
                success: function success(res) {
                    $(".preloader").removeClass("preloader_active");

                    let respond = $.parseJSON(res);

                    if (respond === "SUCCESS") {
                        message.text(successSendText).css("color", "#21d4bb");
                        setTimeout(() => {
                            message.text("");
                        }, 4000);
                    } else if (respond === "NOTVALID") {
                        message.text(requiredFieldsText).css("color", "#d42121");
                        setTimeout(() => {
                            message.text("");
                        }, 3000);
                    } else if (respond === "NOTVALIDMark") {
                        message.text(requiredFieldMark).css("color", "#d42121");
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

    })(jQuery);
</script>
@endsection