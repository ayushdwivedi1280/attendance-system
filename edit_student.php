<?php
include "config.php";

if (!isset($_GET['id'])) {
    die("Invalid request! ID missing.");
}

$id = $_GET['id'];

// Get current data
$result = mysqli_query($conn, "SELECT * FROM students WHERE serial_no='$id'");
if (!$result || mysqli_num_rows($result) == 0) {
    die("Student not found!");
}
$row = mysqli_fetch_assoc($result);

// On form submit – update data
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $reg  = $_POST['reg'];
    $class = $_POST['class'];

    $query = "UPDATE students SET 
                name='$name',
                roll_no='$roll',
                registration_no='$reg',
                class='$class'
              WHERE serial_no='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: view_students.php");
        exit;
    } else {
        $msg = "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5 col-md-6">
    <h2 class="mb-3">Edit Student</h2>

    <?php if(isset($msg)) echo $msg; ?>

    <form method="POST" class="border p-4 bg-white shadow">
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" class="form-control" name="name" value="<?= $row['name']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Roll No</label>
            <input type="text" class="form-control" name="roll" value="<?= $row['roll_no']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Registration No</label>
            <input type="text" class="form-control" name="reg" value="<?= $row['registration_no']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Class</label>
            <input type="text" class="form-control" name="class" value="<?= $row['class']; ?>" required>
        </div>

        <button class="btn btn-success w-100" name="update">Update</button>
        <a href="view_students.php" class="btn btn-secondary w-100 mt-2">← Back to Students</a>
    </form>
</div>

</body>
</html>
