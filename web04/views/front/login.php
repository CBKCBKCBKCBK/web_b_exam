<?=serialize([1,2,3,4,5])?>
<h2>第一次購物</h2>
<a href="javascript:location.href='?do=reg'">
    <img src="./icon/0413.jpg" alt="">
</a>
<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt ct"></td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        </td>
    </tr>
    <tr>
        <td class="tt ct"></td>
        <td class="pp">
            <input type="password" name="pw" id="pw">
        </td>
    </tr>
    <tr>
        <td class="tt ct"></td>
        <td class="pp">
            <?php $a=rand(10,99);
            $b=rand(10,99);
            $_SESSION['ans']=$a+$b;
            echo "{$a} + {$b} = ";
            ?>
            <input type="text" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <butoon type="button" onclick="login('User')">確認</butoon>
</div>