<?php
include "config.php";

$message = "";

// When attendance form is submitted
if (isset($_POST['submit'])) {
    $date = $_POST['date'];

    if (!empty($_POST['status'])) {

        foreach ($_POST['status'] as $student_id => $status) {

            // Check if attendance already exists for same student on same date
            $check_query = "SELECT id FROM attendance WHERE student_id = '$student_id' AND date = '$date'";
            $check = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check) > 0) {
                // Update record (no duplicate)
                $update_query = "UPDATE attendance 
                                 SET status = '$status' 
                                 WHERE student_id='$student_id' AND date='$date'";
                mysqli_query($conn, $update_query);
            } else {
                // Insert new record
                $insert_query = "INSERT INTO attendance (student_id, date, status)
                                 VALUES ('$student_id', '$date', '$status')";
                mysqli_query($conn, $insert_query);
            }
        }

        $message = "<div class='alert alert-success text-center'>Attendance Saved / Updated Successfully!</div>";
    } else {
        $message = "<div class='alert alert-danger text-center'>No attendance data submitted!</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-3">Mark Attendance</h2>

    <?= $message ?>

    <form method="POST">

        <label class="form-label">Select Date:</label>
        <input type="date" name="date" class="form-control mb-3" required>

        <table class="table table-bordered">
            <thead class="table-primary">
                <tr>
                    <th>Serial No</th>
                    <th>Name</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
            <?php
            $students = mysqli_query($conn, "SELECT * FROM students ORDER BY serial_no ASC");
            while ($row = mysqli_fetch_assoc($students)) {
            ?>
                <tr>
                    <td><?= $row['serial_no']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td>
                        <select name="status[<?= $row['serial_no']; ?>]" class="form-select" required>
                            <option value="Present">Present</option>
                            <option value="Absent">Absent</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

        <button class="btn btn-primary w-100" name="submit">Save Attendance</button>
    </form>

    <a href="index.php" class="btn btn-dark w-100 mt-3">← Back to Home</a>
</div>

</body>
</html>
