<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>用户登录 - 铁路客户服务中心</title>
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
</head>

<body>

<?=$this->load->view('public/header');?>

<div class="container" style="margin-top: 30px;">


    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>">中国铁路客户服务中心</a></li>
        <li class="active">用户登录</li>
    </ol>

    <div class="well well-lg">


        <form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>common/checklogin">

            <div class="form-group">
                <label for="account" class="col-sm-3 control-label">登录账号/邮箱：</label>
                <div class="col-sm-7">
                    <input type="text" name="account" class="form-control" id="account" placeholder="登录账号/邮箱">
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label">登录密码：</label>
                <div class="col-sm-7">
                    <input type="password" name="password" class="form-control" id="password" placeholder="登录密码">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> 七日之内免登录
                        </label>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <input type="submit" class="btn btn-primary" value="登录" />
                    <input type="button" class="btn btn-default" value="返回上一页" style="margin-left: 10px;" onclick="history.go(-1)" />
                </div>
            </div>

        </form>

    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">
    <?=$this->load->view('public/footer');?>
</div>

</body>
</html>