<?php
session_start ();
require_once ("../config.php");
$price = explode (" eurų", $_GET['price']);
$amount = $price[0]*100;

require_once('WebToPay.php');

function get_self_url() {
    $s = substr(strtolower($_SERVER['SERVER_PROTOCOL']), 0,
                strpos($_SERVER['SERVER_PROTOCOL'], '/'));

    if (!empty($_SERVER["HTTPS"])) {
        $s .= ($_SERVER["HTTPS"] == "on") ? "s" : "";
    }

    $s .= '://'.$_SERVER['HTTP_HOST'];

    if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != '80') {
        $s .= ':'.$_SERVER['SERVER_PORT'];
    }

    $s .= dirname($_SERVER['SCRIPT_NAME']);

    return $s;
}

try {
    $self_url = get_self_url();

    $request = WebToPay::redirectToPayment(array(
        'projectid'     => $payment_api['projectid'],
        'sign_password' => $payment_api['password'],
        'orderid'       => rand (1, 100000),
        'amount'        => $amount,
        'currency'      => 'EUR',
        'country'       => 'LT',
        'accepturl'     => $self_url.'/accept.php',
        'cancelurl'     => $self_url.'/cancel.php',
        'callbackurl'   => $self_url.'/callback.php',
        'test'          => $payment_api['test'],
    ));
} catch (WebToPayException $e) {
    // handle exception
}
