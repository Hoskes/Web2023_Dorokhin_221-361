<?php
echo '
<!DOCTYPE html>

<html><head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<title>MyApp</title>
</head>
<body>';
?>
<main>
    <?php
    if (isset($_POST['login']) & isset($_POST['password'])) {
        echo '<section class="notif"><p><h2>';
        session_start();
        include 'DBConnect.php';
        
        $query = "SELECT id FROM users where login=? AND password =?";
        $stmt = $mysql->prepare($query);
        $stmt->bind_param("ss",  $_POST['login'], $_POST['password']);
        $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
        // $result = mysqli_query($mysql, $query);

        if (mysqli_num_rows($result) > 0) { //Если в БД есть данные об устройстве
            $id = mysqli_fetch_assoc($result);
            echo "Авторизация прошла успешно";
            $_SESSION['id'] = $id['id'];
            $link = 'index.php';
        } else {
            $_SESSION['id'] = '-1';
            echo "Данные неверны";
            $link = 'authorization-alter.php';
        }
        echo '
        </h2></p>
        <p><a href="'.$link.'">Продолжить</a></p></section>';
    } else {
        $link = 'authorization-alter.php';
        echo '
            <form class = "center" action="'.$link.'" method="post">
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
echo '</body></html>'
?>