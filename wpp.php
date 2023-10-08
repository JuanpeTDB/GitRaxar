<?php

require_once '/path/to/vendor/autoload.php';

use Twilio\Rest\Client;

$sid = getenv("AC20f70cc983e8948b8195a38d5395c8d8");
$token = getenv("13f6a88c2a4123bd90048cdd96a9d223");
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("whatsapp:+59891290442", // to
                           [
                               "from" => "whatsapp:+14155238886",
                               "body" => "Hello, there!"
                           ]
                  );

print($message->sid);

?>