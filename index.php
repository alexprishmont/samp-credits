<?php
/*


        Author Aleksandr Prišmont
        @ 2017


*/
error_reporting (-1);

session_start ();

require_once ("core/config.php");
require_once ("core/database.php");

$mysql = new mySQL ($database['host'], $database['password'], $database['user'], $database['dbname']);

if ($site['published'])
  require_once ("assets/template.php");
else
  die("Sistema išjungta!");

if (isset($_POST['login'])) {
  if ($mysql->isUserExist($_POST['login'])) {
    $_SESSION['logged'] = $_POST['login'];
    if (isset($_SESSION['error'])) {
      unset ($_SESSION['error']);
    }
    header ("Location: index.php");
  }
  else {
    $_SESSION['error'] = 'Toks žaidėjas neegzistuoja mūsų duomenų bazėje!';
    header ("Location: index.php");
  }
}
?>
