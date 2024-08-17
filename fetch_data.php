<?php
// Database connection
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

// Fetch specific fields from crm_data table
$sql = "SELECT 
            id, 
            customer_name, 
            employee_code, 
            customer_phone, 
            customer_whatsapp, 
            village, 
            taluka, 
            district, 
            model_name, 
            model_year, 
            ch_number, 
            engine_number, 
            old_vehicle_sell, 
            new_vehicle_purchase, 
            equipment_requirement, 
            accessories_requirement, 
            vehicle_insurance, 
            refinance, 
            get_offer, 
            purchase_dealer, 
            purchase_dealer_mobile, 
            payment_mode, 
            payment_proof, 
            booklet_number, 
            reason_booklet_not_taken, 
            next_visit_date, 
            remark, 
            complaint, 
            new_customer_name, 
            new_customer_phone, 
            new_customer_village, 
            new_customer_district, 
            new_customer_taluka, 
            current_vehicle_name, 
            current_model_number
        FROM crm_data";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CRM Data</title>
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    /* General styling */
    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        white-space: nowrap;
        overflow-x: auto;
    }
    table, th, td {
        border: 1px solid #ccc;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    .image-thumbnail {
        max-width: 100px;
        height: auto;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }
    .image-thumbnail:hover {
        border-color: #007bff;
    }
    .image-gallery {
        display: none;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 1000;
    }
    .image-gallery.active {
        display: flex;
    }
    .image-container {
        max-width: 80%;
        max-height: 80%;
        overflow: hidden;
        text-align: center;
    }
    .image-container img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
        max-height: 60vh;
    }
    .close-btn, .nav-btn {
        position: absolute;
        font-size: 24px;
        color: #fff;
        cursor: pointer;
        z-index: 1001;
    }
    .close-btn {
        top: 20px;
        right: 20px;
    }
    .nav-btn {
        top: 50%;
        transform: translateY(-50%);
    }
    .prev-btn {
        left: 20px;
    }
    .next-btn {
        right: 20px;
    }
</style>
</head>
<body>

<div class="container mt-4">
    <?php
    if ($result->num_rows > 0) {
        echo "<h1>TDM Datalist</h1>";
        echo "<div class='table-responsive'>";
        echo "<table class='table table-bordered table-striped'>";
        echo "<thead class='thead-dark'>";
        echo "<tr><th>ID</th><th>Customer Name</th><th>Employee Code</th><th>Customer Phone</th><th>Customer WhatsApp</th><th>Village</th><th>Taluka</th><th>District</th><th>Model Name</th><th>Model Year</th><th>CH Number</th><th>Engine Number</th><th>Old Vehicle Sell</th><th>New Vehicle Purchase</th><th>Equipment Requirement</th><th>Accessories Requirement</th><th>Vehicle Insurance</th><th>Refinance</th><th>Get Offer</th><th>Purchase Dealer</th><th>Purchase Dealer Mobile</th><th>Payment Mode</th><th>Payment Proof</th><th>Booklet Number</th><th>Reason Booklet Not Taken</th><th>Next Visit Date</th><th>Remark</th><th>Complaint</th><th>New Customer Name</th><th>New Customer Phone</th><th>New Customer Village</th><th>New Customer District</th><th>New Customer Taluka</th><th>Current Vehicle Name</th><th>Current Model Number</th><th>Actions</th></tr>";
        echo "</thead>";
        echo "<tbody>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["customer_name"]."</td>";
            echo "<td>".$row["employee_code"]."</td>";
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
            echo "<td>";
            $payment_proofs = explode(',', $row["payment_proof"]);
            if (!empty($payment_proofs)) {
                echo "<img src='".$payment_proofs[0]."' class='image-thumbnail img-fluid' onclick='openImageGallery(event)' data-images='".json_encode($payment_proofs)."'>";
            }
            echo "</td>";
            echo "<td>".$row["booklet_number"]."</td>";
            echo "<td>".$row["reason_booklet_not_taken"]."</td>";
            echo "<td>".$row["next_visit_date"]."</td>";
            echo "<td>".htmlspecialchars($row["remark"])."</td>"; // Ensure HTML special characters are handled
            echo "<td>".$row["complaint"]."</td>";
            echo "<td>".$row["new_customer_name"]."</td>";
            echo "<td>".$row["new_customer_phone"]."</td>";
            echo "<td>".$row["new_customer_village"]."</td>";
            echo "<td>".$row["new_customer_district"]."</td>";
            echo "<td>".$row["new_customer_taluka"]."</td>";
            echo "<td>".$row["current_vehicle_name"]."</td>";
            echo "<td>".$row["current_model_number"]."</td>";
            echo "<td>
                    <a href='edit.php?id=".$row["id"]."' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='delete.php?id=".$row["id"]."' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                </td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-info'>0 results</div>";
    }
    $conn->close();
    ?>
</div>

<!-- Image Gallery Modal -->
<div id="imageGalleryModal" class="image-gallery">
    <span class="close-btn" onclick="closeImageGallery()">&times;</span>
    <span class="nav-btn prev-btn" onclick="prevImage()">&#10094;</span>
    <span class="nav-btn next-btn" onclick="nextImage()">&#10095;</span>
    <div class="image-container">
        <img id="galleryImage" src="" alt="Image">
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var currentIndex = 0;
    var totalImages = 0;
    var imageArray = [];

    function openImageGallery(event) {
        let images = JSON.parse(event.target.getAttribute('data-images'));
        currentIndex = 0; // Start from the first image
        totalImages = images.length;
        imageArray = images;
        document.getElementById('galleryImage').src = imageArray[currentIndex];
        document.body.classList.add('modal-open'); // Bootstrap modal-open class to disable scrolling
        document.getElementById('imageGalleryModal').classList.add('active');
    }

    function closeImageGallery() {
        document.body.classList.remove('modal-open'); 
        document.getElementById('imageGalleryModal').classList.remove('active');
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % totalImages;
        document.getElementById('galleryImage').src = imageArray[currentIndex];
    }

    function prevImage() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages;
        document.getElementById('galleryImage').src = imageArray[currentIndex];
    }

    document.onkeydown = function(event) {
        event = event || window.event;
        if (event.keyCode == 27) { 
            closeImageGallery();
        } else if (event.keyCode == 37) { 
            prevImage();
        } else if (event.keyCode == 39) { 
            nextImage();
        }
    };
</script>

</body>
</html>
