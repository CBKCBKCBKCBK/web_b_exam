<?php include_once "DB.php";
class Poster extends DB{
    function __construct()
    {
        parent::__construct('posters');
    }
    function backend(){
        $this->view("./view/backend/posters.php");
    }
}