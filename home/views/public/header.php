<div role="navigation" class="navbar navbar-default navbar-fixed-top">

    <div class="container-fluid">
        <div class="navbar-header">
            <button data-target="#navbar-collapse-1" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="<?=$this->config->base_url()?>" class="navbar-brand">
                <img alt="Brand" src="<?=$this->config->item('static_path')?>/images/icon.jpg" style="height: 24px;" />
                <span>中国铁路客户服务中心</span>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php if($this->router->fetch_method() == 'reservation'): ?>
                    <li class="active"><a href="<?=$this->config->base_url()?>reservation">车票预定</a></li>
                <?php else: ?>
                    <li><a href="<?=$this->config->base_url()?>reservation">车票预定</a></li>
                <?php endif; ?>

                <?php if($this->router->fetch_method() == 'lefttickets'): ?>
                    <li class="active"><a href="<?=$this->config->base_url()?>lefttickets">余票查询</a></li>
                <?php else: ?>
                    <li><a href="<?=$this->config->base_url()?>lefttickets">余票查询</a></li>
                <?php endif; ?>

                <?php if($this->router->fetch_method() == 'newslist' || $this->router->fetch_method() == 'news'): ?>
                    <li class="active"><a href="<?=$this->config->base_url()?>newslist">最新动态</a></li>
                <?php else: ?>
                    <li><a href="<?=$this->config->base_url()?>newslist">最新动态</a></li>
                <?php endif; ?>

                <?php if($this->router->fetch_method() == 'question'): ?>
                    <li class="active"><a href="<?=$this->config->base_url()?>question">常见问题</a></li>
                <?php else: ?>
                    <li><a href="<?=$this->config->base_url()?>question">常见问题</a></li>
                <?php endif; ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> 我的12306 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php if($this->session->userdata('UID')): ?>
                            <li><a href="<?=$this->config->base_url()?>member">我的会员中心</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=$this->config->base_url()?>common/logout">退出</a></li>

                        <?php else: ?>
                            <li><a href="<?=$this->config->base_url()?>register">注册</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=$this->config->base_url()?>login">登录</a></li>
                        <?php endif; ?>


                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
