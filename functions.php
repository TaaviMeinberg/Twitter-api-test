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
  $search = $connection->get("search/tweets", ["q" => "eesti", "result_type"=>"recent", "lang"=>"et", "count" => 10]);

  #THIS FOREACH WAS MADE POSSIBLE THANKS TO MAREK KIVIKINK
  foreach ($search->statuses as $item) {
    if(isset($item->id_str)){
      $id_str = $item->id_str;
      echo $id_str;
      $response = file_get_contents("https://publish.twitter.com/oembed?url=https://twitter.com/Interior/status/$id_str");
      $jsonObj =json_decode($response);
      echo($jsonObj->html);
      echo('<br>');
    }
  }




?>