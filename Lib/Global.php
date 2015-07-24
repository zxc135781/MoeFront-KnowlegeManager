<?php

/**
 * 知识笔记管理RIA init.php Global.php 全局基类
 * @Copyright(c) 2015 MoeFront All rights reserved.
 */
class RIA_Global extends Database
{
    var $dbhost = DBHOST;
    var $dbuser = DBUSER;
    var $dbpass = DBPASS;
    var $dbname = DBNAME;
    var $dbport = DBPORT;

    public function __construct()
    {
        parent::__construct($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname , $this->dbport);
    }

    /*------------------------程序运行相关------------------------*/

    /**
     * 程序启动初始化
     */
    public function Init()
    {
        if ($this->isPost('act', 'get'))
            $act = $_GET['act'];
        elseif ($this->isPost('sort','get')){
            $sid = $_GET['sort'];
            $act = 'sort';
        }
        elseif($this->isPost('p','get')){
            $cid = $_GET['p'];
            $act = 'post';
        }
        elseif($this->isPost('page','get')){
            $page = $_GET['page'];
            $act = 'index';
        }
        else
            $act = 'index';
        switch ($act) {
            case 'index':
            default:
                require APP_ROOT . '/Template/index.php';
                break;

            case 'edit':
                require APP_ROOT . '/Template/editor.php';
                break;

            case 'sort':
                require APP_ROOT.'/Template/archive.php';
                break;

            case 'post':
                require APP_ROOT.'/Template/post.php';
                break;

            case 'del':
                if($this->isPost('cid','get')){
                    $cid = $_GET['cid'];
                    echo "<script>if(confirm('真的要删除笔记 《".$this->getNoteInfo($cid,'title')."》 吗？')){window.location.href='Include/delete.php?cid=".$cid."'}else{window.location.href='index.php'}</script>" ;
                }
                else{
                    $this->Redirect('index.php');
                }
                break;

        }
    }

    /**
     * 是否接受了某个提交到的请求
     * @param $postName
     * @param $postType
     * @return bool
     */
    public function isPost($postName, $postType)
    {
        if ($postType == 'get') {
            if (isset($_GET[$postName]))
                return true;
            else
                return false;
        } elseif ($postType == 'post') {
            if (isset($_POST[$postName]))
                return true;
            else
                return false;
        } else
            return false;        //若不是GET也不是POST，直接返回False
        $this->Ending();
    }

    /**
     * 响应重定向命令
     * @param $redirectURL
     */
    public function Redirect($redirectURL)
    {
        echo '<script>window.location.href="' . $redirectURL . '"</script>';
    }

    /**
    * 程序结尾
    */
    public function Ending(){
        require 'Template/over.php';
    }

    /**
    * 包含文件
    * @param $file
    * @param $type
    */
    public function need($file,$type=1){
        if($type == 1)
            require $file;
        elseif($type == 2)
            include $file;
        else
            return false;
    }

    /**
    * 程序弹窗提示
    * @param $noticeContent
    */
    public function alert($noticeContent){
        echo '<script>alert("'.$noticeContent.'");</script>';
    }

}