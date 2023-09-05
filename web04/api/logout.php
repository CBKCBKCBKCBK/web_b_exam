<?php include_once "../base.php";
switch ($_GET['do']) {
    case "user":
        unset($_SESSION[['user']]);
        break;
    case "admin":
        unset($_SESSION['admin']);
        break;
}
unset($_SESSION[$_GET['do']]);
to("../index.php");
