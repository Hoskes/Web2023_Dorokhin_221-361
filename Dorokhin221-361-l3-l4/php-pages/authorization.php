<?php
include 'header.php';
?>
<main>
<form class = "center" action="auth-result.php" method="post">
            <p class="to-center"><h3>Форма авторизации</h3></p>
            <div class="to-center">
                <p><input type="name" name="login" placeholder="Логин"></p>
                <p><input type="password" name="password" placeholder="Пароль"></p>
                <p><label for="ok">Запомнить меня</label><input type="checkbox" name="ok"></p>
                <p><input type="submit" class="button" value="Авторизация"></p>
            </div>
        </form>
</main>
<?php
include 'footer.php';
?>