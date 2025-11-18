<?php
include "config.php";

// Default values
$date = '';
$where = '';

// If filter is applied
if (isset($_GET['date']) && $_GET['date'] !== '') {
    $date = $_GET['date'];
    $where = "WHERE attendance.date = '$date'";
}

// Query to fetch attendance data
$query = "
    SELECT attendance.id, students.roll_no, students.name, attendance.date, attendance.status
    FROM attendance
    JOIN students ON attendance.student_id = students.serial_no
    $where
    ORDER BY attendance.date DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="mb-3">Attendance Report</h2>

    <!-- Filter Form -->
    <form method="GET" class="mb-3 d-flex" style="gap: 10px;">
        <input type="date" name="date" class="form-control" value="<?= htmlspecialchars($date); ?>" required>
        <button type="submit" class="btn btn-primary">Filter</button>
        <a href="attendance_report.php" class="btn btn-secondary">Clear</a>
    </form>

    <?php if ($date !== '') { ?>
        <h5 class="mb-3">Showing Attendance for: <b><?= htmlspecialchars($date); ?></b></h5>
    <?php } ?>

    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Date</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        <?php
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?= $row['roll_no']; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['status']; ?></td>
                </tr>
        <?php
            }
        } else {
        ?>
            <tr>
                <td colspan="4" class="text-center text-danger">No Records Found</td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-dark w-100 mt-3">← Back to Home</a>
</div>

</body>
</html>
