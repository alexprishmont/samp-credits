<?php
session_start ();
require_once ("../config.php");
require_once('WebToPay.php');
require_once ("../database.php");
$mysql = new mySQL ($database['host'], $database['password'], $database['user'], $database['dbname']);

try {
    $response = WebToPay::checkResponse($_GET, array(
        'projectid'     => $payment_api['projectid'],
        'sign_password' => $payment_api['password'],
    ));

    if ($response['test'] !== '0') {
        throw new Exception('Testing, real payment was not made');
    }
    if ($response['type'] !== 'macro') {
        throw new Exception('Only macro payment callbacks are accepted');
    }

    $orderId = $response['orderid'];
    $amount = $response['amount'];
    $currency = $response['currency'];

    $amount = $amount/100;
    $credits = $amout/$credit_price;

    $result = $mysql->query(
      "update ".$payment_api['usertable']." set ".$payment_api['user_credits']."= ".$payment_api['user_credits']."+? where ".$payment_api['user_name']."=? limit 1",
      array($credits, $_SESSION['logged'])
    );
    if ($result) {
      echo 'OK';
    }
} catch (Exception $e) {
    echo get_class($e) . ': ' . $e->getMessage();
}
