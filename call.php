<?php
//Requires libcurl

const key = "c472cd79-5362-4c01-8787-9e83a01f91a4";
const secret = "Ozd3bic6BU+CmWucQwuMSA==";
const to = "+919381827213";
const fromNumber = "+447520662424";
const locale = "ISO 3166-1 alpha-2 en-IN";

$payload = [
  "method" => "ttsCallout",
  "ttsCallout" => [
    "cli" => fromNumber,
    "destination" => [
      "type" => "number",
      "endpoint" => to
    ],
    "locale" => locale,
    "text" => "Hello there, Your booking is confirmed with PMMS."
  ]
];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_HTTPHEADER => [
    "Content-Type: application/json",
    "Authorization: Basic " . base64_encode(key . ":" . secret)
  ],
  CURLOPT_POSTFIELDS => json_encode($payload),
  CURLOPT_URL => "https://calling.api.sinch.com/calling/v1/callouts",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
]);

$response = curl_exec($curl);
$error = curl_error($curl);

curl_close($curl);

if ($error) {
  echo "cURL Error #:" . $error;
  echo "Call unsent to admin because of network issues";
} else {
  echo $response;
  echo "Called admin, some one will contact you..";
}
echo "<a href='packerssystem/index.html'>Back</a>";
?>



