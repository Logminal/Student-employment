@extends('layout')

@section('title')
    Организации
@endsection

@section('content')
    <section class="enterprises">

        <h3 class="top__section__name">Организации</h3>

        <div class="content">
            {{-- <h2 class="name">Наши оранизации</h2> --}}

            {{-- <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="add__enter">
                <form action="{{ route('enterprises.store') }}" method="post">
                    @csrf
                    <input type="text" name="name" placeholder="Название организации">
                    <input type="submit" value="Добавить организацию">
                </form>
            </div> --}}

            <div class="all__enter">
                <h2>Наши организации</h2>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Работодатель</th>
                            <th scope="col">Название организации</th>
                            <th scope="col">Контактный номер</th>
                            {{-- <th scope="col">Удалить</th> --}}
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($enterprises as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->employer }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    @empty($item->phone)
                                        Информация не заполнена
                                    @else
                                        +{{ $item->phone }}
                                    @endempty
                                </td>
                                <td>
                                    @if (Auth::user()->status == 'admin')
                                        <form action="{{ route('enterprises.destroy', $item->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" id="delete" class="form__btn delete" value="Удалить">
                                        </form>
                                    @endif

                                </td>
                                {{-- <td>
                                    @if (Auth::user()->status == 'admin' || Auth::user()->id == $item->user_id)
                                        <form action="{{ route('enterprises.edit', $item->id) }}" method="get"
                                            id="update__enterprise">
                                            @csrf
                                            @method('PUTCH')
                                            <input type="submit" id="delete" class="form__btn update"
                                                value="Редактировать">
                                        </form>
                                    @endif
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </section>
@endsection
