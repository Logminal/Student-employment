@extends('layout')

@section('title')
    Пользователи
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name">Пользователи</h3>

        <div class="content">

            <div class="errors">
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
                    {{-- <input type="text" name="name" placeholder="Введите имя пользователя">
                    <input type="text" name="surname" placeholder="Введите фамилию пользователя">
                    <input type="text" name="patronymic" placeholder="Введите отчество пользователя"> --}}
                    <input type="text" name="fio" placeholder="Введите ФИО">
                    <input type="text" name="login" placeholder="Введите логин пользователя">
                    {{-- <select name="status" id="status" required>
                        <option selected disabled>Выберите статус</option>
                        <option value="student">Студент</option>
                        <option value="employer">Работодатель</option>
                    </select> --}}
                    <input type="text" name="password" placeholder="Введите пароль пользователя">

                    <input type="submit" value="Добавить пользователя">
                </form>
            </div>

            <div class="all__students">

                <h2>Наши пользователи</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            {{-- <th scope="col">Фамилия</th>
                            <th scope="col">Отчество</th> --}}
                            <th scope="col">Логин</th>
                            <th scope="col">Статус</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            <tr scope="row">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fio }}</td>
                                {{-- <td>{{ $item->surname }}</td>
                                <td>{{ $item->patronymic }}</td> --}}
                                <td>{{ $item->login }}</td>
                                <td>

                                    @if ($item->status == 'student')
                                        Студент
                                    @endif

                                    @if ($item->status == 'admin')
                                        Модератор
                                    @endif

                                    @if ($item->status == 'employer')
                                        Работодатель
                                    @endif

                                </td>
                                <td>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" id="delete" class="form__btn delete" value="Удалить">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('user.edit', $item->id) }}" method="get">
                                        @csrf
                                        <input type="submit" id="update" class="form__btn update" value="Редактировать">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>

    </section>
@endsection
