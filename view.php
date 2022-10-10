<?php 
$title = 'View customer';
require_once 'Includes/header.php';
require_once 'db/conn.php';


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $crud -> getAttendeeDetail($id);?>
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $result['firstname'].' '.$result['last_name']?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['name']?></h6>
      <p class="card-text">We will contact you phone <?php echo $result['contactnumber']. ' or via email on '. $result['emailaddress']?></p>
      <p class="card-text">Date of Birth: <?php echo $result['dateofbirth']?></p>
    </div>
  </div>
  <br>
  <a href="viewrecords.php" class="btn btn-outline-primary btn-sm">Back to Records</a>
  <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-primary btn-sm">Edit</a>
  <a onclick="return confirm('Are you sure you want to delete the record?')" href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger btn-sm">Delete</a> 
<?php }else{
  echo '<h2 class="text-danger text-center"> Please select conference attendee</h2>';
  header("Location: viewrecords.php");
}
?>


<?php require_once 'includes/footer.php'; ?>