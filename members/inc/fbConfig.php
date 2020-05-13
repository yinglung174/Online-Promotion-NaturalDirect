<?php
//session_start();

//Include Facebook SDK
require_once 'facebook.php';

/*
 * Configuration and setup FB API
 */
$appId = '1384493418236629'; //Facebook App ID
$appSecret = 'd75c27d0f557f2d298070d4d8e5fd9a5'; // Facebook App Secret
$redirectURL = 'http://localhost/wepaintphp/members/fb_profile.php'; // Callback URL
$fbPermissions = 'email';  //Required facebook permissions

//Call Facebook API
$facebook = new Facebook(array(
  'appId'  => $appId,
  'secret' => $appSecret,
));
$fbUser = $facebook->getUser();

