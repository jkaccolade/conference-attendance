<?php 
$title = 'Edit Details';
require_once 'Includes/header.php';
require_once 'db/conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $results = $crud -> getSpecialties();
    $secResult = $crud -> getAttendeeDetail($id);
?>
 <a href="viewrecords.php" class="btn btn-outline-primary btn-sm">Back to Records</a>
 <br>
 <br>
    
    <form method="post" action="update.php">
        <input type="hidden" name="id" value="<?php echo $secResult['attendee_id']?>"></input>
        <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $secResult['firstname']?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $secResult['last_name']?>">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $secResult['dateofbirth']?>">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select id="specialty" class="form-select" name="specialty">
                <?php
                foreach ($results as $r) {
                //To show all the available specialty from the specialty table and assingn the primary key as the value such that the primary key is entered into the attendee table as the specialty_id
                ?>
                    <option value="<?php echo $r['specialty_id']?>" <?php if ($r['specialty_id'] == $secResult['specialty_id']) {
                        echo 'selected';
                    } ?>><?php echo $r['name']?></option>
                <?php } ?>
                
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" value="<?php echo $secResult['emailaddress']?>">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact number</label>
            <input type="text" class="form-control" id="contact" aria-describedby="contactHelp" name="contact" value="<?php echo $secResult['contactnumber']?>">
            <div id="contactHelp" class="form-text">We'll never share your contact with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-success" name="submit">Save changes</button>
        </div>
    </form>
<?php }else{
    header("Location: viewrecords.php");
} ?>
<?php require_once 'includes/footer.php'; ?>
    
