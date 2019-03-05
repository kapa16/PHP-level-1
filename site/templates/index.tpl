<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>{{TITLE}}</title>
</head>
<body>
<nav class="container">
    <ul class="main_menu">
        <li class="main_menu__list"><a  class="main_menu__link" href="/">Главная</a></li>
        <li class="main_menu__list"><a  class="main_menu__link" href="/products.php">Каталог товаров</a></li>
        <li class="main_menu__list"><a  class="main_menu__link" href="/login.php">Вход</a></li>
    </ul>
</nav>

<header class="container">
    <h1>{{HEADER}}</h1>
</header>

<main class="container">
    {{CONTENT}}
</main>

<section class="container">
    <h2>{{REVIEWSHEADER}}</h2>
    {{REVIEWS}}
</section>

<footer class="container">
    <p>Copyright &copy;{{CURRENTYEAR}}</p>
</footer>


<script src="js/Gallery.js"></script>
<script src="js/main.js"></script>
</body>
</html>