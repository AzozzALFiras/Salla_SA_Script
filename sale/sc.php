<?php

// Developer By : Azozz ALFiras
// 2021/10/1

//error_reporting(0);
function SentRequest3zozz(string $url, string $number, string $bady) {
$Response3zozz = stream_context_create([
"http" => [
"method"        => "POST",
'header'  => "Content-type: application/x-www-form-urlencoded",
'header'  => "3zozz ALFiras",
"content"       => http_build_query([
'phone' => $number,
'body' => $bady
]),
"ignore_errors" => true,
],
]);

$response = file_get_contents($url, false, $Response3zozz);


$status_line = $http_response_header[0];

preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);

$status = $match[1];

if ($status !== "200") {
throw new RuntimeException("unexpected response status: {$status_line}\n" . $response);
}



echo $response;
}

$NSNumber = "9647740681785";
$NSMessages = "Hello 3zozz Welcome to your account to ibad3 sala...!";
echo SentRequest3zozz("https://api.chat-api.com/instance341334/sendMessage?token=1zn5vmfbkb84a5rq",$NSNumber,$NSMessages);



?>
