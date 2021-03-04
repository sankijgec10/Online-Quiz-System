<?php 
	include 'db.php';
	session_start(); 
	//Set Question Number
	$number = $_GET['n'];

	//Query for the Question
	$query = "SELECT * FROM questions WHERE question_number = $number";

	// Get the question
	$result = mysqli_query($connection,$query);
	$question = mysqli_fetch_assoc($result); 

	//Get Choices
	$query = "SELECT * FROM options WHERE question_number = $number";
	$choices = mysqli_query($connection,$query);
	// Get Total questions
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
	<div class="container">
	<div class="card m-5">
	
	<div class="card-text p-3">
	
	<main>
			<div class="container">
				<div class="current">Question <?php echo $number; ?> of <?php echo $total_questions; ?> </div>
				<p class="question"><?php echo $question['question_text']; ?> </p>
				<form method="POST" action="process.php">
					<ul class="choicess">
						<?php while($row=mysqli_fetch_assoc($choices)){ ?>
						<li><input type="radio" name="choice" value="<?php echo $row['id']; ?>"><?php echo $row['coption']; ?></li>
						<?php } ?>
						
						
					</ul>
					<input type="hidden" name="number" value="<?php echo $number; ?>">
					<input type="submit" name="submit" value="Submit" class="btn btn-primary">


				</form>
				

			</div>

	</main>

	</div>
	</div>
	</div>
<footer class="bg-light text-center text-lg-start" style="position:absolute;bottom:0;width:100%;">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
   <p>Copyright &copy; Sanket Bhattacharya</p>
  </div>
  <!-- Copyright -->
</footer>
</body>
</html>