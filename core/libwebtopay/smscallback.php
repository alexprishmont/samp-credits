<?php
require_once('WebToPay.php');
require_once ('../config.php');
require_once ('../database.php');

$mysql = new mySQL ($database['host'], $database['password'], $database['user'], $database['dbname']);

try {
  $response = WebToPay::checkResponse ($_GET, array(
    'projectid' => $payment_api['projectid'],
    'sign_password' => $payment_api['password']
  ));
  $sms = explode (" ", $response['sms']);
  $sqlid = $sms[1];

  $camount = $response['amount']*100;
  $credits = $camount/$credit_price;

  if (!empty($sqlid)) {
    $result = $mysql->query (
      "update ".$payment_api['usertable']." set ".$payment_api['user_credits']." = ".$payment_api['user_credits']." + ? where ".$payment_api['user_name']." = ? limit 1",
      array($credits, $sqlid)
    );
    if ($result) {
      echo 'OK Jus sėkmingai įsigyjote paslaugas mūsų projekte!';
    }
  }
}
catch (Exception $e) {
  echo get_class ($e).": ".$e->getMessage();
}
?>
