<?php function rollback(){
    session_start();
    include 'DBConnect.php';
        $query = "UPDATE device_table SET iswarning='0';UPDATE users_devices SET isblocked=0 WHERE user_id=".$_SESSION['id'];
        $result = mysqli_query($mysql, $query);
}
?>