<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Page</title>
    </head>

    <body>
        <h1>Create Page</h1>
        <div style="display: flex">
            <form method="POST" action="/create" style="margin: 12px;">
                @csrf
                <input type="text" name="name" placeholder="add a task" style="margin: 20px; padding: 4px;">
                <input type="date" name="deadline_date">
                <button type="submit" style="margin: 8px; padding:4px">Add</button>
            </form>
        </div>
    </body>
</html>
