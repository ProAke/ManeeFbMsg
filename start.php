<?php error_reporting (E_ALL ^ E_NOTICE);
/*****************************************************************
Created :12/01/2021
Author : Worapot pilabut (Ake)
E-mail : worapot@outlook.com
Website : https://www.vpslive.com
Copyright (C) 2021, VPSLive Digital together  all right and Reserved.
*****************************************************************/
session_start();
include_once("../include/config.inc.php");
include_once("../include/function.inc.php");
include_once("../include/class.inc.php");
include_once("../include/class.TemplatePower.inc.php");


$tpl = new TemplatePower("../template/_tp_main.html");
$tpl->assignInclude("body", "../template/_tp_index.html");
$tpl->prepare();


// DATA from API //////////////////////////
if (!empty($covid19_th)) {
    $Confirmed        = $covid19_th->Confirmed;
    $Recovered        = $covid19_th->Recovered;
    $Hospitalized     = $covid19_th->Hospitalized;
    $Deaths           = $covid19_th->Deaths;
    $NewConfirmed     = $covid19_th->NewConfirmed;
    $NewRecovered     = $covid19_th->NewRecovered;
    $NewHospitalized  = $covid19_th->NewHospitalized;
    $NewDeaths        = $covid19_th->NewDeaths;
    $UpdateDate        = $covid19_th->UpdateDate;

}




$tpl->newBlock("META");
if (!empty($covid19_th)) {
$tpl->assign("title", "Fufudev อัพเดทเมื่อ".$UpdateDate);
$tpl->assign("gotitle", "Fufudev อัพเดทเมื่อ".$UpdateDate);
}

$tpl->assign("add_metag", "<meta http-equiv='refresh' content='5'>");
$tpl->assign("_ROOT.Header","FuFu Dev");
$tpl->assign("_ROOT.Description","วันที่ ".$strDate."อัพเดทล่าสุด");

//////////////////////////////////////////
$tpl->newBlock("DAYLIREPORT_COVID19TH");
if (!empty($covid19_th)) {
$tpl->assign("Covid19th_Confirmed", number_format($Confirmed));
$tpl->assign("Covid19th_Recovered", number_format($Recovered));
$tpl->assign("Covid19th_NewRecovered", number_format($NewRecovered));
$tpl->assign("Covid19th_Hospitalized", number_format($Hospitalized));
$tpl->assign("Covid19th_Deaths", number_format($Deaths));
$tpl->assign("Covid19th_NewDeaths", number_format($NewDeaths));
$tpl->assign("Covid19th_NewConfirmed", number_format($NewConfirmed));
$tpl->assign("Covid19th_UpdateDate", $UpdateDate);
}else{
    $tpl->assign("Covid19th_Confirmed", 0);
    $tpl->assign("Covid19th_Recovered", 0);
    $tpl->assign("Covid19th_NewRecovered", 0);
    $tpl->assign("Covid19th_Hospitalized", 0);
    $tpl->assign("Covid19th_Deaths", 0);
    $tpl->assign("Covid19th_NewDeaths", 0);
    $tpl->assign("Covid19th_NewConfirmed", 0);
    $tpl->assign("Covid19th_UpdateDate", 'รออัพเดทข้อมูล >'.$strDate);

}


//FRONTPAGESEO("1",$lag);
$tpl->printToScreen();
?>
