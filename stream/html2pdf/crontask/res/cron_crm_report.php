
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->SetTitle("CRM contact");

$count = CCrmContact::GetCount('*');
$arFilter = Array();
$arSelect = Array('*');

$listid = CCrmContact::GetList(Array(),$arFilter,$arSelect,false);


$id = array();
while ($contactList = $listid->GetNext()){
	$id[] = $contactList['ID'];
}
$randomid = rand(0, $count-1);

$list = CCrmContact::GetByID($id[$randomid], true);
$na = 'not specified';

$dbid = $id[$randomid];

global $DB;

$contacts = '';

$b_crm_field_multi = $DB->Query ("SELECT * FROM `b_crm_field_multi` ");
while ($contact = $b_crm_field_multi->Fetch()){
	if($contact['ELEMENT_ID'] == $dbid){
    $contacts .= '<p>'.$contact['TYPE_ID'].': '.$contact['VALUE'].'</p>';
}
}
?>
<style type="text/css">
	div{
    margin: auto;
    width: 90%;
    border: 3px solid black;
    padding: 10px;
}
h1{
    text-align: center;
}
p{
	font-size: 18px;
}
</style>
<div>
<h1>CRM CONTACT</h1>
<h2><?echo $list['FULL_NAME'];?></h2>
<p>POSITION: <?echo ($list['POST'] != '' ? $list['POST'] : $na);?></p>
<p>CONTACT TYPE: <?echo ($list['TYPE_ID'] != '' ? $list['TYPE_ID'] : $na);?></p>
<p>SOURCE: <?echo ($list['SOURCE_ID'] != '' ? $list['SOURCE_ID'] : $na);?></p>
<p><?echo $contacts;?></p>
<p>DOB: <?echo ($list['BIRTHDATE'] != null ? $list['BIRTHDATE'] : $na);?></p>
<p>COMPANY: <?echo ($list['COMPANY_TITLE'] != null ? $list['COMPANY_TITLE'] : $na);?></p>
</div>