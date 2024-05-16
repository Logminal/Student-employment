@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name top__edit">
            Студент: {{ $student->fio }}
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

            <div class="form__update form__update__student">
                <h3>
                    Реактирование студента:
                    <br>
                    <b>
                        {{ $student->fio }}
                    </b>
                </h3>
                <hr>
                <form action="{{ route('student.update', $student->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="work">
                        <div>
                            <label for="surname">ФИО студента</label>
                            <input type="text" id="surname" name="fio" value="{{ $student->fio }}">
                        </div>

                        <div>
                            <label for="patronymic">Место работы</label>
                            @if (!empty($student->enterprises))
                                <input type="text" list="name__enter" id="patronymic" name="enterprises_id"
                                    value="{{ $student->enterprises->name }}">
                            @else
                                <input type="text" list="name__enter" id="patronymic" name="enterprises_id"
                                    placeholder="Данные еще не внесенны">
                            @endif
                            <datalist id="name__enter">
                                @foreach ($enterprises as $item)
                                    <option value="{{ $item->name }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="login">Группа</label>
                            @if (!empty($student->specializations))
                                <input type="text" list="specializations" id="login" name="specializations_id"
                                    value="@if ($student->specializations->name != 'В обработке') {{ $student->specializations->name }} @endif">
                            @else
                                <input type="text" list="specializations" id="login" name="specializations_id"
                                    placeholder="Данные еще не внесенны">
                            @endif

                            <datalist id="specializations">
                                @foreach ($spec as $item)
                                    <option value="{{ $item->name }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="login">Куратор</label>
                            @if (!empty($student->teachers))
                                <input type="text" list="teacher" id="login" name="teachers_id"
                                    value="{{ $student->teachers->name }}">
                            @else
                                <input type="text" list="teacher" id="login" name="teachers_id"
                                    placeholder="Данные еще не внесенны">
                            @endif

                            <datalist id="teacher">
                                @foreach ($teachers as $item)
                                    <option value="{{ $item->name }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="phone">Номер телефона</label>
                            @if (!empty($student->phone))
                                <input type="text" id="phone" name="phone" value="{{ $student->phone }}">
                            @else
                                <input type="text" id="phone" name="phone" placeholder="Данные еще не внесенны">
                            @endif

                            <datalist id="teacher">
                                @foreach ($teachers as $item)
                                    <option value="{{ $item->name }}">
                                @endforeach
                            </datalist>
                        </div>

                        <div>
                            <label for="workVid">Выберите вид деятельности</label>
                            <select name="workVid" id="workVid">
                                <option selected disabled>Вид деятельности</option>
                                <option
                                    value="Трудоустроены (по трудовому договору, договору ГПХ в соответствии с трудовым законодательством, законодательством  об обязательном пенсионном страховании)">
                                    Трудоустроены
                                    (по трудовому договору, договору ГПХ в соответствии с трудовым законодательством,
                                    законодательством об обязательном пенсионном страховании)
                                </option>
                                <option
                                    value="В том числе (из трудоустроенных): в соответствии с освоенной профессией, специальностью (исходя из осуществляемой трудовой функции)">
                                    В том числе (из трудоустроенных): в соответствии с освоенной профессией, специальностью
                                    (исходя из осуществляемой трудовой функции)
                                </option>

                                <option
                                    value="В том числе (из трудоустроенных): работают на протяжении не менее 4-х месяцев на последнем месте работы">
                                    В том числе (из трудоустроенных): работают на протяжении не менее 4-х месяцев на
                                    последнем месте работы
                                </option>

                                <option value="Индиви-дуальные предприниматели">
                                    Индиви-дуальные предприниматели
                                </option>

                                <option
                                    value="Самозанятые (перешедшие на специальный налоговый режим  - налог на профессио-нальный доход)">
                                    Самозанятые (перешедшие на специальный налоговый режим - налог на профессио-нальный
                                    доход)
                                </option>

                                <option value="Продолжили обучение">Продолжили обучение</option>
                            </select>

                        </div>
                    </div>

                    <hr>

                    <div class="dont__work">
                        <h5>Если вы не работает, выберите причину</h5>
                        <select name="dont__work" id="">
                            <option selected disabled>Причина безработицы</option>
                            <option value="Проходят службу в армии по призыву">Проходят службу в армии по призыву</option>
                            <option value="Проходят службу в армии на контрактной основе">Проходят службу в армии на
                                контрактной основе</option>
                            <option value="Находятся в отпуске по уходу за ребенком">Находятся в отпуске по уходу за
                                ребенком</option>
                            <option
                                value="Зарегистрированы в центрах занятости в качестве безработных (получают пособие по безработице) и не планируют трудоустраиваться">
                                Зарегистрированы в центрах занятости в качестве безработных (получают пособие по
                                безработице) и не планируют трудоустраиваться
                            </option>

                        </select>
                    </div>

                    <input type="submit" value="Редактировать пользователя">
                </form>
            </div>

        </div>

    </section>
@endsection
