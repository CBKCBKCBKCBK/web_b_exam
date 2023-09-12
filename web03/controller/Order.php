<?php include_once "DB.php";
class Order extends DB{
    function __construct()
    {
        parent::__construct("orders");
    }
    function front(){
        $this->view("./view/front/order.php");
    }
    function backend(){
        $this->view("./view/backend/order.php");
    }
}