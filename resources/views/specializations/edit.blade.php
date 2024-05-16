@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Группа: {{ $spec->name }}
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
                    Реактирование группы:
                    <br>
                    <b>
                        {{ $spec->name }}
                    </b>
                </h3>
                <hr>
                <form action="{{ route('specializations.update', $spec->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="surname">Код группы</label>
                        <input type="text" id="surname" name="kodSpec" value="{{ $spec->kodSpec }}">
                    </div>
                    <div>
                        <label for="surname">Наименнование группы</label>
                        <input type="text" id="surname" name="name" value="{{ $spec->name }}">
                    </div>
                    <div>
                        <label for="surname">Сокращение</label>
                        <input type="text" id="surname" name="name_cut" value="{{ $spec->name_cut }}">
                    </div>

                    <input type="submit" value="Редактировать группу">
                </form>
            </div>

        </div>

    </section>
@endsection
