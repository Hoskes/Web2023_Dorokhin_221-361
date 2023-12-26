<?php
include 'header.php';
?>
<main>
    <section>
        <article>
            <?php

            if (isset($_POST['first-name'])) {
                $firstname = $_POST['first-name'];
                $lastname = $_POST['last-name'];
                $fname = $_POST['f-name'];
                $email = $_POST['user-email'];
                $source = $_POST['feedback'];
            }
            echo '<div>';
            echo "<p>Здравствуйте " . $firstname . " " . $lastname . " " . $fname . " </p>";
            if ($_POST['list'] == "Предложение") {
                echo '<p>Спасибо за ваше предложение:</p>';
                echo '<p>Текст обращения:</p>';
                echo '<textarea>' . $_POST['comment'] . '</textarea>';
            } else {
                echo '<p>Мы рассмотрим Вашу жалобу:</p>';
                echo '<p>Текст обращения:</p>';
                echo '<textarea>' . $_POST['comment'] . '</textarea>';
            }
            if (isset($_POST['file']) & $_POST['file'] != '') echo '<p>Вы приложили следующий файл: '.$_POST['file']."</p>";
            echo '</div>';
            echo '<a class="btn" href="/Dorokhin221-361-l3-l4/php-pages/form.php?N1='.$_POST['first-name'].'&N2='.$_POST['last-name'].'&N3='.$_POST['f-name'].'&E='.$_POST['user-email'].'&T='.$_POST['tel'].'&S='.$_POST['feedback'].'">Заполнить снова</a>';
            ?>
        </article>
    </section>
</main>
<?php
include 'footer.php';
?>