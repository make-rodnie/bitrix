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
		<table width="100%"  class="mySlides">
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
		<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
  <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
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