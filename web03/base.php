<?php session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__."/controller/Poster.php";
include_once __DIR__."/controller/Movie.php";
include_once __DIR__."/controller/Order.php";

$Poster=new Poster;
$Movie=new Movie;
$Order=new Order;

function to($url){
    header("location:$url");
}
function dd($arr){
    echo "<pre>".print_r($arr)."</pre>";
}