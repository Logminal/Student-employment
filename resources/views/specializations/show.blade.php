@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Группа: {{ $spec->name }}
        </h3>

        <div class="content allScep">
            {{-- {{ $specializationStudents }} --}}
            <div class="filter">
                <div class="tabs">
                    <p data-tab="#tab1">Трудоустроенны</p>
                    <p data-tab="#tab2">Не трудоустроенны</p>
                    <p data-tab="#tab3" class="active">Все</p>
                </div>
                {{-- <form action="{{ route('specializations.filter') }}" method="post">
                    @csrf
                    <div>
                        <label for="radio1">Трудоустроенны</label>
                        <input type="checkbox" class="radio" name="radio1" id="radio1">
                    </div>

                    <div>
                        <label for="radio2">Не трудоустроенны</label>
                        <input type="checkbox" class="radio" name="radio2" id="radio2">
                    </div>

                    <div>
                        <label for="radio3">Сбросить</label>
                        <input type="checkbox" class="radio" name="radio3" id="radio3">
                    </div>
                    <button class="radioAccept">Применить</button>
                    <input type="submit" value="Применить">
                </form> --}}
            </div>

            <div class="table__wraper">
                <div class="table__scroll">
                    <table class="table table-hover table-special">
                        <thead>
                            <tr>
                                <th scope="col"><span>#</span></th>
                                <th scope="col"><span>ФИО</span></th>
                                <th scope="col"><span>Телефон</span></th>
                                <th scope="col"><span>Место работы</span></th>
                                <th scope="col"><span>Не трудоустроен по причине</span></th>
                                <th scope="col"><span>Куратор</span></th>
                                <th scope="col"><span>Специальность</span></th>
                                <th scope="col"><span>Код</span></th>
                            </tr>
                        </thead>
                        {{-- <div class="table__body"> --}}
                        <tbody>
                            {{-- {{ dd($studentsSpec) }} --}}
                            @foreach ($studentsSpec as $item)
                                @if (!empty($item->enterprises))
                                    <tr scope="row" class="enterpr active" id="tab1">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->fio }}</td>
                                        <td>
                                            @if (!empty($item->phone))
                                                +{{ $item->phone }}
                                            @else
                                                Данные не внесенны
                                            @endif
                                        </td>
                                        @if (!empty($item->enterprises))
                                            <td class="enterprS">{{ $item->enterprises->name }}</td>
                                        @else
                                            <td>Не трудоустроен</td>
                                        @endif
                                        <td>
                                            @if (!empty($item->dont_activity))
                                                {{ $item->dont_activity }}
                                            @else
                                                Студент трудоустроен
                                            @endif
                                        </td>
                                        <td>{{ $item->teachers->name }}</td>
                                        <td>{{ $item->specializations->name }}</td>
                                        <td>{{ $item->specializations->kodSpec }}</td>
                                    </tr>
                                @else
                                    <tr scope="row" class="enterpr active" id="tab2">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->fio }}</td>
                                        <td>
                                            @if (!empty($item->phone))
                                                +{{ $item->phone }}
                                            @else
                                                Данные не внесенны
                                            @endif
                                        </td>
                                        @if (!empty($item->enterprises))
                                            <td class="enterprS">{{ $item->enterprises->name }}</td>
                                        @else
                                            <td>Не трудоустроен</td>
                                        @endif
                                        <td>
                                            @if (!empty($item->dont_activity))
                                                {{ $item->dont_activity }}
                                            @else
                                                Студент трудоустроен
                                            @endif
                                        </td>
                                        <td>{{ $item->teachers->name }}</td>
                                        <td>{{ $item->specializations->name }}</td>
                                        <td>{{ $item->specializations->kodSpec }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        {{-- </div> --}}
                    </table>
                </div>

            </div>



            <div class="block__all__students">
                <div class="block__content">
                    <p>
                        Всего студентов группы <b>"{{ $spec->name }}"</b> -
                        <span>{{ $studentsSpecCount }}</span>
                    </p>

                    <p>
                        Трудоустроенных студентов группы <b>"{{ $spec->name }}"</b> -
                        <span>
                            @if (!empty($studentsWork))
                                {{ $studentsWork }}
                            @else
                                Работающих нет
                            @endif
                        </span>
                    </p>

                    <p>
                        Не трудоустроенных студентов группы <b>"{{ $spec->name }}"</b> -
                        <span>
                            @if (!empty($dontWorkStudents))
                                {{ $dontWorkStudents }}
                            @else
                                Все студенты трудоустроенны
                            @endif
                        </span>
                    </p>
                </div>
            </div>

        </div>

    </section>
@endsection
