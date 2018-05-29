<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetPageProperty("title", htmlspecialcharsbx(COption::GetOptionString("main", "site_name", "Bitrix24")));
?>
<?
if (SITE_TEMPLATE_ID !== "bitrix24")
	return;
?>
<?
	$APPLICATION->IncludeComponent("bitrix:support.ticket", "", Array(
	
	),
	false
);

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>