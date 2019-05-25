<?php
// Duomenu bazes nustatymai
  $database = [
    "host" => "127.0.0.1",
    "user" => "root",
    "password" => "",
    "dbname" => "rpg"
  ];

// SVETAINES nustatymai
  $site = [
    "title" => "kreditų sistema", // sistemos title
    "published" => true, // ijungti/isjungti sistema
    "forum" => "../index.php" // forum URL
  ];

// PAYSERA nustatymai
  $payment_api = [
    "projectid" => "", // paysera projekto ID
    "password" => "", // paysera projekto slaptazodis
    "usertable" => "players", // mysql zaideju lentele
    "user_credits" => "cash", // mysql zaidejo kreditu row
    "user_name" => "name", // mysql zaidejo vardo row
    "test" => 1 // testavimo rezimo ijungimas
  ];
  $credit_price = 2; // t.y. uz 1 kredita reikes sumoketi 2 eurus
  
// sito tau nereikia keisti.
  $backtoforum =
  '<a href="core/logout.php?forum='.$site['forum'].'" title="grįžti į forumą">Grįžti į foruma</a>';
