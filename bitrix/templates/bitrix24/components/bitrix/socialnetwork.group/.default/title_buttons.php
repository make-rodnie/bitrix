<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */

\Bitrix\Main\Localization\Loc::loadMessages(
	$_SERVER["DOCUMENT_ROOT"]."/bitrix/components/bitrix/socialnetwork_group/templates/.default/util_community.php"
)
?>

<script>
	B24SGControl.getInstance().init({
		groupId: <?=$arParams["GROUP_ID"]?>,
		favoritesValue: <?=($arResult["FAVORITES"] ? 'true' : 'false')?>
	});

	BX.message({
		SGMErrorSessionWrong: '<?=GetMessageJS("SONET_SGM_T_SESSION_WRONG")?>',
		SGMErrorCurrentUserNotAuthorized: '<?=GetMessageJS("SONET_SGM_T_NOT_ATHORIZED")?>',
		SGMErrorModuleNotInstalled: '<?=GetMessageJS("SONET_SGM_T_MODULE_NOT_INSTALLED")?>',
		SGMWaitTitle: '<?=GetMessageJS("SONET_SGM_T_WAIT")?>',
		SGMSubscribeButtonHintOn: '<?=GetMessageJS("SONET_SGM_T_NOTIFY_HINT_ON")?>',
		SGMSubscribeButtonHintOff: '<?=GetMessageJS("SONET_SGM_T_NOTIFY_HINT_OFF")?>',
		SGMSubscribeButtonTitleOn: '<?=GetMessageJS("SONET_SGM_T_NOTIFY_TITLE_ON")?>',
		SGMSubscribeButtonTitleOff: '<?=GetMessageJS("SONET_SGM_T_NOTIFY_TITLE_OFF")?>',
		SGMFavoritesTitleY: '<?=GetMessageJS("SONET_C6_ACT_FAVORITES_ADD")?>',
		SGMFavoritesTitleN: '<?=GetMessageJS("SONET_C6_ACT_FAVORITES_REMOVE")?>'
	});
</script>

<div class="socialnetwork-group-title-buttons">
	<? if (in_array($arResult["CurrentUserPerms"]["UserRole"], array(SONET_ROLES_OWNER, SONET_ROLES_MODERATOR, SONET_ROLES_USER))):
		if ($arResult["bChatActive"])
		{
			?>
			<span
					id="group_menu_chat_button"
					class="
						webform-small-button
						webform-small-button-transparent
						bx24-top-toolbar-button
						socialnetwork-group-chat-button
					"
					title="<?=GetMessage("SONET_SGM_T_CHAT_TITLE")?>"
					onclick="BXIM.openMessenger('sg<?=$arResult["Group"]["ID"]?>');"
			>
				<span class="webform-small-button-icon"></span>
			</span>
			<?
		}
		?>
		<span
			id="group_menu_subscribe_button"
			class="
				webform-small-button
				webform-small-button-transparent
				bx24-top-toolbar-button
				socialnetwork-group-notification-button
				<?=($arResult["bSubscribed"] ? " webform-button-active" : "")?>"
			title="<?=GetMessage("SONET_SGM_T_NOTIFY_TITLE_".($arResult["bSubscribed"] ? "ON" : "OFF"))?>"
			onclick="B24SGControl.getInstance().setSubscribe(event);"
		>
			<span class="webform-small-button-icon"></span>
		</span>
	<? endif ?>

	<span
		onclick="openProfileMenuPopup(this)"
		class="webform-small-button webform-small-button-transparent bx24-top-toolbar-button socialnetwork-group-actions-button">
			<span class="webform-small-button-text"><?=GetMessage("SONET_C6_ACTIONS_BUTTON");?></span>
			<span class="webform-small-button-icon"></span>
	</span>
</div>

<script>
function openProfileMenuPopup(bindElement)
{
	BX.addClass(bindElement, "webform-button-active");

	var menu = [];

	<?
	if ($USER->IsAuthorized()):
		?>
		menu.push({
			text : BX.message(B24SGControl.getInstance().favoritesValue ? "SGMFavoritesTitleN" : "SGMFavoritesTitleY"),
			title : BX.message(B24SGControl.getInstance().favoritesValue ? "SGMFavoritesTitleN" : "SGMFavoritesTitleY"),
			id: "set-group-favorite",
			onclick : function(event) {
				B24SGControl.getInstance().setFavorites(event);
			}
		});
		<?
	endif;

	if ($USER->IsAuthorized()):
		if ($arResult["CurrentUserPerms"]["UserCanInitiate"] && !$arResult["HideArchiveLinks"]):?>
			menu.push({
				text : "<?=GetMessage("SONET_C6_ACT_REQU")?>",
				title : "<?=GetMessage("SONET_C6_ACT_REQU")?>",
				onclick : function(event) {
					this.popupWindow.close();
					if (BX.SGCP)
					{
						BX.SGCP.ShowForm('invite', '<?=$popupName?>', event);
					}
				}
			});<?
		endif;
	endif;

	if ($arResult["CurrentUserPerms"]["UserCanModifyGroup"]):?>
		menu.push({
			text : "<?=GetMessage("SONET_C6_ACT_EDIT")?>",
			title : "<?=GetMessage("SONET_C6_ACT_EDIT")?>",
			onclick : function(event) {
				this.popupWindow.close();
				if (BX.SGCP)
				{
					BX.SGCP.ShowForm('edit', '<?=$popupName?>', event);
				}
			}
		});<?

		if (!$arResult["HideArchiveLinks"]):?>
			menu.push({
				text : "<?=GetMessage("SONET_C6_ACT_FEAT")?>",
				title : "<?=GetMessage("SONET_C6_ACT_FEAT")?>",
				href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["Features"])?>"
			});<?
		endif;?>
			menu.push({
				text : "<?=GetMessage("SONET_C6_ACT_DELETE")?>",
				title : "<?=GetMessage("SONET_C6_ACT_DELETE")?>",
				href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["Delete"])?>"
			});<?
	endif;

	if ($arResult["CurrentUserPerms"]["UserCanModerateGroup"] && $USER->IsAuthorized()):?>

		menu.push({
			text : "<?=GetMessage("SONET_C6_ACT_USER")?>",
			title : "<?=GetMessage("SONET_C6_ACT_USER")?>",
			href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["GroupUsers"])?>"
		});<?
	else:?>
		menu.push({
			text : "<?=GetMessage("SONET_C6_ACT_USER1")?>",
			title : "<?=GetMessage("SONET_C6_ACT_USER1")?>",
			href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["GroupUsers"])?>"
		});<?
	endif;

	if ($USER->IsAuthorized()):

		if ($arResult["CurrentUserPerms"]["UserCanInitiate"] && !$arResult["HideArchiveLinks"]):
			if (!CModule::IncludeModule('extranet') || ($arResult["Group"]["OPENED"] != "Y" && !CExtranet::IsExtranetSite())):?>
				menu.push({
					text : "<?=GetMessage("SONET_C6_ACT_VREQU_OUT")?>",
					title : "<?=GetMessage("SONET_C6_ACT_VREQU_OUT")?>",
					href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["GroupRequests"])?>"
				});<?
			else:?>
				menu.push({
					text : "<?=GetMessage("SONET_C6_ACT_VREQU_OUT")?>",
					title : "<?=GetMessage("SONET_C6_ACT_VREQU_OUT")?>",
					href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["GroupRequests"])?>"
				});<?
			endif;
		endif;

		if ((!$arResult["CurrentUserPerms"]["UserRole"] || ($arResult["CurrentUserPerms"]["UserRole"] == SONET_ROLES_REQUEST && $arResult["CurrentUserPerms"]["InitiatedByType"] == SONET_INITIATED_BY_GROUP)) && !$arResult["HideArchiveLinks"]):?>
			menu.push({
				text : "<?=GetMessage("SONET_C6_ACT_JOIN")?>",
				title : "<?=GetMessage("SONET_C6_ACT_JOIN")?>",
				href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["UserRequestGroup"])?>"
			});<?
		endif;

		if (
			$arResult["CurrentUserPerms"]["UserIsMember"]
			&& (!isset($arResult["CurrentUserPerms"]["UserIsAutoMember"]) || !$arResult["CurrentUserPerms"]["UserIsAutoMember"])
			&& !$arResult["CurrentUserPerms"]["UserIsOwner"]
		):?>
			menu.push({
				text : "<?=GetMessage("SONET_C6_ACT_EXIT")?>",
				title : "<?=GetMessage("SONET_C6_ACT_EXIT")?>",
				href : "<?=CUtil::JSUrlEscape($arResult["Urls"]["UserLeaveGroup"])?>"
			});<?
		endif;

	endif;
	?>

	var popup = BX.PopupMenu.create("group-profile-menu", bindElement, menu, {
		offsetTop: 5,
		offsetLeft : 12,
		angle : true,
		events : {
			onPopupClose : function() {
				BX.removeClass(this.bindElement, "webform-button-active");
			}
		}
	});

	var item = popup.getMenuItem("set-group-favorite");
	if (item)
	{
		B24SGControl.getInstance().menuItem = item.layout.text;
	}

	popup.popupWindow.show();

}


</script>

