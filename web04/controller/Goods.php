<?php include_once "DB.php";
class Goods extends DB{
    function __construct()
    {
        parent::__construct("goods");
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