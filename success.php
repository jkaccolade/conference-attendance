<?php 
$title = 'Index';
require_once 'Includes/header.php'; 
require_once 'db/conn.php';

//To check if the form was submitted to the page with the necessary details
if (isset($_POST['submit'])) {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $specialty = $_POST['specialty'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];

  //To insert the info into the database and check if the operation returns true or false
  $isSuccess = $crud -> insert($firstname,$lastname,$dob, $email, $contact, $specialty);

  //The if block to be executed if the $isSuccess operation the operation returns true
  if ($isSuccess) {
    include "includes/successmessage.php";?>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title"><?php echo $firstname.' '.$lastname?></h5>
        <h6 class="card-subtitle mb-2 text-muted"><?php echo $specialty?></h6>
        <p class="card-text">We will contact you phone <?php echo $contact. ' or via email on '. $email?></p>
        <p class="card-text">Date of Birth: <?php echo $dob?></p>
      </div>
    </div>

 <?php }

    //The else block to be executed if the $isSuccess operation returns false
  else {
    include "includes/errormessage.php";
  }

}

  //The else that executes if form was not submitted to the page
else {
  include "includes/errormessage.php";
  header("Location: index.php");
}

?>

<?php require_once 'includes/footer.php'; ?>
