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
        return $this->db->query("INSERT INTO `ria_content` (`cid`, `title`, `content`, `date`, `status`, `sort`, `tags`) VALUES ('{$title}','{$content}','{$date}','{$status}','{$sort}','{$tags}')");
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
}