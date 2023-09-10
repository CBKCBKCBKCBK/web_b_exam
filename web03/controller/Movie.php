<?php include_once "DB.php";
class Movie extends DB{
    protected $level=[
        1=>"普通級",
        2=>"輔導級",
        3=>"保護級",
        4=>"限制級"
    ];
    function __construct()
    {
        parent::__construct("movies");
    }
    function backend(){
        $view=[
            'rows'=>$this->all(" order by `rank`")
        ];
        $this->view("./view/backend/movie.php",$view);
    }
    function level($level){
        return $this->level[$level];
    }
    function movies(){
        $today=date("Y-m-d");
        $ondate=date("Y-m-d",strtotime("-2 day"));
        $rows=$this->paginate(4," where `sh`=1 and `ondate`"
        ." between '$ondate' and '$today' order by `rank`");
        return $rows;
    }
    function getMovies(){
        $today=date("Y-m-d");
        $ondate=date("Y-m-d",strtotime("-2 day"));
        $rows=$this->all(" where `sh`=1 and `ondate`"
        ." between '$ondate' and '$today'");
        $html="";
        foreach($rows as $row){
            $html.="<option value='{$row['id']}'>{$row['name']}</option>";
        }
        return $html;
    }
    function getDate($movieId){
        $ondate=strtotime($this->find($movieId)['ondate']);
        $today=strtotime(date("Y-m-d"));
        $diff=3-floor(($today-$ondate)/(60*60*24));
        $html="";
        for($i=0;$i<$diff;$i++){
            $date=date("Y-m-d",strtotime("+$i day"));
            $html.="<option value='$date'>";
            $html.=date("m月d日 l",strtotime("+$i day"));
            $html.="</option>";
        }
        return $html;
    }
}