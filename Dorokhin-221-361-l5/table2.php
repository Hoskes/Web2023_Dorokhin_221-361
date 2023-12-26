<?php
include 'header.php';
?>
<main>
    <section>
        <article>
            <div class="photo_field">
                <?php
                include 'DBConnect.php';
                $result = mysqli_query($mysql, "SELECT * FROM `terms`");
                echo '<table>
        <thead>
            <th scope="col" class="head">Термин</th>
            <th scope="col" class="head">Описание</th>
        </thead>
        <tbody>';
                while ($name = mysqli_fetch_assoc($result)) {
                    echo ' 
        <tr>
            <td class="row">' . $name['term'] . '</td>
            <td class="row">' . $name['description'] . '</td>
        </tr>';
                }
                echo '</tbody> </table>'
                ?>
            </div>
        </article>
    </section>
</main>
<?php
include 'footer.php';
?>