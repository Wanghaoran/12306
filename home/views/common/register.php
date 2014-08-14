<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>用户注册 - 铁路客户服务中心</title>
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
        var checkSubmit = function(){
            if(!checkEmail($("#account").val())){
                $("#account").parent().parent().removeClass('has-success')
                $("#account").parent().parent().addClass('has-error');
                $("#account").next().remove();
                $('#account').after('<span class="help-block">邮箱格式不正确，请检查您的输入</span>');
                $("#account").focus();
                return false;
            }

            if(!checkEmailRepeat($("#account").val())){
                $("#account").parent().parent().removeClass('has-success')
                $("#account").parent().parent().addClass('has-error');
                $("#account").next().remove();
                $('#account').after('<span class="help-block">此邮箱已注册，请您使用其他邮箱注册！</span>');
                $("#account").focus();
                return false;
            }

            if(!checkPassword($("#password").val())){
                $("#password").parent().parent().removeClass('has-success')
                $("#password").parent().parent().addClass('has-error');
                $("#password").next().remove();
                $('#password').after('<span class="help-block">登录密码不能为空，请您重新输入</span>');
                $("#password").focus();
                return false;
            }

            if(!checkRePassword($("#repassword").val())){
                $("#repassword").parent().parent().removeClass('has-success')
                $("#repassword").parent().parent().addClass('has-error');
                $("#repassword").next().remove();
                $('#repassword').after('<span class="help-block">两次密码输入不一致，请您重新输入</span>');
                $("#repassword").focus();
                return false;
            }

            if(!checkpasswordQuestion($("#passwordQuestion").val())){
                $("#passwordQuestion").parent().parent().removeClass('has-success')
                $("#passwordQuestion").parent().parent().addClass('has-error');
                $("#passwordQuestion").next().remove();
                $('#passwordQuestion').after('<span class="help-block">请您选择密码保护问题</span>');
                $("#passwordQuestion").focus();
                return false;
            }

            if(!checkPasswordAnswer($("#passwordAnswer").val())){
                $("#passwordAnswer").parent().parent().removeClass('has-success')
                $("#passwordAnswer").parent().parent().addClass('has-error');
                $("#passwordAnswer").next().remove();
                $('#passwordAnswer').after('<span class="help-block">密码保护答案不能为空，请您重新输入</span>');
                $("#passwordAnswer").focus();
                return false;
            }

            if(!checkserviceterms()){
                alert('您需要先同意服务条款才能注册！');
                return false;
            }

            return true;
        }

        var blurCheckEmail = function(){
            if(!checkEmail($("#account").val())){
                $("#account").parent().parent().removeClass('has-success')
                $("#account").parent().parent().addClass('has-error');
                $("#account").next().remove();
                $('#account').after('<span class="help-block">邮箱格式不正确，请检查您的输入！</span>');
                return false;
            }else{
                if(!checkEmailRepeat($("#account").val())){
                    $("#account").parent().parent().removeClass('has-success')
                    $("#account").parent().parent().addClass('has-error');
                    $("#account").next().remove();
                    $('#account').after('<span class="help-block">此邮箱已注册，请您使用其他邮箱注册！</span>');
                    return false;
                }
                $("#account").parent().parent().removeClass('has-error')
                $("#account").parent().parent().addClass('has-success');
                $("#account").next().remove();
                $('#account').after('<span class="help-block">邮箱输入正确</span>');
                return true;
            }


        }

        var blurCheckPassword = function(){
            if(!checkPassword($("#password").val())){
                $("#password").parent().parent().removeClass('has-success')
                $("#password").parent().parent().addClass('has-error');
                $("#password").next().remove();
                $('#password').after('<span class="help-block">登录密码不能为空，请您重新输入</span>');
                return false;
            }else{
                $("#password").parent().parent().removeClass('has-error')
                $("#password").parent().parent().addClass('has-success');
                $("#password").next().remove();
                $('#password').after('<span class="help-block">密码输入正确</span>');
                return true;
            }
        }

        var blurCheckRePassword = function(){
            if(!checkRePassword($("#repassword").val())){
                $("#repassword").parent().parent().removeClass('has-success')
                $("#repassword").parent().parent().addClass('has-error');
                $("#repassword").next().remove();
                $('#repassword').after('<span class="help-block">两次密码输入不一致，请您重新输入</span>');
                return false;
            }else{
                $("#repassword").parent().parent().removeClass('has-error')
                $("#repassword").parent().parent().addClass('has-success');
                $("#repassword").next().remove();
                $('#repassword').after('<span class="help-block">重复密码输入正确</span>');
                return true;
            }
        }

        var blurPasswordQuestion = function(){
            if(!checkpasswordQuestion($("#passwordQuestion").val())){
                $("#passwordQuestion").parent().parent().removeClass('has-success')
                $("#passwordQuestion").parent().parent().addClass('has-error');
                $("#passwordQuestion").next().remove();
                $('#passwordQuestion').after('<span class="help-block">请您选择密码保护问题</span>');
                return false;
            }else{
                $("#passwordQuestion").parent().parent().removeClass('has-error')
                $("#passwordQuestion").parent().parent().addClass('has-success');
                $("#passwordQuestion").next().remove();
                $('#passwordQuestion').after('<span class="help-block">密码保护问题选择正确</span>');
                return true;
            }
        }

        var blurPasswordAnswer = function(){
            if(!checkPasswordAnswer($("#passwordAnswer").val())){
                $("#passwordAnswer").parent().parent().removeClass('has-success')
                $("#passwordAnswer").parent().parent().addClass('has-error');
                $("#passwordAnswer").next().remove();
                $('#passwordAnswer').after('<span class="help-block">密码保护答案不能为空，请您重新输入</span>');
                return false;
            }else{
                $("#passwordAnswer").parent().parent().removeClass('has-error')
                $("#passwordAnswer").parent().parent().addClass('has-success');
                $("#passwordAnswer").next().remove();
                $('#passwordAnswer').after('<span class="help-block">密码保护答案输入正确</span>');
                return true;
            }
        }

        var checkEmail = function(emailString){
            var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
            if(reg.test(emailString)){
                return true;
            }else{
                return false;
            }
        }

        var checkEmailRepeat = function(emailString){
            var check = true;
            $.ajax({
                type : 'POST',
                url : '<?=$this -> config -> base_url()?>common/checkemailrepeat',
                data : '&email=' + emailString,
                async : false,
                success : function(ress){
                    if(ress == 'true'){
                        check = false;
                    }else{
                        check = true;
                    }
                }
            });
            return check;
        }

        var checkPassword = function(passwordString){
            if(passwordString){
                return true;
            }else{
                return false;
            }
        }

        var checkRePassword = function(rePasswordString){
            if($("#password").val() == rePasswordString){
                return true;
            }else{
                return false;
            }
        }

        var checkpasswordQuestion = function(passwordQuestionString){
            if(passwordQuestionString){
                return true;
            }else{
                return false;
            }
        }

        var checkPasswordAnswer = function(passwordAnswerString){
            if(passwordAnswerString){
                return true;
            }else{
                return false;
            }
        }

        var checkserviceterms = function(){
            if($("#serviceterms").is(":checked")){
                return true;
            }else{
                return false
            }
        }
    </script>
</head>

<body>

<?=$this->load->view('public/header');?>


<div class="container" style="margin-top: 30px;">

    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>">中国铁路客户服务中心</a></li>
        <li class="active">用户注册</li>
    </ol>

    <div class="well">

        <form class="form-horizontal" role="form" method="post" action="<?=$this->config->base_url()?>common/checkregister" onsubmit="return checkSubmit();">
            <div class="form-group">
                <label for="account" class="col-sm-3 control-label"><span class="text-danger">*</span> 登录账号/邮箱：</label>
                <div class="col-sm-7">
                    <input type="text" name="account" class="form-control" id="account" onblur="blurCheckEmail();" placeholder="登录账号/邮箱">
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="col-sm-3 control-label"><span class="text-danger">*</span> 登录密码：</label>
                <div class="col-sm-7">
                    <input type="password" name="password" class="form-control" id="password" onblur="blurCheckPassword();" placeholder="登录密码">
                </div>
            </div>

            <div class="form-group">
                <label for="repassword" class="col-sm-3 control-label"><span class="text-danger">*</span> 重复登录密码：</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control" id="repassword" onblur="blurCheckRePassword();" placeholder="重复登录密码">
                </div>
            </div>

            <div class="form-group">
                <label for="passwordQuestion" class="col-sm-3 control-label"><span class="text-danger">*</span> 密码保护问题：</label>
                <div class="col-sm-7">
                    <select class="form-control" name="passwordQuestion" id="passwordQuestion" onblur="blurPasswordQuestion();">
                        <option value="">请选择密码提示问题</option>
                        <option value="您母亲的姓名是？ ">您母亲的姓名是？  </option>
                        <option value="您父亲的姓名是？ ">您父亲的姓名是？  </option>
                        <option value="您配偶的生日是？">您配偶的生日是？ </option>
                        <option value="您的出生地是？">您的出生地是？</option>
                        <option value="您的小学校名是？">您的小学校名是？</option>
                        <option value="您的中学校名是？">您的中学校名是？ </option>
                        <option value="您的大学校名是？">您的大学校名是？ </option>
                        <option value="我最喜爱的小说？">我最喜爱的小说？ </option>
                        <option value="我最喜爱的歌曲？">我最喜爱的歌曲？ </option>
                        <option value="我最喜爱的食物？">我最喜爱的食物？ </option>
                        <option value="我最大的爱好？">我最大的爱好？ </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="passwordAnswer" class="col-sm-3 control-label"><span class="text-danger">*</span> 密码保护答案：</label>
                <div class="col-sm-7">
                    <input type="text" name="passwordAnswer" class="form-control" id="passwordAnswer" onblur="blurPasswordAnswer();" placeholder="密码保护答案">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="serviceterms">我已阅读并同意遵守 <a href="<?=$this->config->base_url()?>serviceterms">《中国铁路客户服务中心网站服务条款》</a>
                        </label>
                    </div>
                </div>
            </div>

            <hr>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-7">
                    <input type="submit" class="btn btn-primary" value="同意协议并注册" />
                    <input type="reset" class="btn btn-default" value="重新填写" style="margin-left: 10px;" />
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