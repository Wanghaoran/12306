<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>余票查询 - 铁路客户服务中心</title>
    <meta content="中国铁路客户服务中心网站是铁路服务客户的重要窗口，将集成全路客货运输信息，为社会和铁路客户提供客货运输业务和公共信息查询服务。客户通过登录本网站，可以查询旅客列车时刻表、票价、列车正晚点、车票余票、售票代售点、货物运价、车辆技术参数以及有关客货运规章。" name="description">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="<?=$this->config->item('static_path')?>/images/favicon.ico" type="image/x-icon" rel="icon">
    <link href="<?=$this->config->item('static_path')?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=$this->config->item('static_path')?>/css/user.css" rel="stylesheet">
    <script src="<?=$this->config->item('static_path')?>/javascript/jquery.min.js"></script>
    <script src="<?=$this->config->item('static_path')?>/javascript/station_name.js"></script>
    <script src="<?=$this->config->item('static_path')?>/javascript/user.js"></script>
    <script src="<?=$this->config->item('static_path')?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=$this->config->item('static_path')?>/plug/My97DatePicker/WdatePicker.js"></script>
    <script src="<?=$this->config->item('static_path')?>/plug/Popt.js"></script>
    <!--[if lt IE 9]>
    <script src="<?=$this->config->item('static_path')?>/javascript/html5shiv.js"></script>
    <script src="<?=$this->config->item('static_path')?>/javascript/respond.js"></script>
    <![endif]-->

    <style>
        .tips{ float:left;width:100%; background-color:#fff; border:solid 1px #c5c5c5;box-shadow: 0px 2px 9px #aaa;zoom: 1;}
        .tips li{ line-height:26px; float:left; width:100%; border-bottom:1px solid #fbfbfb; cursor:pointer;}
        .tips i{ display:block; width:26px; height:26px; float:left; border-right:1px solid #eee;}
        .tips a{ float:left; line-height:26px; padding-left:6px; color:#000000; text-decoration:none}
        .tips a:hover{ color:#fff !important;}
        .tipsover{ background-color:#428bca !important; color:#fff;}

        .loadingdiv
        {
            position:absolute;
            text-align:center;
            left:0px;
            top:0px;
            z-index:70;
            background-color:#000000;
            opacity: 0.7;
            display:none;
        }
        .loadingdiv img
        {
            position:absolute;
            left:0px;
            top:0px;
            z-index:80;
        }
    </style>

    <script>
        $(document).ready(function(){


            var start_name = '';
            var end_name = '';


            $("#start").click(function (e) {
                var ths = this;
                var keyword = $(ths).val();

                if(!keyword){
                    var mume = "<ul id='menu' class='tips list-unstyled'><li><a secr='BJP'>北京</a></li><li><a secr='SHH'>上海</a></li><li><a secr='TJP'>天津</a></li><li><a secr='CQW'>重庆</a></li><li><a secr='CSQ'>长沙</a></li><li><a secr='CCT'>长春</a></li><li><a secr='CDW'>成都</a></li><li><a secr='FZS'>福州</a></li><li><a secr='GZQ'>广州</a></li><li><a secr='GIW'>贵阳</a></li></ul>";
                }else{
                    var name_arr = parsing_actionname(station_names);
                    var result = [];
                    $.each(name_arr, function(key, val){
                        if(val[0].indexOf(keyword) === 0 || val[1].indexOf(keyword) === 0 || val[2].indexOf(keyword) === 0 || val[3].indexOf(keyword) === 0){
                            result.push(val);
                        }
                    });
                    result.sort(function(a,b){
                        var a1= parseInt(a[4]);
                        var b1= parseInt(b[4]);
                        if(a1 < b1){
                            return -1;
                        }else if(a1 > b1){
                            return 1;
                        }
                        return 0;
                    });
                    var mume = "<ul id='menu' class='tips list-unstyled'>";
                    $.each(result, function(key, val){
                        if(key < 10){
                            mume += '<li><a secr="' + val[5] + '">' + val[1] + '</a></li>';
                        }
                    });
                    mume += "</ul>";
                }

                Iput.show({ id: this, content: mume, event: e, ok: function () {
                    $("#menu li").click(function () {
                        $(ths).val($(this).find("a").html());

                        start_name = $(this).find("a").attr('secr');

                        Iput.colse();
                    }).mousemove(function () { this.className = "tipsover"; }).mouseout(function () { this.className = "" })
                }
                });
            });

            $("#start").keyup(function (e) {
                var ths = this;
                var keyword = $(ths).val();
                if(!keyword){
                    var mume = "<ul id='menu2' class='tips list-unstyled'><li><a secr='BJP'>北京</a></li><li><a secr='SHH'>上海</a></li><li><a secr='TJP'>天津</a></li><li><a secr='CQW'>重庆</a></li><li><a secr='CSQ'>长沙</a></li><li><a secr='CCT'>长春</a></li><li><a secr='CDW'>成都</a></li><li><a secr='FZS'>福州</a></li><li><a secr='GZQ'>广州</a></li><li><a secr='GIW'>贵阳</a></li></ul>";
                }else{
                    var name_arr = parsing_actionname(station_names);
                    var result = [];
                    $.each(name_arr, function(key, val){
                        if(val[0].indexOf(keyword) === 0 || val[1].indexOf(keyword) === 0 || val[2].indexOf(keyword) === 0 || val[3].indexOf(keyword) === 0){
                            result.push(val);
                        }
                    });
                    result.sort(function(a,b){
                        var a1= parseInt(a[4]);
                        var b1= parseInt(b[4]);
                        if(a1 < b1){
                            return -1;
                        }else if(a1 > b1){
                            return 1;
                        }
                        return 0;
                    });
                    var mume = "<ul id='menu' class='tips list-unstyled'>";
                    $.each(result, function(key, val){
                        if(key < 10){
                            mume += '<li><a secr="' + val[5] + '">' + val[1] + '</a></li>';
                        }
                    });
                    mume += "</ul>";
                }

                Iput.show({ id: this, content: mume, event: e, ok: function () {
                    $("#menu li").click(function () {
                        $(ths).val($(this).find("a").html());

                        start_name = $(this).find("a").attr('secr');

                        Iput.colse();
                    }).mousemove(function () { this.className = "tipsover"; }).mouseout(function () { this.className = "" })
                }
                });
            });

            $("#start").blur(function(){
                var ths = this;
                if(!start_name){
                    $(ths).val('');
                }
            });

            $("#end").click(function (e) {
                var ths = this;
                var keyword = $(ths).val();

                if(!keyword){
                    var mume = "<ul id='menu2' class='tips list-unstyled'><li><a secr='BJP'>北京</a></li><li><a secr='SHH'>上海</a></li><li><a secr='TJP'>天津</a></li><li><a secr='CQW'>重庆</a></li><li><a secr='CSQ'>长沙</a></li><li><a secr='CCT'>长春</a></li><li><a secr='CDW'>成都</a></li><li><a secr='FZS'>福州</a></li><li><a secr='GZQ'>广州</a></li><li><a secr='GIW'>贵阳</a></li></ul>";
                }else{
                    var name_arr = parsing_actionname(station_names);
                    var result = [];
                    $.each(name_arr, function(key, val){
                        if(val[0].indexOf(keyword) === 0 || val[1].indexOf(keyword) === 0 || val[2].indexOf(keyword) === 0 || val[3].indexOf(keyword) === 0){
                            result.push(val);
                        }
                    });
                    result.sort(function(a,b){
                        var a1= parseInt(a[4]);
                        var b1= parseInt(b[4]);
                        if(a1 < b1){
                            return -1;
                        }else if(a1 > b1){
                            return 1;
                        }
                        return 0;
                    });
                    var mume = "<ul id='menu2' class='tips list-unstyled'>";
                    $.each(result, function(key, val){
                        if(key < 10){
                            mume += '<li><a secr="' + val[5] + '">' + val[1] + '</a></li>';
                        }
                    });
                    mume += "</ul>";
                }

                Iput.show({ id: this, content: mume, event: e, ok: function () {
                    $("#menu2 li").click(function () {
                        $(ths).val($(this).find("a").html());

                        end_name = $(this).find("a").attr('secr');

                        Iput.colse();
                    }).mousemove(function () { this.className = "tipsover"; }).mouseout(function () { this.className = "" })
                }
                });
            });

            $("#end").keyup(function (e) {
                var ths = this;
                var keyword = $(ths).val();
                if(!keyword){
                    var mume = "<ul id='menu2' class='tips list-unstyled'><li><a secr='BJP'>北京</a></li><li><a secr='SHH'>上海</a></li><li><a secr='TJP'>天津</a></li><li><a secr='CQW'>重庆</a></li><li><a secr='CSQ'>长沙</a></li><li><a secr='CCT'>长春</a></li><li><a secr='CDW'>成都</a></li><li><a secr='FZS'>福州</a></li><li><a secr='GZQ'>广州</a></li><li><a secr='GIW'>贵阳</a></li></ul>";
                }else{
                    var name_arr = parsing_actionname(station_names);
                    var result = [];
                    $.each(name_arr, function(key, val){
                        if(val[0].indexOf(keyword) === 0 || val[1].indexOf(keyword) === 0 || val[2].indexOf(keyword) === 0 || val[3].indexOf(keyword) === 0){
                            result.push(val);
                        }
                    });
                    result.sort(function(a,b){
                        var a1= parseInt(a[4]);
                        var b1= parseInt(b[4]);
                        if(a1 < b1){
                            return -1;
                        }else if(a1 > b1){
                            return 1;
                        }
                        return 0;
                    });
                    var mume = "<ul id='menu2' class='tips list-unstyled'>";
                    $.each(result, function(key, val){
                        if(key < 10){
                            mume += '<li><a secr="' + val[5] + '">' + val[1] + '</a></li>';
                        }
                    });
                    mume += "</ul>";
                }

                Iput.show({ id: this, content: mume, event: e, ok: function () {
                    $("#menu2 li").click(function () {
                        $(ths).val($(this).find("a").html());

                        end_name = $(this).find("a").attr('secr');

                        Iput.colse();
                    }).mousemove(function () { this.className = "tipsover"; }).mouseout(function () { this.className = "" })
                }
                });
            });

            $("#end").blur(function(){
                var ths = this;
                if(!end_name){
                    $(ths).val('');
                }
            });

            $('#query_now').click(function(e){
                if(!start_name){
                    alert('请选择正确的出发地！');
                    return;
                }

                if(!end_name){
                    alert('请选择正确的目的地！');
                    return;
                }

                var date = $('#date').val();

                if(!date){
                    alert('请选择正确的乘车日期！');
                    return;
                }

                var purpose = $("input[name=tickettype]:checked").val();

                if(!purpose){
                    alert('请选择正确的车票类型！');
                    return;
                }

                $.ajax({
                    type : 'POST',
                    url : '<?=$this -> config -> base_url()?>common/get_lefttickets',
                    data : '&start_name=' + start_name + '&end_name=' + end_name + '&date=' + date + '&purpose=' + purpose,
                    async : false,
                    dataType : 'json',
                    beforeSend : function(){
                        var lockwin = $('#loading');
                        lockwin.css("width", "100%");
                        lockwin.css("display", "block");
                        lockwin.css("height", $(window).height() + $(window).scrollTop());
                        //设置图片居中
                        $("#loading img").css("display", "block");
                        $("#loading img").css("left", ($(window).width() - 88) / 2);
                        $("#loading img").css("top", ($(window).height() + $(window).scrollTop()) / 2);
                    },
                    complete : function(){
                        var lockwin = $('#loading');
                        lockwin.css("width", "0");
                        lockwin.css("display", "none");
                        lockwin.css("height", "0");
                        //设置图片隐藏
                        $("#loading img").css("display", "none");
                    },
                    error : function(){
                        var lockwin = $('#loading');
                        lockwin.css("width", "0");
                        lockwin.css("display", "none");
                        lockwin.css("height", "0");
                        //设置图片隐藏
                        $("#loading img").css("display", "none");
                        alert('网络通信失败！');
                    },
                    success : function(ress){
                        //隐藏div
                        var lockwin = $('#loading');
                        lockwin.css("width", "0");
                        lockwin.css("display", "none");
                        lockwin.css("height", "0");
                        //设置图片隐藏
                        $("#loading img").css("display", "none");

                        if(ress.state != 'success'){
                            alert('数据抓取失败！请稍后再试！');
                        }

                        var table_str = '';
                        $.each(ress.data.datas, function(key, val){
                            table_str += '<tr>';

                            table_str += '<td><strong>' + val.station_train_code + '</strong></td>';

                            if(val.end_station_name != val.to_station_name){
                                table_str += '<td><strong style="display: block;"><span class="label label-warning">始</span>' + val.from_station_name + '</strong><strong style="display: block;"><span class="label label-primary">过</span>' + val.to_station_name + '</strong></td>';
                            }else{
                                table_str += '<td><strong style="display: block;"><span class="label label-warning">始</span>' + val.from_station_name + '</strong><strong style="display: block;"><span class="label label-success">终</span>' + val.to_station_name + '</strong></td>';
                            }

                            table_str += '<td><strong style="display: block;" class="label label-info">' + val.start_time + '</strong><strong style="display: block;margin-top:5px;" class="label label-default">' + val.arrive_time + '</strong></td>';


                            if(val.day_difference == 0){
                                table_str += '<td><strong style="display: block;">' + val.lishi + '</strong><strong style="display: block;">当日到达</strong></td>';
                            }else if(val.day_difference == 1){
                                table_str += '<td><strong style="display: block;">' + val.lishi + '</strong><strong style="display: block;">次日到达</strong></td>';
                            }else if(val.day_difference == 2){
                                table_str += '<td><strong style="display: block;">' + val.lishi + '</strong><strong style="display: block;">两日到达</strong></td>';
                            }else{
                                table_str += '<td><strong style="display: block;">' + val.lishi + '</strong><strong style="display: block;">' + val.day_difference + '</strong></td>';
                            }

                            if(val.swz_num == '无' || val.swz_num == '--'){
                                table_str += '<td style="color:#999;">' + val.swz_num + '</td>';
                            }else if(val.swz_num == '有'){
                                table_str += '<td style="color: green;">' + val.swz_num + '</td>';
                            }else{
                                table_str += '<td>' + val.swz_num + '</td>';
                            }

                            if(val.tz_num == '无' || val.tz_num == '--'){
                                table_str += '<td style="color:#999;">' + val.tz_num + '</td>';
                            }else if(val.tz_num == '有'){
                                table_str += '<td style="color: green;">' + val.tz_num + '</td>';
                            }else{
                                table_str += '<td>' + val.tz_num + '</td>';
                            }

                            if(val.zy_num == '无' || val.zy_num == '--'){
                                table_str += '<td style="color:#999;">' + val.zy_num + '</td>';
                            }else if(val.zy_num == '有'){
                                table_str += '<td style="color: green;">' + val.zy_num + '</td>';
                            }else{
                                table_str += '<td>' + val.zy_num + '</td>';
                            }

                            if(val.ze_num == '无' || val.ze_num == '--'){
                                table_str += '<td style="color:#999;">' + val.ze_num + '</td>';
                            }else if(val.ze_num == '有'){
                                table_str += '<td style="color: green;">' + val.ze_num + '</td>';
                            }else{
                                table_str += '<td>' + val.ze_num + '</td>';
                            }

                            if(val.gr_num == '无' || val.gr_num == '--'){
                                table_str += '<td style="color:#999;">' + val.gr_num + '</td>';
                            }else if(val.gr_num == '有'){
                                table_str += '<td style="color: green;">' + val.gr_num + '</td>';
                            }else{
                                table_str += '<td>' + val.gr_num + '</td>';
                            }

                            if(val.rw_num == '无' || val.rw_num == '--'){
                                table_str += '<td style="color:#999;">' + val.rw_num + '</td>';
                            }else if(val.rw_num == '有'){
                                table_str += '<td style="color: green;">' + val.rw_num + '</td>';
                            }else{
                                table_str += '<td>' + val.rw_num + '</td>';
                            }

                            if(val.yw_num == '无' || val.yw_num == '--'){
                                table_str += '<td style="color:#999;">' + val.yw_num + '</td>';
                            }else if(val.yw_num == '有'){
                                table_str += '<td style="color: green;">' + val.yw_num + '</td>';
                            }else{
                                table_str += '<td>' + val.yw_num + '</td>';
                            }

                            if(val.yz_num == '无' || val.yz_num == '--'){
                                table_str += '<td style="color:#999;">' + val.yz_num + '</td>';
                            }else if(val.yz_num == '有'){
                                table_str += '<td style="color: green;">' + val.yz_num + '</td>';
                            }else{
                                table_str += '<td>' + val.yz_num + '</td>';
                            }

                            if(val.wz_num == '无' || val.wz_num == '--'){
                                table_str += '<td style="color:#999;">' + val.wz_num + '</td>';
                            }else if(val.wz_num == '有'){
                                table_str += '<td style="color: green;">' + val.wz_num + '</td>';
                            }else{
                                table_str += '<td>' + val.wz_num + '</td>';
                            }

                            if(val.qt_num == '无' || val.qt_num == '--'){
                                table_str += '<td style="color:#999;">' + val.qt_num + '</td>';
                            }else if(val.qt_num == '有'){
                                table_str += '<td style="color: green;">' + val.qt_num + '</td>';
                            }else{
                                table_str += '<td>' + val.qt_num + '</td>';
                            }

                            table_str += '</tr>';
                        });
                        $('#tablecontent').html(table_str);
                    }
                });



            });

        });

    </script>

</head>

<body>

<?=$this->load->view('public/header');?>

<div class="container" style="margin-top: 30px;">

    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>">中国铁路客户服务中心</a></li>
        <li class="active">余票查询</li>
    </ol>

    <div class="panel panel-default">
        <div class="panel-heading">余票查询
            <span class="pull-right">
                <label class="checkbox-inline">
                    <input type="radio" name="tickettype" value="ADULT" checked="checked"> 普通
                </label>
                <label class="checkbox-inline">
                    <input type="radio" name="tickettype" value="0X00"> 学生
                </label>
            </span>
        </div>
        <div class="panel-body">
            <form class="form-inline" role="form">
                <div class="row">
                    <div class="form-group col-xs-3">
                        <label class="sr-only" for="start">出发地</label>
                        <div class="input-group">
                            <div class="input-group-addon">出发地</div>
                            <input type="text" class="form-control" id="start" placeholder="简拼/全拼/汉字">
                        </div>
                    </div>

                    <div class="form-group col-xs-3">
                        <label class="sr-only" for="end">目的地</label>
                        <div class="input-group">
                            <div class="input-group-addon">目的地</div>
                            <input type="text" class="form-control" id="end" placeholder="简拼/全拼/汉字">
                        </div>
                    </div>

                    <div class="form-group col-xs-3">
                        <label class="sr-only" for="date">出发日</label>
                        <div class="input-group">
                            <div class="input-group-addon">出发日</div>
                            <input type="text" class="form-control" id="date" onClick="WdatePicker({doubleCalendar:true,minDate:'<?=mdate("%Y-%m-%d")?>',maxDate:'<?=mdate("%Y-%m-%d", strtotime("+29 days"))?>'});" readonly>
                        </div>
                    </div>

                    <div class="form-group col-xs-3">

                    <button type="button" class="btn btn-primary" id="query_now">立即查询</button>

                        </div>

                </div>

            </form>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>车次</th>
                <th><span style="display: block;">出发站</span>
                    <span style="display: block;">到达站</span></th>
                <th><span style="display: block;" class="label label-info">出发时间</span>
                    <span style="display: block;margin-top:5px;" class="label label-default">到达时间</span></th>
                <th>历时</th>
                <th>商务座</th>
                <th>特等座</th>
                <th>一等座</th>
                <th>二等座</th>
                <th>高级软卧</th>
                <th>软卧</th>
                <th>硬卧</th>
                <th>硬座</th>
                <th>无座</th>
                <th>其它</th>
            </tr>
            </thead>
            <tbody id="tablecontent">
            <tr><td colspan=14 style="text-align: center;"><h2 class="text-primary">所有数据均为实时真实数据</h2><h2>请您在上方选择查询条件进行查询</h2></td></tr>
            </tbody>
        </table>
    </div>

    <hr class="featurette-divider hidden-xs">
    <hr class="featurette2-divider visible-xs-block">
    <?=$this->load->view('public/footer');?>

</div>

<div id="loading" class="loadingdiv">
    <img src="<?=$this->config->item('static_path')?>/images/loading.gif" alt="图片加载中···" />
</div>
</body>

</html>