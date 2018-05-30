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
		<div class="sidebar-widget-top-title">Support tickets</div>
	</div>
<?
$ticketcount = 0;
if(count($arResult["TICKETS"]) <= 0)
	echo GetMessage("G_TICKETS_LIST_EMPTY");
$bFirst = true;


if (array_key_exists("TICKETS", $arResult) && is_array($arResult["TICKETS"])):


	shuffle($arResult["TICKETS"]);
	
	//for admin
		if($USER->GetID() == 1):
			foreach ($arResult["TICKETS"] as $arTicket):
		$owner = '-'.$arTicket["OWNER_NAME"]."&nbsp".$arTicket["OWNER_LAST_NAME"];
		
		if ($arTicket['LAMP'] != 'grey' && $ticketcount != 5):
		if (!$bFirst)
		{
			?><div class="support-ticket-line"></div><?
		}
		?>
	<div class="con">
		<table width="100%">
			<tr>
				<td class="sonet-forum-post-date">
					<?=$arTicket["TIMESTAMP_X"]?>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID=<?=$arTicket["ID"]?>&edit=1">
							<?=$arTicket["TITLE"]; ?>
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
	</div>
		<?
		$bFirst = false;
		$ticketcount++;
	endif;
	
	endforeach;
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
		<table width="100%">
			<tr>
				<td class="sonet-forum-post-date">
					<?=$arTicket["TIMESTAMP_X"]?>
				</td>
			</tr>
			<tr>
				<td class="support-ticket-lamp">
					<b>
						<a target="_blank" href="/stream/helpdesk/index.php?ID=<?=$arTicket["ID"]?>&edit=1">
							<?=$arTicket["TITLE"]; ?>
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