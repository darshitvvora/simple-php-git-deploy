<?php
/**
 * Created by PhpStorm.
 * User: Manjesh
 * Date: 17-03-2016
 * Time: 09:48
 */


function slack_notify($text = "Blank Notification"){
    if (SLACK_URL) {
        //Initiate cURL.
        $ch = curl_init(SLACK_URL);

        //The JSON data.
        $payload = array(
            'text' => $text
        );

        //Encode the array into JSON.
        $jsonDataEncoded = json_encode($payload);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        //Execute the request
        $result = curl_exec($ch);

        echo "Notification Sent to Slack" . $text;
    }
}