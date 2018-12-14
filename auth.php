<?php
  $ini_array = parse_ini_file("./conf.ini");
  $consumerKey = $ini_array['APIKey'];
  $consumerKeySecret = $ini_array['APISecretKey'];
  $accessToken=$ini_array['AccessToken'];
  $accessTokenSecret=$ini_array['AccessTokenSecret'];

  require './autoload.php';
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connection = new TwitterOAuth($consumerKey, $consumerKeySecret, $accessToken, $accessTokenSecret);
?>