<?php  include 'db.php';
if(isset($_POST['submit'])){
	$question_number = $_POST['question_number'];
	$question_text = $_POST['question_text'];
	$correct_choice = $_POST['correct_choice'];
	// Choice Array
	$choice = array();
	$choice[1] = $_POST['choice1'];
	$choice[2] = $_POST['choice2'];
	$choice[3] = $_POST['choice3'];
	$choice[4] = $_POST['choice4'];
	$choice[5] = $_POST['choice5'];

 // First Query for Questions Table

	$query = "INSERT INTO questions (";
	$query .= "question_number, question_text )";
	$query .= "VALUES (";
	$query .= " '{$question_number}','{$question_text}' ";
	$query .= ")";

	$result = mysqli_query($connection,$query);
	
	//Validate First Query
	if($result){
		foreach($choice as $option => $value){
			if($value != ""){
				if($correct_choice == $option){
					$is_correct = 1;
				}else{
					$is_correct = 0;
				}
			


				//Second Query for Choices Table
				$query = "INSERT INTO options (";
				$query .= "question_number,is_correct,coption)";
				$query .= " VALUES (";
				$query .=  "'{$question_number}','{$is_correct}','{$value}' ";
				$query .= ")";

				$insert_row = mysqli_query($connection,$query);
				// Validate Insertion of Choices

				if($insert_row){
					continue;
				}else{
					die("2nd Query for Choices could not be executed" . $query);
					
				}

			}
		}
		$message = "Question has been added successfully";
	}

	




}

		$query = "SELECT * FROM questions";
		$questions = mysqli_query($connection,$query);
		$total = mysqli_num_rows($questions);
		$next = $total+1;
		

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
  		<div class="card-body">
    		<h5 class="card-title">Add a Question</h5>
	<?php if(isset($message)){
					echo "<h4>" . $message . "</h4>";
	} ?>
    		<div class="card-text">
<main>
	<div class="container">
		<form method="POST" action="add.php">
			<p>
				<label>Question Number:</label>
				<input type="number" name="question_number" value="<?php echo $next;  ?>">
			</p>
			<p>
				<label>Question Text:</label>
				<input type="text" name="question_text">
			</p>
			<p>
				<label>Choice 1:</label>
				<input type="text" name="choice1">
			</p>
			<p>
				<label>Choice 2:</label>
				<input type="text" name="choice2">
			</p>
			<p>
				<label>Choice 3:</label>
				<input type="text" name="choice3">
			</p>
			<p>
				<label>Choice 4:</label>
				<input type="text" name="choice4">
			</p>
			<p>
				<label>Choice 5:</label>
				<input type="text" name="choice5">
			</p>
			<p>
				<label>Correct Option Number</label>
				<input type="number" name="correct_choice">
			</p>
				<input type="submit" name="submit" value ="submit">


		</form>
	</div>

</main>
</div>
</div>
</div>
</div>






















	


	<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1)">
   <p>Copyright &copy; Sanket Bhattacharya</p>
  </div>
  <!-- Copyright -->
</footer>








</body>
</html>