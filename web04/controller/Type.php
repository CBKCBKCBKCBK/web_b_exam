<?php include_once "DB.php";
class Type extends DB{
    function __construct()
    {
        parent::__construct("types");
    }
    function hasMid($id){
        return $this->count(['big'=>$id]);
    }
    function getMids($id){
        return $this->all(['big'=>$id]);
    }
    function getBig($id){
        $row=$this->find($id);
        return $this->find($row['big']);
    }
}