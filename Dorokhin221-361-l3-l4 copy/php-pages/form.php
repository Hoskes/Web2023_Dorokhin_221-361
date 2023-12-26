<?php
include 'header.php';
?>
<?php 

?>

<main>
    <form action="home.php" method="post">
        <p class="to-center">
        <h3>Форма обратной связи</h3>
        </p>
        <div class="to-center">
            <p><input type="name" name="first-name" placeholder="Фамилия" <?php if (isset($_GET['N1'])){ echo "value=".$_GET['N1'];}?> required></p>

            <p><input type="name" name="last-name" placeholder="Имя" <?php if (isset($_GET['N2'])){ echo "value=".$_GET['N2'];}?> required></p>

            <p><input type="name" name="f-name" placeholder="Отчество" <?php if (isset($_GET['N3'])){ echo "value=".$_GET['N3'];}?> required></p>

            <p><label for="internet">Из интернета</label><input type="radio" name="feedback" value="internet" <?php if (isset($_GET['S'])){ if($_GET['S']=="internet"){echo 'checked';}}?> required></p>

            <p><label for="friend">От друзей</label><input type="radio" name="feedback" value="friend" <?php if (isset($_GET['S'])){ if($_GET['S']=="friend") {echo 'checked';}}?> required></p>

            <p><input type="email" name="user-email" placeholder="e-mail" <?php if (isset($_GET['E'])){ echo "value=".$_GET['E'];}?>required></p>

            <p><input type="tel" name="tel" placeholder="Телефон" <?php if (isset($_GET['T'])){ echo "value=".$_GET['T'];}?> required></p>
            <p><textarea name="comment" placeholder="Введите свой комментарий..."></textarea></p>
            <p><select name="list">
                    <option value="" disabled selected hidden>Тип обращения</option>
                    <option>Жалоба</option>
                    <option>Предложение</option>
                </select></p>
            <p><input type="file" name ='file'></p>
            <p><label for="ok">Я согласен с обработкой моих данных</label><input type="checkbox" name="ok" required></p>
            <p><input type="submit" class="button"></p>
        </div>
    </form>
</main>
<?php
include 'footer.php';
?>