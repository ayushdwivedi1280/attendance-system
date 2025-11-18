<?php
include "config.php";

// Fetch all records
$query = "SELECT * FROM students ORDER BY serial_no ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background: #f2f7ff;
        }
        .container {
            margin-top: 40px;
        }
        .table-wrapper {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.15);
            animation: fadeIn .5s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); } 
        }
        h2 {
            text-shadow: 1px 1px 5px rgba(0,0,0,.2);
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4">📋 Registered Students</h2>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="add_student.php" class="btn btn-success">➕ Add New Student</a>
        <a href="index.php" class="btn btn-dark">🏠 Home</a>
    </div>

    <div class="table-wrapper">
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Registration No</th>
                    <th>Class</th>
                    <th width="180">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['serial_no']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['roll_no']; ?></td>
                    <td><?= $row['registration_no']; ?></td>
                    <td><?= $row['class']; ?></td>
                    <td>
                        <a href="edit_student.php?id=<?= $row['serial_no']; ?>" class="btn btn-warning btn-sm">✏ Edit</a>
                        <a href="delete_student.php?id=<?= $row['serial_no']; ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this student?');">🗑 Delete</a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>
