<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Page</title>
</head>

<body>
    <h1>Edit Page</h1>
    <div style="display: flex">
        <form method="POST" action="/list">
            @csrf
            @method('PUT')

            <input type="hidden" name="id" value="{{ $task->id }}">
            <input type="text" name="name" placeholder="task name" value="{{ $task->name }}" style="margin: 20px; padding: 4px;">
            <input type="date" name="deadline_date" value="{{ $task->deadline_date }}">
            <button type="submit" style="margin: 8px; padding:4px">Edit</button>
        </form>
    </div>
    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</body>

</html>
