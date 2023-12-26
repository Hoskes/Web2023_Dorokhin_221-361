<?php
include 'header.php';
?>
<main>
    <section>
        <div class="photo_field">
            <?php
            include 'DBConnect.php';


            if ($mysql != null) {
                $procedure = mysqli_query($mysql, "CALL kmeans_colors(3)");
                $result = mysqli_query($mysql, "SELECT color_centroids.r as cr, color_centroids.g as cg, color_centroids.b as cb, ec.r as r, ec.g as g, ec.b as b
                FROM color_centroids
                         JOIN end_colors ec on color_centroids.centroid = ec.centroid
                ORDER BY color_centroids.r, color_centroids.g, color_centroids.b, ec.r, ec.g, ec.b");
                while ($name = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="color-container">
                    <div class="color" style="background-color:rgb(<?php echo $name['cr'].",".$name['cg'].",".$name['cb'];?>)"><?php echo $name['cr']." ".$name['cg']." ".$name['cb'];?></div>
                        <div class="color" style="background-color:rgb(<?php echo $name['r'].",".$name['g'].",".$name['b'];?>)"><?php echo $name['r']." ".$name['g']." ".$name['b'];?></div>
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