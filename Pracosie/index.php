<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="" method="post">
		<p>Imie: <input type="text" name="imie"></p>
		<p>Nazwisko: <input type="text" name="nazwisko"></p>
		<p>MiejsceUr: <input type="text" name="miejur"></p>
		<p>Bank: <input type="text" name="bank"></p>
		<p>Pensja: <input type="text" name="pensja"></p>
		<p>Zainteresowania: <input type="text" name="Zainter"></p>
		<p>Wykształcenie:
			<select name="Wykszt">
				<option value="podstawowe">podstawowe</option>
				<option value="srednie">srednie</option>
				<option value="wyzsze">wyzsze</option>
				<option value="zawodowe">zawodowe</option>
				<option value="podyplomowe">podyplomowe</option>
			</select></p>
		<p>Język:
			<select name="JezOB">
				<option value="niemiecki">niemiecki</option>
				<option value="rosyjski">rosyjski</option>
				<option value="angielski" selected>angielski</option>
				<option value="grecki">grecki</option>
				<option value="francuski">francuski</option>
				<option value="portugalski">portugalski</option>
			</select></p>
		<p>Wydział:
			<select name="Wydzial">
				<option value="Transport">transport</option>
				<option value="Serwis">serwis</option>
				<option value="Eksport">eksport</option>
				<option value="Magazyn">magazyn</option>
				<option value="Kadry">kadry</option>
				<option value="Produkcja">produkcja</option>
				<option value="Ochrona">ochrona</option>
				<option value="Administracja">administracja</option>
				<option value="Zaopatrzenie">zaopatrzenie</option>
			</select></p>
		<input type="submit" name="wyslij" value="Wyslij">
	</form>
<?php
if(isset($_POST['wyslij'])){
	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$miejur=$_POST['miejur'];
	$bank=$_POST['bank'];
	$pensja=$_POST['pensja'];
	$zaint=$_POST['Zainter'];
	$wyksz=$_POST['Wykszt'];
	$jezyk=$_POST['JezOB'];
	$wydzial=$_POST['Wydzial'];
	if($imie!=""){
		if($nazwisko!=""){
			if($miejur!=""){
				if($bank!=""){
					if($pensja!="" || $pensja<!0){
						if($zaint!=""){
							$uchwyt=mysqli_connect("localhost","root","","pracusie");
							mysqli_set_charset($uchwyt,"utf8");
								$zap="INSERT INTO pracusie VALUES(Null,'$nazwisko','$imie','$miejur','$bank',$pensja,'$wydzial','$zaint','$wyksz','$jezyk')";
							$wyn=mysqli_query($uchwyt,$zap);
							if($wyn) echo "<h2>Zostałeś zapisany do bazy</h2>";
								else echo "<h2>Błąd za blędem</h2>";
								$zap2="SELECT * FROM pracusie;";
							$wyn2=mysqli_query($uchwyt,$zap2);
							echo "<table>";
								echo "<tr><th>IDRek</th><th>Nazwisko</th><th>Imie</th><th>MiejUrodz</th><th>Bank</th>
								<th>Pensja</th><th>Wydzial</th><th>Zainter</th><th>Wykszt</th><th>JezOB</th></tr>";
								while($tab=mysqli_fetch_assoc($wyn2)){
								$IDRek=$tab["IDRek"];
								$Nazwisko=$tab["Nazwisko"];
								$Imie=$tab["Imie"];
								$MiejUrodz=$tab["MiejUrodz"];
								$Bank=$tab["Bank"];
								$Pensja=$tab["Pensja"];
								$Wydzial=$tab["Wydzial"];
								$Zainter=$tab["Zainter"];
								$Wykszt=$tab["Wykszt"];
								$JezOB=$tab["JezOb"];
									echo "<tr><th>$IDRek</th><th>$Nazwisko</th><th>$Imie</th><th>$MiejUrodz</th><th>$Bank</th>
									<th>$Pensja</th><th>$Wydzial</th><th>$Zainter</th><th>$Wykszt</th><th>$JezOB</th>
									</tr>";
								}
							echo "</table>";
							mysqli_close($uchwyt);
						}else echo "<h2>Pole zainteresowanie nie może być puste</h2>";
					}else echo "<h2>Pole pensja nie może być puste</h2>";
				}else echo "<h2>Pole bank nie może być puste</h2>";
			}else echo "<h2>Pole miejsce urodzenia nie może być puste</h2>";
		}else echo "<h2>Pole nazwisko nie może być puste</h2>";
	}else echo "<h2>Pole imie nie może być puste</h2>";
}
?>
</body>
</html>