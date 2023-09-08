<h3 class="ct">新增院線片</h3>
<form action="./api/add_movie.php" method="post">
    <div style="display:flex">
        <div>影片資訊</div>
        <div>
            <div>
                <label for="name">片名:</label>
                <input type="text" name="name" value="name">
            </div>
            <div>
                <label for="level">分級:</label>
                <select name="level" value="level">
                    <option value="1">普遍級</option>
                    <option value="2">輔導級</option>
                    <option value="3">保護級</option>
                    <option value="4">限制級</option>
                </select>
            </div>
            <div>
                <label for="length">片長:</label>
                <input type="text" name="length" value="length">
            </div>
            <div>
                <label for="year">上映日期:</label>
                <select name="year" value="year">
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                </select>年
                <select name="month" value="month">
                    <?php for($i=1;$i<=12;$i++){
                        echo "<option value='$i'>$i</option>";
                    }?>
                </select>月
                <select name="day" value="day">
                <?php for($i=1;$i<=31;$i++){
                        echo "<option value='$i'>$i</option>";
                    }?>
                </select>日
            </div>
            <div>
                <label for="publish">發行商:</label>
                <input type="text" name="publish" value="publish">
            </div>
            <div>
                <label for="director">導演:</label>
                <input type="text" name="director" value="director">
            </div>
            <div>
                <label for="trailer">預告影片:</label>
                <input type="file" name="trailer" value="trailer">
            </div>
            <div>
                <label for="poster">電影海報:</label>
                <input type="file" name="poster" value="poster">
            </div>
        </div>
    </div>
    <div style="display: flex;">
        <div>劇情簡介</div>
        <div>
            <textarea name="intro" value="intro" style="width:98%;height:60px"></textarea>
        </div>
    </div>
    <hr>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>