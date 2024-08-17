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

// Retrieve the record to edit
$id = $_GET['id'];
$sql = "SELECT * FROM crm_data WHERE id=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$existing_images = explode(',', $row['payment_proof']);
$existing_images = array_filter($existing_images); // Remove empty values

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Record</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <h2>Edit Record</h2>
    <form action="update.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="form-group">
            <label for="customer_name">Customer Name</label>
            <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($row['customer_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="employee_code">Employee Code</label>
            <input type="text" class="form-control" id="employee_code" name="employee_code" value="<?php echo htmlspecialchars($row['employee_code']); ?>" required>
        </div>

        <div class="form-group">
            <label for="customer_phone">Customer Phone</label>
            <input type="text" class="form-control" id="customer_phone" name="customer_phone" value="<?php echo htmlspecialchars($row['customer_phone']); ?>" required>
        </div>

        <div class="form-group">
            <label for="customer_whatsapp">Customer WhatsApp</label>
            <input type="text" class="form-control" id="customer_whatsapp" name="customer_whatsapp" value="<?php echo htmlspecialchars($row['customer_whatsapp']); ?>">
        </div>

        <div class="form-group">
            <label for="village">Village</label>
            <input type="text" class="form-control" id="village" name="village" value="<?php echo htmlspecialchars($row['village']); ?>">
        </div>

        <div class="form-group">
            <label for="taluka">Taluka</label>
            <input type="text" class="form-control" id="taluka" name="taluka" value="<?php echo htmlspecialchars($row['taluka']); ?>">
        </div>

        <div class="form-group">
            <label for="district">District</label>
            <input type="text" class="form-control" id="district" name="district" value="<?php echo htmlspecialchars($row['district']); ?>">
        </div>

        <div class="form-group">
            <label for="model_name">Model Name</label>
            <input type="text" class="form-control" id="model_name" name="model_name" value="<?php echo htmlspecialchars($row['model_name']); ?>">
        </div>

        <div class="form-group">
            <label for="model_year">Model Year</label>
            <input type="text" class="form-control" id="model_year" name="model_year" value="<?php echo htmlspecialchars($row['model_year']); ?>">
        </div>

        <div class="form-group">
            <label for="ch_number">CH Number</label>
            <input type="text" class="form-control" id="ch_number" name="ch_number" value="<?php echo htmlspecialchars($row['ch_number']); ?>">
        </div>

        <div class="form-group">
            <label for="engine_number">Engine Number</label>
            <input type="text" class="form-control" id="engine_number" name="engine_number" value="<?php echo htmlspecialchars($row['engine_number']); ?>">
        </div>

        <div class="form-group">
            <label for="old_vehicle_sell">Old Vehicle Sell</label>
            <input type="text" class="form-control" id="old_vehicle_sell" name="old_vehicle_sell" value="<?php echo htmlspecialchars($row['old_vehicle_sell']); ?>">
        </div>

        <div class="form-group">
            <label for="new_vehicle_purchase">New Vehicle Purchase</label>
            <input type="text" class="form-control" id="new_vehicle_purchase" name="new_vehicle_purchase" value="<?php echo htmlspecialchars($row['new_vehicle_purchase']); ?>">
        </div>

        <div class="form-group">
            <label for="equipment_requirement">Equipment Requirement</label>
            <input type="text" class="form-control" id="equipment_requirement" name="equipment_requirement" value="<?php echo htmlspecialchars($row['equipment_requirement']); ?>">
        </div>

        <div class="form-group">
            <label for="accessories_requirement">Accessories Requirement</label>
            <input type="text" class="form-control" id="accessories_requirement" name="accessories_requirement" value="<?php echo htmlspecialchars($row['accessories_requirement']); ?>">
        </div>

        <div class="form-group">
            <label for="vehicle_insurance">Vehicle Insurance</label>
            <input type="text" class="form-control" id="vehicle_insurance" name="vehicle_insurance" value="<?php echo htmlspecialchars($row['vehicle_insurance']); ?>">
        </div>

        <div class="form-group">
            <label for="refinance">Refinance</label>
            <input type="text" class="form-control" id="refinance" name="refinance" value="<?php echo htmlspecialchars($row['refinance']); ?>">
        </div>

        <div class="form-group">
            <label for="get_offer">Get Offer</label>
            <input type="text" class="form-control" id="get_offer" name="get_offer" value="<?php echo htmlspecialchars($row['get_offer']); ?>">
        </div>

        <div class="form-group">
            <label for="purchase_dealer">Purchase Dealer</label>
            <input type="text" class="form-control" id="purchase_dealer" name="purchase_dealer" value="<?php echo htmlspecialchars($row['purchase_dealer']); ?>">
        </div>

        <div class="form-group">
            <label for="purchase_dealer_mobile">Purchase Dealer Mobile</label>
            <input type="text" class="form-control" id="purchase_dealer_mobile" name="purchase_dealer_mobile" value="<?php echo htmlspecialchars($row['purchase_dealer_mobile']); ?>">
        </div>

        <div class="form-group">
            <label for="payment_mode">Payment Mode</label>
            <input type="text" class="form-control" id="payment_mode" name="payment_mode" value="<?php echo htmlspecialchars($row['payment_mode']); ?>">
        </div>

        <div class="form-group">
            <label for="booklet_number">Booklet Number</label>
            <input type="text" class="form-control" id="booklet_number" name="booklet_number" value="<?php echo htmlspecialchars($row['booklet_number']); ?>">
        </div>

        <div class="form-group">
            <label for="reason_booklet_not_taken">Reason Booklet Not Taken</label>
            <input type="text" class="form-control" id="reason_booklet_not_taken" name="reason_booklet_not_taken" value="<?php echo htmlspecialchars($row['reason_booklet_not_taken']); ?>">
        </div>

        <div class="form-group">
            <label for="next_visit_date">Next Visit Date</label>
            <input type="date" class="form-control" id="next_visit_date" name="next_visit_date" value="<?php echo htmlspecialchars($row['next_visit_date']); ?>">
        </div>

        <div class="form-group">
            <label for="remark">Remark</label>
            <textarea class="form-control" id="remark" name="remark"><?php echo htmlspecialchars($row['remark']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="complaint">Complaint</label>
            <textarea class="form-control" id="complaint" name="complaint"><?php echo htmlspecialchars($row['complaint']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="new_customer_name">New Customer Name</label>
            <input type="text" class="form-control" id="new_customer_name" name="new_customer_name" value="<?php echo htmlspecialchars($row['new_customer_name']); ?>">
        </div>

        <div class="form-group">
            <label for="new_customer_phone">New Customer Phone</label>
            <input type="text" class="form-control" id="new_customer_phone" name="new_customer_phone" value="<?php echo htmlspecialchars($row['new_customer_phone']); ?>">
        </div>

        <div class="form-group">
            <label for="payment_proof">Payment Proof Images (Select multiple files)</label>
            <input type="file" class="form-control-file" id="payment_proof" name="payment_proof[]" multiple>
        </div>

        <div class="form-group">
            <label>Existing Images:</label>
            <div>
                <?php foreach ($existing_images as $image): ?>
                    <img src="tdm_images/<?php echo htmlspecialchars($image); ?>" alt="Image" style="width: 100px; height: auto; margin-right: 10px;">
                <?php endforeach; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
