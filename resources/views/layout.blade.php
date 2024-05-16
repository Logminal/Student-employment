<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <header>
        <section class="head__top">

            <div class="item">
                <img src="{{ asset('images/logo2.png') }}" alt="{{ asset('images/logo2.png') }}">
                <div>
                    <p>Государственное бюджетное профессиональное образовательное учреждение</p>
                    <h5>«Усть-Катавский индустриально-технологический техникум»</h5>
                </div>
            </div>

            <div class="item">
                <div class="date">
                    <img src="{{ asset('images/icons/calendar.png') }}" alt="{{ asset('images/icons/calendar.png') }}">
                    <p>
                        27.05.2023
                        {{-- {!! Form::date('birthday', \Carbon\Carbon::createFromDate('2010', '10', '1')) !!} --}}
                    </p>

                </div>
                {{-- data-bs-toggle="modal" data-bs-target="#profile__modal" --}}
                <div class="name">
                    <img src="{{ asset('images/icons/profile.png') }}" alt="">
                    <p>
                        <a href="{{ route('user.show.profile', Auth::user()->id) }}">Профиль</a>
                    </p>
                    {{-- <form action="{{ route('user.show.profile', Auth::user()->id) }}" method="get" id="showProfile">
                        <input type="submit" hidden>
                    </form> --}}
                </div>
                <div class="logout">
                    <img src="{{ asset('images/icons/sign-out.png') }}" alt="{{ asset('images/icons/sign-out.png') }}">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <label for="logout">Выйти</label>
                        <input type="submit" id="logout" hidden>
                    </form>
                </div>
            </div>

        </section>
        <section class="navigation">
            <nav>
                <ul>
                    @if (Auth::user()->status == 'admin')
                        <li><a href="{{ route('main') }}">Главная</a></li>
                        <li><a href="{{ route('specializations.index') }}">Группы</a></li>
                        <li><a href="{{ route('enterprises.index') }}">Организации</a></li>
                        <li><a href="{{ route('student.index') }}">Студенты</a></li>
                        <li><a href="{{ route('teachers.index') }}">Преподаватели</a></li>
                        <li><a href="{{ route('user.index') }}">Пользователи</a></li>
                    @endif

                    @if (Auth::user()->status == 'student')
                        <li><a href="{{ route('main') }}">Главная</a></li>
                        <li><a href="{{ route('specializations.index') }}">Группы</a></li>
                        <li><a href="{{ route('enterprises.index') }}">Организации</a></li>
                    @endif

                    @if (Auth::user()->status == 'employer')
                        <li><a href="{{ route('main') }}">Главная</a></li>
                        <li><a href="{{ route('specializations.index') }}">Группы</a></li>
                        <li><a href="{{ route('enterprises.index') }}">Организации</a></li>
                        <li><a href="{{ route('student.index') }}">Студенты</a></li>
                    @endif

                </ul>
            </nav>
        </section>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <div class="content">
            <ul>
                <li><a href="{{ route('main') }}">Главная</a></li>
                <li><a href="{{ route('student.index') }}">Студенты</a></li>
                <li><a href="{{ route('enterprises.index') }}">Организации</a></li>
                <li><a href="{{ route('teachers.index') }}">Преподаватели</a></li>
                <li><a href="{{ route('specializations.index') }}">Группы</a></li>
                <li><a href="{{ route('user.index') }}">Пользователи</a></li>
            </ul>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
