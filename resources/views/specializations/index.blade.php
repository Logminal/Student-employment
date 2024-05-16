@extends('layout')

@section('title')
    Группы
@endsection

@section('content')
    <section class="students">

        <h3 class="top__section__name">Группы</h3>

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

            @if (Auth::user()->status == 'admin')
                <div class="add__students form specializations">
                    <form action="{{ route('specializations.store') }}" method="post">
                        @csrf

                        <input type="text" name="kodSpec" placeholder="Код специальности">
                        <input type="text" name="name" placeholder="Название группы">
                        <input type="text" name="name_cut" placeholder="Сокращение">


                        <input type="submit" value="Добавить группу">
                    </form>
                </div>
            @endif


            <div class="all__students">

                <h2>Все группы</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Код специальности</th>
                            <th scope="col">Специальность</th>
                            <th scope="col">Сокращение</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($spec as $item)
                            <tr scope="row">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->kodSpec }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->name_cut }}</td>

                                <td>
                                    <form action="{{ route('showAllStudentsSpec', $item->kodSpec) }}" method="get">
                                        <input type="submit" class="form__btn more" value="Посмотеть студентов">
                                    </form>
                                </td>

                                @if (Auth::user()->status == 'admin')
                                    <td>
                                        <form action="{{ route('specializations.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" id="delete" class="form__btn delete" value="Удалить">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('specializations.edit', $item->id) }}" method="get">
                                            @csrf
                                            <input type="submit" id="delete" class="form__btn update"
                                                value="Редактировать">
                                        </form>
                                    </td>
                                @endif
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
