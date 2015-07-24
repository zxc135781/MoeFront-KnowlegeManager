<?php

/**
 * 数据库基类
 * @Copyright(c) 2015 MoeFront All rights reserved.
 * Create By Boot
 */
class Database
{
    private $db;
    protected $retType = MYSQLI_ASSOC;

    public function __construct($dbhost, $dbuser, $dbpass, $dbname , $dbport)
    {
        $this->db = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);
        $this->db->set_charset("UTF8");
    }

    /**
     * 设置返回格式
     * MYSQLI_ASSOC
     * MYSQLI_NUM
     * MYSQLI_BOTH
     * @param $type
     */
    public function setRtnType ($type)
    {
        $this->retType = $type;
    }

    /**
     * 获取程序 ria_option 表的选项
     * @param $name
     * @param $inputMethod
     */
    public function getOption($name, $inputMethod = 0)
    {
        $query = $this->db->query("SELECT * FROM ria_option WHERE name ='{$name}' ");
        $result = $query->fetch_array($this->retType);
        if ($inputMethod == 0)
            return $result['value'];
        else
            echo $result['value'];
    }

    /**
     * 通过笔记序号获取单个文章信息
     * @param $noteId
     * @return array
     * @internal param $noteID
     */
    public function GetSinNote($noteId)
    {
        $res = $this->db->query("SELECT * FROM ria_content WHERE cid = '{$noteId}'");
        return $res->fetch_assoc();
    }

    /**
     * 通过笔记序号获取文章信息
     * @param $noteId
     * @param $returnContent
     * @return
     */
    public function getNoteInfo($noteId, $returnContent)
    {
        $res = $this->db->query("SELECT * FROM ria_content WHERE cid = '{$noteId}'");
        $rtn = $res->fetch_assoc();
        return $rtn[$returnContent];
    }

    /**
     * 添加文章
     * @param $title
     * @param $content
     * @param $date
     * @param $status
     * @param $sort
     * @param $tags
     * @return bool|mysqli_result
     */
    public function addNote($title, $content, $date, $status, $sort, $tags)
    {
         $title = mysqli_real_escape_string($this->db,$title);
         $content = mysqli_real_escape_string($this->db,$content);
         $date = mysqli_real_escape_string($this->db, $date);
         $status = 1;
         $sort =mysqli_real_escape_string($this->db,$sort);
         $tags = mysqli_real_escape_string($this->db, $tags);
        return $this->db->query("INSERT INTO `ria_content` ( `title`, `content`, `date`, `status`, `sort`, `tags`) VALUES ('{$title}','{$content}','{$date}','{$status}','{$sort}','{$tags}')");
    }

    /**
     * 删除文章
     * @param $cid
     * @return bool|mysqli_result
     */
    public function delNote($cid)
    {
        return $this->db->query("DELETE FROM `ria_content` WHERE  `cid`={$cid}");
    }

    /** 
    * 更新文章
     * @param $cid
     * @param $title
     * @param $content
     * @param $date
     * @param $status
     * @param $sort
     * @param $tags
     * @return bool|mysqli_result
     */
    public function updateNote($cid, $title, $content, $date, $status, $sort, $tags)
    {
            $title = mysqli_real_escape_string($this->db,$title);
            $content = mysqli_real_escape_string($this->db,$content);
            $date = mysqli_real_escape_string($this->db, $date);
            $status = 1;
            $sort =mysqli_real_escape_string($this->db,$sort);
            $tags = mysqli_real_escape_string($this->db, $tags);
            return $this->db->query("UPDATE `ria_content` SET `title`='{$title}', `content`= '{$content}' , `date`= '{$date}', `status`= '{$status}', `sort`= '{$sort}', `tags`= '{$tags}' WHERE `cid`= '{$cid}'") or die(mysqli_error($this->db));
    }

    /**
    * 首页：获取分类菜单
    * @return 
    */
    public function getSorts(){
        $query = $this->db->query("SELECT DISTINCT `sort` FROM ria_content");       //使用 DISTINCT 筛选非重复值
        while($result = mysqli_fetch_array($query,$this->retType)){
            echo '<li><a href="index.php?sort='.urlencode($result['sort']).'">'.$result['sort'].'</a></li>';
        }
        echo '<li style="float:right;"><a href="#" class="title-only" id="title-only"><span class="icon-off"></span> 仅显示标题</a></li>';
    }

    /**
    * 首页：获取最近笔记
    * @param $containerStart
    * @param $containerOver
    * @param $limit
    * @return mysqli_query
    */
    public function getRecentNotes($containerStart,$containerOver,$limit){
        $WA = new RIA_Global();
        $query = $this->db->query("SELECT * FROM ria_content ORDER BY cid DESC LIMIT {$limit},3") or die(mysqli_error($this->db));
        while($note = mysqli_fetch_array($query,$this->retType)){
            echo $containerStart;
            echo '<h3 class="note-title"><a class="note-title" href="index.php?p='.$note['cid'].'">'.$note['title'].'</a>
            <a class="del-button" href="index.php?act=del&cid='.$note['cid'].'"><span class="icon-remove"></span></a></h3>';
            $content = Markdown::convert($note['content']);
            echo '<div class="note-content">'.$content.'</div>';
            echo '<div class="note-tags" style="background-color:'.$this->randColor().';">
            日期：'.$note['date'].' // 
            分类：'.$note['sort'].' // 
            标签：'.$note['tags'].' 
            <a href="index.php?p='.$note['cid'].'" class="read-this">阅读...</a></div>';
            echo $containerOver;
            echo '<br>';
        }
    }

    /**
    * 分类：获取分类下的笔记
    * @param $sid
    * @param $containerStart
    * @param $containerOver
    */
    public function getSortNotes($sid,$containerStart,$containerOver){
        $query = $this->db->query("SELECT * FROM ria_content WHERE sort='{$sid}' ORDER BY cid DESC") or die(mysqli_error($this->db));
        while($note = mysqli_fetch_array($query,$this->retType)){
            echo $containerStart;
            echo '<h3 class="note-title"><a class="note-title" href="index.php?p='.$note['cid'].'">'.$note['title'].'</A></h3>';
            $content = Markdown::convert($note['content']);
            echo '<div class="note-content">'.$content.'</div>';
            echo '<div class="note-tags" style="background-color:'.$this->randColor().';">
            日期：'.$note['date'].' // 
            分类：'.$note['sort'].' // 
            标签：'.$note['tags'].' 
            <a href="index.php'.$note['cid'].'" class="read-this">阅读...</a></div>';
            echo $containerOver;
            echo '<br>';
        }
    }

    /**
    * 拾取随机颜色
    * @return string
    */
    public function randColor(){
        $colors = array();
        for($i = 0;$i<6;$i++){
            $colors[] = dechex(rand(0,15));
        }
        return '#'.implode('',$colors);
    }

    /**
    * 计算分类条数
    * @param sortName
    * @return mysqli_fetch_array_result
    */
    public function count($sortName = 'content'){
        if($sortName == 'content'){
            $query = $this->db->query("SELECT count(*) AS total FROM ria_content");
            $res = mysqli_fetch_array($query,$this->retType);
            return $res['total'];
        }
        else{
            $query = $this->db->query("SELECT count(*) AS total FROM ria_content WHERE sort='{$sortName}'");
            $res = mysqli_fetch_array($query,$this->retType);
            return $res['total'];            
        }
    }

    /**
    * 首页：笔记分页
    */
    public function pageNav(){
        $number = ceil($this->count() / 3);
        echo '<ul class="pagenavigator">';
        for($i=1;$i<=$number;$i++)
            echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
        echo '</ul>';
    }
}
