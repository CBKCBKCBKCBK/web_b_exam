<?php include_once "../base.php";
foreach($_POST['id'] as $k=>$v){
    if(isset($_POST['del'])&&in_array($v,$_POST['del'])){
        $Poster->del($v);
    }else{
        $row=$Poster->find($v);
        $row['sh']=(isset($_POST['sh'])&&in_array($v,$_POST['sh']))?1:0;
        $row['ani']=$_POST['ani'][$k];
        $row['name']=$_POST['name'][$k];
        $Poster->save($row);
    }
}
to("../backend.php?do=poster");