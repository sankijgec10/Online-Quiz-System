<?php 

session_start();

?>

<html>
<head>
	<title>PHP Quizer</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.2.0/mdb.min.css" rel="stylesheet"/>
</head>
<body>

	<header>
	<nav class="navbar navbar-light bg-light">
  		<div class="container">
    		<a class="navbar-brand" href="#">PHP Quizer</a>
  		</div>
	</nav>
	</header>

	<main>
			<div class="container mt-5">
				<h2 class="mt-5">Your Result</h2>
				<p>Congratulation You have completed this test succesfully.</p>
				<p>Your <strong>Score</strong> is <?php echo $_SESSION['score']; ?>  </p>
				<?php unset($_SESSION['score']); ?>
				
			</div>

	</main>


<footer class="bg-light text-center text-lg-start" style="position:absolute;bottom:0;width:100%;">
  <!-- Copyright -->
	<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
   		<p>Copyright &copy; Sanket Bhattacharya</p>
  	</div>
  <!-- Copyright -->
</footer>
</body>
</html>