<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Humble Pokeapi by Alexx</title>

	<meta name="description" content="Source code">
	<meta name="author" content="Alejandro G. Vera">

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- CSS only -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<!-- JS, Popper.js, and jQuery -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</head>

<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="navbar-toggler-icon"></span>
					</button> <a class="navbar-brand" href="#">Humble PokeAPI... by Alejandro G. Vera</a>
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="navbar-nav">
						</ul>
						<form class="form-inline" method="get">
							<input class="form-control mr-sm-2" type="number" name="numero">
							<button class="btn btn-primary my-2 my-sm-0" type="submit">
								Número de pokemon (entre 1 y 300 o prueben más!!!)
							</button>
						</form>
						<?php

						

						if (isset($_GET["numero"])) {

							global $pokemon;
							$pokemon = &$_GET["numero"];

							//echo "El pokemon es: " . $pokemon;
						}else{

						$pokemon = '1';
						}
						$api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
						curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($api);
						curl_close($api);

						$json = json_decode($response);

						?>
					</div>
				</nav>
			</div>
		</div>
		<br><br>
		<?php echo "<h4>" . "Nombre:" . $json->forms[0]->name . "<h4>"; ?>
		<div class="row">
			<div class="col-md-6 borde">
				<?php
				echo '<h3>HABILIDADES</h3>';
				foreach ($json->abilities as $k => $v) {
					echo "<p>" . $v->ability->name . "<p>" . '<br>';
				} ?>
				<h2>Foto frente:</h2>
				<?php echo '<img src="' . $json->sprites->front_default . '" width="200">'; ?>
			</div>
			<div class="col-md-6 borde">
				<?php
				echo '<h3>TIPO</h3>';
				echo "<p>" . $json->types[0]->type->name . "<p>";

				?>
				<h2>Foto dorso:</h2><?php echo '<img src="' . $json->sprites->back_default . '" width="200">'; ?>
			</div>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>
