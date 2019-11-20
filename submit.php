<?php


$servername = "localhost";
$username= "root";
$password="";
$dbname="db1";

//panggil API Flip
$myObj=new \stdClass();
$myObj->bank_code = $_POST['bank_code'];
$myObj->account_number = $_POST['acount_number'];
$myObj->amount = $_POST['amount'];
$myObj->remark = $_POST['remark'];

$myJSON = json_encode($myObj);

echo $myJSON;
echo "<br/>";
$curl = curl_init();
$url="https://nextar.flip.id/disburse";

curl_setopt($curl, CURLOPT_POST, 1);    
curl_setopt($curl, CURLOPT_POSTFIELDS, $myJSON);

curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($curl, CURLOPT_USERPWD, "HyzioY7LP6ZoO7nTYKbG8O4ISkyWnX1JvAEVAhtWKZumooCzqp41");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;



?>






















