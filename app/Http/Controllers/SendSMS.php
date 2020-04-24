<?php
require 'vendor/autoload.php';
use AfricasTalking\SDK\AfricasTalking;
// // api key ="19c4766b63c9b47d7d54e3a69ec437237ae7fc2dc103bec8e580c49f77568f18"
    // $username = 'YOUR_USERNAME'; // use 'sandbox' for development in the test environment
    // $apiKey   = 'YOUR_API_KEY'; // use your sandbox app API key for development in the test environment
    // $AT = new AfricasTalking($username, $apiKey);
// Set your app credentials
$username   = "sandbox";
$apiKey     = "19c4766b63c9b47d7d54e3a69ec437237ae7fc2dc103bec8e580c49f77568f18";

// Initialize the SDK
$AT         = new AfricasTalking($username, $apiKey);

// Get the SMS service
$sms        = $AT->sms();

// Set the numbers you want to send to in international format
$recipients = "+254711XXXYYY,+254733YYYZZZ";

// Set your message
$message    = "I'm a lumberjack and its ok, I sleep all night and I work all day";

// Set your shortCode or senderId
$from       = "myShortCode or mySenderId";

try {
    // Thats it, hit send and we'll take care of the rest
    $result = $sms->send([
        'to'      => $recipients,
        'message' => $message,
        'from'    => $from
    ]);

    print_r($result);
} catch (Exception $e) {
    echo "Error: ".$e->getMessage();
}