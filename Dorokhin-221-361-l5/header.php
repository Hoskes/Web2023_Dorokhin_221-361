<!DOCTYPE html>

<html>
<?php
$title = "Druga-kajdomu.ru Дорохин Андрей 221-361-lab5";
$title = "Druga-kajdomu.ru Дорохин Андрей 221-361-lab5";
$n_link = array("Картиночки", "Термины");
$link = array("index.php", "table2.php");
?>

<head>
    <title><?php echo $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="main-page.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo-text"><img class="logo" src="/Dorokhin221-361-l3-l4/web-3/dog-cosmos-svgrepo-com.svg"><?php echo $title ?></div>
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