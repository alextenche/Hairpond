<?php 

if(isset($_POST['submit'])) {
		
	$msg = "submited";
	// pt produs
	$nume = $_POST['nume'];
	$prenume = $_POST['prenume'];
	$numar_ordine = $_POST['numar_ordine'];
	$data_client = $_POST['data_client'];
	$varsta = $_POST['varsta'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];
	$lungime_par = $_POST['lungime_par'];
	
	echo $nume;
	echo $prenume;
	
	if($nume){  // daca exista numele clientului
		if($prenume){  // daca exista prenumele clientului
			$link = mysqli_connect('localhost', 'root', '', 'hairpond');	
			mysqli_query($link, "SET NAMES 'utf8'");
			
			// introduc toate datele clientului in baza de date
			mysqli_query($link,"INSERT INTO clienti ( numar_ordine, data_client, nume, prenume, varsta, telefon, email, lungime_par ) 
							    VALUES ( '$numar_ordine', '$data_client', '$nume' ,'$prenume', '$varsta', '$telefon', '$email', '$lungime_par')" );
			
			
			
		} else {  // nu s-a introdus codul produsului
			echo "Codul produsului este obligatoriu";
		}
	} else {  // nu s-a introdus numele produsului
		"Numele produsului este obligatoriu";
	}
}  // end if $_POST['submit']
?>




<!DOCTYPE html>
<html lang="ro">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
	<title>Hairpond</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/custom.css">
</head>

<body>
  	<header>
	
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:#6AA121" >
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-nav-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand"></a>
				</div>

				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-right">
						<li><a href="index.html">Home</a></li>
						<li ><a href="fisa_client.html">Fisa Client</a></li>
						<li class="active"><a href="fisa_client_2.html">Fișă Client 2</a></li>
					</ul>
				</div><!--/.nav-collapse -->
			</div>	
		</nav>

		<div class="jumbotron" style="background-color:#6AA121; margin-top:20px">
			<div class="container">
				<h2 class="pull-left" id="hairpond" style="color:white">HAIRPOND+Care</h2>
				<h1 class="pull-right" style="color:white; font-size:600%;">Fișă Client</h1>
			</div> <!-- end container -->
		</div> <!-- end jumbotron -->
		
	</header>
  
	<div class="container">
		<form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="fisa_client_2.php">
			<?php echo $msg . "<br>";
				echo $nume . "<br>";
				echo $prenume;		
echo $numar_ordine;	
echo $data_client;	
echo $lungime_par;				?>
			<div class="form-group">
				<label for="numar_ordine" class="col-sm-3 control-label">No:</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="numar_ordine"/>
				</div>
			</div>

			<div class="form-group">
				<label for="data_client" class="col-sm-3 control-label">Data</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="data_client"/>
				</div>
			</div>

			<fieldset>
				<legend>Date Personale</legend>
				<div class="form-group">
					<label for="nume" class="col-sm-3 control-label">Nume</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="nume" />
					</div>
				</div>

				<div class="form-group">
					<label for="prenume" class="col-sm-3 control-label">Prenume</label>
					<div class="col-sm-9">
						<input type="text" class="form-control"  name="prenume"/>
					</div>
				</div>

				<div class="form-group">
					<label for="varsta" class="col-sm-3 control-label">Vârsta</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="varsta"/>
					</div>
				</div>
					
				<div class="form-group">
					<label for="telefon" class="col-sm-3 control-label">Telefon</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="telefon" />
					</div>
				</div>
					
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="email"/>
					</div>
				</div>
			</fieldset>
			
			<fieldset>
				<legend>Caracteristici păr</legend>
				<div class="form-group">
					<label class="col-sm-3 control-label">Lungime păr</label>
					<div class="col-sm-9">
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="lungime_par" value="scurt"/> Scurt </label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="lungime_par" value="mediu"/> Mediu </label>
							</div>
						</div>
						<div class="col-sm-2">
						<div class="radio">
							<label><input type="radio" name="lungime_par" value="lung"/> Lung </label>
						</div>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Textură păr</label>
					<div class="col-sm-9">
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="textura_par" value=""/> Drept </label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="textura_par"/> Ondulat </label>
							</div>
						</div>
						<div class="col-sm-2">
						<div class="radio">
							<label><input type="radio" name="textura_par" /> Creț </label>
						</div>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-sm-3 control-label">Structură păr</label>
					<div class="col-sm-9">
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="structura_par" value=""/> Subțire </label>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="radio">
								<label><input type="radio" name="structura_par"/> Mediu </label>
							</div>
						</div>
						<div class="col-sm-2">
						<div class="radio">
							<label><input type="radio" name="structura_par" /> Gros </label>
						</div>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
				</div>
			
			
			
			<div class="form-group">
				<label for="notes" class="col-sm-3 control-label">Culoare</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" />
				</div>
			</div>
			
			</fieldset>
			
			<fieldset>
				<legend>Stylist</legend>
				
				<div class="form-group">
				<label for="notes" class="col-sm-3 control-label">Nume</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="notes" class="col-sm-3 control-label">Data</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" />
				</div>
			</div>
			
			<div class="form-group">
				<label for="notes" class="col-sm-3 control-label">Servicii realizate</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" />
				</div>
			</div>
				
			</fieldset>
			
			<hr>
			
			 <div class="col-sm-offset-3 col-sm-9">
				<input type="submit" name="submit" class="btn btn-success btn-lg" value="Ok"/>
				<input type="button" class="btn btn-default btn-lg" value="Cancel"/>
			</div>
		</form>
	</div>
	
	<br><br>
	
	<footer style="background-color:#6AA121;">
		<div class="container">
			<p>
				<br>
				<small>Hairpond 2014</small>
				<br>
			</p>
		</div> <!-- end container -->
	</footer>

	


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>