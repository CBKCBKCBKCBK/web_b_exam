<?php include_once "./base.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery-1.9.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>
<body>
<form action="./api/news_admin.php" method='post'>
<table class="ct" style="width:75%;margin:auto">
    <tr>
        <td>編號</td>
        <td>標題</td>
        <td>顯示</td>
        <td>刪除</td>
    </tr>
    <?php $rows=[
            'rows'=>$News->paginate(3), 
            'links' =>$News->links(),
            'start'=>($News->links['now']-1)*$this->links['num']+1
        ];
    foreach($rows as $key=> $row){
    ?>
    <tr>
        <td><?=$start+$key;?></td>
        <td><?=$row['title'];?></td>
        <td>
            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?"checked":"";?>>
        </td>
        <td>
            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">

        </td>
        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
    </tr>
    <?php
    }
    ?>
</table>
<div class="ct"><?=$links;?></div>

<div class="ct">
    <input type="submit" value="確定修改">
</div>
</form>
</body>
</html>