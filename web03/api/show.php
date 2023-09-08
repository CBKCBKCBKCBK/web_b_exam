<?php include_once "../base.php";
$id=$_POST['id'];
$row=$Movie->find($id);

$row['sh']=($row['sh']+1)%2;
$Movie->save($row);