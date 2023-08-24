@extends('layouts.app')
@section('title')
<title>Заказать такси Алупка, междугороднее такси</title>
<meta name="description" content="ТаврияЮг - Трансферная служба междугороднего такси по Югу и центральной части России, СНГ" />
<meta name="keywords" content="такси алупка, заказать такси в Алупке,недорогое такси" />
<link href="https://tavria-ug.ru/alupka" rel="canonical">
@endsection
@section('city')
Алупка
@endsection
@section('content')
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=d533a8bf-ccfb-4813-aeb0-0a2aa485c5bf" type="text/javascript"></script>

<script>
    var rate;
    ymaps.ready(init);


    function init() {

        const pageWidth = document.documentElement.scrollWidth

        if (pageWidth < 992) {
            myMap = new ymaps.Map('mapM', {
                center: [44.948237, 34.100318],
                zoom: 9,
                controls: []
            });

        } else {
            myMap = new ymaps.Map('map', {
                center: [44.948237, 34.100318],
                zoom: 9,
                controls: []
            });
        }
        routePanelControl = new ymaps.control.RoutePanel({
                options: {
                    showHeader: true,
                    title: 'Расчёт поездки',
                    autofocus: false,
                    multiRoute: true,
                    maxWidth: "220px",
                }
            }),
            zoomControl = new ymaps.control.ZoomControl({
                options: {
                    size: 'small',
                    float: 'none',
                    position: {
                        bottom: 200,
                        right: 10
                    }
                }
            });
        routePanelControl.routePanel.options.set({
            types: {
                auto: true,
            }
        });
        routePanelControl.routePanel.options.set("mapStateAutoApply", true);

        routePanelControl.routePanel.options.set("multiRoute", true);

        myMap.controls.add(routePanelControl).add(zoomControl);
        $("input[name='rate']").change(function() {
            if ($("input[value='standart']").prop("checked")) {
                rate = '22';
                routePanelControl.routePanel.getRouteAsync().then(function(route) {
                    route.model.setParams({
                        results: 1
                    }, true);
                    route.model.events.add('requestsuccess', function() {

                        var activeRoute = route.getActiveRoute();
                        if (activeRoute) {
                            var length = route.getActiveRoute().properties.get("distance"),
                                price = calculate(Math.round(length.value / 1000)),
                                balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                    '<span>Расстояние: ' + length.text + '.</span><br/>' +
                                    '<span style="font-weight: bold; font-style: italic">Стоимость поездки: ' + price + ' р.</span>');
                            route.options.set('routeBalloonContentLayout', balloonContentLayout);
                            activeRoute.balloon.open();

                        }
                    });

                });
            }
            if ($("input[value='comfort']").prop("checked")) {
                rate = '25';
                routePanelControl.routePanel.getRouteAsync().then(function(route) {
                    route.model.setParams({
                        results: 1
                    }, true);
                    route.model.events.add('requestsuccess', function() {

                        var activeRoute = route.getActiveRoute();
                        if (activeRoute) {
                            var length = route.getActiveRoute().properties.get("distance"),
                                price = calculate(Math.round(length.value / 1000)),
                                balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                    '<span>Расстояние: ' + length.text + '.</span><br/>' +
                                    '<span style="font-weight: bold; font-style: italic">Стоимость поездки: ' + price + ' р.</span>');
                            route.options.set('routeBalloonContentLayout', balloonContentLayout);
                            activeRoute.balloon.open();

                        }
                    });

                });
            }
            if ($("input[value='business']").prop("checked")) {
                rate = '30';
                routePanelControl.routePanel.getRouteAsync().then(function(route) {
                    route.model.setParams({
                        results: 1
                    }, true);
                    route.model.events.add('requestsuccess', function() {

                        var activeRoute = route.getActiveRoute();
                        if (activeRoute) {
                            var length = route.getActiveRoute().properties.get("distance"),
                                price = calculate(Math.round(length.value / 1000)),
                                balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                    '<span>Расстояние: ' + length.text + '.</span><br/>' +
                                    '<span style="font-weight: bold; font-style: italic">Стоимость поездки: ' + price + ' р.</span>');
                            route.options.set('routeBalloonContentLayout', balloonContentLayout);
                            activeRoute.balloon.open();

                        }
                    });

                });
            }
            if ($("input[value='minivan']").prop("checked")) {
                rate = '35';
                routePanelControl.routePanel.getRouteAsync().then(function(route) {
                    route.model.setParams({
                        results: 1
                    }, true);
                    route.model.events.add('requestsuccess', function() {

                        var activeRoute = route.getActiveRoute();
                        if (activeRoute) {
                            var length = route.getActiveRoute().properties.get("distance"),
                                price = calculate(Math.round(length.value / 1000)),
                                balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                    '<span>Расстояние: ' + length.text + '.</span><br/>' +
                                    '<span style="font-weight: bold; font-style: italic">Стоимость поездки: ' + price + ' р.</span>');
                            route.options.set('routeBalloonContentLayout', balloonContentLayout);
                            activeRoute.balloon.open();

                        }
                    });

                });
            }

        });
        rate = '22';
        routePanelControl.routePanel.getRouteAsync().then(function(route) {
            route.model.setParams({
                results: 1
            }, true);
            route.model.events.add('requestsuccess', function() {

                var activeRoute = route.getActiveRoute();
                if (activeRoute) {
                    var length = route.getActiveRoute().properties.get("distance"),
                        price = calculate(Math.round(length.value / 1000)),
                        balloonContentLayout = ymaps.templateLayoutFactory.createClass(
                            '<span>Расстояние: ' + length.text + '.</span><br/>' +
                            '<span style="font-weight: bold; font-style: italic">Стоимость поездки: ' + price + ' р.</span>');
                    route.options.set('routeBalloonContentLayout', balloonContentLayout);
                    activeRoute.balloon.open();

                }
            });

        });

        function calculate(routeLength) {
            return routeLength * rate;
        }
    }
</script>

<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>
                   Междугороднее такси в Алупке
                </h1>
                <h2>по югу и центральной части России, СНГ</h2>
                <button><a href="#order" class="scroll">Заказать такси</a></button>
            </div>
            <div class="col-6 img none">
          
            </div>
        </div>
    </div>
</div>
<div class="map" id="price">
    <div class="container">
        <div class="row">
            <div class="col-7 center">
                <div id="map"></div>
            </div>
            <div class="col-5">
                <h2>Рассчитайте стоимость</h2>

                <div class="inputs">
                    <h3>Выберите тариф:</h3>
                    <div class="radioBtn">
                        <div>
                            <input class="custom-radio" type="radio" name="rate" value="standart" checked>
                            <label>Стандарт</label>
                        </div>
                        <div>
                            <input class="custom-radio" type="radio" name="rate" value="comfort">
                            <label>Комфорт</label>
                        </div>
                        <div>
                            <input class="custom-radio" type="radio" name="rate" value="business">
                            <label>Бизнес</label>
                        </div>
                        <div>
                            <input class="custom-radio" type="radio" name="rate" value="minivan">
                            <label>Минивэн</label>
                        </div>
                    </div>

                    <div id="mapM"></div>
                    <div class="text">* стоимость поездки может незначительно варьироваться в зависимости от точного адреса, для согласования итоговой стоимости необходимо связаться с оператором</div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="tariffs">
    <div class="container">
    <h2>Тарифы такси в Алупке</h2>
        <div class="row">
            <div class="col-3">
                <img src="public/images/standart-tariff.png" alt="Стандартный тариф такси в Алупке" title="Стандартный тариф такси в Алупке">
                <h3>Стандарт</h3>
                <p>Идеальный тариф для дальних поездок по приятной цене.</p>
            </div>
            <div class="col-3">
                <img src="public/images/comfort-tariff.png" alt="Тариф комфорт такси в Алупке" title="Тариф комфорт такси в Алупке">
                <h3>Комфорт</h3>
                <p>Просторный салон, водители имеют хорошие отзывы.</p>
            </div>
            <div class="col-3">
                <img src="public/images/business-tariff.png" alt="Бизнес тариф такси в Алупке" title="Бизнес тариф такси в Алупке">
                <h3>Бизнес</h3>
                <p>Автомобили премиум класса с высоким уровнем комфорта.</p>
            </div>
            <div class="col-3">
                <img src="public/images/minivan-tariff.png" alt="Такси минивэн в Алупке" title="Такси минивэн такси в Алупке">
                <h3>Минивэн</h3>
                <p>Для длительных поездок в большой компании.</p>
            </div>
        </div>
    </div>

</div>
<div class="order" id="order">
    <div class="container">
        <div class="row">
            <div class="col-7">
                <h2>Как оформить заявку на услугу?</h2>
                <p>Чтобы заказать такси в Алупке, вам следует заполнить форму или обратиться к оператору и сообщить следующую информацию:</p>
                <ul>
                    <li>
                        Ваше место дислокации (если в форме нет нужного города, укажите его в примечаниях), ориентировочное количество пассажиров, объем багажа и пункт конечного назначения.
                    </li>
                    <li>
                        Предпочтительная марка автомобиля и его вместительность.
                    </li>
                    <li>
                        Свои контактные данные (имя и номер мобильного телефона).
                    </li>
                    <li>
                        Доступные варианты оплаты (включая системы безналичного расчета).
                    </li>
                </ul>
                <p>
                    При появлении любых спорных вопросов, связанных с оказанием пассажирских перевозок, не думайте дважды, звоните одному
                    из представителей нашей компании.
                </p>
                <p>
                    Чтобы <a href="#price" class="price scroll">рассчитать стоимость такси</a>, можно заполнить форму, в которой указать место назначения
                    и место отправления, а также выбрать подходящий тариф.
                </p>
            </div>
            <div class="col-5 center">
                <div class="boxForm">
                    <div class="title">
                        <h3>
                            Заказать <span class="color">такси</span>
                        </h3>
                    </div>
                    <form id="form-contact" method="POST" class="contact-form" autocomplete="off" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="preloader text-center"></div>
                        <p class="contact-form__message text-center"></p>
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
                                    <input name="date" type="date" id='date' class="form-control" placeholder="Дата">
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
                        <div class="text-center"> <button type="submit" class="button">Заказать</button></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="connection">
    <div class="container">
        <h2>
            Вам нужна помощь?!
        </h2>
        <h3>
            Оставьте свои контактные данные, и наш оператор в скором времени вам перезвонит
        </h3>

        <form method="POST" id="backCall" class="backCall" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <p class="contact-form__message text-center"></p>
            <div class="row">
                <div class="col-5">
                    <div class="input_item">
                        <input name="name" type="text" class="form-control" placeholder="Имя">
                    </div>
                </div>
                <div class="col-5">
                    <div class="input_item">
                        <input name="phone" type="tel" class="form-control" placeholder="Телефон">
                    </div>
                </div>
                <div class="col-2">
                    <button type="submit" class="button">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="benefits">
    <div class="container">
        <h2>
            Преимущества
        </h2>
        <div class="row">
            <div class="col-4">
                <img src="public/images/icon-control.png" alt="Водительский контроль" title="Водительский контроль">
                <h3>Водительский контроль</h3>
                <p>Водители проходят тест на алкогольное и наркотическое опьянение, что гарантирует высокий уровень безопасности.</p>
            </div>
            <div class="col-4">
                <img src="public/images/icon-car-park.png" alt="Большой автопарк такси" title="Большой автопарк такси">
                <h3>Большой автопарк</h3>
                <p>Все транспортные средства находятся в идеальном техническом состоянии и обладают высоким уровнем комфорта.</p>
            </div>
            <div class="col-4">
                <img src="public/images/icon-price.png" alt="Низкие цены" title="Низкие цены">
                <h3>Приятные цены</h3>
                <p> Наша компания старается сохранять высокий уровень сервиса при минимальных ценах.</p>
            </div>
        </div>
    </div>
</div>
<script src="public/js/telegramform.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
<script>

let paddOrder;
    let paddPrice;
    if (window.matchMedia("(min-width: 992px)").matches) {
        paddOrder = 50;
        paddPrice = 95;
    } else {
        paddOrder = 700;
        paddPrice = 50;
    }
    
    $("a.scrollOrder").on("click", function(e) {
        e.preventDefault();
        var anchor = $(this).attr('href');
        $('html, body').stop().animate({
            scrollTop: $(anchor).offset().top + paddOrder
        }, 600);
    });
    $("a.scrollPrice").on("click", function(e) {
        e.preventDefault();
        var anchor = $(this).attr('href');
        $('html, body').stop().animate({
            scrollTop: $(anchor).offset().top - paddPrice
        }, 600);
    });


    $(function() {
        $('input[type="tel"]').mask('+7(000)000-00-00');
    });
    
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("min", today);

    document.getElementById("date").setAttribute("value", today);
</script>


@endsection