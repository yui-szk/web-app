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
        <div style="display:flex;">
            <p style="padding: 10px;">task_name</p>
            <p style="padding: 10px;">daedline</p>
        </div>
        <button type="button" id="open" style="padding: 10px;">open</button>
        <p id="detail" style="display: none; padding: 10px;">details</p>
    </div>
</body>

<script>
    const detailsButton = document.getElementById("open")
    const detailsBox = document.getElementById("detail")

    function appearDetails(elm) {
        elm.style.display == "" ? elm.style.display = 'none' : elm.style.display = ""
    }

    detailsButton.addEventListener('click', () => {
        appearDetails(detailsBox)
    })
</script>

</html>
