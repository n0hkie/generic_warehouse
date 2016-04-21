<!-- header -->
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png"/></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
                        <i class="glyphicon glyphicon-user"></i> 
                            <?php echo $this->session->userdata('last_name').", ".$this->session->userdata('first_name');?> 
                        <span class="caret"></span>
                    </a>
                    <ul id="g-account-menu" class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url().'pos-admin-edit/'.$this->session->userdata('admin_id').'?r='.$this->encrypt->decode($this->session->userdata('admin_id'));?>">My Profile</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>pos-signout"><i class="glyphicon glyphicon-lock"></i> Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <!-- Left column -->

            <a href="#"><strong><i class="glyphicon glyphicon-link"></i> Resources</strong></a>

            <hr>

            <ul class="nav nav-pills nav-stacked">
                <li class="nav-header"></li>
                <li><a href="<?php echo base_url(); ?>"><i class="glyphicon glyphicon-th-list"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url(); ?>pos-product-find"><i class="glyphicon glyphicon-search"></i> Find Product</a></li>
                <li><a href="<?php echo base_url(); ?>pos-product-order"><i class="glyphicon glyphicon-shopping-cart"></i> Order Product</a></li>
            </ul>

            <hr>

        </div>
        <!-- /col-3 -->
        <div class="col-sm-9">

            <!-- column 2 -->

            <a href="#"><strong><i class="glyphicon glyphicon-dashboard"></i> <?php echo $title;?></strong></a>
            <hr>

            <div class="row" id="content_data">


