<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clear Login Info</title>
</head>

<body>
    <script>        
        window.addEventListener('load', (event) => {
            localStorage.removeItem("logininfo");
            let url = new URL(document.URL).searchParams.get("url");
            if(url) window.location.href = url
            else window.location.href = '/'
        });
    </script>
</body>

</html>


