<!--------



        Author Aleksandr 'sancio' Prišmont
        @ 2017
        @ pure PHP, jQuery, LESS, mySQL



-------->
<!doctype html>
<html lang="lt">
<head>
  <meta charset="utf-8"/>
  <title><?=$site['title'];?></title>
  <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"/>
</head>
<body>
  <div class="credits">
    <?php if(isset($_SESSION['error'])): ?>
      <div class="error"><?php echo $_SESSION['error']; ?></div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
      <div class="success"><?php echo $_SESSION['success']; ?></div>
    <?php endif; ?>
    <?php if(!isset($_SESSION['logged'])) : ?>
    <div class="container">
      <form method="post" id="userLogin">
        <div>
          <input type="text" placeholder="Žaidimo slapyvardis"  name="login"/>
        </div>
        <button type="submit">Prisijungti</button>
      </form>
    </div>
    <?php else:?>
    <div class="container">
      <div class="hello">Sveikas, <?php echo $_SESSION['logged'];?></div>
      <div class="makro">
        <form method="get" action="core/libwebtopay/redirect.php">
          <input type="hidden" value="<?php echo $credit_price?>" id="ppc"/>
          <div>
            <input id="credits" type="text" placeholder="Įveskite norima kreditų kieki" name="credits"/>
          </div>
          <div>
            <input id="price" type="text2" value="0 eurų" readonly name="price"/>
          </div>
          <button type="submit">Apmokėti</button>
        </form>
      </div>
    </div>
    <?php endif;?>
    <div class="backtoforum">
      <?php echo $backtoforum ?>
    </div>
  </div>
  <script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="assets/js/handler.js"></script>
</body>
</html>
