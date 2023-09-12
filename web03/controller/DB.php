<?php
class DB{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=wbep2_db03_r2";
    protected $pdo;
    protected $links;
    function __construct($table)
    {
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,"root","");
    }
    function view($url,$data=[]){
        extract($data);
        include $url;
    }
    function all(...$arg){
        $sql="select * from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    protected function sql_all($sql,...$arg){
        if(isset($arg[0])){
            
        }
    }
}