
<?php
include('db.php');



$access_token = "EAACrmgmHpZA0BAIh7LapnoZBaeCfKJdbqLb44iFkpsZBNjQ1ynTZBNrPZBEZC6G5Kemd0OuQihpXfZC15uh7LYx9Dttihdiwxie1k6ZA5bRcntP9bTiHCE6vhLj23G07W6ZBDDSTOq2nuYMH703YvU2bAYSuRy1XWOf2a5vFwIoQ7NajZANqF1hU41";
$verify_token = "20210710FUFUDEV";
$hub_verify_token = null;
if(isset($_REQUEST['hub_challenge'])) {
 $challenge = $_REQUEST['hub_challenge'];
 $hub_verify_token = $_REQUEST['hub_verify_token'];
}
if ($hub_verify_token === $verify_token) {
 echo $challenge;
}
$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];
$message_to_reply = '';

$tdate =date("Y-m-d h:i:sa");

if($message){
	$sql = "INSERT INTO tb_messenger_recive (send_id, send_message, date)
	VALUES ('".$sender."', '".$message."','".$tdate."' )";
	if ($conn->query($sql) === TRUE) {
		$message_to_reply= "sender ".$sender."บันทึก >".$message;
	} else {
 		$message_to_reply= "ยังไม่บันทึก>".$message;
	}
}

 

//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    },
    "message":{
        "text":"'.$message_to_reply.'"
    }
}';
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}
?>