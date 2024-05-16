@extends('layout')

@section('title')
    Профиль
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name">Профиль: {{ $user->fio }}</h3>

        <div class="content">

            {{-- <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="border border-2 border-danger rounded bg-danger bg-opacity-50 p-1 m-1 text-white">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="add__students form users">
                <form action="{{ route('storeReg') }}" method="post">
                    @csrf
                    <input type="text" name="fio" placeholder="Введите ФИО">
                    <input type="text" name="login" placeholder="Введите логин пользователя">
                    <select name="status" id="status" required>
                        <option selected disabled>Выберите статус</option>
                        <option value="student">Студент</option>
                        <option value="employer">Работодатель</option>
                    </select>
                    <input type="text" name="password" placeholder="Введите пароль пользователя">

                    <input type="submit" value="Добавить пользователя">
                </form>
            </div> --}}

            <div class="profile">
                <div class="blocks">
                    <div class="block avatar">
                        <img src="{{ asset('images/icons/user.png') }}" alt="{{ asset('images/icons/user.png') }}">
                    </div>
                    <div></div>
                    <div class="block desk">
                        <!-- Модальное окно -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Заголовок модального окна</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('add.writing', $user->id) }}" id="addWriting" method="post">
                                            @csrf
                                            <input type="text" name="name" placeholder="Предолжите свою организацию">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть</button>
                                        <button form="addWriting" class="btn btn-primary">Сохранить изменения</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Смена пароля</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Закрыть"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('changePassword', $user->id) }}" id="password"
                                            class="changePassword" method="post">
                                            @csrf
                                            <input type="password" name="password" placeholder="Введите новый пароль">
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть</button>
                                        <button form="password" class="btn">Сохранить изменения</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4>Основная информация</h4>
                        <hr>
                        <div class="content__profile">
                            <div>
                                <p>ФИО:</p>
                                <p>{{ $user->fio }}</p>
                            </div>

                            <div>
                                <p>Логин:</p>
                                <p>{{ $user->login }}</p>
                            </div>


                            @if ($user->status == 'student')
                                <div>
                                    <p>Телефон:</p>

                                    @if (!empty($studentData->phone))
                                        <p>+{{ $studentData->phone }}</p>
                                    @else
                                        <p>Информация не заполнена</p>
                                    @endif
                                </div>

                                <div>
                                    <p>Место работы:</p>
                                    <p>
                                        @if (!empty($studentData->enterprises->name))
                                            {{ $studentData->enterprises->name }}
                                        @else
                                            Не трудоустроен
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <p>Группа:</p>
                                    <p>
                                        @if (!empty($studentData->specializations->name))
                                            {{ $studentData->specializations->name }}
                                        @else
                                            Информация не заполнена
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <p>Код группы:</p>
                                    <p>
                                        @if (!empty($studentData->specializations->kodSpec))
                                            {{ $studentData->specializations->kodSpec }}
                                        @else
                                            Информация не заполнена
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <p>Куратор:</p>
                                    <p>
                                        @if (!empty($studentData->teachers->name))
                                            {{ $studentData->teachers->name }}
                                        @else
                                            Информация не заполнена
                                        @endif
                                    </p>
                                </div>

                                <div>
                                    <p>Статус:</p>
                                    <p>
                                        @if ($user->status == 'student')
                                            Студент
                                        @endif
                                    </p>
                                </div>
                                @if (!empty($studentData->dont_activity))
                                    <div>
                                        <p>Безработица:</p>
                                        <p>
                                            {{ $studentData->dont_activity }}
                                        </p>
                                    </div>
                                @else
                                    <div>
                                        <p>Деятельности:</p>
                                        <p>
                                            {{ $studentData->type_of_activity }}
                                        </p>
                                    </div>
                                @endif


                                <div class="content__profile__footer">
                                    <form action="{{ route('student.edit', $studentData->id) }}" method="get">
                                        <input type="submit" value="Редактировать">
                                    </form>
                                </div>
                            @endif

                            @if ($user->status == 'employer')
                                <div>
                                    <p>Телефон:</p>

                                    @if (!empty($employerData->phone))
                                        <p>+{{ $employerData->phone }}</p>
                                    @else
                                        <p>Информация не заполнена</p>
                                    @endif
                                </div>

                                <div>
                                    <p>Организация:</p>
                                    <p>{{ $employerData->name }}</p>
                                </div>
                                <div class="content__profile__footer">
                                    <form action="{{ route('enterprises.edit', $user->id) }}" method="get">
                                        <input type="submit" value="Редактировать">
                                    </form>
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Предложить организацию</button>

                                </div>
                            @endif

                            <div class="content__profile__footer">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#changePassword">Сменить пароль</button>
                            </div>

                            @if ($user->status == 'admin')
                                @if (count($enterprisesWriting) > 0)
                                    <h3 style="margin-top: 20px">Организации в обработке</h3>
                                    <hr>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Отправитель</th>
                                                <th scope="col">Наименование</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($enterprisesWriting as $item)
                                                <tr scope="row">
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->enterprises->employer }}</td>
                                                    <td>{{ $item->name }}</td>

                                                    <td>
                                                        <form action="{{ route('add.enterprise', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="submit" id="delete" class="form__btn delete"
                                                                value="Добавить">
                                                        </form>
                                                    </td>
                                                    {{-- <td>
                                                    <form action="{{ route('add.enterprise', $item->id) }}" method="post">
                                                        @csrf
                                                        <input type="submit" id="delete" class="form__btn delete"
                                                            value="Удалить">
                                                    </form>
                                                </td> --}}

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <h3 class="not__new__enterprises">
                                        Новые организации отсутствуют
                                    </h3>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
@endsection
