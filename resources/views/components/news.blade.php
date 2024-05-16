<div class="new">
    <div class="name">
        <h5 class="name__new">Тема: <span>{{ $name }}</span></h5>
        <p class="date">{{ $date }}</p>
        <p>{{ dd(intval($id)) }}</p>
    </div>
    <hr>
    <div class="desk">
        <p>
            {{ $desk }}
        </p>
    </div>
    <div class="block__footer">
        <div class="admin__oper">
            {{-- @if (Auth::user()->id == $user_id) --}}
            @if (Auth::user()->status == 'admin')
                <div class="buttons">
                    <form action="{{ route('new.edit', $id) }}" method="get">
                        <input type="submit" value="Редактировать">
                    </form>

                    <form action="{{ route('new.destroy', $id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            @endif
            {{-- @endif --}}

        </div>
    </div>
</div>
