<?php
// Database connection
$servername = "localhost";
$username = "u670459635_tdminfo";
$password = "Tdminfo1234";
$dbname = "u670459635_tdm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$id = $_POST['id'];
$customer_name = $_POST['customer_name'];
$employee_code = $_POST['employee_code'];
$customer_phone = $_POST['customer_phone'];
$customer_whatsapp = $_POST['customer_whatsapp'];
$village = $_POST['village'];
$taluka = $_POST['taluka'];
$district = $_POST['district'];
$model_name = $_POST['model_name'];
$model_year = $_POST['model_year'];
$ch_number = $_POST['ch_number'];
$engine_number = $_POST['engine_number'];
$old_vehicle_sell = $_POST['old_vehicle_sell'];
$new_vehicle_purchase = $_POST['new_vehicle_purchase'];
$equipment_requirement = $_POST['equipment_requirement'];
$accessories_requirement = $_POST['accessories_requirement'];
$vehicle_insurance = $_POST['vehicle_insurance'];
$refinance = $_POST['refinance'];
$get_offer = $_POST['get_offer'];
$purchase_dealer = $_POST['purchase_dealer'];
$purchase_dealer_mobile = $_POST['purchase_dealer_mobile'];
$payment_mode = $_POST['payment_mode'];
$booklet_number = $_POST['booklet_number'];
$reason_booklet_not_taken = $_POST['reason_booklet_not_taken'];
$next_visit_date = $_POST['next_visit_date'];
$remark = $_POST['remark'];
$complaint = $_POST['complaint'];
$new_customer_name = $_POST['new_customer_name'];
$new_customer_phone = $_POST['new_customer_phone'];

// Retrieve existing payment proof images
$sql = "SELECT payment_proof FROM crm_data WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$existing_images = explode(',', $row['payment_proof']);
$existing_images = array_filter($existing_images); // Remove empty values

// Handle new file uploads
if (isset($_FILES['payment_proof'])) {
    $uploaded_files = $_FILES['payment_proof'];
    $new_images = [];

    for ($i = 0; $i < count($uploaded_files['name']); $i++) {
        if ($uploaded_files['error'][$i] === UPLOAD_ERR_OK) {
            $file_tmp = $uploaded_files['tmp_name'][$i];
            $file_name = basename($uploaded_files['name'][$i]);
            $file_path = 'tdm_images/' . $file_name;

            if (move_uploaded_file($file_tmp, $file_path)) {
                $new_images[] = $file_name;
            }
        }
    }

    // Merge new images with existing images
    $all_images = array_merge($existing_images, $new_images);
} else {
    $all_images = $existing_images;
}

$all_images_str = implode(',', $all_images);

// Update the record in the database
$sql = "UPDATE crm_data SET
            customer_name = '$customer_name',
            employee_code = '$employee_code',
            customer_phone = '$customer_phone',
            customer_whatsapp = '$customer_whatsapp',
            village = '$village',
            taluka = '$taluka',
            district = '$district',
            model_name = '$model_name',
            model_year = '$model_year',
            ch_number = '$ch_number',
            engine_number = '$engine_number',
            old_vehicle_sell = '$old_vehicle_sell',
            new_vehicle_purchase = '$new_vehicle_purchase',
            equipment_requirement = '$equipment_requirement',
            accessories_requirement = '$accessories_requirement',
            vehicle_insurance = '$vehicle_insurance',
            refinance = '$refinance',
            get_offer = '$get_offer',
            purchase_dealer = '$purchase_dealer',
            purchase_dealer_mobile = '$purchase_dealer_mobile',
            payment_mode = '$payment_mode',
            payment_proof = '$all_images_str',
            booklet_number = '$booklet_number',
            reason_booklet_not_taken = '$reason_booklet_not_taken',
            next_visit_date = '$next_visit_date',
            remark = '$remark',
            complaint = '$complaint',
            new_customer_name = '$new_customer_name',
            new_customer_phone = '$new_customer_phone'
        WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    // Redirect to fetch_data.php after successful update
    header("Location: fetch_data.php");
    exit(); // Make sure to exit after redirection
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
