<?php
function countUpperLetters($string)
{
    return mb_strlen(preg_replace('/[^A-ZА-ЯЁ]/u', '', $string), 'UTF-8');
}

function countLowerLetters($string)
{
    return mb_strlen(preg_replace('/[^a-zа-яё]/u', '', $string), 'UTF-8');
}
function test_it($text)
{
    // количество символов в тексте определяется функцией размера текста
    echo 'Количество символов: ' . strlen($text) . '<br>';
    // определяем ассоциированный массив с цифрами
    $cifra = array(
        '0' => true, '1' => true, '2' => true, '3' => true, '4' => true,
        '5' => true, '6' => true, '7' => true, '8' => true, '9' => true
    );
    // вводим переменные для хранения информации о: 
    $cifra_amount = 0; // количество цифр в тексте
    $word_amount = 0; // количество слов в тексте
    $prep_count = 0;
    $word = ''; // текущее слово
    $words = array(); // список всех слов
    ksort($words);
    for ($i = 0; $i < strlen($text); $i++) // перебираем все символы текста
    {
        if (array_key_exists($text[$i], $cifra)) // если встретилась цифра
            $cifra_amount++; // увеличиваем счетчик цифр
        // если в тексте встретился пробел или текст закончился
        if (preg_match("/[^\pL\pN\s]/u", $text[$i])) {
            $prep_count += 1;
        }
        if ($text[$i] == ' ' || $i == strlen($text) - 1) {
            if ($word) // если есть текущее слово
            {
                //чтобы последняя буква не терялась
                if (preg_match("/^[A-Za-z]$/", $text[$i]) || preg_match("/^[А-Яа-я]$/", $text[$i])) {
                    $word .= $text[$i];
                }
                // если текущее слово сохранено в списке слов
                if (isset($words[$word]))
                    $words[$word]++; // увеличиваем число его повторов
                else
                    $words[$word] = 1; // первый повтор слова
            }
            $word = ''; // сбрасываем текущее слово(
        } else // если слово продолжается
            if (!preg_match('/[\p{P}]/u', $text[$i])) {
                $word .= $text[$i]; //добавляем в текущее слово новый символ
            }
    }
    // выводим количество цифр в тексте
    echo 'Количество цифр: ' . $cifra_amount . '<br>';
    // выводим количество слов в тексте
    echo 'Количество слов: ' . count($words) . '<br>';
    echo 'Кол-во знаков препинания: ' . $prep_count . '<br>';


    ksort($words);
    echo '<table ><thead><tr><th>Слово</th><th>Кол-во</th></tr></thead><tbody>';
    foreach ($words as $key => $value) {
        echo '<tr><td>' . iconv("cp1251", "utf-8", $key) . '</td><td> ' . $value . "</td></tr>";
    }
    echo '</tbody></table>';
}

function test_symbs($text)
{
    $symbs = array(); // массив символов текста
    $l_text = strtolower($text); // переводим текст в нижний регистр
    // последовательно перебираем все символы текста
    for ($i = 0; $i < strlen($l_text); $i++) {
        $letter = strtolower($text[$i]);
        if (isset($symbs[$letter])) // если символ есть в массиве 
            $symbs[$letter]++; // увеличиваем счетчик повторов
        else // иначе
            $symbs[$letter] = 1; // добавляем символ в массив
    }
    return $symbs; // возвращаем массив с числом вхождений символов в тексте
}

?>


<!DOCTYPE html>
<html style="font-size: 16px;" lang="ru">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Дорохин Андрей Николаевич 221-361 лаб9 вар6 </title>
    <link rel="stylesheet" type="text/css" href="style.css" media="screen">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans&display=swap" rel="stylesheet">


</head>

<body>
    <header>
        <img src="icon.png" class="icon">
        <h1>Дорохин Андрей Николаевич 221-361 лаб10</h1>
    </header>
    <main>
        <div class="center-text">
            <?php
            if (isset($_POST['text']) && $_POST['text'] != "") {
                $text = $_POST['text'];
                echo $text . '<br>';
                test_it(iconv("utf-8", "cp1251", mb_strtolower($_POST['text'])));
                echo 'Кол-во букв верхнего регистра: ' . countUpperLetters($text) . '<br>';
                echo 'Кол-во букв нижнего регистра: ' . countLowerLetters($text) . '<br>';
                echo 'Общее кол-во букв: ' . (countUpperLetters($text) + countLowerLetters($text)) . '<br>';
                $arr = test_symbs(iconv("utf-8", "cp1251", strtolower($_POST['text'])));
                echo '<table>';
                echo '<th>Буква</th><th>Кол-во вхождений</th>';
                ksort($arr);
                while ($element = current($arr)) {
                    echo '<tr>';
                    echo '<td>"' . iconv("cp1251", "utf-8",  key($arr)) . '"</td><td>' . current($arr) . '</td>';
                    next($arr);
                    echo '</tr>';
                }
                echo '</table>';
            }else{
                echo 'Нет текста для анализа';
            }
            ?>
        </div>
    </main>

    <footer>
        <a href='index.html'>Другой анализ</a>
    </footer>

</body>


</html>