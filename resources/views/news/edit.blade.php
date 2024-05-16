@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Новость: {{ $new->name }}
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

            <div class="form__update form__update__new">
                <h3>
                    Реактировать новость:
                    <br>
                    <b>
                        {{ $new->name }}
                    </b>
                </h3>
                <hr>
                <form action="{{ route('new.update', $new->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name">Заголовок новости</label>
                        <input type="text" id="name" name="name" value="{{ $new->name }}">
                    </div>

                    <div>
                        <label for="desk">Описание новости</label>
                        <textarea name="desk" id="" cols="30" rows="10">{{ $new->desk }}</textarea>
                    </div>

                    <input type="submit" value="Редактировать новость">
                </form>
            </div>

        </div>

    </section>
@endsection
