<?php
  $ini_array = parse_ini_file("conf.ini");
  $consumerKey = $ini_array['APIKey'];
  $consumerKeySecret = $ini_array['APISecretKey'];
  $accessToken=$ini_array['AccessToken'];
  $accessTokenSecret=$ini_array['AccessTokenSecret'];

  require 'autoload.php';
  use Abraham\TwitterOAuth\TwitterOAuth;

  $connection = new TwitterOAuth($consumerKey, $consumerKeySecret, $accessToken, $accessTokenSecret);
  $content = $connection->get("account/verify_credentials");

  $statuses = $connection->get("statuses/home_timeline", ["count" => 1, "exclude_replies" => true]);
  $search = $connection->get("search/tweets", ["q" => "Estonia", "count" => 1]);

  print_r($search);
?>