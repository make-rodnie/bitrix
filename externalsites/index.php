<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetPageProperty("title", htmlspecialcharsbx(COption::GetOptionString("main", "site_name", "Extranet")));

?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:socialnetwork.log.ex", 
	"", 
	Array(
		"PATH_TO_SEARCH_TAG" => SITE_DIR."search/?tags=#tag#",
		"SET_NAV_CHAIN" => "Y",
		"SET_TITLE" => "Y",
		"ITEMS_COUNT" => "32",
		"NAME_TEMPLATE" => CSite::GetNameFormat(),
		"SHOW_LOGIN" => "Y",
		"DATE_TIME_FORMAT" => "F j, Y h:i a",
		"SHOW_YEAR" => "M",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SHOW_EVENT_ID_FILTER" => "Y",
		"SHOW_SETTINGS_LINK" => "Y",
		"SET_LOG_CACHE" => "Y",
		"USE_COMMENTS" => "Y",
		"BLOG_ALLOW_POST_CODE" => "Y",
		"BLOG_GROUP_ID" => "3",
		"PHOTO_USER_IBLOCK_TYPE" => "photos",
		"PHOTO_USER_IBLOCK_ID" => "16",
		"PHOTO_USE_COMMENTS" => "Y",
		"PHOTO_COMMENTS_TYPE" => "FORUM",
		"PHOTO_FORUM_ID" => "2",
		"PHOTO_USE_CAPTCHA" => "N",
		"FORUM_ID" => "3",
		"PAGER_DESC_NUMBERING" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CONTAINER_ID" => "log_external_container",
		"SHOW_RATING" => "",
		"RATING_TYPE" => "",
		"NEW_TEMPLATE" => "Y",
		"AVATAR_SIZE" => 50,
		"AVATAR_SIZE_COMMENT" => 39,
		"AUTH" => "Y",
	)
);
?>
<?
if(CModule::IncludeModule('calendar')):
	$APPLICATION->IncludeComponent("bitrix:calendar.events.list", "widget", array(
		"CALENDAR_TYPE" => "user",
		"B_CUR_USER_LIST" => "Y",
		"INIT_DATE" => "",
		"FUTURE_MONTH_COUNT" => "1",
		"DETAIL_URL" => "/externalsites/contacts/personal/user/#user_id#/calendar/",
		"EVENTS_COUNT" => "10",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600"
		),
		false
	);
endif;?>


<?
if(CModule::IncludeModule('tasks')):
	$APPLICATION->IncludeComponent(
		"bitrix:tasks.filter.v2",
		"widget",
		array(
			"VIEW_TYPE" => 0,
			"COMMON_FILTER" => array("ONLY_ROOT_TASKS" => "Y"),
			"USER_ID" => $USER->GetID(),
			"ROLE_FILTER_SUFFIX" => "",
			"PATH_TO_TASKS" => "/externalsites/contacts/personal/user/".$USER->GetID()."/tasks/",
			"CHECK_TASK_IN" => "R"
		),
		null,
		array("HIDE_ICONS" => "N")
	);
endif;?>

<?$APPLICATION->IncludeComponent(
	"bitrix:intranet.structure.birthday.nearest", 
	"widget", 
	array(
		"NUM_USERS" => "10",
		"NAME_TEMPLATE" => "",
		"SHOW_LOGIN" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"DATE_FORMAT" => "j F",
		"DATE_FORMAT_NO_YEAR" => (LANGUAGE_ID=="en")?"F j":((LANGUAGE_ID=="de")?"j. F":"j F"),
		"SHOW_YEAR" => "N",
		"DETAIL_URL" => "/company/personal/user/#USER_ID#/",
		"DEPARTMENT" => "0",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "widget",
		"STRUCTURE_PAGE" => "structure.php",
		"PM_URL" => "/company/personal/messages/chat/#USER_ID#/",
		"PATH_TO_CONPANY_DEPARTMENT" => "/company/structure.php?set_filter_structure=Y&structure_UF_DEPARTMENT=#ID#",
		"STRUCTURE_FILTER" => "structure",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"DATE_TIME_FORMAT" => "m/d/Y h:i:s a",
		"USER_PROPERTY" => array(
			0 => "PERSONAL_PHONE",
			1 => "PERSONAL_MOBILE",
			2 => "WORK_PHONE",
			3 => "UF_DEPARTMENT",
		)
	),
	false
);?>

<?$APPLICATION->IncludeComponent(
	"bitrix:photogallery.detail.list.ex",
	"sidebar_widget",
	Array(
		"ADDITIONAL_SIGHTS" => array(),
		"BEHAVIOUR" => "SIMPLE",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"DATE_TIME_FORMAT" => "m/d/Y",
		"DETAIL_SLIDE_SHOW_URL" => "",
		"DETAIL_URL" => "",
		"DISPLAY_AS_RATING" => "rating",
		"DRAG_SORT" => "Y",
		"ELEMENT_LAST_TYPE" => "none",
		"ELEMENT_SORT_FIELD" => "",
		"ELEMENT_SORT_FIELD1" => "",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER1" => "asc",
		"GALLERY_SIZE" => "",
		"GALLERY_URL" => "gallery.php?USER_ALIAS=#USER_ALIAS#",
		"GROUP_PERMISSIONS" => array("1","12"),
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "photos",
		"MAX_VOTE" => "5",
		"NAME_TEMPLATE" => "",
		"PAGE_ELEMENTS" => "50",
		"PATH_TO_USER" => "/company/personal/user/#USER_ID#",
		"PICTURES_SIGHT" => "",
		"PROPERTY_CODE" => array("",""),
		"RATING_MAIN_TYPE" => "like_graphic",
		"SEARCH_URL" => "search.php",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "N",
		"SHOW_COMMENTS" => "N",
		"SHOW_LOGIN" => "Y",
		"SHOW_PAGE_NAVIGATION" => "bottom",
		"SHOW_RATING" => "N",
		"SHOW_SHOWS" => "N",
		"THUMBNAIL_SIZE" => "280",
		"USER_ALIAS" => $_REQUEST["USER_ALIAS"],
		"USE_COMMENTS" => "N",
		"USE_DESC_PAGE" => "Y",
		"USE_PERMISSIONS" => "Y",
		"VOTE_NAMES" => array("1","2","3","4","5","")
	)
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>