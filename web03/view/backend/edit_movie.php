<?php $row=$Movie->find($_GET['id']);
// 轉變數(陣列組合([key陣列],分解(日期減號,日期來源)))
// 讓資料剛好year對年 month對月 day對日 然後key轉變數名稱 value轉變數內容
extract(array_combine(['year','month','day'],explode("-",$row['ondate']))) ?>
<h3 class="ct">編輯院線片</h3>
<form action="./api/add_movie.php" method="post">
    <div style="display:flex">
        <div>影片資訊</div>
        <div>
            <div>
                <label for="name">片名:</label>
                <input type="text" name="name" value="<?=$row['name']?>">
            </div>
            <div>
                <label for="level">分級:</label>
                <select name="level" value="level">
                    <option value="1" <?=($row['level']==1)?"selected":""?>>普遍級</option>
                    <option value="2" <?=($row['level']==2)?"selected":""?>>輔導級</option>
                    <option value="3" <?=($row['level']==3)?"selected":""?>>保護級</option>
                    <option value="4" <?=($row['level']==4)?"selected":""?>>限制級</option>
                </select>
            </div>
            <div>
                <label for="length">片長:</label>
                <input type="text" name="length" value="<?=$row['length']?>">
            </div>
            <div>
                <label for="year">上映日期:</label>
                <select name="year" value="year">
                    <option value="2023" <?=($year==2023)?"selected":""?>>2023</option>
                    <option value="2024" <?=($year==2024)?"selected":""?>>2024</option>
                    <option value="2025" <?=($year==2025)?"selected":""?>>2025</option>
                </select>年
                <select name="month" value="month">
                    <?php for($i=1;$i<=12;$i++){
                        $s=($month==$i)?'selected':'';
                        echo "<option value='$i' $s>$i</option>";
                    }?>
                </select>月
                <select name="day" value="day">
                <?php for($i=1;$i<=31;$i++){
                        $s=($day==$i)?'selected':'';
                        echo "<option value='$i' $s>$i</option>";
                    }?>
                </select>日
            </div>
            <div>
                <label for="publish">發行商:</label>
                <input type="text" name="publish" value="<?=$row['publish']?>">
            </div>
            <div>
                <label for="director">導演:</label>
                <input type="text" name="director" value="<?=$row['director']?>">
            </div>
            <div>
                <label for="trailer">預告影片:</label>
                <input type="file" name="trailer" value="<?=$row['trailer']?>">
            </div>
            <div>
                <label for="poster">電影海報:</label>
                <input type="file" name="poster" value="<?=$row['poster']?>">
            </div>
        </div>
    </div>
    <div style="display: flex;">
        <div>劇情簡介</div>
        <div>
            <textarea name="intro" style="width:98%;height:60px"><?=$row['intro']?></textarea>
        </div>
    </div>
    <hr>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>