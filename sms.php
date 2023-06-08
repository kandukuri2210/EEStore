<?php
$service_plan_id = "d36e1376f231450782a2fc5669efcf05";
$bearer_token = "17eab8b21ee04f55b437709740215b19";

//Any phone number assigned to your API
$send_from = "+447520662424";
//May be several, separate with a comma ,
$recipient_phone_numbers = "+919381827213"; 
$message = "Test message to {$recipient_phone_numbers} from {$send_from}. Hello, admin. There is a booking for a service in EEStore.";

// Check recipient_phone_numbers for multiple numbers and make it an array.
if(stristr($recipient_phone_numbers, ',')){
  $recipient_phone_numbers = explode(',', $recipient_phone_numbers);
}else{
  $recipient_phone_numbers = [$recipient_phone_numbers];
}

// Set necessary fields to be JSON encoded
$content = [
  'to' => array_values($recipient_phone_numbers),
  'from' => $send_from,
  'body' => $message
];

$data = json_encode($content);

$ch = curl_init("https://us.sms.api.sinch.com/xms/v1/{$service_plan_id}/batches");
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BEARER);
curl_setopt($ch, CURLOPT_XOAUTH2_BEARER, $bearer_token);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$result = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
    echo "<b>Message unsent to admin due to network issues, but admin will be knowing about your booking through the portal</b>";
    echo "<a href='users/confirmbooking.php'>Confirm here</a>";
} else {
    echo $result;
    echo "Message sent successfully to admin!!";
    echo "<a href='users/confirmbooking.php'>Confirm here</a>";
    //header("Location:users/confirmbooking.php");
}
curl_close($ch);
?>