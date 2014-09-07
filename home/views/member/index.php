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
                            <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media">
                        <a href="#" class="pull-left">
                            <img alt="64x64" data-src="holder.js/64x64" class="media-object" style="width: 64px; height: 64px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI2NCIgaGVpZ2h0PSI2NCI+PHJlY3Qgd2lkdGg9IjY0IiBoZWlnaHQ9IjY0IiBmaWxsPSIjZWVlIi8+PHRleHQgdGV4dC1hbmNob3I9Im1pZGRsZSIgeD0iMzIiIHk9IjMyIiBzdHlsZT0iZmlsbDojYWFhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjEycHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NjR4NjQ8L3RleHQ+PC9zdmc+">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Media heading</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
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