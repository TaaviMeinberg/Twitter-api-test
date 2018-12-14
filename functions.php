<?php
  require './auth.php';
  $content = $connection->get("account/verify_credentials");

  $statuses = $connection->get("statuses/home_timeline", ["count" => 1, "exclude_replies" => true]);
if (isset($_REQUEST["q"])) {
  $search = $connection->get("search/tweets", ["q" => "%23Estonia", "result_type"=>"recent", "count" => 6, "max_id" => $_REQUEST["q"]]);
}


  #THIS FOREACH WAS MADE POSSIBLE THANKS TO MAREK KIVIKINK
  $i=1;
  foreach ($search->statuses as $item) {
      $id_str = $item->id_str;
      if ($i<6) {
        $response = file_get_contents("https://publish.twitter.com/oembed?url=https://twitter.com/Interior/status/$id_str");
        $jsonObj =json_decode($response);
        echo('<div id="'. $id_str .'">' . $jsonObj->html. '</div>');
      } else {
        echo('<div id="'. $id_str .'"></div>');
      }
    $i++;
  }




?>