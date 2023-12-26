<?php
require("session.php");
// require("check_auth.php");
require("connectdb.php");
require("print_user.php");
//if(!get_magic_quotes_gpc()){
//    echo phpinfo();
//}
echo $_SESSION['user']['id'];
$result = mysqli_query($connect, "SELECT * FROM pages WHERE user_id=".$_SESSION['user']['id']."");

$title = "Мои страницы";
$content = "";

if(!$result || mysqli_num_rows($result) == 0){
	$content = "В базе данных нет страниц.";
}
else{
    $content = "<ul>";
    while($page = mysqli_fetch_assoc($result)){
        $iseditable = '';
        $isedit = false;
        if($page['id']==$_SESSION["user"]['id']){
            $isedit=true;
            $iseditable = '|
            <a href=\"create_update.php?id=".$page["id"]."\">
            Редактировать
            </a>
            |
            <a href=\"delete.php?id=".$page["id"]."\">
            Удалить
            </a>';
        }
        
        $content .= "<li>
        <a href=\"page.php?id=".$page["id"]."&edit=".$isedit."\">
        ".$page["title"]."
        </a>
        ".$iseditable."
        </li>";   
    }
    $content .= "</ul>";
}


require("template.php");

?>