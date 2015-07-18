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

    public function __construct()
    {
        parent::__construct($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
    }

    /*------------------------程序运行相关------------------------*/

    /**
     * 程序启动初始化
     */
    public function Init()
    {
        if ($this->isPost('act', 'get'))
            $act = $_GET['act'];
        else
            $act = 'index';
        switch ($act) {
            case 'index':
            default:
                require APP_ROOT . '/Template/index.php';
                break;

            case 'edit':
                require APP_ROOT . '/Template/editor.php';

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

    }

    /**
     * 响应重定向命令
     * @param $redirectURL
     */
    public function Redirect($redirectURL)
    {
        echo '<script>window.localtion.href="' . $redirectURL . '"</script>';
    }

}