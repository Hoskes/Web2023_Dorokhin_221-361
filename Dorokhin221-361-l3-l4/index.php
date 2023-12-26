<!DOCTYPE html>

<html>
    <?php
    $title = "Druga-kajdomu.ru Дорохин Андрей 221-361";
    $n_link = array("Русская борзая","Чехословацкий влчак","Мейн-Кун","Обратная связь","Авторизация");
    $link = array("/Dorokhin221-361-l3-l4/index.php","/Dorokhin221-361-l3-l4/php-pages/vlchak.php","/Dorokhin221-361-l3-l4/php-pages/mein-kun.php","/Dorokhin221-361-l3-l4/php-pages/form.php","/Dorokhin221-361-l3-l4/php-pages/authorization-alter.php");
    ?>
<head>
    <title><?php echo $title?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Play&display=swap" rel="stylesheet">
    <link href="/Dorokhin221-361-l3-l4/web-3/main-page.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo-text"><img class="logo" src="/Dorokhin221-361-l3-l4/web-3/dog-cosmos-svgrepo-com.svg"><?php echo $title?></div>
        <div class="to-bottom">
            <nav>
            <a href=<?php echo $link[0];?> class='.activ'><?php echo $n_link[0];?></a>
            <a href=<?php echo $link[1];?> class='.activ'><?php echo $n_link[1];?></a>
            <a href=<?php echo $link[2];?> class='.activ'><?php echo $n_link[2];?></a>
            <a href=<?php echo $link[3];?> class='.activ'><?php echo $n_link[3];?></a>
            <a href=<?php echo $link[4];?> class='.activ'><?php echo $n_link[4];?></a>
                
            </nav>
        </div>
    </header>
    <main>
        <section>
            <article>
                <h2>Русская псовая борзая</h2>
                
                <div class="main-text"><img class="profile-img" src=<?php echo "/Dorokhin221-361-l3-l4/web-3/borz".(date('s')%2+1).".jpeg>"?>
                <div>Русские псовые борзые – это воплощенные утонченность и элегантность.
                    В среде себе подобных эти сухощавые, аскетичные красавцы выделяются изысканным экстерьером и завораживающей легкостью движений.
                    Невзирая на достаточно высокий рост (кобели – до 85 см в холке, суки – до 78 см), русские борзые не производят впечатление гигантов-тяжеловесов.
                    В свое время эту особенность породы очень тонко обыграл гений эпохи ар-нуво Луи Икар. Стоило художнику пару раз изобразить на картинах вытянутый,
                    гордый силуэт русской борзой, как это стало модным трендом, и иллюстрации, гравюры и даже скульптуры, прославляющие царственную осанку псовых борзых, посыпались на
                    французских и российских поклонников породы, как из рога изобилия. 
                    
                </div>
                    
                </div>
                <?php
                $arr = array("Краткая информация", "Основные моменты");
                $txt = array(
                    "Страна происхождения: Россия", "Время зарождения породы: XVII век", "Вес: кобеля 35-45 кг, суки 25-40 кг",
                    "Рост (высота в холке): кобели 75-86 см, суки 68-78 см", "Продолжительность жизни: 9-12 лет",
                    "Русская псовая борзая – отличный охотник и не менее замечательный друг, но остальные собачьи профессии этой породе не даются. ",
                    "В частности, доверив борзой охрану собственного дома, не удивляйтесь, если заходить в него будут все кому не лень.
                ", "В быту русские псовые борзые относительно спокойны и абсолютно не агрессивны: чтобы спровоцировать собаку на лай, придется очень постараться.
                ", "Охотничьи инстинкты управляют русскими псовыми борзыми даже на обычных прогулках. Кошки, грызуны и другие мелкие животные для этих собак – всего лишь дичь, подлежащая немедленному отлову.
                ", "Смириться с присутствием в своей жизни мяукающего создания пес сможет лишь в том случае, если ему пришлось с ним вместе расти.
                "
                );
                echo "<div class='two-col'>";
                for ($i = 0; $i < count($arr); $i++) {
                    echo "<div class='list'>";
                    echo "<h2>$arr[$i]</h2>";
                    echo "<ul>";
                    for ($j = $i * 5; $j < ($i * 5 + 5); $j++) {
                        echo "<li><p>" . $txt[$j] . "</p></li>\n";
                    }
                    echo "</ul>\n";
                    echo "</div>";
                }
                echo "</div>";
                for ($i2 = 0; $i2 < 2; $i2++) {
                    echo '<img class="profile-img" src="/Dorokhin221-361-l3-l4/web-3/borz'.(3+$i2).'.jpeg">';
                }
                ?>
            </article>
        </section>
    </main>
    <footer>
        <p>Контакты:</p>
        <p>Телефон: +7(968)741-51-35</p>
        <p>E-mail: a.n.dorokhin@mail.ru</p>
        <p>Собрано: <?php $currentTime = date("d.m.Y в H:i:s"); echo $currentTime; ?></p>
    </footer>
</body>

</html>