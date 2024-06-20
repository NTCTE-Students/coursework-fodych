@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h2>События</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Имя пользователя</th>
                <th>Заголовок</th>
                <th>Описание</th>
                <th>Участники</th>
                <th>Дата и время проведения</th>
                <th>Результат события</th>
                <th>Статистика событий</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{ $event->user_name }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ is_array($event->participants) ? implode(', ', $event->participants) : $event->participants }}</td>
                <td>{{ $event->start_time }} - {{ $event->end_time }}</td>
                <td>
                    @if(Carbon\Carbon::now()->lt($event->start_time))
                        Не начат
                    @elseif(Carbon\Carbon::now()->between($event->start_time, $event->end_time))
                        В процессе
                    @else
                        Завершено
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
