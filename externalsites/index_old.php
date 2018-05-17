<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Welcome To Extranet Site");
?>
<p><table class="data-table">
<tr>
<td>
Extranet is a private area for secure cooperation with partners, customers, clients, contractors, distributors and other external users that can be granted access to communication with the company's personnel.
</td>
</tr>
</table>
<p><?$APPLICATION->IncludeComponent("bitrix:desktop", ".default", array(
	"ID" => "dashboard_external",
	"CAN_EDIT" => "Y",
	"COLUMNS" => "3",
	"COLUMN_WIDTH_0" => "25%",
	"COLUMN_WIDTH_1" => "50%",
	"COLUMN_WIDTH_2" => "25%",
	"PATH_TO_VIDEO_CALL" => "/externalsites/contacts/personal/video/#USER_ID#/",
	"GADGETS" => array(
		0 => "RSSREADER",
		1 => "FAVORITES",
		2 => "EXTRANET_CONTACTS",
		3 => "TASKS",
		4 => "CALENDAR",
		5 => "PROFILE",
		6 => "UPDATES",
		7 => "WORKGROUPS",
	),
	"DATE_TIME_FORMAT" => "F j, Y h:i a",
	"DATE_FORMAT" => "F j, Y",
	"G_RSSREADER_CACHE_TIME" => "3600",
	"G_RSSREADER_SHOW_URL" => "Y",
	"G_RSSREADER_PREDEFINED_RSS" => "http://www.bitrixsoft.com/company/news/rss/",
	"GU_RSSREADER_CNT" => "5",
	"GU_RSSREADER_RSS_URL" => "http://www.bitrixsoft.com/company/news/rss/",
	"G_EXTRANET_CONTACTS_DETAIL_URL" => "/externalsites/contacts/personal/user/#ID#/",
	"G_EXTRANET_CONTACTS_MESSAGES_CHAT_URL" => "/externalsites/contacts/personal/messages/chat/#ID#/",
	"G_EXTRANET_CONTACTS_FULLLIST_URL" => "/externalsites/contacts/",
	"G_EXTRANET_CONTACTS_FULLLIST_EMPLOYEES_URL" => "/externalsites/contacts/employees.php",
	"GU_EXTRANET_CONTACTS_MY_WORKGROUPS_USERS_COUNT" => "5",
	"GU_EXTRANET_CONTACTS_PUBLIC_USERS_COUNT" => "5",
	"G_TASKS_IBLOCK_ID" => "#TASKS_IBLOCK_ID#",
	"G_TASKS_PAGE_VAR" => "page",
	"G_TASKS_GROUP_VAR" => "group_id",
	"G_TASKS_VIEW_VAR" => "user_id",
	"G_TASKS_TASK_VAR" => "task_id",
	"G_TASKS_ACTION_VAR" => "action",
	"G_TASKS_PATH_TO_GROUP_TASKS" => "/externalsites/workgroups/group/#group_id#/tasks/",
	"G_TASKS_PATH_TO_GROUP_TASKS_TASK" => "/externalsites/workgroups/group/#group_id#/tasks/task/#action#/#task_id#/",
	"G_TASKS_PATH_TO_USER_TASKS" => "/externalsites/contacts/personal/user/#user_id#/tasks/",
	"G_TASKS_PATH_TO_USER_TASKS_TASK" => "/externalsites/contacts/personal/user/#user_id#/tasks/task/#action#/#task_id#/",
	"G_TASKS_PATH_TO_TASK" => "/externalsites/contacts/personal/user/#user_id#/tasks/",
	"G_TASKS_PATH_TO_TASK_NEW" => "/externalsites/contacts/personal/user/#user_id#/tasks/task/create/0/",
	"GU_TASKS_ITEMS_COUNT" => "20",
	"GU_TASKS_ORDER_BY" => "E",
	"GU_TASKS_TYPE" => "Z",
	"G_CALENDAR_IBLOCK_TYPE" => "events",
	"G_CALENDAR_IBLOCK_ID" => "#CALENDAR_USER_IBLOCK_ID#",
	"G_CALENDAR_DETAIL_URL" => "/externalsites/contacts/personal/user/#user_id#/calendar/",
	"G_CALENDAR_CACHE_TYPE" => "N",
	"G_CALENDAR_CACHE_TIME" => "3600",
	"G_CALENDAR_CALENDAR_URL" => "/externalsites/contacts/personal/user/#user_id#/calendar/",
	"GU_CALENDAR_EVENTS_COUNT" => "5",
	"G_PROFILE_PATH_TO_GENERAL" => "/externalsites/contacts/personal/",
	"G_PROFILE_PATH_TO_PROFILE_EDIT" => "/externalsites/contacts/personal/user/#user_id#/edit/",
	"G_PROFILE_PATH_TO_LOG" => "/externalsites/contacts/personal/log/",
	"G_PROFILE_PATH_TO_SUBSCR" => "/externalsites/contacts/personal/subscribe/",
	"G_PROFILE_PATH_TO_MSG" => "/externalsites/contacts/personal/messages/",
	"G_PROFILE_PATH_TO_GROUPS" => "/externalsites/contacts/personal/user/#user_id#/groups/",
	"G_PROFILE_PATH_TO_GROUP_NEW" => "/externalsites/contacts/personal/user/#user_id#/groups/create/",
	"G_PROFILE_PATH_TO_PHOTO" => "/externalsites/contacts/personal/user/#user_id#/photo/",
	"G_PROFILE_PATH_TO_PHOTO_NEW" => "/externalsites/contacts/personal/user/#user_id#/photo/photo/user_#user_id#/0/action/upload/",
	"G_PROFILE_PATH_TO_FORUM" => "/externalsites/contacts/personal/user/#user_id#/forum/",
	"G_PROFILE_PATH_TO_BLOG" => "/externalsites/contacts/personal/user/#user_id#/blog/",
	"G_PROFILE_PATH_TO_BLOG_NEW" => "/externalsites/contacts/personal/user/#user_id#/blog/edit/new/",
	"G_PROFILE_PATH_TO_CAL" => "/externalsites/contacts/personal/user/#user_id#/calendar/",
	"G_PROFILE_PATH_TO_TASK" => "/externalsites/contacts/personal/user/#user_id#/tasks/",
	"G_PROFILE_PATH_TO_TASK_NEW" => "/externalsites/contacts/personal/user/#user_id#/tasks/task/create/0/",
	"G_PROFILE_PATH_TO_LIB" => "/externalsites/contacts/personal/user/#user_id#/files/lib/",
	"GU_PROFILE_SHOW_GENERAL" => "Y",
	"GU_PROFILE_SHOW_GROUPS" => "Y",
	"GU_PROFILE_SHOW_PHOTO" => "Y",
	"GU_PROFILE_SHOW_FORUM" => "Y",
	"GU_PROFILE_SHOW_CAL" => "Y",
	"GU_PROFILE_SHOW_BLOG" => "Y",
	"GU_PROFILE_SHOW_TASK" => "Y",
	"GU_PROFILE_SHOW_LIB" => "Y",
	"G_UPDATES_USER_VAR" => "user_id",
	"G_UPDATES_GROUP_VAR" => "group_id",
	"G_UPDATES_PAGE_VAR" => "page",
	"G_UPDATES_PATH_TO_USER" => "/externalsites/contacts/personal/user/#user_id#/",
	"G_UPDATES_PATH_TO_GROUP" => "/externalsites/workgroups/group/#group_id#/",
	"G_UPDATES_LIST_URL" => "/externalsites/contacts/personal/log/",
	"GU_UPDATES_ENTITY_TYPE" => "",
	"GU_UPDATES_EVENT_ID" => "",
	"G_WORKGROUPS_GROUP_VAR" => "group_id",
	"G_WORKGROUPS_PATH_TO_GROUP" => "/externalsites/workgroups/group/#group_id#/",
	"G_WORKGROUPS_PATH_TO_GROUP_SEARCH" => "/externalsites/workgroups/",
	"G_WORKGROUPS_CACHE_TIME" => "3600",
	"GU_WORKGROUPS_DATE_TIME_FORMAT" => "F j, Y h:i a",
	"GU_WORKGROUPS_DISPLAY_PICTURE" => "Y",
	"GU_WORKGROUPS_DISPLAY_DESCRIPTION" => "Y",
	"GU_WORKGROUPS_DISPLAY_NUMBER_OF_MEMBERS" => "Y",
	"GU_WORKGROUPS_FILTER_MY" => "Y"
	),
	false
);?></p>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
