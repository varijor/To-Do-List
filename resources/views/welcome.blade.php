@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h1>My To-Do List</h1>
        <hr>
        <div class="existing-todos">
            <h2>Existing To-Do Items</h2>
            <hr>
            <div class="flex">
                @foreach ($tasks as $task)
                <div class="existing-todo">
                    <div class="existing-todo-title">{{ $task->title }}</div>
                    <div class="existing-todo-description">{{ $task->description }}</div>
                    <div class="existing-todo-due-date">Due: {{ $task->due_date }}</div>
                    <div class="existing-todo-actions">
                        <form action="/remove/{{$task->id}}" method="post">@csrf<button class="btn btn-success btn-sm existing-todo-complete">Complete</button></form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    <hr>
    <h2>Create To-Do Item</h2>
    <hr>

    <form action="/" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description"></textarea>
            </div>
        <div class="form-group">
            <label for="due_date">Due Date</label>
            <input type="datetime-local" id="due_date" name="due_date">
        </div>
        <center>
            <button type="submit">Add Item</button>
        </center>
    </form>
    </div>

@endsection