
<?php
session_start();
include 'DBConnect.php';

//-----------------Получаем из БД все данные об устройстве-------------------
$query = "SELECT * FROM DEVICE_TABLE D
LEFT JOIN TEMPERATURE_TABLE T ON D.DEVICE_ID=T.DEVICE_ID
LEFT JOIN OUT_STATE_TABLE S ON D.DEVICE_ID=S.DEVICE_ID
JOIN  users_devices ON D.DEVICE_ID=users_devices.device_id
WHERE user_id ='" . $_SESSION['id'] . "' AND users_devices.isblocked=0";
$result = mysqli_query($mysql, $query);
//echo mysqli_num_rows($result);
if (mysqli_num_rows($result) > 0) { //Если в БД есть данные об устройстве
    $title = "Все устройства";
    $content = "";
    include 'displayDevice.php';
    while ($device = mysqli_fetch_assoc($result)) {
        $id = $device['DEVICE_ID'];
        $device_name = $device['NAME'];
        $temperature = $device['TEMPERATURE'] / 10;
        $temperature_dt = $device['DATE_TIME'];
        $out_state = $device['OUT_STATE'];
        $out_state_dt = $device['DATE_TIME'];
        $device_warning = $device['iswarning'];
        $content .=
            displayDevice(
                $id,
                $device_name,
                $temperature,
                $temperature_dt,
                $out_state,
                $out_state_dt,
                $device_warning
            );
    }
} else { //Если в БД нет данных об устройстве
    echo "В базе данных нет устройств.";
    exit;
}

//----------------------------------------------------------------------------------------

//------Проверяем данные, полученные от пользователя---------------------




if (isset($_POST['button_on'])) {
    $date_today = date("Y-m-d H:i:s");
    // echo $_POST['button_on'];
    $query = "CALL enterUpdateDeviceCommand(1,?,?)";
    // $result = mysqli_query($mysql, $query);
    $stmt = $mysql->prepare($query);
    $stmt->bind_param("ss",  $_POST['button_on'], $_SESSION['id']);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_affected_rows($mysql) != 1) //Если не смогли обновить - значит в таблице просто нет данных о команде для этого устройства
    { //вставляем в таблицу строчку с данными о команде для устройства
        $query = "CALL enterInsertDeviceCommand(1,?,?)";
        $stmt = $mysql->prepare($query);
        $stmt->bind_param("ss",  $_POST['button_on'], $_SESSION['id']);
        $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
    }
}

if (isset($_POST['button_off'])) {
    $date_today = date("Y-m-d H:i:s");
    $query = "CALL enterUpdateDeviceCommand(0,?,?)";
    $stmt = $mysql->prepare($query);
    $stmt->bind_param("ss",  $_POST['button_off'], $_SESSION['id']);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_affected_rows($mysql) != 1) //Если не смогли обновить - значит в таблице просто нет данных о команде для этого устройства
    { //вставляем в таблицу строчку с данными о команде для устройства
        $query = "CALL enterInsertDeviceCommand(0,?,?)";
        $stmt = $mysql->prepare($query);
        $stmt->bind_param("ss",  $_POST['button_off'], $_SESSION['id']);
        $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
    }
}
//-----------------------------------------------------------------------

//-------Формируем интерфейс приложения для браузера---------------------
echo '
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<title>MyApp</title>
</head>
<body><header><p class="l">Дорохин Андрей 221-361</p><a href="authorization-alter.php">На главную</a></header><main>
<h1>' . $title . '</h1>
' . $content . '</main><footer></footer>
</body>
</html>';
?>