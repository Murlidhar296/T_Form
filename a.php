<?php
// Database connection
$servername = "localhost";
$username = "u670459635_tdminfo"; // Replace with your MySQL username
$password = "Tdminfo1234"; // Replace with your MySQL password
$dbname = "u670459635_tdm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all data from crm_data table
$sql = "SELECT * FROM crm_data";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRM Data</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    img {
        max-width: 100px;
        height: auto;
        cursor: pointer;
    }
</style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    // Output data of each row in a table format
    echo "<table>";
    echo "<tr><th>Name</th><th>Employee Code</th><th>Customer Name</th><th>Customer Phone</th><th>Customer WhatsApp</th><th>Village</th><th>Taluka</th><th>District</th><th>Model Name</th><th>Model Year</th><th>CH Number</th><th>Engine Number</th><th>Old Vehicle Sell</th><th>New Vehicle Purchase</th><th>Equipment Requirement</th><th>Accessories Requirement</th><th>Vehicle Insurance</th><th>Refinance</th><th>Get Offer</th><th>Purchase Dealer</th><th>Purchase Dealer Mobile</th><th>Payment Mode</th><th>Payment Proof</th><th>Booklet Number</th><th>Reason Booklet Not Taken</th><th>Next Visit Date</th><th>Remark</th><th>Complaint</th><th>New Customer Name</th><th>New Customer Phone</th><th>New Customer Village</th><th>New Customer District</th><th>New Customer Taluka</th><th>Current Vehicle Name</th><th>Current Model Number</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["employee_code"]."</td>";
        echo "<td>".$row["customer_name"]."</td>";
        echo "<td>".$row["customer_phone"]."</td>";
        echo "<td>".$row["customer_whatsapp"]."</td>";
        echo "<td>".$row["village"]."</td>";
        echo "<td>".$row["taluka"]."</td>";
        echo "<td>".$row["district"]."</td>";
        echo "<td>".$row["model_name"]."</td>";
        echo "<td>".$row["model_year"]."</td>";
        echo "<td>".$row["ch_number"]."</td>";
        echo "<td>".$row["engine_number"]."</td>";
        echo "<td>".$row["old_vehicle_sell"]."</td>";
        echo "<td>".$row["new_vehicle_purchase"]."</td>";
        echo "<td>".$row["equipment_requirement"]."</td>";
        echo "<td>".$row["accessories_requirement"]."</td>";
        echo "<td>".$row["vehicle_insurance"]."</td>";
        echo "<td>".$row["refinance"]."</td>";
        echo "<td>".$row["get_offer"]."</td>";
        echo "<td>".$row["purchase_dealer"]."</td>";
        echo "<td>".$row["purchase_dealer_mobile"]."</td>";
        echo "<td>".$row["payment_mode"]."</td>";
        // For displaying images stored in the database
        echo "<td>";
        $payment_proofs = explode(',', $row["payment_proof"]);
        foreach ($payment_proofs as $key => $proof) {
            echo "<a href='".$proof."' data-lightbox='image-gallery-".$key."'><img src='".$proof."' width='100' height='100'></a>";
        }
        echo "</td>";
        echo "<td>".$row["booklet_number"]."</td>";
        echo "<td>".$row["reason_booklet_not_taken"]."</td>";
        echo "<td>".$row["next_visit_date"]."</td>";
        echo "<td>".$row["remark"]."</td>";
        echo "<td>".$row["complaint"]."</td>";
        echo "<td>".$row["new_customer_name"]."</td>";
        echo "<td>".$row["new_customer_phone"]."</td>";
        echo "<td>".$row["new_customer_village"]."</td>";
        echo "<td>".$row["new_customer_district"]."</td>";
        echo "<td>".$row["new_customer_taluka"]."</td>";
        echo "<td>".$row["current_vehicle_name"]."</td>";
        echo "<td>".$row["current_model_number"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
