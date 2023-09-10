<?php include_once "../base.php";
sort($_POST['seats']);
$_POST['qt']=count($_POST['seats']);
$_POST['no']=$Order->max("no")+1;
$_POST['seats']=serialize($_POST['seats']);
$Order->save($_POST);
echo $_POST['no'];