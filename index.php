<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #002fff, #0099ff);
            color: white;
            min-height: 100vh;
        }
        .card {
            border-radius: 15px;
            transition: 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0px 0px 20px rgba(255,255,255,0.6);
        }
        h1 {
            text-shadow: 1px 1px 10px black;
        }
    </style>
</head>
<body>

<div class="container text-center mt-5">
    <h1 class="mb-4">🎓 Student Attendance System</h1>
    <h4 class="mb-5">Choose a Feature</h4>

    <div class="row justify-content-center">

        <div class="col-md-4 mb-3">
            <a href="add_student.php" class="text-decoration-none">
            <div class="card p-4 bg-success text-white">
                <h3>➕ Add Student</h3>
            </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="view_students.php" class="text-decoration-none">
            <div class="card p-4 bg-warning text-dark">
                <h3>📋 View Students</h3>
            </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="mark_attendance.php" class="text-decoration-none">
            <div class="card p-4 bg-primary text-white">
                <h3>📝 Mark Attendance</h3>
            </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="attendance_report.php" class="text-decoration-none">
            <div class="card p-4 bg-danger text-white">
                <h3>📊 Attendance Report</h3>
            </div>
            </a>
        </div>

    </div>
</div>

</body>
</html>
