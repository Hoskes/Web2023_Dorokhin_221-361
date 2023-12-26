<?php
include 'DBConnect.php';

if (isset($_GET["login"]) & isset($_GET["password"])) { //Если запрос от устройства содержит идентификатор
    $query = "SELECT * FROM DEVICE_TABLE WHERE DEVICE_LOGIN=? AND DEVICE_PASSWORD=?";
    $pass =  md5($_GET['password']);
    $stmt = $mysql->prepare($query);
    $stmt->bind_param("ss", $_GET['login'], $pass);
    // $stmt->bind_param("s",  );
    $stmt->execute();

    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) == 1) { //Если найдено устройство с таким ID в БД
        $query_result = mysqli_fetch_assoc($result);
        if ($query_result['iswarning'] == '0') {
            if (isset($_GET['Rele'])) { //Если устройство передало новое состояние реле
                //проверяем есть ли в БД предыдущее значение этого параметра
                $query = "SELECT OUT_STATE FROM OUT_STATE_TABLE WHERE DEVICE_ID = '" . $query_result['DEVICE_ID'] . "'";
                $result = mysqli_query($mysql, $query);
                $date_today = date("Y-m-d H:i:s"); //текущее время
                if (mysqli_num_rows($result) == 1) { //Если в таблице есть данные для этого устройства - обновляем
                    $query = "CALL updateByDeviceOUT(?,?); ";
                    $stmt = $mysql->prepare($query);
                    $stmt->bind_param("ss",  $_GET['Rele'], $query_result['DEVICE_ID']);
                    $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                } else { //Если данных для такого устройства нет - добавляем
                    $query = "CALL updateByDeviceOUT(?,?); "; //Записать данные
                    $stmt = $mysql->prepare($query);
                    $stmt->bind_param("ss",  $_GET['Rele'], $query_result['DEVICE_ID']);
                    $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                }
            }

            if (isset($_GET['Term'])) { //Если устройство передало новое значение температуры
                //проверяем есть ли в БД предыдущее значение этого параметра
                $query = "SELECT TEMPERATURE FROM TEMPERATURE_TABLE WHERE DEVICE_ID='" . $query_result['DEVICE_ID'] . "'";
                $result = mysqli_query($mysql, $query);
                $date_today = date("Y-m-d H:i:s"); //текущее время
                if (mysqli_num_rows($result) == 1) { //Если в таблице есть данные для этого устройства - обновляем
                    $query = "CALL updateByDeviceTemp(?,?)";
                    $stmt = $mysql->prepare($query);
                    $stmt->bind_param("ss",  $_GET['Term'], $query_result['DEVICE_ID']);
                    $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                } else { //Если данных для этого устройства нет - добавляем
                    $query = "CALL insertByDeviceTemp(?,?)"; //Записать данные
                    $result = mysqli_query($mysql, $query);
                    $stmt = $mysql->prepare($query);
                    $stmt->bind_param("ss",  $_GET['Term'], $query_result['DEVICE_ID']);
                    $stmt->execute();
                    $result = mysqli_stmt_get_result($stmt);
                }
            }

            //Достаём из БД текущую команду управления реле
            $query = "SELECT COMMAND FROM COMMAND_TABLE WHERE DEVICE_ID = ?";
            $stmt = $mysql->prepare($query);
            $stmt->bind_param("s", $query_result['DEVICE_ID']);
            $stmt->execute();
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) == 1) { //Если в таблице есть данные для этого устройства
                $Arr = mysqli_fetch_array($result);
                $Command = $Arr['COMMAND'];
            }

            //Отвечаем на запрос текущей командой
            if ($Command != -1) //Есть данные для этого устройства
            {
                echo "COMMAND $Command EOC";
            } else {
                echo "COMMAND ? EOC";
            }
        } else {
            echo 'Устройство заблокированно';
        }
    }
} 



// localhost:3000/device-status.php?login=LOGIN&password=PASSWORD&Term=1076&Rele=1