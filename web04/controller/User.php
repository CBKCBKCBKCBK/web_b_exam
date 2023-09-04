<?php include_once "DB.php";
class User extends DB{
    function __construct()
    {
        parent::__construct("users");
    }
    function login($user){
        if($this->count($user)){
            $_SESSION['user']=$user['acc'];
            return 1;
        }else{
            return 0;
        }
    }
}