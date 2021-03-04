<?php 
include 'db.php';
$query = "SELECT * FROM questions";
$total_questions = mysqli_num_rows(mysqli_query($connection,$query));


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
		<h2 class="mt-5">Test Your PHP Knowledge</h2>
		<p>
			This is a multiple choice quiz to test your PHP Knowledge.
		</p>
			<ul>
				<li><strong>Number of Questions:</strong><?php echo $total_questions; ?> </li>
				<li><strong>Type:</strong> Multiple Choice</li>
				<li><strong>Estimated Time:</strong> <?php echo $total_questions*1.5; ?></li>

			</ul>

		<a href="question.php?n=1" class="start btn btn-light m-2 p-2 pl-2" data-mdb-ripple-color="dark">Start Quiz</a>

	</div>
</main>
<footer class="bg-light text-center text-lg-start" style="position:absolute;bottom:0;width:100%;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
   <p>Copyright &copy; Sanket Bhattacharya</p>
  </div>
  <!-- Copyright -->
</footer>
