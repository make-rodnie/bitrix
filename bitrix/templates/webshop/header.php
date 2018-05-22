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


    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="well well-lg offer-box text-center">


                   Today's Offer : &nbsp; <span class="glyphicon glyphicon-cog"></span>&nbsp;40 % off  on purchase of $ 2,000 and above till 24 dec !
                   
                </div>
                <div class="main box-border">
                    <div id="mi-slider" class="mi-slider">
                        <ul>
                            
                            <?php
$cat = array();
$arFilter = Array(
    "IBLOCK_NAME" => "Products"
);
$db_list = CIBlockSection::GetList(Array() , $arFilter, true);

while ($ar_result = $db_list->GetNext())
    {
    $ID = $ar_result['ID'];
    $NAME = $ar_result['NAME'];
    $cat[] = $NAME;
    }

$IBLOCK_ID = 32;
?>
            <?php

foreach($cat as $key => $value)
    {
    if ($value == 'Shoes')
        {
        $arFilter = Array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "CODE" => 'shoes'
        );
        $arSelectFields = Array(
            '*',
            'CATALOG_*'
        );
        $res = CIBlockElement::GetList(Array() , $arFilter, false, false, $arSelectFields);
        $elemcount = 1;
        while ($ar = $res->GetNext())
            {
            if ($elemcount < 5)
                {
                $pic = CFile::GetPath($ar['PREVIEW_PICTURE']);
                echo '
                <li><a href="#">
                                <img src="' . $pic . '" alt="img01"><h4>' . $ar['NAME'] . '</h4>
                            </a></li>';
                }

            $elemcount++;
            }
        }
    } ?>
                        </ul>
                        <ul>
                             <?php

foreach($cat as $key => $value)
    {
    if ($value == 'Accessories')
        {
        $arFilter = Array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "CODE" => 'accessories'
        );
        $arSelectFields = Array(
            '*',
            'CATALOG_*'
        );
        $res = CIBlockElement::GetList(Array() , $arFilter, false, false, $arSelectFields);
        $elemcount = 1;
        while ($ar = $res->GetNext())
            {
            if ($elemcount < 5)
                {
                $pic = CFile::GetPath($ar['PREVIEW_PICTURE']);
                echo '
                <li><a href="#">
                                <img src="' . $pic . '" alt="img01"><h4>' . $ar['NAME'] . '</h4>
                            </a></li>';
                }

            $elemcount++;
            }
        }
    } ?>
                        </ul>
                        <ul>
                             <?php

foreach($cat as $key => $value)
    {
    if ($value == 'Watches')
        {
        $arFilter = Array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "CODE" => 'watch'
        );
        $arSelectFields = Array(
            '*',
            'CATALOG_*'
        );
        $res = CIBlockElement::GetList(Array() , $arFilter, false, false, $arSelectFields);
        $elemcount = 1;
        while ($ar = $res->GetNext())
            {
            if ($elemcount < 5)
                {
                $pic = CFile::GetPath($ar['PREVIEW_PICTURE']);
                echo '
                <li><a href="#">
                                <img src="' . $pic . '" alt="img01"><h4>' . $ar['NAME'] . '</h4>
                            </a></li>';
                }

            $elemcount++;
            }
        }
    } ?>
                        </ul>
                        <ul>
                             <?php

foreach($cat as $key => $value)
    {
    if ($value == 'Bags')
        {
        $arFilter = Array(
            "IBLOCK_ID" => $IBLOCK_ID,
            "CODE" => 'bags'
        );
        $arSelectFields = Array(
            '*',
            'CATALOG_*'
        );
        $res = CIBlockElement::GetList(Array() , $arFilter, false, false, $arSelectFields);
        $elemcount = 1;
        while ($ar = $res->GetNext())
            {
            if ($elemcount <= 4)
                {
                $pic = CFile::GetPath($ar['PREVIEW_PICTURE']);
                echo '
                <li><a href="#">
                                <img src="' . $pic . '" alt="img01"><h4>' . $ar['NAME'] . '</h4>
                            </a></li>';
                }

            $elemcount++;
            }
        }
    } ?>
                        </ul>
                        <nav>
                            <a href="#">Shoes</a>
                            <a href="#">Accessories</a>
                            <a href="#">Watches</a>
                            <a href="#">Bags</a>
                        </nav>
                    </div>
                    
                </div>
                <br />
            </div>
            <!-- /.col -->
            
            <div class="col-md-3 text-center">
                <div class=" col-md-12 col-sm-6 col-xs-6" >
                    <div class="offer-text">
                        30% off here
                    </div>
                    <div class="thumbnail product-box">
                        <img src=<?php
echo "'" . SITE_TEMPLATE_PATH . "/images/dummyimg.png'"; ?> alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p><a href="#">Ptional dismiss button </a></p>
                        </div>
                    </div>
                </div>
                <div class=" col-md-12 col-sm-6 col-xs-6">
                    <div class="offer-text2">
                        30% off here
                    </div>
                    <div class="thumbnail product-box">
                        <img src=<?php
echo "'" . SITE_TEMPLATE_PATH . "/images/dummyimg.png'"; ?> alt="" />
                        <div class="caption">
                            <h3><a href="#">Samsung Galaxy </a></h3>
                            <p><a href="#">Ptional dismiss button </a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-3">
                <div>
                    <a href="#" class="list-group-item active">Products
                    </a>
                    <ul class="list-group">
                        
                        <?
                            $arFilter = Array(
    "IBLOCK_NAME" => "Products"
);
$db_list = CIBlockSection::GetList(Array() , $arFilter, true);

while ($ar_result = $db_list->GetNext())
    {
        echo '<li class="list-group-item">'.$ar_result['NAME'].'
      <span class="label label-primary pull-right">'.$ar_result['ELEMENT_CNT'].'</span>
                        </li>';
    }
                        ?>
                        
                    </ul>
                </div>
                <!-- /.div -->
                <!-- <div>
                    <a href="#" class="list-group-item active list-group-item-success">Clothing & Wears
                    </a>
                    <ul class="list-group">
                
                        <li class="list-group-item">Men's Clothing
                             <span class="label label-danger pull-right">300</span>
                        </li>
                        <li class="list-group-item">Women's Clothing
                             <span class="label label-success pull-right">340</span>
                        </li>
                        <li class="list-group-item">Kid's Wear
                             <span class="label label-info pull-right">735</span>
                        </li>
                
                    </ul>
                </div>
                /.div
                <div>
                    <a href="#" class="list-group-item active">Accessaries & Extras
                    </a>
                    <ul class="list-group">
                        <li class="list-group-item">Mobile Accessaries
                             <span class="label label-warning pull-right">456</span>
                        </li>
                        <li class="list-group-item">Men's Accessaries
                             <span class="label label-success pull-right">156</span>
                        </li>
                        <li class="list-group-item">Women's Accessaries
                             <span class="label label-info pull-right">400</span>
                        </li>
                        <li class="list-group-item">Kid's Accessaries
                             <span class="label label-primary pull-right">89</span>
                        </li>
                        <li class="list-group-item">Home Products
                             <span class="label label-danger pull-right">90</span>
                        </li>
                        <li class="list-group-item">Kitchen Products
                             <span class="label label-warning pull-right">567</span>
                        </li>
                    </ul>
                </div> -->
                <!-- /.div -->
                <div>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><a href="#">New Offer's Coming </a></li>
                        <li class="list-group-item list-group-item-info"><a href="#">New Products Added</a></li>
                        <li class="list-group-item list-group-item-warning"><a href="#">Ending Soon Offers</a></li>
                        <li class="list-group-item list-group-item-danger"><a href="#">Just Ended Offers</a></li>
                    </ul>
                </div>
                <!-- /.div -->
                <div class="well well-lg offer-box offer-colors">


                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , GRAB IT                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins left
                        </div>
                    </div>
                    <a href="#">click here to know more </a>
                </div>
                <!-- /.div -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Electronics</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>1235  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
      <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    

                             <?php
 
        
        $arFilter = Array(
            "IBLOCK_ID" => $IBLOCK_ID,);
        $arSelectFields = Array(
            '*',
            'CATALOG_*'
        );
        $res = CIBlockElement::GetList(Array() , $arFilter, false, false, $arSelectFields);
        $elemcount = 1;
        while ($ar = $res->GetNext())
            {

                $picture = CFile::GetPath($ar['PREVIEW_PICTURE']);
                echo '<div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                <img src='.$picture.'alt="" />
                            <div class="caption">
                                <h3><a href="#">'.$ar['NAME'].' </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                            </div>
                    </div>';

            }
        
    
    ?>
                            
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                <!-- /.row -->
                <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Clothing</a></li>
                        <li class="active">Men's Clothing</li>
                    </ol>
                </div>
                <!-- /.div -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>3005  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
      <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src=<?php
echo "'" . SITE_TEMPLATE_PATH . "/images/dummyimg.png'"; ?> alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p>
                                    <a href="#" class="btn btn-success" role="button">Add To Cart</a>
                                    <a href="#" class="btn btn-primary" role="button">See Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src=<?php
echo "'" . SITE_TEMPLATE_PATH . "/images/dummyimg.png'"; ?> alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src=<?php
echo "'" . SITE_TEMPLATE_PATH . "/images/dummyimg.png'"; ?> alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
<!--Core JavaScript file  -->
<script src= <?php
echo "'" . SITE_TEMPLATE_PATH . "/js/jquery-1.10.2.js'"; ?>></script>
    <!--bootstrap JavaScript file  -->
    <script src= <?php
echo "'" . SITE_TEMPLATE_PATH . "/js/bootstrap.js'"; ?>></script>
    <!--Slider JavaScript file  -->
    <script src= <?php
echo "'" . SITE_TEMPLATE_PATH . "/slider/js/modernizr.custom.63321.js'"; ?>></script>
    <script src= <?php
echo "'" . SITE_TEMPLATE_PATH . "/slider/js/jquery.catslider.js'"; ?>></script>
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
        </script>
