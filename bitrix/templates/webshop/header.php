<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/bootstrap.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/style.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/css/font-awesome.min.css");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/slider/js/jquery.catslider.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/slider/js/modernizr.custom.63321.js");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/slider/css/demo.css");
$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH . "/slider/css/main-style.css");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/bootstrap.js");
$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/js/jquery-1.10.2.js");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bootstrap E-Commerce Template- DIGI Shop mini</title>
    <!-- Bootstrap core CSS -->
    <link href=<?php
echo "'" . SITE_TEMPLATE_PATH . "/css/bootstrap.css'"; ?> rel="stylesheet">
    <!-- Fontawesome core CSS -->
    <link href=<?php
echo "'" . SITE_TEMPLATE_PATH . "/css/font-awesome.min.css'"; ?> rel="stylesheet" />
    <!--GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!--Slide Show Css -->
    <link href= <?php
echo "'" . SITE_TEMPLATE_PATH . "/slider/css/main-style.css'"; ?> rel="stylesheet" />
    <!-- custom CSS here -->
    <link href= <?php
echo "'" . SITE_TEMPLATE_PATH . "/css/style.css'"; ?> rel="stylesheet" />
</head>
<body>

 <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/webshop"><strong>DIGI</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a target="_blank" href="/webshop/basket.php">Check basket</a></li>
                    <li class="line"><? $APPLICATION->IncludeComponent("mycomp:sale.basket.basket.line");?></li>
                    <li><? $APPLICATION->IncludeComponent("mycomp:system.auth.form");?></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-right" role="search">
                    <div class="form-group">
                        <input type="text" placeholder="Enter Keyword Here ..." class="form-control">
                    </div>
                    &nbsp; 
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
