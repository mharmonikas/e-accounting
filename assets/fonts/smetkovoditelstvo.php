<!DOCTYPE html>
<html lan="en">
<head>
	<title>Bootstrap</title>
	<meta charset="utf-8">
	<link href='css/bootstrap.css' rel='stylesheet'>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!--<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.mi.js'></script>-->
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<header class="bgimage">
	<div class="container-fluid">
	<h1 class="green-text">Сметководителство</h1>
	<div class="field col-md-6 col-md-offset-10">
	<button type="button" class="btn btn-primary" >Мартин Нацев</button>
	<button type="button" class="btn btn-primary" >Одјави се</button>
	</div>
	<style>
	.green-text{
		color: black;
	}
	.bgimage{
		background-image: 'green_image.jpg'
		background-position: center center;
		background-size: cover;
		height:150px;
	}
	</style>
</div>
</header>
	
	<nav class="navbar navbar-inverse">
		<div class='container-fluid'>
			<div>
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Извештај по:</a>
				</div>
				<!--  dawd -->
				<div class="collapse navbar-collapse" id="mainNavBar">
					<ul class="nav navbar-nav">
						<!-- <li class="active"><a href="#">Home</a></li> -->
						<!-- <li><a href="#">About</a></li> -->
						<!-- <li><a href="#">Contact</a></li> -->
					
					
						<li class="dropdown">
						<a href="#"class="dropdown-toggle" data-toggle="dropdown">Конто <span class="caret" ></span></a>
							<ul class="dropdown-menu">
								<li ><a href="#">Конто 1</a></li>
								<li ><a href="#">Конто 2</a></li>
								<li ><a href="#">Конто 3</a></li>
							</ul>
							
						</li>
						<li class="dropdown">
						<a href="#"class="dropdown-toggle" data-toggle="dropdown">Запис <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li ><a href="#">Запис 1</a></li>
								<li ><a href="#">Запис 2</a></li>
								<li ><a href="#">Запис 3</a></li>
							</ul>
							
						</li>
						<li class="dropdown">
						<a href="#"class="dropdown-toggle" data-toggle="dropdown">Партер <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li ><a href="#">Партнер 1</a></li>
								<li ><a href="#">Партнер 2</a></li>
								<li ><a href="#">Партнер 3</a></li>
							</ul>
							
						</li>
						
						
						
						
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Додади ставка+</a></li>

					</ul>
					
					
				</div>
			</div>
		</div>

		</nav>
		<!--Kontainer 1-->
		<div class="container">

		</div>
		<!--Kontainer 2-->
		<div class="container">

		</div>
			
	
</body>
</html>