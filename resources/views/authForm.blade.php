<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <main>
        <section class="auth">
            <h3>«Усть-Катавский индустриально-технологический техникум»</h3>
            {{-- @if (!empty($errors))
                <div class="errors">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li>
                                {{ $error }}
                            </li>
                        </ul>
                    @endforeach
                </div>
            @endif --}}

            @if (!empty($message))
                <div class="error">
                    <h3>{{ $message }}</h3>
                </div>
            @endif
            <div class="form__auth">
                <form action="{{ route('auth') }}" method="post">
                    @csrf
                    <input type="text" name="login" placeholder="Введите свой логин">
                    <input type="password" name="password" placeholder="Введите свой пароль">
                    <input type="submit" value="Авторизоваться">
                </form>
            </div>

            <div class="form__reg__enterprise">
                <!-- Кнопка-триггер модального окна -->
                <button class="btn add__enterprise__profile" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Создать профиль для организации
                </button>

                <!-- Модальное окно -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация организации</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form__reg">
                                    <form action="{{ route('enterprises.add') }}" method="post" id="add__enterprising">
                                        @csrf
                                        <input type="text" name="employer" placeholder="ФИО работодателя">
                                        <input type="text" name="name" placeholder="Наименование организации">
                                        <input type="text" name="login" placeholder="Логин для входа">
                                        <input type="password" name="password" placeholder="Пароль для входа">
                                    </form>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Закрыть</button>
                                <button form="add__enterprising" class="btn">Сохранить изменения</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>

    {{-- <footer>
        <p>Государственное бюджетное профессиональное образовательное учреждение</p>
        <p>«Усть-Катавский индустриально-технологический техникум»</p>
    </footer> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
