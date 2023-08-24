<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

  @yield('title')
  <link rel="icon" type="image/png" href="/images/favicon.png">

  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
  @yield('css')
  <!-- JavaScript Bundle with Popper -->
  <script src="https://kit.fontawesome.com/ca5057840c.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

</head>

<body>

  <nav class="navbar navbar-expand-lg py-3 fixed-top">
    <div class="container">
      <a class="navbar-brand logo" href="{{ url('/') }}">
        <img src="public/images/logo.png" alt="Логотип ТаврияЮг" title="Логотип ТаврияЮг">
      </a>
      <div class="city"><i class="fa-solid fa-location-dot"></i> @yield('city')</div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Города</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="row">
                <div class="col-6">
                  <li><a class="dropdown-item" href="/adler">Адлер</a></li>
                  <li><a class="dropdown-item" href="/alupka">Алупка</a></li>
                  <li><a class="dropdown-item" href="/alushta">Алушта</a></li>
                  <li><a class="dropdown-item" href="/anapa">Анапа</a></li>
                  <li><a class="dropdown-item" href="/armyansk">Армянск</a></li>
                  <li><a class="dropdown-item" href="/bahchisaray">Бахчисарай</a></li>
                  <li><a class="dropdown-item" href="/gelendzhik">Геленджик</a></li>
                  <li><a class="dropdown-item" href="/dzhankoj">Джанкой</a></li>
                  <li><a class="dropdown-item" href="/dzhubka">Джубга</a></li>
                  <li><a class="dropdown-item" href="/evpatoria">Евпатория</a></li>
                  <li><a class="dropdown-item" href="/kerch">Керчь</a></li>
                  <li><a class="dropdown-item" href="/krasnoperekopsk">Красноперекопск</a></li>
                </div>
                <div class="col-6">
                  <li><a class="dropdown-item" href="/lipetsk">Липецк</a></li>
                  <li><a class="dropdown-item" href="/mineral">Мин. Воды</a></li>
                  <li><a class="dropdown-item" href="/saki">Саки</a></li>
                  <li><a class="dropdown-item" href="/sevastopol">Севастополь</a></li>
                  <li><a class="dropdown-item" href="/simferopol">Симферополь</a></li>
                  <li><a class="dropdown-item" href="/sochi">Сочи</a></li>
                  <li><a class="dropdown-item" href="/sudak">Судак</a></li>
                  <li><a class="dropdown-item" href="/tuapse">Туапсе</a></li>
                  <li><a class="dropdown-item" href="/feodosia">Феодосия</a></li>
                  <li><a class="dropdown-item" href="/shchelkino">Щёлкино</a></li>
                  <li><a class="dropdown-item" href="/yalta">Ялта</a></li>
                </div>
              </div>

            </ul>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="{{ url('/reviews') }}">Отзывы</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/news') }}">Новости</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/contact') }}">Контакты</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/about-us') }}">О нас</a>
          </li>
        </ul>

        @guest
        @if (Route::has('register'))
        <button type="button" class="">+7 (000) 000-00-00</button>
        @endif
        @else
        <a class='registr ml-5 mr-5' href="{{ route('home') }}">{{ __('Профиль') }}</a>
        <a class='registr ml-5 mx-5' href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
          {{ __('Выход') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>

      @endguest

    </div>
    </div>
  </nav>






  @yield('content')

  <footer class="text-center text-lg-start text-white">
    <section>
      <div class="container text-center text-md-start pt-5">

        <div class="row">

          <div class="col-md-1 mx-auto mb-4">

            <p>
              <a class="navbar-brand logoFooter py-2" href="{{ url('/') }}">
                <img src="public/images/logo-white.png" alt="Логотип ТаврияЮг" title="Логотип ТаврияЮг">
              </a>

            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <p>

              Междугородняя трансферная служба

              по югу и центральной части России
            </p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <p>
              <i class="fa-solid fa-location-dot"></i> Республика Крым,
            </p>
            <p>
              г.Алушта, ул. Ленина,
            </p>
            <p>
              д. 0
            </p>

          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-md-0 mb-4">

            <p>
              <i class="fa-solid fa-envelope"></i> email@mail.ru
            </p>
            <p>
              <i class="fa-solid fa-phone"></i> +7 (000) 000-00-00
            </p>
            <p>
            <p class="icons">
              <a href="https://t.me/+70000000000"><i class="fa-brands fa-telegram"></i></a>
              <a href="viber://add?number=70000000000"><i class="fa-brands fa-viber"></i></a>
              <a href="https://wa.me/70000000000"><i class="fa-brands fa-whatsapp"></i></a>
            </p>


          </div>

        </div>
    </section>

    <div class="text-center p-3 copy">© 2022 Copyright: TavriaUg
    </div>
  </footer>
</body>

</html>