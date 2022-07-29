<?php

header('Content-Type: application/json');

include("Dailymotion.php");
$api = new Dailymotion(); 

$apiKey = $_POST['apiKey'];
$apiSecret = $_POST['apiSecret'];

$dailyUser=$_POST['dailyUser'];
$dailyPass=$_POST['dailyPass'];

    
$api->setGrantType(
	Dailymotion::GRANT_TYPE_PASSWORD, 
	$apiKey, 
	$apiSecret, 
	array('manage_videos','manage_playlists','write','delete'), 
	array('username' => $dailyUser, 'password' => $dailyPass)); 

try{ 
	$url = "http://video.tv18online.com/general/BigBuckBunny.mp4"; 
	$keywords = "nw18"; 
	$title = "test upload for NW18 India - TEST 2"; 
	$content = "this is a test to upload video from http://video.tv18online.com/general/BigBuckBunny.mp4"; 
	$img = "https://mightytechknow.000webhostapp.com/mightymusic.png"; 
	$rst = $api->post('/me/videos', 
		array('url' => $url, 
		'tags' => $keywords, 
		'title' => $title, 
		'channel' => 'news', 
		'description' => $content, 
		'published' => true, 
		'thumbnail_url' => $img)); 
print_r($rst);
} catch (Exception $e) { 
print_r($e);}
		//echo 'Message: ' .$e->getMessage();}​
?>