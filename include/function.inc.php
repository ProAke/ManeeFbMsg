<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created :19/10/2018
Author : CIG SMART+ 4.0
E-mail : worapot.kingeru@gmailc.om
Website : www.kingeru.com
Copyright (C) 2018, CIG SMART+ 4.0 by Kingeru Digital Touch all rights reserved.
*****************************************************************/


function sqlCommandInsert($strTableName,$arrFieldValue){
	
	$arrFieldTmp = "";
	$arrValueTmp = "";

	$strFieldTmp = "";
	$strValueTmp = "";

	foreach ($arrFieldValue as $key => $value) {
		$arrFieldTmp[] = "`$key`";
		$arrValueTmp[] = "'$value'";
	}

	$strFieldTmp = implode(",", $arrFieldTmp);
	$strValueTmp = implode(",", $arrValueTmp);

	$strSql = "INSERT INTO `$strTableName`($strFieldTmp) VALUES($strValueTmp)";

	return $strSql;
}

/*
# Function sqlCommandUpdate
# Example

$arrData = array();
$arrData['A'] = "aaaa";
$arrData['B'] = "bbbb";
$arrData['C'] = "cccc";
sqlCommandUpdate("table",$arrData,"`ID`='1'");
*/

function sqlCommandUpdate($strTableName,$arrFieldValue,$strWhere){
	
	$arrFieldValueTmp = "";
	$strFieldValueTmp = "";

	foreach ($arrFieldValue as $key => $value) {
		$arrFieldValueTmp[] = "`$key`='$value'";
	}

	$strFieldValueTmp = implode(",", $arrFieldValueTmp);

	$strSql = "UPDATE `$strTableName` SET $strFieldValueTmp WHERE $strWhere";

	return $strSql;
}



/*
# Function ThaiDateLong
# Example

ThaiDateLong("YYYY-mm-dd hh:ii:ss",false);
*/

function ThaiDateLong($strDateTime,$booTime){
	$arrThaiMonth = array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");

	list($strYMD, $strTime) = explode(" ", $strDateTime);
	list($intY, $intM, $intD) = explode("-", $strYMD);
	
	$intY = $intY + 543;
	$strM = $arrThaiMonth[$intM*1];
	$intD = $intD * 1;

	if($booTime) $strShowTime = $strTime;

	return "$intD $strM $intY $strShowTime";
}

/*
# Function ThaiDateShort
# Example

ThaiDateShort("YYYY-mm-dd hh:ii:ss",false);
*/

function ThaiDateShort($strDateTime,$booTime){
	$arrThaiMonth = array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
	
	list($strYMD, $strTime) = explode(" ", $strDateTime);
	list($intY, $intM, $intD) = explode("-", $strYMD);
	
	$intY = $intY + 543;
	$strM = $arrThaiMonth[$intM*1];
	$intD = $intD * 1;

	if($booTime) $strShowTime = $strTime;

	return "$intD $strM $intY $strShowTime";
}

/*
# Function EngDateLong
# Example

EngDateLong("YYYY-mm-dd hh:ii:ss",false);
*/














function EngDateLong($strDateTime,$booTime){
	$arrThaiMonth = array("","January","February","March","April","May","June","July","August","September","October","November","December");

	list($strYMD, $strTime) = explode(" ", $strDateTime);
	list($intY, $intM, $intD) = explode("-", $strYMD);
	
	$intY = $intY;
	$strM = $arrThaiMonth[$intM*1];
	$intD = $intD * 1;

	if($booTime) $strShowTime = $strTime;

	return "$intD $strM $intY $strShowTime";
}

/*
# Function EngDateShort
# Example

EngDateShort("YYYY-mm-dd hh:ii:ss",false);
*/

function EngDateShort($strDateTime,$booTime){
	$arrThaiMonth = array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
	list($strYMD, $strTime) = explode(" ", $strDateTime);
	list($intY, $intM, $intD) = explode("-", $strYMD);
	
	$intY = $intY;
	$strM = $arrThaiMonth[$intM*1];
	$intD = $intD * 1;

	if($booTime) $strShowTime = $strTime;

	return "$intD $strM $intY $strShowTime";
}

/*
# Function SplitExtension
# Example

SplitExtension("strFileName");
*/

function SplitExtension($strFileName){
   $arrSplit = explode(".", $strFileName);

   return strtolower($arrSplit[count($arrSplit)-1]);
}

/*
# Function SplitText
# Example

SplitText("strText",intLength);
*/

function SplitText($strMessage,$intLength){
	
	$arrMessage = explode(" ", $strMessage);
	$strNewMessage = $arrMessage[0];

	for($i=1;$i<count($arrMessage);$i++){
		if(strlen($strNewMessage.$arrMessage[$i]) > $intLength){
			break;
		}else{
			$strNewMessage = $strNewMessage." ".$arrMessage[$i];
		}
	}

   return $strNewMessage;
}

/*
# Function ReplaceHtmlTag
# Example

ReplaceHtmlTag("strText",$arrRudeWord);
*/
function ReplaceHtmlTag($strHtmlOld){	
	$strHtmlNew = str_replace("<", "&lt;", $strHtmlOld);
	$strHtmlNew = str_replace(">", "&gt;", $strHtmlNew);
	$strHtmlNew = str_replace("\n", "<br>\n", $strHtmlNew);
	
	return $strHtmlNew;
}

/*
# Function GetMessage
# Example

GetMessage($intId);
*/

function GetMessage($intId){
	global $tableMessage;

	$query = "SELECT * FROM `$tableMessage` WHERE `ID`='$intId'";
	$result = $conn->query($query);
	$line = mysql_fetch_array($result);
	return nl2br($line['MESSAGE']);
}


/////////////////////////










/*
# Function SaveUploadImg
# Example

$strNewFileName = SaveUploadImg($arrFile,$strPath);

*/

function SaveUploadImg1M($arrFile,$strPath){
	
	$strFileNameTmp = "";
	if(SplitExtension($arrFile['name']) == "jpg" || SplitExtension($arrFile['name']) == "gif" ){
		$strFileNameTmp = date("Ymdhis")."-".sprintf("%05d",rand()).".".SplitExtension($arrFile['name']);
		if($arrFile['size'] < 1000000){ move_uploaded_file($arrFile['tmp_name'],$strPath.$strFileNameTmp);
		}else{
		$strFileNameTmp = "Over";
		}
	}else{
	$strFileNameTmp = "Over";
	}

	return $strFileNameTmp;
}


function SaveUploadImg100K($arrFile,$strPath){
	
	$strFileNameTmp = "";
	if(SplitExtension($arrFile['name']) == "jpg" || SplitExtension($arrFile['name']) == "gif" ){
		$strFileNameTmp = date("Ymdhis")."-".sprintf("%05d",rand()).".".SplitExtension($arrFile['name']);
		if($arrFile['size'] < 100000){ move_uploaded_file($arrFile['tmp_name'],$strPath.$strFileNameTmp);
		}else{
		$strFileNameTmp = "Over";
		}
	}else{
	$strFileNameTmp = "Over";
	}

	return $strFileNameTmp;
}

function SaveUploadImg($arrFile,$strPath){
	
	$strFileNameTmp = "";
	if(SplitExtension($arrFile['name']) == "jpg" || SplitExtension($arrFile['name']) == "gif" || SplitExtension($arrFile['name']) == "png" || SplitExtension($arrFile['name']) == "ico"){
		$strFileNameTmp = date("Ymdhis")."-".sprintf("%05d",rand()).".".SplitExtension($arrFile['name']);
		move_uploaded_file($arrFile['tmp_name'],$strPath.$strFileNameTmp);
	}

	return $strFileNameTmp;
}

/*
# Function SaveUploadFile
# Example

$strNewFileName = SaveUploadFile($arrFile,$strPath);
*/

function SaveUploadFile($arrFile,$strPath){
	
	$strFileNameTmp = "";
	if(SplitExtension($arrFile['name']) != ""){
		$strFileNameTmp = date("Ymdhis")."-".sprintf("%05d",rand()).".".SplitExtension($arrFile['name']);
		move_uploaded_file($arrFile['tmp_name'],$strPath.$strFileNameTmp);
	}

	return $strFileNameTmp;
}




###################################

function GetMenuLAG($page_lang,$key,$group,$id){
	global $tpl;
	global $tableLag;
	global $id;

		//unset($_SESSION["page_lag"]);
		$_SESSION['page_lag']=$page_lang;
		if($key!="" ||  $group!="" || $id!=""){
			$tpl->newBlock("MENU_KEY");
			$tpl->assign("key",$key);
			$tpl->assign("group",$group);
			$tpl->assign("id",$id);
			}

	$query1 = "SELECT * FROM `$tableLag` ORDER BY `ID`";
	 $result = $conn->query($query1);
	while ($line= $result->fetch_assoc())  { 
		$tpl->newBlock("MENU_LAG");

		$tpl->assign("ID",$_SERVER['REQUEST_URI']."?&page_lag=".$line['ID']);

		//$tpl->assign("ID_B","../home/index.php?page_lag=".$line['ID']);
		//$tpl->assign("ID_B",$_SERVER['REQUEST_URI']);

		 $pos = strrpos($_SERVER['REQUEST_URI'],"?");
			 if ($pos === false) {
				 $tpl->assign("ID_B",$_SERVER['REQUEST_URI']."?page_lag=".$line['ID']);
				 if($_GET['id']){$tpl->assign("Page_ID","&id=".$_GET['id']);}


			 }
			 else {
				 $tpl->assign("ID_B","?page_lag=".$line['ID']);
				 if($_GET['id']){$tpl->assign("Page_ID","&id=".$_GET['id']);}

			 }

		$tpl->assign("LAG",$line['LAG']);
		$tpl->assign("NAME",$line['NAME']);

	}
			$tpl->newBlock("MENU_LAG2");
		if($page_lang=="1"){
			$tpl->assign("LAG","th");
			$tpl->assign("NAME","Thai");
		}elseif($page_lang=="2"){
			$tpl->assign("LAG","eng");
			$tpl->assign("NAME","English");
		}
	return true;
}




###################################
function GetMenuAdmin($menu2){



	global $tpl;
	global $conn;
	global $tableAdminMenu;
	global $tableSetting;

	$tpl->assign("_ROOT.login_name",$_SESSION['ADMIN_NAME']);
	$tpl->assign("_ROOT.last_login",$_SESSION['LAST_LOGIN']);
	$tpl->assign("_ROOT.user_id",$_SESSION['ID']);

	if(is_file("../../upload/user/".$_SESSION['THUMB'])){
		$tpl->assign("_ROOT.login_thumb","../../upload/user/".$_SESSION['THUMB']."");
	}

	$query = "SELECT * FROM ".$tableAdminMenu." WHERE `ID` IN(".$_SESSION['PRIVILEGES'].") AND `SHOW` = '0'  ORDER BY `ORDER` ASC";
	$result = $conn->query($query) or die($conn->error);
	while($line= $result->fetch_assoc()) {

		$tpl->newBlock("MENU_MAIN");
		$tpl->assign("menu",$line['MENU']);
		$tpl->assign("url",$line['URL']);
		$tpl->assign("active",$line['ACTIVE']);
		$tpl->assign("open",$line['OPEN']);
		$tpl->assign("icon",$line['ICON']);
		$tpl->assign("title",$line['TITLE']);

		if($line['ID']==$menu2){
			$tpl->assign("li","<li class='start active open'>");
		}else{
			$tpl->assign("li","<li ".$line['MENU'].">");
		}

		if($line['ICON']==""){$tpl->assign("sub","style='padding-left:25px;'");}
	}
/*********************************************************/
//setting
	$query_set			= "SELECT * FROM ".$tableSetting." WHERE ID = '1'";
	$result_set			= $conn->query($query_set);
	while($line_set	= $result_set->fetch_assoc()) {
		$tpl->assign("_ROOT.setting_name",$line_set['NAME']);
		$tpl->assign("_ROOT.setting_time",$line_set['TIME']);
		$tpl->assign("_ROOT.setting_tel",$line_set['TEL']);
		$tpl->assign("_ROOT.setting_fax",$line_set['FAX']);
		$tpl->assign("_ROOT.setting_mobile",$line_set['MOBILE']);
		$tpl->assign("_ROOT.setting_email",$line_set['EMAIL']);
		$tpl->assign("_ROOT.setting_email2",$line_set['EMAIL2']);
		$tpl->assign("_ROOT.setting_line",$line_set['LINE']);
		$tpl->assign("_ROOT.setting_facebook",$line_set['FACEBOOK']);
		$tpl->assign("_ROOT.setting_youtube",$line_set['YOUTUBE']);
		$tpl->assign("_ROOT.setting_twitter",$line_set['TWITTER']);
		$tpl->assign("_ROOT.setting_instagram",$line_set['INSTAGRAM']);
		$tpl->assign("_ROOT.setting_copyright",$line_set['COPYRIGHT']);
		$tpl->assign("_ROOT.setting_js",$line_set['JS']);
		$tpl->assign("_ROOT.setting_piwik",$line_set['PIWIK']);

		if($line_set['LOGO']!=""){
			if(is_file("../../upload/setting/full/img/".$line_set['LOGO'])){
			$tpl->assign("_ROOT.setting_logo","<img src='../../upload/setting/full/img/".$line_set['LOGO']."' height='50'>");
			$tpl->assign("_ROOT.setting_logox","../../upload/setting/full/img/".$line_set['LOGO']."");
			}
		}
		if($line_set['LOGO_THUMB']!=""){
			if(is_file("../../upload/setting/full/img/".$line_set['LOGO_THUMB'])){
			$tpl->assign("_ROOT.setting_logo_thumb","<img src='../../upload/setting/full/img/".$line_set['LOGO_THUMB']."' height='46' alt='logo' class='logo-default' style='margin:0px;'>");
			$tpl->assign("_ROOT.setting_logo_thumbx","../../upload/setting/full/img/".$line_set['LOGO_THUMB']."");
			}
		}
		if($line_set['FAVICON']!=""){
			if(is_file("../../upload/setting/full/img/".$line_set['FAVICON'])){
			$tpl->assign("_ROOT.setting_favicon","../../upload/setting/full/img/".$line_set['FAVICON']."");
		$tpl->assign("_ROOT.setting_faviconx","../../upload/setting/full/img/".$line_set['FAVICON']."");
			}
		}
	}

	return true;
}
###################################

///////FRONTSETTING////////////////////////////////////////////////

function FRONTSETTING($lag){
global $tpl;
global $tableSetting;
global $conn;
// global $lag;

	$query_set = "SELECT * FROM `$tableSetting` WHERE LAG = '".$lag."' ";
	$result_set = $conn->query($query_set) or die($conn->error);
	while($line_set = $result_set->fetch_assoc()){
		$tpl->assign("_ROOT.setting_name",$line_set['NAME']);
		$tpl->assign("_ROOT.setting_time",$line_set['TIME']);
		$tpl->assign("_ROOT.setting_tel",$line_set['TEL']);
		$tpl->assign("_ROOT.setting_fax",$line_set['FAX']);

		$MOBILE = explode("|",$line_set['MOBILE']);
		$tpl->assign("_ROOT.setting_mobile1",$MOBILE[0]);
		$tpl->assign("_ROOT.setting_mobile2",$MOBILE[1]);
		$tpl->assign("_ROOT.setting_mobile3",$MOBILE[2]);		

		$tpl->assign("_ROOT.setting_email",$line_set['EMAIL']);
		$tpl->assign("_ROOT.setting_email2",$line_set['EMAIL2']);
		$tpl->assign("_ROOT.setting_line",$line_set['LINE']);
		$tpl->assign("_ROOT.setting_facebook",$line_set['FACEBOOK']);
		$tpl->assign("_ROOT.setting_youtube",$line_set['YOUTUBE']);
		$tpl->assign("_ROOT.setting_twitter",$line_set['TWITTER']);
		$tpl->assign("_ROOT.setting_instagram",$line_set['INSTAGRAM']);
		$tpl->assign("_ROOT.setting_copyright",$line_set['COPYRIGHT']);
		$tpl->assign("_ROOT.setting_js",$line_set['JS']);
		$tpl->assign("_ROOT.setting_piwik",$line_set['PIWIK']);		

		if($line_set['LOGO']!=""){
			if(is_file("upload/setting/full/img/".$line_set['LOGO'])){
			$tpl->assign("_ROOT.setting_logo","<img src='upload/setting/full/img/".$line_set['LOGO']."'>");
			}
		}

		if($line_set['LOGO2']!=""){
			if(is_file("upload/setting/full/img/".$line_set['LOGO2'])){
			$tpl->assign("_ROOT.setting_logo2","<img src='upload/setting/full/img/".$line_set['LOGO2']."'>");
			}
		}	

		if($line_set['LOGO_THUMB']!=""){
			if(is_file("upload/setting/full/img/".$line_set['LOGO_THUMB'])){
			$tpl->assign("_ROOT.setting_logo_thumb","<img src='upload/setting/full/img/".$line_set['LOGO_THUMB']."' alt='logo' class='logo-default' style='margin:0px;'>");
			}
		}

		if($line_set['FAVICON']!=""){
			if(is_file("upload/setting/full/img/".$line_set['FAVICON'])){
			$tpl->assign("_ROOT.setting_favicon","upload/setting/full/img/".$line_set['FAVICON']."");
			}
		}	

	}

}	



/////////////////////////////////////////////////////


?>
