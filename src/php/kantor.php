<?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/USD';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            if ($_POST['from']=="USD")
            {
                $value = $xml->Rates->Rate->Mid;
               
            }  
          ?>
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/EUR';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            if ($_POST['from']=="EUR")
            {
                $value = $xml->Rates->Rate->Mid;
               
            }
          ?>
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/CHF';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            if ($_POST['from']=="CHF")
            {
                $value = $xml->Rates->Rate->Mid;
                
            }
          ?>
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/THB';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            if ($_POST['from']=="BAT")
            {
                $value = $xml->Rates->Rate->Mid;
                
            }
          ?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../src/assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/css/main.css">
    <title>kantor Walut</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../index.html">WSBProjektowanieInterfejs??wU??ytkownikaZaliczenie</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="bmi1.php">Kalkulator BMI</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="kantor.php">Kantor Walut</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="login.php">Zaloguj</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

          <!-- formularz kantora walut  -->
      <div class="currency_exchange">
        <form action="" method="POST">
        <div class="header">
          <h1 class="title">Kantor Walut</h1>
        </div>
        <div class="currency_body">
          <h4 class="">Podaj kwot??</h4>
          <input type="number" name="id_value" value="1">
        </div>
        <div class="exchange_select">
          <div class="exchange_select_from">
            <h4 class="h4from">from</h4>
            <div class="exchenge_select_country">
            <select class="ex_from" name="from">
              <option value="USD">USD</option>
              <option value="EUR">EUR</option>
              <option value="CHF">CHF</option>
              <option value="BAT">BAT</option>
            </select>
          </div>
          </div>
          <div class="exchange_select_line"></div>
          <div class="exchange_select_to">
            <h4 class="h4to">To</h4>
            <div class="exchenge_select_country">
            <select class="ex_to" name="to">
            <option value="PLN">PLN</option>
            </select>
          </div>
          </div>
        </div>
        <div class="exchange_rate">
          <!-- skrypt2: pobieranie warto??ci z p??l i obliczanie warto??ci po przewalutowaniu warto??ci kwoty -->
          <?php 
               if((isset($_POST['id_value']))&&(isset($_POST['from']))&&(isset($_POST['to']))){
              $value_e = $_POST['id_value'] * $value;
              echo $_POST['id_value'] . " ". $_POST['from']. " = ".$value_e.$_POST['to']; 
               }
          ?>
        </div>
        <div class="exchange_convert">
            <input type="submit" value="przelicz">
          </div>
        </form>
        
        <!-- elementy wy??wietlaj??ce aktualny kurs walut na stronie  -->
      </div>
    <div class="currency_rate">
      <div class="CurrencyCard1">
        <div class="cardbody">
          <!-- skrypt3: pobieranie warto??ci z pliku XML z strony NBP.api.pl i wy??wietalnie ich na stronie -->
          <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/USD';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            echo  '<div class="header_currency"><h4>' . $xml->Currency . '</h4></div>';
            echo '<div class="body_currency"><p>' . $xml->Rates->Rate->Mid . ' $ </p></div>';
            if ($_POST['from']=="USD")
            {
                $value = $xml->Rates->Rate->Mid;
               
            }
            
          ?>
        </div>
      </div>
      <div class="CurrencyCard2">
      <div class="cardbody">
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/EUR';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            echo  '<div class="header_currency"><h4>' . $xml->Currency .  '</h4></div>';
            echo '<div class="body_currency"><p>' . $xml->Rates->Rate->Mid . ' ??? </p></div>';
            if ($_POST['from']=="EUR")
            {
                $value = $xml->Rates->Rate->Mid;

               
            }
          ?>
      </div>
      </div>
      <div class="CurrencyCard3">
      <div class="cardbody">
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/CHF';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            echo  '<div class="header_currency"><h4>' . $xml->Currency . '</h4></div>';
            echo '<div class="body_currency"><p>' . $xml->Rates->Rate->Mid . ' CHF </p></div>';
            if ($_POST['from']=="CHF")
            {
                $value = $xml->Rates->Rate->Mid;
                
            }
          ?>
      </div>
      </div>

      <div class="CurrencyCard4">
      <div class="cardbody">
      <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/THB';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            echo  '<div class="header_currency"><h4>' . $xml->Currency . '</h4></div>';
            echo '<div class="body_currency"><p>' . $xml->Rates->Rate->Mid . ' Bat</p></div>';
            if ($_POST['from']=="BAT")
            {
                $value = $xml->Rates->Rate->Mid;
                
            }
          ?>
      </div>
      </div>
    </div>
      <footer>
          <div class="ending">
              <p>Krzysztof Drzewiecki 114939 grIII_inf_nw_5 </p>
          </div>
      </footer>
   <script src="../../src/js/index.js"></script>
   <script src="../../src/assets/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>