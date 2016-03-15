<?php 
define('TARGET_DIR', '/home/gloryque/public_html/partner');
define('REMOTE_REPOSITORY', 'https://github.com/manjeshpv/quarc.ui.partner.dist');
define('BRANCH', 'master');


//API Url
$url = 'https://hooks.slack.com/services/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';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$payload = array(
   'text' => REMOTE_REPOSITORY . '/'. BRANCH.' pulled to folder '. TARGET_DIR
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($payload);
curl_setopt($ch, CURLOPT_VERBOSE, true);

curl_setopt($ch, CURLOPT_STDERR, fopen(dirname(__FILE__).'/errorlog.txt', 'w'));
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

//Execute the request
$result = curl_exec($ch);


