@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Преподаватель: {{ $teacehr->name }}
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
                    Реактирование преподавателя:
                    <br>
                    <b>
                        {{ $teacehr->name }}
                    </b>
                </h3>
                <hr>
                <form action="{{ route('teachers.update', $teacehr->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="surname">Преподаватель</label>
                        <input type="text" id="surname" name="name" value="{{ $teacehr->name }}">
                    </div>

                    <input type="submit" value="Редактировать">
                </form>
            </div>

        </div>

    </section>
@endsection
