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

    public function __construct($dbhost, $dbuser, $dbpass, $dbname)
    {
        $this->db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
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
    public function GetNoteInfo($noteId, $returnContent)
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
    public function AddNote($title, $content, $date, $status, $sort, $tags)
    {
        return $this->db->query("INSERT INTO `ria_content` ( `title`, `content`, `date`, `status`, `sort`, `tags`) VALUES ('{$title}','{$content}','{$date}','{$status}','{$sort}','{$tags}')");
    }

    /**
     * 删除文章
     * @param $cid
     * @return bool|mysqli_result
     */
    public function DelNote($cid)
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
    public function UpdateNote($cid, $title, $content, $date, $status, $sort, $tags)
    {
        return $this->db->query("UPDATE `ria_content` SET `title`=$title, `content`=$content, `date`=$date, `status`=$status, `sort`=$sort, `tags`=$tags WHERE `cid`=$cid");
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
    }

    /**
    * 首页：获取最近笔记
    * @param $limit = 6
    * @param $containerStart
    * @param @containerOver
    * @return mysqli_query
    */
    public function getRecentNotes($limit = 6,$containerStart,$containerOver){
        $query = $this->db->query("SELECT * FROM ria_content ORDER BY cid DESC LIMIT {$limit}") or die(mysqli_error($this->db));
        while($note = mysqli_fetch_array($query,$this->retType)){
            echo $containerStart;
            echo '<h3 class="note-title"><a class="note-title" href="index.php?p='.$note['cid'].'">'.$note['title'].'</A></h3>';
            $content = Markdown::convert($note['content']);
            echo '<div class="note-content">'.substr($content,0,200).'</div>';
            echo $containerOver;
        }
    }

}