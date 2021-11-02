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

      <!-- skrypt conenct to db -->
      <?php //skrypt1 
        $con = mysqli_connect('localhost','root');
        $db = mysqli_select_db($con,'[nazwa_bazy]');
        //var_export($db);
        $que = "SELECT informacja, wart_min, wart_max from [nazwa_bazy];";
        $ans = mysqli_query($con,$que);
        //var_dump($ans);
        // while($row = mysqli_fetch_row($ans)){
        // 	echo "<tr>";
        // 	echo "<td>".$row['0']."</td>"."<td>".$row['1']."</td><td>".$row['2']."</td></tr>";
        // }
		
		  ?>
      <!-- Formularz BMI -->
<form action="" method="POST">
  <div class="row mb-3">
    <label for="weight" class="col-sm-2 col-form-label">Waga</label>
    <div class="col-sm-10">
      <input type="number" name="waga" class="form-control" id="inputEmail3" placeholder="Podaj swoją wagę">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="height" class="col-sm-2 col-form-label">Wzrost</label>
    <div class="col-sm-10">
      <input type="number" name="wzrost" class="form-control" id="inputPassword3" placeholder="Podaj swój wzrost">
    </div>
  </div>

  <div class="row mb-3">
      <input class="button" type="submit" value="oblicz">
  </div>
</form>
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
				$que = "INSERT INTO wynik (bmi_id,data_pomiaru,wynik) Values('3','$data','27');" ;
			}
		
		
		}
		mysqli_close($con);
		?>
      <footer>
          <div class="ending">
              <p>Krzysztof Drzewiecki 114939 grIII_inf_nw_5 </p>
          </div>
      </footer>
   <script src="../../src/js/index.js"></script>
   <script src="../../src/assets/lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>