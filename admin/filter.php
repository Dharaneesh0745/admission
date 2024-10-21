<?php
@include '../config.php';

// Initialize filter variables
$typeOfAdmissionFilter = isset($_GET['TypeOfAdmission']) ? $conn->real_escape_string($_GET['TypeOfAdmission']) : '';
$branchFilter = isset($_GET['Branch']) ? $conn->real_escape_string($_GET['Branch']) : '';
$genderFilter = isset($_GET['Gender']) ? $conn->real_escape_string($_GET['Gender']) : '';
$courseTypeFilter = isset($_GET['CourseType']) ? $conn->real_escape_string($_GET['CourseType']) : '';
$mobileNoFilter = isset($_GET['StudentMobileNo']) ? $conn->real_escape_string($_GET['StudentMobileNo']) : '';
$documentTypeFilter = isset($_GET['DocumentType']) ? $conn->real_escape_string($_GET['DocumentType']) : ''; // New filter for document type

// SQL query with filters
$sql = "SELECT * FROM umis WHERE 1=1";
if ($typeOfAdmissionFilter != '') {
    $sql .= " AND TypeOfAdmission = '" . $typeOfAdmissionFilter . "'";
}
if ($branchFilter != '') {
    $sql .= " AND Branch = '" . $branchFilter . "'";
}
if ($genderFilter != '') {
    $sql .= " AND Gender = '" . $genderFilter . "'";
}
if ($courseTypeFilter != '') {
    $sql .= " AND CourseType = '" . $courseTypeFilter . "'";
}
if ($mobileNoFilter != '') {
    $sql .= " AND StudentMobileNo = '" . $mobileNoFilter . "'";
}
if ($documentTypeFilter != '') {
    $sql .= " AND " . $documentTypeFilter . " IS NOT NULL"; // Filter for document type
}

$result = $conn->query($sql);


?>

<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/admission.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!--Auto fill and Duplicate requisite-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="jquery-ui/jquery-ui.min.js"></script>
    <script src="script/autofill.js"></script>
    <link rel="stylesheet" href="jquery-ui\jquery-ui.min.css">
    <script src="script/username.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
            padding: 20px;
            /* border-radius: 10px; */
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
        }
        /* .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5em;
            text-align: center;
            border-radius: 10px 10px 0 0;
        } */
        .card-body {
            background-color: #ffffff;
            padding-top: 90px;
        }
        .btn {
            margin: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #dee2e6;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php include "sidebar.html" ?>
<section class="home-section">
<nav>
    <div class="sidebar-button">
      <i class="bx bx-menu sidebarBtn"></i>
      <span class="dashboard"
        >Welcome
        <?php echo $_SESSION['admin_name'] ?></span
      >
    </div>

    <div>
      <a href="logout.php">Logout</a>
    </div>
  </nav>

<div class="">
    <div class="card">
        <div class="card-body">

            <!-- Filter Form -->
            <form method="GET" action="">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="TypeOfAdmission">Filter by Type of Admission:</label>
                        <select name="TypeOfAdmission" id="TypeOfAdmission" class="form-control">
                            <option value="">All</option>
                            <option value="management" <?php echo ($typeOfAdmissionFilter == 'management') ? 'selected' : ''; ?>>Management</option>
                            <option value="counselling" <?php echo ($typeOfAdmissionFilter == 'counselling') ? 'selected' : ''; ?>>Counselling</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="Branch">Filter by Branch:</label>
                        <select name="Branch" id="Branch" class="form-control">
                            <option value="">All</option>
                            <!-- UG Courses -->
                            <optgroup label="Undergraduate">
                            <option value="Agriculture Engineering" <?php echo ($branchFilter == 'Agriculture Engineering') ? 'selected' : ''; ?>>Agriculture Engineering</option>
                            <option value="Artificial Intelligence and Data Science" <?php echo ($branchFilter == 'Artificial Intelligence and Data Science') ? 'selected' : ''; ?>>Artificial Intelligence and Data Science</option>
                            <option value="Artificial Intelligence and Machine Learning" <?php echo ($branchFilter == 'Artificial Intelligence and Machine Learning') ? 'selected' : ''; ?>>Artificial Intelligence and Machine Learning</option>
                            <option value="Biomedical Engineering" <?php echo ($branchFilter == 'Biomedical Engineering') ? 'selected' : ''; ?>>Biomedical Engineering</option>
                            <option value="Biotechnology" <?php echo ($branchFilter == 'Biotechnology') ? 'selected' : ''; ?>>Biotechnology</option>
                            <option value="Computer Science and Engineering" <?php echo ($branchFilter == 'Computer Science and Engineering') ? 'selected' : ''; ?>>Computer Science and Engineering</option>
                            <option value="Civil Engineering" <?php echo ($branchFilter == 'Civil Engineering') ? 'selected' : ''; ?>>Civil Engineering</option>
                            <option value="Cyber Security" <?php echo ($branchFilter == 'Cyber Security') ? 'selected' : ''; ?>>Cyber Security</option>
                            <option value="Electronics and Communication Engineering" <?php echo ($branchFilter == 'Electronics and Communication Engineering') ? 'selected' : ''; ?>>Electronics and Communication Engineering</option>
                            <option value="Electrical and Electronics Engineering" <?php echo ($branchFilter == 'Electrical and Electronics Engineering') ? 'selected' : ''; ?>>Electrical and Electronics Engineering</option>
                            <option value="Food Technology" <?php echo ($branchFilter == 'Food Technology') ? 'selected' : ''; ?>>Food Technology</option>
                            <option value="Information Technology" <?php echo ($branchFilter == 'Information Technology') ? 'selected' : ''; ?>>Information Technology</option>
                            <option value="Mechanical Engineering" <?php echo ($branchFilter == 'Mechanical Engineering') ? 'selected' : ''; ?>>Mechanical Engineering</option>

                            </optgroup>
                            <!-- PG Courses -->
                            <optgroup label="Postgraduate">
                                <option value="ME Computer Science and Engineering" <?php echo ($branchFilter == 'ME Computer Science and Engineering') ? 'selected' : ''; ?>>ME Computer Science and Engineering</option>
                                <option value="ME CAD CAM Engineering" <?php echo ($branchFilter == 'ME CAD CAM Engineering') ? 'selected' : ''; ?>>ME CAD CAM Engineering</option>
                                <option value="ME Embedded Systems Technology" <?php echo ($branchFilter == 'ME Embedded Systems Technology') ? 'selected' : ''; ?>>ME Embedded Systems Technology</option>
                                <option value="ME Structural Engineering" <?php echo ($branchFilter == 'ME Structural Engineering') ? 'selected' : ''; ?>>ME Structural Engineering</option>
                                <option value="ME VLSI Design" <?php echo ($branchFilter == 'ME VLSI Design') ? 'selected' : ''; ?>>ME VLSI Design</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="Gender">Filter by Gender:</label>
                        <select name="Gender" id="Gender" class="form-control">
                            <option value="">All</option>
                            <option value="Male" <?php echo ($genderFilter == 'Male') ? 'selected' : ''; ?>>Male</option>
                            <option value="Female" <?php echo ($genderFilter == 'Female') ? 'selected' : ''; ?>>Female</option>
                        </select>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="CourseType">Filter by Course Type:</label>
                        <select name="CourseType" id="CourseType" class="form-control">
                            <option value="">All</option>
                            <option value="UG" <?php echo ($courseTypeFilter == 'UG') ? 'selected' : ''; ?>>UG</option>
                            <option value="PG" <?php echo ($courseTypeFilter == 'PG') ? 'selected' : ''; ?>>PG</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="StudentMobileNo">Filter by Student Mobile No:</label>
                        <input type="text" name="StudentMobileNo" id="StudentMobileNo" class="form-control" value="<?php echo htmlspecialchars($mobileNoFilter); ?>">
                    </div>

                    <div class="form-group col-md-3">
                        <label for="DocumentType">Filter by Document Type:</label>
                        <select name="DocumentType" id="DocumentType" class="form-control">
                            <option value="">All</option>
                            <option value="ProfilePhoto" <?php echo ($documentTypeFilter == 'ProfilePhoto') ? 'selected' : ''; ?>>Profile Photo</option>
                            <option value="CommunityDocument" <?php echo ($documentTypeFilter == 'CommunityDocument') ? 'selected' : ''; ?>>Community Document</option>
                            <option value="AadhaarDocument" <?php echo ($documentTypeFilter == 'AadhaarDocument') ? 'selected' : ''; ?>>Aadhaar Document</option>
                            <option value="FirstGraduateDocument" <?php echo ($documentTypeFilter == 'FirstGraduateDocument') ? 'selected' : ''; ?>>First Graduate Document</option>
                            <option value="MigrationDocument" <?php echo ($documentTypeFilter == 'MigrationDocument') ? 'selected' : ''; ?>>Migration Document</option>
                            <option value="IncomeDocument" <?php echo ($documentTypeFilter == 'IncomeDocument') ? 'selected' : ''; ?>>Income Document</option>
                            <option value="CounsellingDocument" <?php echo ($documentTypeFilter == 'CounsellingDocument') ? 'selected' : ''; ?>>Counselling Document</option>
                            <option value="DiplomaDocument" <?php echo ($documentTypeFilter == 'DiplomaDocument') ? 'selected' : ''; ?>>Diploma Document</option>
                            <option value="UGDocument" <?php echo ($documentTypeFilter == 'UGDocument') ? 'selected' : ''; ?>>UG Document</option>
                            <option value="TotalMark10Document" <?php echo ($documentTypeFilter == 'TotalMark10Document') ? 'selected' : ''; ?>>10th Mark Document</option>
                            <option value="TotalMark12Document" <?php echo ($documentTypeFilter == 'TotalMark12Document') ? 'selected' : ''; ?>>12th Mark Document</option>
                            <option value="TransferCertificate" <?php echo ($documentTypeFilter == 'TransferCertificate') ? 'selected' : ''; ?>>Transfer Certificate</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
                <button type="button" class="btn btn-secondary" onclick="resetFilters()">Reset</button>
            </form>

            <form action="export_database.php">
            <button type="submit" class="btn btn-warning">Export Database</button>

            </form>

            <!-- Data Table -->
            <form method="POST" action="download_merge.php" id="mergeForm">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Student Mobile No</th>
                            <th>Emis Id</th>
                            <th>Stud Name</th>
                            <th>Gender</th>
                            <th>Type Of Admission</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><input type='checkbox' name='studentMobileNos[]' value='" . $row["StudentMobileNo"] . "'></td>";
                                echo "<td>" . htmlspecialchars($row["StudentMobileNo"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["EmisId"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["StudName"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["Gender"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["TypeOfAdmission"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["Course"]) . "</td>";
                                echo "<td>
                                    <form method='POST' action='view.php' style='display:inline;'>
                                        <input type='hidden' name='StudentMobileNo' value='" . htmlspecialchars($row["StudentMobileNo"]) . "'>
                                        <button type='submit' name='action' value='view' class='btn btn-info btn-sm'>View</button>
                                    </form>
                                    <form method='POST' action='delete.php' style='display:inline;'>
                                        <input type='hidden' name='StudentMobileNo' value='" . htmlspecialchars($row["StudentMobileNo"]) . "'>
                                        <button type='submit' name='action' value='delete' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this record?')\">Delete</button>
                                    </form>
                       </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8'>No results found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Download Selected PDFs</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
document.getElementById('selectAll').addEventListener('click', function() {
    var checkboxes = document.querySelectorAll('input[name="studentMobileNos[]"]');
    for (var checkbox of checkboxes) {
        checkbox.checked = this.checked;
    }
});

function resetFilters() {
    document.getElementById('TypeOfAdmission').selectedIndex = 0;
    document.getElementById('Branch').selectedIndex = 0;
    document.getElementById('Gender').selectedIndex = 0;
    document.getElementById('CourseType').selectedIndex = 0;
    document.getElementById('StudentMobileNo').value = '';
    document.getElementById('DocumentType').selectedIndex = 0; // Reset document type filter
}
</script>

</section>

</body>
</html>