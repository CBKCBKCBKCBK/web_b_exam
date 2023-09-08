<div class="ct">預告片清單</div>
<div style="display:flex;justify-content:space-between;text-align:center;">
    <div style="width:22%;background-color:#999">預告片海報</div>
    <div style="width:22%;background-color:#999">預告片片名</div>
    <div style="width:22%;background-color:#999">預告片排序</div>
    <div style="width:32%;background-color:#999">操作</div>
</div>
<form action="./api/edit_posters.php" method="post">
    <div style="overflow: auto;height:200px">
        <?php foreach ($rows as $idx=> $row) { 
            // 如果(資料位置到達頂端)?則同一筆:否則變成上一筆
            $prev=($idx==0)?$row['id']:$rows[$idx-1]['id'];
            // 如果(資料位置到達尾端)?則同一筆:否則變成下一筆
            $next=($idx==array_key_last($rows))?$row['id']:$rows[$idx+1]['id'];
            ?>
            <div style="background-color: white;margin:1px 0;width:100%;display:flex;justify-content:space-between;text-align:center;padding:5px 0;align-items:center">
                <div style="width:22%">
                    <img src="./upload/<?= $row['img'] ?>" style="height:80px">
                </div>
                <div style="width:22%">
                    <input type="text" name="name[]" value="<?= $row['name'] ?>">
                </div>
                <div style="width:22%">
                    <input type="button" class="sw" data-sw="<?=$row['id']?>-<?=$prev?>" value="往上">
                    <input type="button" class="sw" data-sw="<?=$row['id']?>-<?=$next?>" value="往下">
                </div>
                <div style="width:32%;color:black">
                    <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?=($row['sh']==1)?"checked":""?>>顯示
                    <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">刪除
                    <select name="ani[]">
                        <option value="2" <?=($row['ani']==1)?"selected":""?>>縮放</option>
                        <option value="1" <?=($row['ani']==2)?"selected":""?>>淡入淡出</option>
                        <option value="3" <?=($row['ani']==3)?"selected":""?>>滑入滑出</option>
                    </select>
                    <input type="hidden" name="id[]" value="<?=$row['id']?>">
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="ct">
        <input type="submit" value="編輯確定">
        <input type="reset" value="重置">
    </div>
</form>
<script>
    $(".sw").on("click",function(){
        let id=$(this).data('sw').split("-")
        $.post("./api/sw.php",{table:'Poster',id},()=>{
            location.reload()
        })
    })
</script>
<hr>
<div class="ct">新增預告片海報</div>
<form action="./api/add_posters.php" method="post" enctype="multipart/form-data">
    <div>
        預告片海報: <input type="file" name="img" id="img">
        預告片片名: <input type="text" name="name" id="name">
    </div>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>