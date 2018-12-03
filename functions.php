<?php
    session_start();
    require 'autoload.php';
    use Abraham\TwitterOAuth\TwitterOAuth;
    define('CONSUMER_KEY', 'vrpdxodNaQcptHAborDccCVUu'); // add your app consumer key between single quotes
    define('CONSUMER_SECRET', 'Cjolq1Ud6qDwzknoMVrXXZlZ2oF1xQddZC93FP5R91wpFY9YaI'); // add your app consumer secret key between single quotes
    define('OAUTH_CALLBACK', 'http://sohaibilyas.com/twapp/callback.php'); // your app callback URL
    if (!isset($_SESSION['access_token'])) {
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
        $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
        $_SESSION['oauth_token'] = $request_token['oauth_token'];
        $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
        $url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
        echo $url;
    } else {
        $access_token = $_SESSION['access_token'];
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $user = $connection->get("account/verify_credentials");
        echo $user->screen_name;
    }




/*

    $ini_array = parse_ini_file("conf.ini");
    print_r($ini_array['APIKey']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"https://api.twitter.com/1.1/search/tweets.json?q=eesti&result_type=popular");
    curl_setopt($ch, CURLOPT_GET, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $headers = [
        'authorization: OAuth oauth_consumer_key="vrpdxodNaQcptHAborDccCVUu", 
        oauth_nonce="kYjzVBB8Y0asabxSWbWovY3uYSQ2pTgmZeNu2VS4cg", oauth_signature="tnnArxj06cWHq44gCs1OSKk/jLY=", 
        oauth_signature_method="HMAC-SHA1", oauth_timestamp="1318622958", 
        oauth_token="2774313751-9k8dLspC7v5ecB5VT03X4iQvcvAl0RmxJxxBkV9", oauth_version="1.0"'
    ];

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $server_output = curl_exec ($ch);

    curl_close ($ch);

    print  $server_output ;*/
?>