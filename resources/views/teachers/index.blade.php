@extends('layout')

@section('title')
    Преподаватели
@endsection

@section('content')
    <section class="students">

        <h3 class="top__section__name">Преподаватели</h3>

        <div class="content">

            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="add__students teachers">
                <form action="{{ route('teachers.store') }}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="ФИО преподавателя">
                    {{-- <input list="specializations" type="text" name="specialization" placeholder="Специализвация">
                <datalist id="specializations">
                    @foreach ($spec as $item)
                        <option value="{{ $item->name }}">
                    @endforeach

                </datalist> --}}


                    <input type="submit" value="Добавить преподавателя">
                </form>
            </div>

            <div class="all__students">

                <h2>Наши преподаватели</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Имя</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $item)
                            <tr scope="row">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('teachers.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" id="delete" class="form__btn delete" value="Удалить">
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('teachers.edit', $item->id) }}" method="get">
                                        @csrf
                                        <input type="submit" id="delete" class="form__btn update" value="Редактировать">
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
