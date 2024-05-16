@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Организация: {{ $enterprise->name }}
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

            <div class="form__update form__update__spec">
                <h3>
                    Реактирование организации: {{ $enterprise->name }}
                    <br>
                    <b>

                    </b>
                </h3>
                <hr>
                <form action="{{ route('enterprises.update', $enterprise->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="surname">Работодатель</label>
                        <input type="text" id="surname" name="employer" value="{{ $enterprise->employer }}">
                    </div>
                    <div>
                        <label for="phone">Номер телефона</label>
                        @if (!empty($enterprise->phone))
                            <input type="text" id="phone" name="phone" value="{{ $enterprise->phone }}">
                        @else
                            <input type="text" id="phone" name="phone" placeholder="Данные не заполнен">
                        @endif
                    </div>
                    {{--
                    <div>
                        <label for="login">Логин</label>
                        <input type="text" id="login" name="login" value="{{ $user->login }}">
                    </div> --}}


                    <input type="submit" value="Редактировать">
                </form>
            </div>

        </div>

    </section>
@endsection
