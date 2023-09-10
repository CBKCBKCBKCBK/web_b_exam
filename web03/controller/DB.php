<?php
class DB
{
    protected $table;
    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=wbep3_db03_r1";
    protected $pdo;
    protected $links;
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
    function del($arg){
        $sql="delete from $this->table where ";
        $sql=$this->sql_one($sql,$arg);
        return $this->pdo->exec($sql);
    }
    function view($url, $arg =[])
    {
        extract($arg);
        include $url;
    }
    function min($col,...$arg){return $this->math("min",$col,...$arg);}
    function max($col,...$arg){return $this->math("max",$col,...$arg);}
    function sum($col,...$arg){return $this->math("sum",$col,...$arg);}
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * function movies(){
     *  $rows=$this->paginate(4,['sh'=>1]," `ondate` between $ondate and $today order by `rank");
     *  return $rows;
     * }
     */
    function paginate($num,$arg=null){
        // 計算總項目數
        $total=$this->count($arg);
        // 計算總頁數
        $pages=ceil($total/$num);
        // 獲取當前頁數 如果沒有p則為1
        $now=$_GET['p']??1;
        // 起始項目 當前頁數-1乘以每頁項目
        $start=($now-1)*$num;
        $rows=$this->all($arg," limit $start,$num");
        $this->links=[
            'total'=>$total,
            'pages'=>$pages,
            'now'=>$now,
            'start'=>$start,
            'rows'=>$rows
        ];
        return $rows;
    }
    function links($do=null){
        $html="";
        if(is_null($do))$do=$this->table;
        if(($this->links['now']-1)>=1){
            $prev=$this->links['now']-1;
            $html.="<a href='?do=$do&p=$prev'> &lt; </a>";
        }
        for($i=1;$i<=$this->links['pages'];$i++){
            $html.="<a href='?do=$do&p=$i'> $i </a>";
        }
        if(($this->links['now']+1)<=$this->links['pages']){
            $next=$this->links['now']+1;
            $html.="<a href='?do=$do&p=$next'> &gt; </a>";
        }
        return $html;
    }
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
