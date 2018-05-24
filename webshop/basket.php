
<?

	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<center>
	<a href="/webshop" class="btn btn-primary">Go back</a>
	</center>
<?
	$APPLICATION->IncludeComponent("bitrix:sale.basket.basket");
?>
<center>
	<a href="/webshop" class="btn btn-primary">Go back</a>
	</center>
	<?
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

