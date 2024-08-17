<?php
$servername = "localhost";
$username = "u670459635_tdminfo";
$password = "Tdminfo1234";
$dbname = "u670459635_tdm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM crm_data WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
    header("Location: fetch_data.php"); // Redirect back to the main page after deletion
    exit();
}
?>
