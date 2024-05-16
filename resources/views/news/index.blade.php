@extends('layout')

@section('title')
    Главная
@endsection

@section('content')
    <section class="news">
        <h3 class="top__section__name news">Новости</h3>

        <div class="blocks">
            @if (Auth::user()->status == 'employer' || Auth::user()->status == 'admin')
                <p class="button__add__news" data-bs-toggle="modal" data-bs-target="#modalNewsCreate">Добавить новость</p>
            @endif

            @foreach ($news->reverse() as $new)
                <div class="new">
                    <div class="name">
                        <h5 class="name__new">Тема: <span>{{ $new->name }}</span></h5>
                        <p class="date">{{ $new->date }}</p>
                    </div>
                    <hr>
                    <div class="desk">
                        <p>
                            {{ $new->desk }}
                        </p>
                    </div>
                    <div class="block__footer">
                        <div class="admin__oper">
                            @if (Auth::user()->id == $new->user_id || Auth::user()->status == 'admin')
                                <div class="buttons">
                                    <form action="{{ route('new.edit', $new->id) }}" method="get">
                                        <input type="submit" value="Редактировать">
                                    </form>

                                    <form action="{{ route('new.destroy', $new->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Удалить">
                                    </form>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Модальное окно -->
        <div class="modal fade" id="modalNewsCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить новость</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                    </div>
                    <div class="modal-body">
                        <div class="add__news">
                            <form action="{{ route('new.store') }}" method="post" id="add__news">
                                @csrf
                                <input type="text" id="name" name="name" placeholder="Заголовок новости">
                                <textarea name="desk" id="" cols="30" rows="10" placeholder="Описание новости"></textarea>
                            </form>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button form="add__news" class="btn add">Сохранить изменения</button>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
