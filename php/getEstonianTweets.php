<?php
  require './php/auth.php';
  $content = $connection->get("account/verify_credentials");

  $statuses = $connection->get("statuses/home_timeline", ["count" => 1, "exclude_replies" => true]);
  $search = $connection->get("search/tweets", ["q" => 'geocode:58.595272,25.01360,200km', "result_type"=>"recent","lang"=>"et", "count" => 5]);

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