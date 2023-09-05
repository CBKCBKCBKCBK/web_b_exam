<a href='?do=login'>會員登入</a> |<?php include_once "base.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <div id="main">
        <div id="top">
            <a href="index.php">
                <img src="./icon/0416.jpg" style="width: 55%;">
            </a>
            <div style="padding:10px;display:inline-block">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=buycart">購物車</a> |
                <?php if (isset($_SESSION['user'])) { ?>
                    <a href='./api/logout.php?do=user'>登出</a> |
                <?php } else { ?>
                    <a href='?do=login'>會員登入</a> |
                <?php } ?>
                <?php if (isset($_SESSION['admin'])) { ?>
                    <a href='backend.php'>返回管理</a> |
                <?php } else { ?>
                    <a href='?do=admin_login'>管理登入</a>
                <?php } ?>
            </div>
            <marquee>
                年終特賣會開跑了 情人節特惠活動
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
            <a>全部商品</a>
            <?php $bigs=$Type->all(['big'=>0]);
            foreach($bigs as $big){
                echo "<div class='ww'>";
                echo "<a href='?type={$big['id']}'>{$big['name']}</a>";
                if($Type->hasMid($big['id'])>0){
                    echo "<div class='s'>";
                    $mids=$Type->getMids($big['id']);
                    foreach($mids as $mid){    
                        echo "<a href='{$mid['id']}'>{$mid['name']}</a>";
                    }
                    echo "</div>";
                }
                echo "</div>";
            } ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php $do = $_GET['do'] ?? "main";
            $table = ucfirst($do);
            $file = "./views/front/{$do}.php";
            if (isset($$table)) {
                $$table->front();
            } else if (file_exists($file)) {
                include $file;
            } else {
                include "./views/front/main.php";
            } ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            <?= $Bottom->bot() ?></div>
    </div>

</body>

</html>