<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->addExternalCss(SITE_TEMPLATE_PATH."/css/sidebar.css");

$this->setFrameMode(true);
$this->SetViewTarget("sidebar", 10);

global  $USER;
$bDemo = (CTicket::IsDemo()) ? "Y" : "N";
$bAdmin = (CTicket::IsAdmin()) ? "Y" : "N";
$bSupportTeam = (CTicket::IsSupportTeam()) ? "Y" : "N";
$bADS = $bDemo == 'Y' || $bAdmin == 'Y' || $bSupportTeam == 'Y';
?>
<div class="sidebar-widget-ticket">
	<div class="sidebar-widget-top">
		<div class="sidebar-widget-top-title" style="color: #000000; background-color: #E76608;">Support tickets&emsp; <a href="/stream/helpdesk/index.php?ID=0&edit=1"><span style="float: right; margin-right: 10px; font-size: 20pt;">&#8853;</span></a></div>
	</div>
<?
$ticketcount = 0;
if(count($arResult["TICKETS"]) <= 0)
	echo GetMessage("G_TICKETS_LIST_EMPTY");
$bFirst = true;

$adarrayh = array();
$adarraym = array();
$adarrayl = array();
$adarray = array();
$nonadarray = array();

if (array_key_exists("TICKETS", $arResult) && is_array($arResult["TICKETS"])):
	
	//for admin
		if($USER->GetID() == 1):
			foreach ($arResult["TICKETS"] as $arTicket):
		$owner = '-'.$arTicket["OWNER_NAME"]."&nbsp".$arTicket["OWNER_LAST_NAME"];
		
		if ($arTicket['LAMP'] != 'grey' && $arTicket['CRITICALITY_NAME'] == 'High'):?>


			<?$changedate = date_create((string) $arTicket["TIMESTAMP_X"]);
			$adarrayh[] = '<div class="con">
		<table width="100%" class="mySlides">
			<tr>
				<td class="sonet-forum-post-date" style="position: absolute; right: 10px;">
					'.date_format($changedate, 'm/d/Y').'
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID='.$arTicket["ID"].'&edit=1">
							ID:'.$arTicket["ID"].'&emsp;'.$arTicket["TITLE"].'
						</a>
					</b>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-info">
						'.$owner.'
				</td>
			</tr>
		</table>

	</div>';
	?>
		<?$ticketcount++;
	endif;


	if ($arTicket['LAMP'] != 'grey' && $arTicket['CRITICALITY_NAME'] == 'Middle'):?>


			<?$changedate = date_create((string) $arTicket["TIMESTAMP_X"]);
			$adarraym[] = '<div class="con">
		<table width="100%" class="mySlides">
			<tr>
				<td class="sonet-forum-post-date" style="position: absolute; right: 10px;">
					'.date_format($changedate, 'm/d/Y').'
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID='.$arTicket["ID"].'&edit=1">
							ID:'.$arTicket["ID"].'&emsp;'.$arTicket["TITLE"].'
						</a>
					</b>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-info">
					
						'.$owner.'
				</td>
			</tr>
		</table>

	</div>';
	?>
		<?$ticketcount++;
	endif;


	if ($arTicket['LAMP'] != 'grey' && $arTicket['CRITICALITY_NAME'] == 'Low'):?>


			<?$changedate = date_create((string) $arTicket["TIMESTAMP_X"]);
			$adarrayl[] = '<div class="con">
		<table width="100%" class="mySlides">
			<tr>
				<td class="sonet-forum-post-date" style="position: absolute; right: 10px;">
					'.date_format($changedate, 'm/d/Y').'
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID='.$arTicket["ID"].'&edit=1">
							ID:'.$arTicket["ID"].'&emsp;'.$arTicket["TITLE"].'
						</a>
					</b>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-info">
						'.$owner.'
				</td>
			</tr>
		</table>

	</div>';
	?>
		<?$ticketcount++;
	endif;



	if ($arTicket['LAMP'] != 'grey' && $arTicket['CRITICALITY_NAME'] == ''):?>


			<?$changedate = date_create((string) $arTicket["TIMESTAMP_X"]);
			$adarray[] = '<div class="con">
		<table width="100%" class="mySlides">
			<tr>
				<td class="sonet-forum-post-date" style="position: absolute; right: 10px;">
					'.date_format($changedate, 'm/d/Y').'
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID='.$arTicket["ID"].'&edit=1">
							ID:'.$arTicket["ID"].'&emsp;'.$arTicket["TITLE"].'
						</a>
					</b>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-info">
						'.$owner.'
				</td>
			</tr>
		</table>

	</div>';
	?>
		<?$ticketcount++;
	endif;
	
	endforeach;
	foreach ($adarraym as $value) {
			$adarrayh[] = $value;
		}
		foreach ($adarrayl as $value) {
			$adarrayh[] = $value;
		}
		foreach ($adarray as $value) {
			$adarrayh[] = $value;
		}
		for ($i=0; $i <1 ; $i++) { 
			echo $adarrayh[$i];
				}

		
			

	endif;

//not admin
	if($USER->GetID() != 1):
			foreach ($arResult["TICKETS"] as $arTicket):
		$owner = '-'.$arTicket["OWNER_NAME"]."&nbsp".$arTicket["OWNER_LAST_NAME"];
		
		if ($arTicket['LAMP'] != 'grey' && $ticketcount != 5 && $arTicket['RESPONSIBLE_USER_ID'] == $USER->GetID() || $arTicket['LAMP'] != 'grey' && $ticketcount != 5 && $arTicket['OWNER_USER_ID'] == $USER->GetID()):
		if (!$bFirst)
		{
			?><div class="support-ticket-line"></div><?
		}
		?>
	<div class="con">
		<table width="100%" class="mySlides">
			<tr>
				<td class="sonet-forum-post-date">
					<?$changedate = date_create((string) $arTicket["TIMESTAMP_X"]);?>
					<?=date_format($changedate, 'm/d/Y');?>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID=<?=$arTicket["ID"]?>&edit=1">
							ID:<?=$arTicket["ID"]?>&emsp;<?=$arTicket["TITLE"];?>
						</a>
					</b>
				</td>
			</tr>
			<tr>
				<td>
					<span class="support-ticket-info">
						<?=$owner;?>
					</span>
				</td>
			</tr>
		</table>
<!-- 		<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button> -->
	</div>
		<?
		$bFirst = false;
		$ticketcount++;
	endif;

	endforeach;
	if($ticketcount == 0)
		echo GetMessage("G_TICKETS_LIST_EMPTY");
endif;
endif;
?>
</div>
<br>




<!-- 
<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
</script> -->

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 8000); // Change image every 2 seconds
}
</script>