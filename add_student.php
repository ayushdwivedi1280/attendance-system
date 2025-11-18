<?php
include "config.php";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $class = $_POST['class'];

    $query = "INSERT INTO students (name, roll_no, registration_no, class)
              VALUES ('$name', '$roll', '$reg', '$class')";

    if (mysqli_query($conn, $query)) {
        $msg = "<div class='alert alert-success text-center'>🎉 Student Added Successfully!</div>";
    } else {
        $msg = "<div class='alert alert-danger text-center'>❌ Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background: linear-gradient(to right, #0066ff, #00ccff);
            min-height: 100vh;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            animation: fadeIn .6s;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 450px;">
        <h3 class="text-center mb-3">Add New Student</h3>

        <?php if(isset($msg)) echo $msg; ?>

        <form method="POST">
            
            <div class="mb-3">
                <label class="form-label">Student Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter student name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Roll Number</label>
                <input type="text" name="roll" class="form-control" placeholder="Enter roll number" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Registration No</label>
                <input type="text" name="reg" class="form-control" placeholder="Enter registration number" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Class</label>
                <input type="text" name="class" class="form-control" placeholder="Enter class" required>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Add Student</button>

            <a href="view_students.php" class="btn btn-dark mt-3 w-100">← View All Students</a>
        </form>
    </div>
</div>

</body>
</html>
