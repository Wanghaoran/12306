<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>铁路客户服务中心</title>
    <meta content="中国铁路客户服务中心网站是铁路服务客户的重要窗口，将集成全路客货运输信息，为社会和铁路客户提供客货运输业务和公共信息查询服务。客户通过登录本网站，可以查询旅客列车时刻表、票价、列车正晚点、车票余票、售票代售点、货物运价、车辆技术参数以及有关客货运规章。" name="description">
    <link href="<?=$this->config->item('static_path')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="icon">
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

<div id="hero" class="hidden-xs" style="margin-bottom: 80px;">
    <div class="jumbotron">
        <div class="container">
            <h1 style="margin-bottom: 60px;margin-top: 50px;">欢迎访问中国铁路客户服务中心</h1>
            <p class="lead small"><span class="label label-danger">www.12306.cn</span> 是中国铁路客户服务中心唯一网站。截止目前，没有授权其他网站开展类似服务内容，敬请广大用户注意</p>
            <p class="lead small">24小时客户服务热线：<span class="label label-danger">010-12306</span></p>
        </div>
    </div>

</div>


<div class="container marketing">

    <div class="row">
        <div class="col-sm-4">
            <img class="hidden-xs" style="width: 140px; height: 140px;" alt="车票预定" src="<?=$this->config->item('static_path')?>/images/home_reservation.png" />
            <h2>车票预定</h2>
            <p style="margin: 25px 0;">中国铁路客户服务中心可以购买铁路客票系统发售的成人票、儿童票、学生票以及残疾军人或伤残人民警察优待票（通票除外）。网络购票时间为7：00～23：00。支持银行网银、银联网银、银联快捷支付三种在线支付方式</p>
            <p><a role="button" href="<?=$this->config->base_url()?>reservation" class="btn btn-warning btn-lg btn-block">立即预定 »</a></p>
        </div>
        <div class="col-sm-4">
            <img style="width: 140px; height: 140px;" alt="余票查询" src="<?=$this->config->item('static_path')?>/images/home_search.png" class="hidden-xs">
            <h2>余票查询</h2>
            <p style="margin: 25px 0;">余票查询可以查询车次余票，包括各铁路局开通互联网售票的各次列车，并未涵盖全国所有车次。当某一车次车票销售完后，网站将查询不到该车次信息。因调整旅客列车运行方案，部分时段个别车次可能不在查询范围内</p>
            <p><a role="button" href="<?=$this->config->base_url()?>lefttickets" class="btn btn-primary btn-lg btn-block">立即查询 »</a></p>
        </div>
        <div class="col-sm-4">
            <img style="width: 140px; height: 140px;" alt="代售点查询" src="<?=$this->config->item('static_path')?>/images/home_booking.png" class="hidden-xs">
            <h2>代售点查询</h2>
            <p style="margin: 25px 0;">中国铁路客户服务中心可以查询全国各地区/区县的铁路售票代售点，包含代售点名称，地址，营业时间，窗口数量，和地点地图。您可以在此方便的查询您身边的火车代售点，完成购票、改签、换取纸质车票、退票等业务</p>
            <p><a role="button" href="javascript:alert('暂未开放!');" class="btn btn-success btn-lg btn-block">查询代售点 »</a></p>
        </div>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">

    <div class="row featurette">
        <div class="col-sm-8 col-xs-12">
            <h2 class="featurette-heading text-primary">全新架构，极速体验</h2>
            <p class="lead" style="margin-top: 20px;">不一样的购票体验，尽在全新的中国铁路客户服务中心网站。基于阿里云ECS和SLB架构设计，采用7层负载均衡服务，冗余设计，无单点，多层缓存代理设计。骨干网络多线接入，独享多线BGP，全网，跨运营商、跨地域自建CDN，节点、带宽资源丰富，覆盖合理。助力春运，轻松购票。</p>
        </div>
        <div class="col-sm-4 hidden-xs">
            <img alt="全新架构，极速体验" style="height: 230px;" src="<?=$this->config->item('static_path')?>/images/home_slb.jpg">
        </div>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">

    <div class="row featurette">
        <div class="col-sm-4 hidden-xs">
            <img alt="稳定可靠，多重防护" style="height: 230px;" src="<?=$this->config->item('static_path')?>/images/home_rds.jpg">
        </div>
        <div class="col-sm-8 col-xs-12">
            <h2 class="featurette-heading text-success">稳定可靠，多重防护</h2>
            <p class="lead" style="margin-top: 20px;">中国铁路客户服务中心网站的数据存储使用了阿里云RDS和OTS以及OCS。每台RDS拥有两个物理节点进行主从热备，主节点发生故障，秒级切换至备节点。OTS可以达到单表百TB级别数据存储，毫秒级别单行读写延迟，十万级别QPS。防DDoS攻击，SQL注入告警，数据可靠性高达99.9999%</p>
        </div>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">

    <div class="row featurette">
        <div class="col-sm-8 col-xs-12">
            <h2 class="featurette-heading text-warning">分布存储，安全高效</h2>
            <p class="lead" style="margin-top: 20px;">中国铁路客户服务中心网站的文件存储使用了阿里云OSS，分布式存储，保障存储数据安全，存储数据三重备份可靠性99.99%，多层次安全防护和防DDoS攻击。BGP多线（电国电信、联通、移动、教育网等）骨干网络接入，南北互联互通，能支持同时间内高并发、大流量的读写访问。</p>
        </div>
        <div class="col-sm-4 hidden-xs">
            <img alt="全新架构，极速体验" style="height: 230px;" src="<?=$this->config->item('static_path')?>/images/home_ocs.jpg">
        </div>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">

    <?=$this->load->view('public/footer');?>

</div>




</body>

</html>