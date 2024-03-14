<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Page</title>
</head>

<body>
    <h1>List Page</h1>
    <div style="align-items:center; margin: 20px;">
        {{-- <button type="button" id="open" style="padding: 10px;">open</button>
        <p id="detail" style="display: none; padding: 10px;">details</p> --}}
        <table style="text-align: center">
            <tr>
                <th>
                    name
                </th>

                <th style="padding: 0 30px">
                    deadline
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
    // const detailsButton = document.getElementById("open")
    // const detailsBox = document.getElementById("detail")

    // function appearDetails(elm) {
    //     elm.style.display == "" ? elm.style.display = 'none' : elm.style.display = ""
    // }

    // detailsButton.addEventListener('click'                                                                                                          , () => {
    //     appearDetails(detailsBox)
    // })

    function deleteTask() {
        return confirm('本当に削除しますか？') ? true : false;
    }
</script>

</html>
