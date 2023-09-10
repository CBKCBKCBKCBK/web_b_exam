<?php include_once "../base.php";
?>
<style>
    .teacher *,
    .info *{
        box-sizing: border-box;
    }
    .teacher{
        width: 540px;
        height: 370px;
        background-image: url("./icon/03D04.png");
        background-position: center;
        background-repeat: no-repeat;
        margin: auto;
    }
    .info{
        width: 520px;
        min-height: 100px;
        background: #ccc;
        margin: auto;
        padding: 5px 10%;
    }
    .seats{
        width: 315px;
        height: 340px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        padding-top: 18px;
    }
    .seat{
        width: 63px;
        height: 85px;
        text-align: center;
        position: relative;
    }
    .seat input{
        position: absolute;
        right: 1px;
        bottom: 1px;
    }
    .null{
        background-image: url("./icon/03D02.png");
        background-position: center;
        background-repeat: no-repeat;
    }
    .booked{
        background-image: url("./icon/03D03.png");
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<div class="teacher">
    <div class="seats">
        <?php $seats=$Order->seats($_GET);
        // dd($_GET);
        for($i=0;$i<20;$i++){?>
        <div class="seat <?=
        (in_array($i,$seats))?"booked":"null"
        ?>">X排X號
            <input type="checkbox" name="seat" id="">
        </div>
        <?php }?>
    </div>
</div>
<div class="info">
    <div>您選擇的電影是:<?=$_GET['movie']?></div>
    <div>您選擇的時刻是:<?=$_GET['date']?> <?=$_GET['session']?></div>
    <div>您已經勾選<span id="tickets"></span>張票，最多可以購買張票</div>
    <div class="ct">
    <button onclick="$('#form,#booking').toggle()">上一步</button>
    <button>訂購</button>
    </div>
</div>