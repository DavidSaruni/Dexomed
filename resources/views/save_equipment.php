<?php
include 'db_connection.php'; // your database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $model = $_POST['model'];
    $serial_number = $_POST['serial_number'];
    $manufacturer = $_POST['manufacturer'];
    $purchase_date = $_POST['purchase_date'];
    $warranty_expiry = $_POST['warranty_expiry'];
    $location_department = $_POST['location_department'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];

    // Prepare the SQL statement
    $sql = "INSERT INTO equipment 
        (name, model, serial_number, manufacturer, purchase_date, warranty_expiry, location_department, status, notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $name, $model, $serial_number, $manufacturer, $purchase_date, $warranty_expiry, $location_department, $status, $notes);

    if ($stmt->execute()) {
        echo "<script>
                alert('Equipment added successfully!');
                window.location.href = 'your_dashboard_page.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
