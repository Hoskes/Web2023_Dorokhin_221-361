<!DOCTYPE html>

<html>
    <?php
    $title = "Druga-kajdomu.ru Дорохин Андрей 221-361";
    $title = "Druga-kajdomu.ru Дорохин Андрей 221-361";
    $n_link = array("Русская борзая","Чехословацкий влчак","Мейн-Кун","Обратная связь","Авторизация");
    $link = array("/Dorokhin221-361-l3-l4/index.php","/Dorokhin221-361-l3-l4/php-pages/vlchak.php","/Dorokhin221-361-l3-l4/php-pages/mein-kun.php","/Dorokhin221-361-l3-l4/php-pages/form.php","/Dorokhin221-361-l3-l4/php-pages/authorization-alter.php");
    ?>
    
<head>
    <title><?php echo $title?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="/Dorokhin221-361-l3-l4/web-3/main-page.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo-text"><img class="logo" src="/Dorokhin221-361-l3-l4/web-3/dog-cosmos-svgrepo-com.svg"><?php echo $title?></div>
        <div class="to-bottom">
            <nav>
                <?php 
                for ($i = 0; $i < count($link); $i++) {
                    echo "<a href=$link[$i]>$n_link[$i]</a>";
                }
                ?>
                
            </nav>
        </div>
    </header>
    