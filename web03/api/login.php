<?php
if($_POST['acc']==='admin'&&$_POST['pw']==='1234'){
    $_SESSION['admin']="admin";
    echo true;
}else{
    echo false;
}