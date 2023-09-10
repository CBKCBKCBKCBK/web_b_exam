<style>
    #form *,
    #booking *{
        box-sizing: border-box;
    }
    #select{
        width: 400px;
        margin: auto;
        padding: 20px;
        background-color: #666;
    }
    #select div:nth-child(odd){
        background-color: #999;
    }
    #select div:nth-child(even){
        background-color: #ccc;
    }
    .select{
        display: flex;
        margin: 2px;
        align-items: center;
    }
    .select label{
        width: 20%;
        text-align: center;
    }
    .select select{
        width: 80%;
    }
</style>
<div id="form">
    <h3 class="ct">線上訂票</h3>
    <form id="select">
        <div class="select">
            <label for="movie">電影：</label>
            <select name="movie" id="movie"></select>
        </div>
        <div class="select">
            <label for="date">日期：</label>
            <select name="date" id="date"></select>
        </div>
        <div class="select">
            <label for="session">場次：</label>
            <select name="session" id="session"></select>
        </div>
        <div class="ct">
            <input type="button" value="確定" 
            onclick="$('#form,#booking').toggle();getBooking()">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<div id="booking" style="display: none;">
    劃位
    
</div>
<script>
    getMovies()
    $("#movie").on("change",function(){
        getDate($(this).val())
    })
    $("#date").on("change",function(){
        getSessions($("#movie option:selected").text(),$(this).val())
    })
    function getMovies() {
        $.get("./api/get_options.php",{type:'movie'}, movies => {
            $("#movie").html(movies)
            let id=(new URL(location)).searchParams.get('id')
            if(typeof(id)!='null'){
                $(`#movie option[value='${id}']`).prop('selected',true)
            }

            getDate($("#movie").val())
        })
    }
    function getDate(movieId){
        $.get("./api/get_options.php",{type:'date',movieId},date=>{
            $("#date").html(date)
            getSessions($("#movie option:selected").text(),$("#date").val())
        })
    }
    function getSessions(movie,date){
        $.get("./api/get_options.php",{type:'session',movie,date},sessions=>{
            $("#session").html(sessions)
        })
    }
    let order={}
    function getBooking(){
        // 不是val() 是text()
        order.movie=$("#movie option:selected").text()
        order.date=$("#date").val()
        order.session=$("#session").val()
        // 會動到資料庫再用post
        $.get("./api/get_booking.php",order,booking=>{
            // console.log(booking);
            $("#booking").html(booking) 
        })
    }
</script>