<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styl3.css" type="text/css">
<title>Twoje BMI</title>
</head>

<body>
<header id="logo">
	<img src="wzor.png" alt="Wzór BMI">
</header>
<header id="header">
	<h1>Oblicz swoje BMI</h1>
</header>
<main>
	<table>
		<tr>
			<th>Interpretacja BMI</th>
			<th>Wartość minimalna</th>
			<th>Wartość maksymalna</th>
		</tr>
		<?php //skrypt1 
		$con = mysqli_connect('localhost','root');
		$db = mysqli_select_db($con,'BMI');
		//var_export($db);
		$que = "SELECT informacja, wart_min, wart_max from bmi;";
		$ans = mysqli_query($con,$que);
		//var_dump($ans);
		while($row = mysqli_fetch_row($ans)){
			echo "<tr>";
			echo "<td>".$row['0']."</td>"."<td>".$row['1']."</td><td>".$row['2']."</td></tr>";
		}
		
		?>
	</table>
</main>

<section id="left">
	<h2>Podaj wagę i wzrost</h2>
	<form action="" method="POST">
		Waga:<input type="number" name="waga" min="1"><br>
		Wzrost w cm:<input type="number" name="wzrost" min="1"><br>
		<input type="submit" value="Oblicz i zapamiętaj wynik">
	</form>
		<?php //skrypt2
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
</section>

<section id="right">
	<img src="rys1.png" alt="ćwiczenia">
</section>

<footer>
	Autor: Jakub Żebrowski
	<a href="kwerendy.txt">Zobacz kwerendy</a>
</footer>













</body>
</html>