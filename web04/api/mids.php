<?php include_once "../base.php";
$rows=$Type->all(['big'=>$_GET['id']]);
foreach($rows as $row){?>
<option value="<?=$row['id']?>"><?=$row['name']?></option>
<?php }