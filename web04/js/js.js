// JavaScript Document
function lof(x)
{
	location.href=x
}
function log(table){
	let user={
		acc:$("#acc").val(),
		pw:$("#pw").val(),
	}
	let ans=$("#ans").val()
	$("./api/ans.php",{ans},res=>{
		if(parseInt(res)){

		}else{
			alert("對不起，您輸入的驗證碼有誤請您重新登入")
		}
	})
}