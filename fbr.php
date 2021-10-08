<?php


echo "hello";
echo getPageFanCount($page = 'boithailandnews');
function getPageFanCount($page) {
 $pageData = @file_get_contents('https://graph.facebook.com/'.$page);
 if($pageData) { // if valid json object
 $pageData = json_decode($pageData); // decode json object
 if(isset($pageData->likes)) { // get likes from the json object
    return $pageData->likes;
 }
 } else {
 echo 'page is not a valid FB Page';
 }
}

?>