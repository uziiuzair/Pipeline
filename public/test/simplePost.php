<?php 

$data = array(
    'userID'      => 'a7664093-502e4d2b-bf30-25a2b26d6021',
    'itemKind'    => 0,
    'value'       => 1,
    'description' => 'Boa saudaÁ„o.',
    'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
);

$url = "http://pipelines.dev/public/calls.php?c=other";    
$content = json_encode($data);
print_r($content);

echo "<br><br>";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("
		<style>*{margin:0;padding:0;} body {font-family:Lato,sans-serif; padding:20px;font-weight:300;color:#111;}</style>
    	Error: call to URL $url failed with status $status <br>, response $json_response ,<br> curl_error " . curl_error($curl) . ",<br> curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);

?>