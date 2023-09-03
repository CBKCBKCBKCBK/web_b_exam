<?php
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=wbep4_db04_r1";
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, "root", "");
    }
    function count(...$arg)
    {
        $sql = "select count(*) from $this->table ";
        $sql = $this->sql_all($sql, ...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function find($arg)
    {
        if (is_array($arg)) {
        } else {
            $sql = "select * from $this->table where `id`='$arg'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($arg){
        if(isset($arg['id'])){
            $tmp=$this->a2s($arg);
            $sql="update $this->table set ".join(",",$tmp);
            $sql.=" where `id`='{$arg['id']}'";
        }else{
            $keys=join("`,`",array_keys($arg));
            $vals=join("','",$arg);
            $sql="insert into $this->table (`$keys`) values ('$vals')";
        }
        return $this->pdo->exec($sql);
    }
    protected function sql_all($sql, ...$arg)
    {
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql.=$arg[1];
        }
        return $sql;
    }
    protected function a2s($arg){
        foreach($arg as $k=>$v){
            if(!isset($arg['id'])){
                $tmp[]="`$k`='$v'";
            }
        }
        return $tmp;
    }
}
