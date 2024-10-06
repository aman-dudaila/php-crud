<?php include('../crud3/includes/header.php'); ?>
<div class="action d-flex justify-content-between">
    <h2>Students List</h2>
    <a href="form.php">
        <button type="button" class="btn btn-primary">Add New Student</button>
    </a>
</div>
<div class="card mt-4">
    <table class="table table-striped">
        <thead>
            <tr>

                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">State</th>
                <th scope="col">City</th>
                <th scope="col">Dob</th>
                <th scope="col">Pincode</th>
                <th scope="col">Course</th>
                <th scope="col">Email</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th> 
            </tr>
        </thead>
        <?php
        $sql = "SELECT * FROM student ORDER BY Id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                echo "<tr>
                        <th>$row->id</th>
                        <th>$row->fname $row->lname</th>
                        <th>$row->gender</th>
                        <th>$row->state</th>
                        <th>$row->city</th>
                        <th>$row->dob</th>
                        <th>$row->pincode</th>
                        <th>$row->course</th>
                        <th>$row->email</th>
                        <th>
                        <a href='form.php?id=$row->id'>Update</a>
                        </th>
                        <th>
                        <a href='delete.php?id=$row->id'>delete</a>
                        </th>
                    </tr>";
            }
        }
        ?>
        <?php include('../crud3/includes/footer.php'); ?>