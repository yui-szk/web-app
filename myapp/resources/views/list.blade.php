<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Page</title>
</head>

<body>

    <h1>List Page</h1>
    <form action="/list" method="POST">
        @csrf
        <select name="sortby" id="task-sort" onchange="submit(this.form)">
            <option value="default">default</option>
            <option value="deadline" {{ $sortby === 'deadline' ? 'selected' : ''}}>deadline</option>
            <option value="latest" {{ $sortby === 'latest' ? 'selected' : ''}}>latest</option>
            <option value="oldest" {{ $sortby == 'oldest' ? 'selected' : ''}}>oldest</option>
        </select>
    </form>
    <div>
        <table>
            <tr>
                <th>
                    name
                </th>

                <th>
                    deadline
                </th>
                <th>
                    created_at
                </th>
            </tr>
            @foreach ($tasks as $task)
                <tr>
                    <td>
                        {{ $task->name }}
                    </td>
                    <td>
                        {{ $task->deadline }}
                    </td>
                    <td>
                        {{ $task->created_at }}
                    </td>
                    <td>
                        <form action="/list" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <input type="hidden" name="status" value="{{$task->status}}">
                            <input type="checkbox" name="status" {{ $task->status ? 'checked' : '' }} />
                            <button type="submit">complete</button>
                        </form>
                    </td>
                    <td>
                        <a href="/edit/{{ $task->id }}" method="POST">
                            <button type="submit">edit</button>
                        </a>
                    </td>
                    <td>
                        <form onsubmit="return deleteTask();" action="/list" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $task->id }}">
                            <button type="submit">delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

<script>
    function deleteTask() {
        return confirm('本当に削除しますか？') ? true : false;
    }
</script>

</html>
