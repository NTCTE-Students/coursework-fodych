@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Добавить событие</h2>
    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">Имя пользователя</label>
            <input type="text" class="form-control" id="user_name" name="user_name" required>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="start_time">Дата и время начала</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>
        <div class="form-group">
            <label for="end_time">Дата и время окончания</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>
        <div class="form-group">
            <label for="participants">Участники</label>
            <input type="text" class="form-control" id="participants" name="participants">
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
