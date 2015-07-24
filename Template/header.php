<!DOCTYPE HTML PUBLIC>
<html>
<head>
    <meta charset="UTF-8">
    <!--响应式缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width">
    <!--链接样式表-->
    <link rel="stylesheet" type="text/css" href="Include/CSS/Style.css">
    <!--Font Awesome 图标库-->
    <link rel="stylesheet" type="text/css" href="Include/CSS/font-awesome.css">
    <title><?php echo $this->getOption('title', 0); ?></title>
    <!--jQuery 引入-->
    <script type="text/javascript" src="Include/JS/jquery.js"></script>
    <!--自定义JS-->
    <script type="text/javascript" src="Include/JS/Script.js"></script>
</head>
<body>
    <section id="header">
       <div id="navbar">
          <div class="navi-sort sort-area">
              <?php $this->getSorts();?>
          </div>
          <div class="navi-body">
            <li><a href="index.php?act=edit"><spon class=" icon-plus-sign"></spon></a></li>
            <li><a href="index.php"><span class="icon-home"></span> MoeKnowlege</a></li>
            <li style="float:right;"><a href="#" class="title-only" id="title-only"><span class="icon-off"></span> 仅显示标题</a></li>
        </div>
    </div>
</section>
