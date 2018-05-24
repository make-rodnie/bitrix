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

        $ban = CIBlockElement::GetList(Array(),$arFilter);
        $bannerchosenone;
        $bannerpic = array();
        $bannername = array();
        $bannerpreview = array();
        while ($bannerres = $ban->GetNext())
            {
                $bannername[] = $bannerres['NAME'];
                $bannerpic[] = $bannerres['PREVIEW_PICTURE'];
                $bannerpreview[] = $bannerres['PREVIEW_TEXT'];
            }

                $pic = CFile::GetPath($bannerpic[$_GET['id']]);
                echo '<center>'.$bannername[$_GET['id']].'
                                <br><img src="' . $pic . '" alt="'.$bannerpreview[$_GET['id']].'"></center>';


          
	}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>