
<?php

include('db.php');
$tdate = date("Y-m-d h:i:sa");

ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php.log");

$challange = $_REQUEST['hub_challenge'];

$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];

error_log($challange);
error_log($sender);
error_log($message);
$access_token = "EAACrmgmHpZA0BAIh7LapnoZBaeCfKJdbqLb44iFkpsZBNjQ1ynTZBNrPZBEZC6G5Kemd0OuQihpXfZC15uh7LYx9Dttihdiwxie1k6ZA5bRcntP9bTiHCE6vhLj23G07W6ZBDDSTOq2nuYMH703YvU2bAYSuRy1XWOf2a5vFwIoQ7NajZANqF1hU41";
$verify_token = "20210710FUFUDEV";




/////////////////////////////////
$sql = "SELECT * FROM tb_products WHERE Name cf '%" . $message . "%' ";
$query = mysqli_query($conn, $sql);
while ($rs = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
  echo $rs["CustomerID"];
  $message = "cf";
}
//////////////////////////////////










if (!empty($input['entry'][0]['messaging'][0]['message'])) {
	
	
	
	
  if ($message == "หวัดดีหมอ") {
    reply($access_token, $sender, "เกินไปหรือเปล่า");
  } elseif ($message == "cf") {
    reply($access_token, $sender, "มีโปรตามนี้");
    reply_image($access_token, $sender, "https://fufudev.uarea.in/app/products/WSK-01.png");
  } elseif ($message == "ป่วย") {
    reply_button($access_token, $sender);
  } elseif ($message == "เกรี้ยวกราด") {
    reply_image($access_token, $sender, "https://vignette.wikia.nocookie.net/psi/images/a/ac/Angry-hugh-jackman.jpg/revision/latest?cb=20151113213317");
  } else {
    reply($access_token, $sender, "เจ้าพูดอะไร ไม่รู้ความ");
  }




}

if (!empty($input['entry'][0]['messaging'][0]['postback'])) {
  reply_echo($access_token, $sender, "Let's start");
}

echo $challange;


function reply($access_token, $sender, $message)
{
  //API Url
  $url = 'https://graph.facebook.com/v2.6/me/messages?' . http_build_query(array(
    'access_token' => $access_token
  ));

  //Initiate cURL.
  $ch = curl_init($url);

  //The JSON data.
  $jsonData = array(
    'recipient' =>
    array(
      'id' => $sender,
    ),
    'message' =>
    array(
      'text' => $message,
    ),
  );
  error_log($jsonData);

  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($jsonData);

  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);

  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  //Execute the request
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $error = curl_error($ch);

  error_log($jsonDataEncoded);
  error_log($url);
  error_log($result);
  error_log($httpcode);
  error_log($error);
}

function reply_image($access_token, $sender, $image_url)
{
  //API Url
  $url = 'https://graph.facebook.com/v2.6/me/messages?' . http_build_query(array(
    'access_token' => $access_token
  ));

  //Initiate cURL.
  $ch = curl_init($url);

  //The JSON data.
  $jsonData = array(
    'recipient' =>
    array(
      'id' => $sender,
    ),
    'message' =>
    array(
      'attachment' =>
      array(
        'type' => 'image',
        'payload' =>
        array(
          'url' => $image_url,
          'is_reusable' => true,
        ),
      ),
    )
  );
  error_log($jsonData);

  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($jsonData);

  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);

  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  //Execute the request
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $error = curl_error($ch);

  error_log($jsonDataEncoded);
  error_log($url);
  error_log($result);
  error_log($httpcode);
  error_log($error);
}



function reply_image2($access_token, $sender, $image_url)
{
  //API Url
  $url = 'https://graph.facebook.com/v2.6/me/messages?' . http_build_query(array(
    'access_token' => $access_token
  ));

  //Initiate cURL.
  $ch = curl_init($url);

  //The JSON data.
  $jsonData = array(
    'recipient' =>
    array(
      'id' => $sender,
    ),
    'message' =>
    array(
      'attachment' =>
      array(
        'type' => 'image',
        'payload' =>
        array(
          'url' => 'https://fufudev.uarea.in/app/products/WSK-01.png',
          'is_reusable' => true,
        ),
      ),
    )
  );
  error_log($jsonData);

  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($jsonData);

  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);

  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  //Execute the request
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $error = curl_error($ch);

  error_log($jsonDataEncoded);
  error_log($url);
  error_log($result);
  error_log($httpcode);
  error_log($error);
}

function reply_button($access_token, $sender)
{
  //API Url
  $url = 'https://graph.facebook.com/v2.6/me/messages?' . http_build_query(array(
    'access_token' => $access_token
  ));

  //Initiate cURL.
  $ch = curl_init($url);

  //The JSON data.
  $jsonData = array(
    'recipient' =>
    array(
      'id' => $sender,
    ),
    'message' =>
    array(
      'attachment' =>
      array(
        'type' => 'template',
        'payload' =>
        array(
          'template_type' => 'button',
          'text' => 'เป็นอะไร?',
          'buttons' =>
          array(
            array(
              'type' => 'web_url',
              'url' => 'https://www.google.com',
              'title' => 'ถาม Google เอานะ',
            ),
          ),
        ),
      ),
    )
  );
  error_log($jsonData);

  //Encode the array into JSON.
  $jsonDataEncoded = json_encode($jsonData);

  //Tell cURL that we want to send a POST request.
  curl_setopt($ch, CURLOPT_POST, 1);

  //Attach our encoded JSON string to the POST fields.
  curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

  //Set the content type to application/json
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

  //Execute the request
  $result = curl_exec($ch);
  $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  $error = curl_error($ch);

  error_log($jsonDataEncoded);
  error_log($url);
  error_log($result);
  error_log($httpcode);
  error_log($error);
}
?>