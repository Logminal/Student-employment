@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Пользователь: {{ $user->fio }}
        </h3>

        <div class="content edit">

            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="border border-2 border-danger rounded bg-danger bg-opacity-50 p-1 m-1 text-white">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="form__update form__update__student user">
                <h3>
                    Реактирование пользователя:
                    <br>
                    <b>
                        {{ $user->fio }}
                    </b>
                </h3>
                <hr>
                <form action="{{ route('user.update', $user->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="fio">ФИО</label>
                        <input type="text" id="fio" name="fio" value="{{ $user->fio }}">
                    </div>

                    <div>
                        <label for="login">Логин</label>
                        <input type="text" id="login" name="login" value="{{ $user->login }}">
                    </div>

                    <div>
                        <label for="password">Введите новый пароль</label>
                        <input type="password" id="login" name="password">
                    </div>


                    <input type="submit" value="Редактировать пользователя">
                </form>
            </div>

        </div>

    </section>
@endsection
