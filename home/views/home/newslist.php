<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>最新动态列表 - 铁路客户服务中心</title>
    <meta content="中国铁路客户服务中心网站是铁路服务客户的重要窗口，将集成全路客货运输信息，为社会和铁路客户提供客货运输业务和公共信息查询服务。客户通过登录本网站，可以查询旅客列车时刻表、票价、列车正晚点、车票余票、售票代售点、货物运价、车辆技术参数以及有关客货运规章。" name="description">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="icon">
    <link href="<?=$this->config->item('static_path')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$this->config->item('static_path')?>/css/user.css" rel="stylesheet">
    <script src="<?=$this->config->item('static_path')?>/javascript/jquery.min.js"></script>
    <script src="<?=$this->config->item('static_path')?>/bootstrap/js/bootstrap.min.js"></script>
    <!--[if lt IE 9]>
    <script src="<?=$this->config->item('static_path')?>/javascript/html5shiv.js"></script>
    <script src="<?=$this->config->item('static_path')?>/javascript/respond.js"></script>
    <![endif]-->

    <style>
        .well li {
            margin : 8px 0;
        }
    </style>
</head>

<body>

<?=$this->load->view('public/header');?>

<div class="container" style="margin-top: 30px;">

    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>">中国铁路客户服务中心</a></li>
        <li class="active">最新动态</li>
    </ol>

    <div class="well well-lg">

        <ul>
            <?php foreach($list as $key => $value): ?>
                <?php if($key < 6): ?>
                    <li><a href="<?=$this->config->base_url()?>news/<?=$value['id']?>" class="lead text-danger"><?=$value['title']?></a><span class="label label-danger">NEW</span><span class="pull-right"><?=$value['date']?></span></li>
                <?php else: ?>
                    <li><a href="<?=$this->config->base_url()?>news/<?=$value['id']?>" class="lead text-muted"><?=$value['title']?></a><span class="pull-right"><?=$value['date']?></span></li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        <hr>
        <ul class="pager">
            <li class="previous disabled"><a>&larr; 上一页</a></li>
            <li class="next disabled"><a>下一页 &rarr;</a></li>
        </ul>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">
    <?=$this->load->view('public/footer');?>

</div>

</body>
</html>
