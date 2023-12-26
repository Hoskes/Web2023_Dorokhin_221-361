<?php
include 'header.php';
?>
<main class='f-size'>
    <section class='notif'>
        <p><h2>
            <?php
            if (isset($_POST['login']) & isset($_POST['password'])) {
                if ($_POST['login'] == "user" & $_POST['password'] == "user") {
                    echo "Авторизация прошла успешно";
                } else {
                    echo "Данные неверны";
                }
            }
            ?>
        </h2></p>
        <p><a href="/Dorokhin221-361-l3-l4/index.php">На главную</a></p>
    </section>
</main>
<?php
include 'footer.php';
?>