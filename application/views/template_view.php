<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" >
    <meta name="keywords" >
    <meta name="author" content="">
    <title><?php echo $data['seo']['title'];?></title>

    <?php
        echo Href::script('jquery.js');
        echo Href::script('fileinput.js');
        echo Href::script('fileinput_locale_ru.js');
    ?>
    <!-- Custom CSS -->
    <?php
        echo Href::css('bootstrap.min.css');
        echo Href::css('fileinput.css');
        echo Href::css('pro.css');
    ?>
    <link href="<?php echo Href::a('font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo Href::a('');?>">Test</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php if ($data['user']==0){?>
                <li class="<?php echo ($data['menu']==3126?'active':'');?>"><a href="<?php echo Href::a('');?>">Главная</a></li>
                <?php } ?>
                <li class="<?php echo ($data['menu']==4152?'active':'');?>"><a href="<?php echo Href::a('message');?>">Сообщения</a></li>
                <?php if (is_array($data['user'])){?>
                    <li>  <a href="<?php echo Href::a('vk_auth/exit');?>"><?php echo $data['user']['fio']?> Выйти</a></li>
                <?php } ?>
            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

<!-- Begin page content -->
<div class="container">
    <?php include 'application/views/'.$content_view;?>
</div>

<footer class="footer">
    <div class="container">
        <p class="text-muted"></p>
    </div>
</footer>



<?php
    echo Href::script('bootstrap.min.js');
?>

</body>
</html>