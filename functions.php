<?php
require_once 'db.php';

function addCustomer($firstName, $lastName, $email, $phone, $address) {
    global $conn;

    $stmt = $conn->prepare(
        "INSERT INTO Customers (FirstName, LastName, Email, Phone, Address)
         VALUES (?, ?, ?, ?, ?)"
    );

    if (!$stmt) {
        throw new Exception("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $address);

    if (!$stmt->execute()) {
        throw new Exception("Execute failed: " . $stmt->error);
    }

    return $conn->insert_id;
}
?>
