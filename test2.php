<?php

header('Content-Type: application/json');

include("Dailymotion.php");
$api = new Dailymotion();

$apiKey = '.....';
$apiSecret = '....';

$dailyUser='.....';
$dailyPass='......';


$api->setGrantType(
	Dailymotion::GRANT_TYPE_PASSWORD,
	$apiKey,
	$apiSecret,
	array('manage_videos','manage_playlists','write','delete'),
	array('username' => $dailyUser, 'password' => $dailyPass));

try{
	//$url = "http://video.tv18online.com/general/BigBuckBunny.mp4";
	// http://stagingathena.azurewebsites.net/dummy_video/27245_TMF.mp4
	//$url = "https://videobank.blob.core.windows.net/athenaliveprod/athenaliveprod/11801/production_files/Hindi/uploaded_video_file/11801.mp4";
	$url = "http://stagingathena.azurewebsites.net/dummy_video/27245_TMF.mp4";
	$keywords = "directurl";
	$title = "test upload direct url - test 2";
	$content = "this is a test to upload video from http://video.tv18online.com/general/BigBuckBunny.mp4";
  //$content = "this is a test to upload video from http://stagingathena.azurewebsites.net/dummy_video/27245_TMF.mp4";
	//$img = "https://mightytechknow.000webhostapp.com/mightymusic.png";
	$rst = $api->post('/me/videos',
		array('url' => $url,
		'tags' => $keywords,
		'title' => $title,
		'channel' => 'news',
		'description' => $content,
		'published' => true,
		'private' => true
		//,'thumbnail_url' => $img
  ));
print_r($rst);
} catch (Exception $e) {
print_r($e);}
		//echo 'Message: ' .$e->getMessage();}​
?>
