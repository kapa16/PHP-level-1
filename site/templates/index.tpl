<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>{{TITLE}}</title>
</head>
<body>
<nav class="container">
    {{MAINMENU}}
</nav>

<header class="container">
    <h1>{{HEADER}}</h1>
</header>

<main class="container">
    {{CONTENT}}
</main>

{{REVIEWSCONTAINER}}

<footer class="container">
    <p>Copyright &copy;{{CURRENTYEAR}}</p>
</footer>


<script src="js/Gallery.js"></script>
<script src="js/Validator.js"></script>
<script src="js/main.js"></script>
</body>
</html>