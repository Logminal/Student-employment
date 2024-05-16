@extends('layout')

@section('title')
    Студенты
@endsection

@section('content')
    <section class="students">
        <h3 class="top__section__name">Студенты</h3>

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

            <div class="add__students form students">
                <form action="{{ route('student.store') }}" method="post">
                    @csrf
                    <input type="text" name="fio" placeholder="ФИО студента">
                    <input type="text" name="age" placeholder="Возраст студента">
                    <div>
                        <input type="text" list="name__enter" name="enterprises_id" placeholder="Выберите органицацию">

                        <datalist id="name__enter">
                            @foreach ($enterprises as $item)
                                <option value="{{ $item->name }}">
                            @endforeach
                        </datalist>
                    </div>

                    <div>
                        <input type="text" list="teacher" name="teachers_id" placeholder="Выберите преподавателя">

                        <datalist id="teacher">
                            @foreach ($teachers as $item)
                                <option value="{{ $item->name }}">
                            @endforeach
                        </datalist>
                    </div>

                    <div>
                        <input type="text" list="specializations" name="specializations_id"
                            placeholder="Выберите группу">

                        <datalist id="specializations">
                            @foreach ($spec as $item)
                                <option value="{{ $item->name }}">
                            @endforeach
                        </datalist>
                    </div>
                    <input type="submit" value="Добавить студента">
                </form>
            </div> --}}

            <div class="all__students">

                <h2>Наши студенты</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Место работы</th>
                            <th scope="col">Куратор</th>
                            <th scope="col">Специальность</th>
                            <th scope="col">Код специальности</th>
                            <th scope="col"></th>
                            {{-- <th scope="col"></th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $item)
                            <tr scope="row">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->fio }}</td>

                                @if (!empty($item->enterprises))
                                    <td>{{ $item->enterprises->name }}</td>
                                @else
                                    <td>Не трудоустроен</td>
                                @endif

                                @if (!empty($item->teachers->name))
                                    <td>{{ $item->teachers->name }}</td>
                                @else
                                    <td>Не заполнено</td>
                                @endif

                                @if (!empty($item->specializations->kodSpec))
                                    <td>{{ $item->specializations->name }}</td>
                                    <td>{{ $item->specializations->kodSpec }}</td>
                                @else
                                    <td>Не заполнено</td>
                                    <td>Не заполнено</td>
                                @endif
                                {{-- <td>{{ $item->specializations->name }}</td>
                                <td>{{ $item->specializations->kodSpec }}</td> --}}

                                {{-- <td>Студент не вснес данные</td>
                                <td>Студент не вснес данные</td>
                                <td>Студент не вснес данные</td>
                                <td>Студент не вснес данные</td> --}}

                                <td>
                                    @if (Auth::user()->status == 'admin')
                                        <form action="{{ route('student.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" id="delete" class="form__btn delete" value="Удалить">
                                        </form>
                                    @endif
                                </td>
                                {{-- <td>
                                    <form action="{{ route('student.edit', $item->id) }}" method="get">
                                        @csrf
                                        <input type="submit" id="update" class="form__btn update" value="Редактировать">
                                    </form>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>




    </section>
@endsection





{{-- <h2>Довабить документы</h2>

    <form action="#" method="post">
        <div>
            <label for="type_doc">Название организации</label>
            <input type="text" list="type_doc" name="type_doc">

            <datalist id="type_doc">
                <option value="Паспорт">
                <option value="СНИЛС">
                <option value="ИНН">
            </datalist>
        </div>
        <input type="file" name="scanned_documents" id="">
        <input type="submit" value="Доавить документы">
    </form> --}}

{{-- <br>

<h2>Наши сутденты</h2>
<table border="1">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>Age</th>
        <th>Enterprise</th>
        <th>Document type</th>
        <th>Document img</th>
    </tr>
    @foreach ($students as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->fio }}</td>
            <td>{{ $item->age }}</td>
            <td>{{ $item->enterprises->name }}</td>
            <td>{{ $item->documents->type_of_documents }}</td>
            <td>
                <form action="{{ route('docum.add') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="type_doc">Тип документа</label>
                        <input type="text" list="type_doc" name="type_doc">

                        <datalist id="type_doc">
                            <option value="Паспорт">
                            <option value="СНИЛС">
                            <option value="ИНН">
                        </datalist>
                    </div>
                    <input type="file" name="scanned_documents">
                    <input type="text" name="students_id" value="{{ $item->id }}" hidden>
                    <input type="submit" value="Доавить документы">
                </form>

            </td>
            <td>
                <form action="{{ route('enterprises.destroy', $item->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" id="delete" value="delete" style="background: black">
                </form>
            </td>
            <td>
                <form action="{{ route('enterprises.edit', $item->id) }}" method="get">
                    @csrf
                    <input type="submit" id="delete" value="update" style="background: black">
                </form>
            </td>
        </tr>
    @endforeach
</table> --}}
