<style type="text/css">
    div.det{
        width: 50%;
        border: 10px solid #027D59;
        background-color: #0BA175;
    }
    p.det{
        font-size: 17px;
    }
    p.title{
        font-size: 20px;
    }
    img.imgb{
        max-width: 300px;
        border: 5px solid #027D59;
    }
</style>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Banner Details");
?>
<?
	if(isset($_GET['id'])){

                $banner = 33;
                    $arFilter = Array(
            "IBLOCK_ID" => $banner
        ); 
                    $arSelected = Array('*');
        $ban = CIBlockElement::GetList(Array(),$arFilter, false, false, $arSelected);
        $bannerpic = array();
        $bannername = array();
        $bannerpreview = array();
        $banneruser = array();
        $bannerdetails = array();
        $bannerdate = array();
        while ($bannerres = $ban->GetNext())
            {
                $bannername[] = $bannerres['NAME'];
                $bannerpic[] = $bannerres['PREVIEW_PICTURE'];
                $bannerpreview[] = $bannerres['PREVIEW_TEXT'];
                $banneruser[] = $bannerres['CREATED_BY'];
                $bannerdetails[] = $bannerres['DETAIL_TEXT'];
                $bannerdate[] = $bannerres['DATE_CREATE'];


            }

                $dbUser = CUser::GetByID($banneruser[$_GET['id']]);
                $arResult["User"] = $dbUser->Fetch();
                $pic = CFile::GetPath($bannerpic[$_GET['id']]);
                echo '<center><div class="det"><p class="title">'.$bannername[$_GET['id']].'
                                </p><br><img class="imgb" src="' . $pic . '" alt="'.$bannerpreview[$_GET['id']].'"><br>
                                <p class="det">By: '.$arResult['User']['NAME'].'&nbsp'.$arResult['User']['LAST_NAME'].'</p><br>
                                <p class="det">Details:<br>'.$bannerdetails[$_GET['id']].'<p><br><br>
                                <p class="det">Added on '.$bannerdate[$_GET['id']].'</p><div></center>';

	}

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


            
                