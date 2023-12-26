<?php
include 'header.php';
?>
<main>
    <?php
    if (isset($_POST['login']) & isset($_POST['password'])) {
        echo '<section class="notif"><p><h2>';
        if ($_POST['login'] == "user" & $_POST['password'] == "user") {
            echo "Авторизация прошла успешно";
        } else {
            echo "Данные неверны";
        }
        echo '
        </h2></p>
        <p><a href="/Dorokhin221-361-l3-l4/index.php">На главную</a></p></section>';
    } else {
        echo '
            <form class = "center" action="/Dorokhin221-361-l3-l4/php-pages/authorization-alter.php" method="post">
            <p class="to-center"><h3>Форма авторизации</h3></p>
            <div class="to-center">
                <p><input type="name" name="login" placeholder="Логин"></p>
                <p><input type="password" name="password" placeholder="Пароль"></p>
                <p><label for="ok">Запомнить меня</label><input type="checkbox" name="ok"></p>
                <p><input type="submit" class="button" value="Авторизация"></p>
            </div>
            </form>';
    }
    ?>

</main>
<?php
include 'footer.php';
?>