<?php session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__."/controller/News.php";

$News=new News;

function to($url){
    header("location:$url");
}
function dd($arr){
    echo "<pre>".print_r($arr)."</pre>";
}