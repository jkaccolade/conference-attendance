<?php 
$title = 'Home';
require_once 'Includes/header.php';
require_once 'db/conn.php';

$results = $crud -> getSpecialties();

?>

    
    <form method="post" action="success.php">
        <div class="mb-3">
            <label for="firstname" class="form-label">First name</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Last name</label>
            <input type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="mb-3">
            <label for="dob" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="dob" name="dob">
        </div>
        <div class="mb-3">
            <label for="specialty" class="form-label">Area of Expertise</label>
            <select id="specialty" class="form-select" name="specialty">
                <?php
                foreach ($results as $r) {
                    //To show all the available specialty from the specialty table and assingn the primary key as the value such that the primary key is entered into the attendee table, a condition to make an option selected after comparing the attendee's specialty_id with the specialty_id in the specialty table
                    ?>
                    <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']?></option>
                <?php } ?>
                
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="contact" class="form-label">Contact number</label>
            <input type="text" class="form-control" id="contact" aria-describedby="contactHelp" name="contact">
            <div id="contactHelp" class="form-text">We'll never share your contact with anyone else.</div>
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>
    <br>
    <br>
    <br>
<?php require_once 'includes/footer.php'; ?>
    
