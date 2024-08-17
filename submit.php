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

// Retrieve and sanitize form data
$employee_code = $conn->real_escape_string($_POST['employeeCode']);
$customer_name = $conn->real_escape_string($_POST['name']);
$customer_phone = $conn->real_escape_string($_POST['customerPhone']);
$customer_whatsapp = $conn->real_escape_string($_POST['customerWhatsApp']);
$village = $conn->real_escape_string($_POST['village']);
$taluka = $conn->real_escape_string($_POST['taluka']);
$district = $conn->real_escape_string($_POST['district']);
$model_name = $conn->real_escape_string($_POST['modelName']);
$model_year = $conn->real_escape_string($_POST['modelYear']);
$ch_number = $conn->real_escape_string($_POST['chNumber']);
$engine_number = $conn->real_escape_string($_POST['engineNumber']);
$old_vehicle_sell = $conn->real_escape_string($_POST['oldVehicleSell']);
$new_vehicle_purchase = $conn->real_escape_string($_POST['newVehiclePurchase']);
$equipment_requirement = $conn->real_escape_string($_POST['equipmentRequirement']);
$accessories_requirement = $conn->real_escape_string($_POST['accessoriesRequirement']);
$vehicle_insurance = $conn->real_escape_string($_POST['vehicleInsurance']);
$refinance = $conn->real_escape_string($_POST['refinanceno']);
$get_offer = $conn->real_escape_string($_POST['getOffer']);
$purchase_dealer = $conn->real_escape_string($_POST['purchaseDealer']);
$purchase_dealer_mobile = $conn->real_escape_string($_POST['purchaseDealermobilenumber']);
$payment_mode = $conn->real_escape_string($_POST['paymentMode']);
$booklet_number = $conn->real_escape_string($_POST['bookletNumber']);
$reason_booklet_not_taken = $conn->real_escape_string($_POST['reasonBookletNotTaken']);
$next_visit_date = $conn->real_escape_string($_POST['nextVisitDate']);
$remark = $conn->real_escape_string($_POST['remark']); // Ensure this matches the name in your HTML form
$complaint = $conn->real_escape_string($_POST['complaint']);
$new_customer_name = $conn->real_escape_string($_POST['newCustomerName']);
$new_customer_phone = $conn->real_escape_string($_POST['newCustomerPhone']);
$new_customer_village = $conn->real_escape_string($_POST['newCustomerVillage']);
$new_customer_district = $conn->real_escape_string($_POST['newCustomerDistrict']);
$new_customer_taluka = $conn->real_escape_string($_POST['newCustomerTaluka']);
$current_vehicle_name = $conn->real_escape_string($_POST['vehicleName']);
$current_model_number = $conn->real_escape_string($_POST['modelNumber']);

// Handle multiple file uploads
$payment_proofs = array();
foreach ($_FILES['paymentProof']['name'] as $key => $name) {
    $target_dir = "tdm_images/";
    $target_file = $target_dir . basename($name);
    if (move_uploaded_file($_FILES["paymentProof"]["tmp_name"][$key], $target_file)) {
        $payment_proofs[] = $target_file;
    } else {
        echo "Sorry, there was an error uploading your file: " . $name;
    }
}
$payment_proof = implode(',', $payment_proofs);

// Insert data into the database
$sql = "INSERT INTO crm_data (employee_code, customer_name, customer_phone, customer_whatsapp, village, taluka, district, model_name, model_year, ch_number, engine_number, old_vehicle_sell, new_vehicle_purchase, equipment_requirement, accessories_requirement, vehicle_insurance, refinance, get_offer, purchase_dealer, purchase_dealer_mobile, payment_mode, payment_proof, booklet_number, reason_booklet_not_taken, next_visit_date, remark, complaint, new_customer_name, new_customer_phone, new_customer_village, new_customer_district, new_customer_taluka, current_vehicle_name, current_model_number)
VALUES ('$employee_code', '$customer_name', '$customer_phone', '$customer_whatsapp', '$village', '$taluka', '$district', '$model_name', '$model_year', '$ch_number', '$engine_number', '$old_vehicle_sell', '$new_vehicle_purchase', '$equipment_requirement', '$accessories_requirement', '$vehicle_insurance', '$refinance', '$get_offer', '$purchase_dealer', '$purchase_dealer_mobile', '$payment_mode', '$payment_proof', '$booklet_number', '$reason_booklet_not_taken', '$next_visit_date', '$remark', '$complaint', '$new_customer_name', '$new_customer_phone', '$new_customer_village', '$new_customer_district', '$new_customer_taluka', '$current_vehicle_name', '$current_model_number')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
