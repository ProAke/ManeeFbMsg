<?php error_reporting (E_ALL ^ E_NOTICE);

include_once("include/config.inc.php");
include_once("include/function.inc.php");
include_once("include/class.TemplatePower.inc.php");
$strDate = date("Y-m-d H:i:s");
$tpl = new TemplatePower("_tp_table.html");
//$tpl->assignInclude("body", "_tp_index.html");




$tpl->prepare();

/*
$sql5 = "SELECT * FROM `$tablePageDetail` WHERE `ID`='1' AND `LAG`='1'";
$query5 = $conn->query($sql5) or die($conn->error);
if ($line5 = $query5->fetch_assoc()){
$tpl->newBlock("META");
$tpl->assign("title",$line5['TITLE']);
}
*/



$tpl->printToScreen();
?>