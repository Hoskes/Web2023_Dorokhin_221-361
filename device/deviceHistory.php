<?php 


session_start();
// echo $_POST['toHistoryPage'];
// echo $_SESSION['id'];
include 'DBConnect.php';

//-----------------Получаем из БД все данные об устройстве-------------------
$query = "SELECT command,date_executed FROM user_history WHERE user_id='".$_SESSION['id']."' AND device_id = '".$_POST['toHistoryPage']."';";
$result = mysqli_query($mysql, $query);
//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) { //Если в БД есть данные об устройстве
    $title = "История устройств";
    $content = "<table><tr><td>Команда</td><td>Дата выполнения</td></tr>";
    
    while ($device = mysqli_fetch_assoc($result)) {
        $content.="<tr><td>".$device['command']."</td><td>".$device['date_executed']."</td></tr>";
    }
} else { //Если в БД нет данных об устройстве
    echo "В базе данных нет устройств.";
    exit;
}
$content.="</table><a href='index.php'>На главную</a>";
echo '
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<title>MyApp</title>
</head>
<body><header></header><main>
<h1>' . $title . '</h1>
' . $content . '</main><footer></footer>
</body>
</html>';
?>