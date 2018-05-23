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

<?php
$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
    "AREA_FILE_SHOW" => "file",
    "AREA_FILE_SUFFIX" => "inc",
    "EDIT_TEMPLATE" => "",
    "PATH" => SITE_TEMPLATE_PATH . "/include/navbar.php"
));
?>

