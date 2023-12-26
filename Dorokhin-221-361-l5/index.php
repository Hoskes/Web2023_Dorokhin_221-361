<?php
include 'header.php';
?>
<main>
    <section>
        <div class="photo_field">
            <?php
            include 'DBConnect.php';
            

            if ($mysql!=null) {
                $result = mysqli_query($mysql, "SELECT * FROM `images`");
                while ($name = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="photo-fields">
                        <img class="photo" title="<?php echo $name['name']; ?>" src="../Dorokhin221-361-l3-l4/web-3/<?php echo $name['image']; ?>" />
                    </div>
            <?php
                }
            } else {
                echo '<p>Проблемы с бд</p>';
            }
            ?>

        </div>

    </section>
</main>
<?php
include 'footer.php';
?>