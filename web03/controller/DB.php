<?php
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=wbep3_db03_r1";
    protected $pdo;
    function __construct($table)
    {
        $this->table = $table;
        $this->pdo = new PDO($this->dsn, "root", "");
    }
    function all(...$arg)
    {
        $sql = "select * from $this->table ";
        $sql = $this->sql_all($sql, ...$arg);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($arg){
        $sql="select * from $this->table ";
        $sql=$this->sql_one($sql,$arg);
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function save($arg)
    {
        if (isset($arg['id'])) {
            $tmp = join(",", $this->a2s($arg));
            $sql = "update $this->table set $tmp";
            $sql .= " where `id`='{$arg['id']}'";
        } else {
            $keys = join("`,`", array_keys($arg));
            $vals = join("','", $arg);
            $sql = "insert into $this->table (`$keys`) values ('$vals')";
        }
        return $this->pdo->exec($sql);
    }
    function view($url, $arg = null)
    {
        extract($arg);
        include $url;
    }
    function min($col,...$arg){return $this->math("min",$col,...$arg);}
    function max($col,...$arg){return $this->math("max",$col,...$arg);}
    function sum($col,...$arg){return $this->math("sum",$col,...$arg);}
    protected function math($math,$col,...$arg){
        $sql="select $math($col) from $this->table ";
        $sql=$this->sql_all($sql,...$arg);
        return $this->pdo->query($sql)->fetchColumn();
    }
    protected function sql_all($sql, ...$arg)
    {
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->a2s($arg[0]);
                $sql .= " where " . join(" && ", $tmp);
            } else {
                $sql .= $arg[0];
            }
        }
        if (isset($arg[1])) {
            $sql .= $arg[1];
        }
        return $sql;
    }
    protected function sql_one($sql,$arg){
        if (is_array($arg)) {
            $tmp = $this->a2s($arg);
            $sql .= " where " . join(" && ", $tmp);
        } else {
            $sql .= " where `id`='$arg'";
        }
        echo $sql;
        return $sql;
    }
    protected function a2s($arg)
    {
        foreach ($arg as $k => $v) {
            if ($k != 'id') {
                $tmp[] = "`$k`='$v'";
            }
        }
        return $tmp;
    }
}
