<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>会员中心 - 铁路客户服务中心</title>
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

    <script>
        $(document).ready(function(){
            function currentTime(){
                var d = new Date(), str = '';
                str += d.getFullYear()+'年';
                str  += d.getMonth() + 1+'月';
                str  += d.getDate()+'日';
                str += d.getHours()+'时';
                str  += d.getMinutes()+'分';
                str+= d.getSeconds()+'秒';
                return str;
            }
            setInterval(function(){$('#time_now').html(currentTime)},1000);
        });
    </script>
</head>

<body>

<?=$this->load->view('public/header');?>

<div class="container" style="margin-top: 30px;">


    <div class="row row-offcanvas row-offcanvas-right">
        <div role="navigation" id="sidebar" class="col-xs-3 sidebar-offcanvas">
            <div class="list-group">
                    <a class="list-group-item active" href="<?=$this->config->base_url()?>member">首页</a>
                    <a class="list-group-item" href="javascript:alert('暂未开放！');">我的订单</a>
            </div>
        </div>

        <div class="col-xs-9">

            <ol class="breadcrumb">
                <li class="active">会员中心</li>
            </ol>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong><?=$user['account']?></strong> 欢迎回来<span class="pull-right hidden-xs" id="time_now"><?=mdate("%Y年%n月%d日%H时%i分%s秒")?></span></h3>
                </div>
                <div class="panel-body">
                    <h1 class="text-center">欢迎光临铁路客户服务中心会员中心</h1>
                    <hr>

                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="车票预定" class="media-object" style="width: 64px; height: 64px;" src="<?=$this->config->item('static_path')?>/images/yuding.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading text-primary">车票预定</h4>
                            12306网站车票预定功能数据全部来自于真实的铁路客户服务中心网站，所有列车数据都是实时，真实，有效的，您可以查看车票信息以及预定车票。<a href="<?=$this->config->base_url()?>reservation">点击进入</a>
                        </div>
                    </div>

                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="余票查询" class="media-object" style="width: 64px; height: 64px;" src="<?=$this->config->item('static_path')?>/images/yupiao.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading text-warning">余票查询</h4>
                            12306网站车票余票功能数据全部来自于真实的铁路客户服务中心网站，您可以查询当前实时的车票剩余情况，并且不需要登录。<a href="<?=$this->config->base_url()?>lefttickets" class="text-warning">点击进入</a>
                        </div>
                    </div>

                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="代售点查询" class="media-object" style="width: 64px; height: 64px;" src="<?=$this->config->item('static_path')?>/images/zuixin.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading text-danger">代售点查询</h4>
                            代售点查询功能可以查看您所在城市的所有代售点，如果您的浏览器支持HTML5，您甚至可以立即查看您身边的代售点。由于裁判所用浏览器情况未知，所以此功能暂不提供
                        </div>
                    </div>

                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="最新动态" class="media-object" style="width: 64px; height: 64px;" src="<?=$this->config->item('static_path')?>/images/zuixin.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading text-success">最新动态</h4>
                            铁路客户服务中心网站的最新新闻和通知都会在此显示，建议您经常查看。<a href="<?=$this->config->base_url()?>newslist" class="text-success">点击进入</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">
    <?=$this->load->view('public/footer');?>

</div>

</body>

</html>