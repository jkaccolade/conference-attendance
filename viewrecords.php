<?php 
$title = 'View Attendees';
require_once 'Includes/header.php';
require_once 'db/conn.php';

$results = $crud -> getAttendees();
?>

<table class="table table-striped">
    <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Specialty</th>
        <th>Actions</th>
    </tr>
    <?php
        foreach ($results as $r) {?>
        <tr>
            <td><?php echo $r['firstname'] ?></td>
            <td><?php echo $r['last_name'] ?></td>
            <td><?php echo $r['name'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-outline-primary btn-sm">Edit</a>
                <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary btn-sm">View</a>
                <a onclick="return confirm('Are you sure you want to delete this record?')" href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
    <?php }
    ?>
</table>


<?php require_once 'includes/footer.php'; ?>