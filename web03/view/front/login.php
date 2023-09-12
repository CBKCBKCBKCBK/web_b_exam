<style>
    .ct>div{
        margin-bottom: 3px;
    }
</style>
<div class="ct">
    <div>
        <label for="acc">帳號:</label>
        <input type="text" name="acc" id="acc">
    </div>
    <div>
        <label for="pw">密碼:</label>
        <input type="password" name="pw" id="pw">
    </div>
    <div>
        <input type="button" value="登入" onclick="login()">
    </div>
</div>
<script>
    let login=function(){
        let data={
            acc:$("#acc").val(),
            pw:$("#pw").val()
        }
        $.post("./api/login.php",data,res=>{
            if(res){
                location.href="./backend.php"
            }else{
                alert("帳號密碼錯誤")
            }
        })
    }
</script>