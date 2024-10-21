<?php
// include '../config.php';

// if (isset($_GET['delete_id'])) {
//     $id = mysqli_real_escape_string($conn, $_GET['delete_id']);

//     $query = "DELETE FROM enquiryform2 WHERE id = ?";
//     $stmt = mysqli_prepare($conn, $query);

//     if ($stmt === false) {
//         echo "Error preparing statement: " . mysqli_error($conn);
//         exit;
//     }

//     mysqli_stmt_bind_param($stmt, "i", $id);
//     $run = mysqli_stmt_execute($stmt);

//     if ($run) {
//         header('Location: home.php');
//         exit;
//     } else {
//         echo "Error: " . mysqli_error($conn);
//     }

//     mysqli_stmt_close($stmt);
// } else {
//     echo "Student ID not provided for deletion.";
// }

// mysqli_close($conn);
?>

<?php
@include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $studentMobileNo = $conn->real_escape_string($_POST['StudentMobileNo']);

    // SQL query to delete the record
    $sql = "DELETE FROM umis WHERE StudentMobileNo = '$studentMobileNo'";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting record: " . $conn->error . "');</script>";
    }

    // Redirect back to the main page
    echo "<script>window.location.href = 'filter.php';</script>";
}
$conn->close();
?>

