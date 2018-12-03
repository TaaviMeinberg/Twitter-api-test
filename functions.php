<?php
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

    print  $server_output ;
?>