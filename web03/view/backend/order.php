<h3 class="ct">訂單資訊</h3>
<div>
    快速刪除:
    <input type="radio" name="type" value="date" checked>依日期
    <input type="text" name="date" id="">
    <input type="radio" name="type" value="movie">依電影
    <select name="movie" id="">
        <?php foreach ($movies as $movie) {
            echo "<option value='{$movie['movie']}'>{$movie['movie']}</option>";
        } ?>
    </select>
    <button onclick="qDel()">刪除</button>
</div>
<style>
    .header,
    .order-list{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .header div{
        width: calc(100% / 7);
        background-color: #aaa;
        text-align: auto;
        margin: 0 1px;
    }
    .order div{
        width: calc(100% / 7);
        text-align: auto;
        margin: 0 1px;
    }
    .order-list{
        overflow: auto;
        height: 250px;
    }
</style>
<div class="header">
    <div>訂單編號</div>
    <div>電影名稱</div>
    <div>日期</div>
    <div>場次時間</div>
    <div>訂購數量</div>
    <div>訂購位置</div>
    <div>操作</div>
</div>
<div class="order-list">
    <?php foreach($rows as $row){?>
    <div class="order">
        <div><?=$row['no']?></div>
        <div><?=$row['movie']?></div>
        <div><?=$row['date']?></div>
        <div><?=$row['session']?></div>
        <div><?=$row['qt']?></div>
        <div><?php $seats=unserialize($row['seats']);
        foreach($seats as $seat){
            echo (floor($seat/5)+1)."排".(($seat%5)+1)."號<br>";
        }?></div>
        <div>
            <button class="del" data-id="<?=$row['id ']?>">刪除</button>
        </div>
    </div>
    <hr>
    <?php }?>
</div>
<script>
    $(".del").on("click",function(){
        $.post("./api/del.php",{table:'Order',id:$(this).data("id")},()=>{
            location.reload()
        })
    })
    function qDel(){
        let type=$("input[name='type']:checked").val()
        let target=""
        switch(type){
            case "date":
                target=$("input[name='date']").val()
                break
            case "movie":
                target=$("select[name='movie']").val()
                break
        }
        let chk=confirm(`您確定要刪除全部 `+
        target+` 的全部訂單嗎?`)
        if(chk){
            $.post("./api/qdel.php",{type,target},()=>{
                location.reload()
            })
        }
    }
</script>