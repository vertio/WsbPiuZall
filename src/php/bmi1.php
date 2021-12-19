<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../src/assets/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../dist/css/main.css">
    <title>Kalkulator bmi</title>
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
      <!-- skrypt1: podłączenia do bazy danych -->
      <?php //skrypt1 
        $con = mysqli_connect('localhost','root',);
        $db = mysqli_select_db($con,'wsbpiuzal');
?>
      <!-- Formularz BMI -->
<div class="wrapper">
  <form action="" method="POST">
  <div class="header">
    <h1 class="h-title">Kalkulator bmi</h1>
  </div>
    <div class="WeightForm">
      <label for="inputWeight" class="Weight-form-label">Waga</label>
      <div class="WeightFormControl">
      <input type="number" name="waga" class="Weight-form-control" id="inputWeight" placeholder="podaj swoją wagę">
      </div>
    </div>
    <div class="HeightFrom">
      <label for="inputHeight" class="Height-form-label">Wzrost</label>
      <div class="HeightFromControl">
      <input type="number" name="wzrost" class="Height-form-control" id="inputheight" placeholder="podaj swoją wzrost">
      </div>
    </div>
    <div class="ButtonControl">
    <input class="button" type="submit" value="oblicz">
    </div>
    <div class="BMI">
    <!-- skrypt2: przeliczanie wartości wagi oraz wzrostu potrzebnych do podania wskaźnika BMI. 
    Jeśli wartości są podane to wynik jest zapisywany w bazie danych na serwerze z datą dodania -->
    <?php
    if(isset($_POST['waga'])&&(isset($_POST['wzrost']))){
		$w = $_POST['waga'];
		$wz = $_POST['wzrost'];
		$bmi = ($w*10000)/($wz*$wz);
		$data = date("Y-m-d");
		Echo "Twoja waga: ".$w;
		echo " Twój wzrost: ".$wz;
		echo "<br> BMI wynosi: ".$bmi;
			if ($bmi >= 31){
				$que = "INSERT INTO bmi (bmi_id,data_pomiaru,wynik) Values('3','$data','27');" ;
			}
		}
		mysqli_close($con);
		?>
    </div>
  </form>
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