<?php $row=$Order->find($_GET['id']);?>
<h2 class="ct">訂單編號<span style="color: red;">
<?=$row['no']?>
</span>的詳細資料</h2>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <?= $row['acc'] ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?= $row['name'] ?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="email" name="email" id="email" value="<?= $row['email'] ?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp">
            <input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>">
        </td>
    </tr>
</table>

<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id); ?>
        <tr class="pp ct">
            <td><?= $row['name'] ?></td>
            <td><?= $row['id'] ?></td>
            <td><?= $qt ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['price'] * $qt ?></td>
        </tr>
    <?php $sum += $row['price'] * $qt;
    } ?>
</table>
<div class="all tt ct">總價:<?= $sum ?></div>
<div class="ct">
    <button onclick="location.href='?do=order'">返回</button>
</div>