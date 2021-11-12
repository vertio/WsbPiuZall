<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../src/assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/css/main.css">
    <link rel="stylesheet" type="text/css" href="../../dist/css/test.css">
    <title>kantor Walut</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="../../index.html">WSBProjektowanieInterfejsówUżytkownikaZaliczenie</a>
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

      <div class="header">
      <h2>Podaj kwotę w PLN i wybierz walutę</h2>
	    <form method="GET" action="convert.php">
        <input type="text" name="from" placeholder="From" /> <br />
        <input type="text" name="to" placeholder="To" /> <br />
        <input type="number" name="amount" min="1" placeholder="Amount" /> <br />
        <input type="submit" value="Convert" /> <br />
      </form>
      </div>

      <div class="CurrencyCard1">
        <div class="cardbody">
          <?php
            $context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
            $url = 'http://api.nbp.pl/api/exchangerates/rates/A/USD';
            $xml = file_get_contents($url, false, $context);
            $xml = simplexml_load_string($xml);
            echo $xml->Currency . "<br>";
            echo $xml->Rates->Rate->Mid . "<br>";
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
            echo $xml->Currency . "<br>";
            echo $xml->Rates->Rate->Mid . "<br>";
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
            echo $xml->Currency . "<br>";
            echo $xml->Rates->Rate->Mid . "<br>";
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
            echo $xml->Currency . "<br>";
            echo $xml->Rates->Rate->Mid . "<br>";
          ?>
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