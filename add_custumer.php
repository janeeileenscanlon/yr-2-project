<?php

// add_customer.php
require_once 'functions.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = trim($_POST['first_name'] ?? '');
    $lastName  = trim($_POST['last_name'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');
    $address   = trim($_POST['address'] ?? '');

    if ($firstName && $lastName && $email) {
        try {
            $customerId = addCustomer($firstName, $lastName, $email, $phone, $address);
            $message = "Customer added with ID: " . htmlspecialchars($customerId);
        } catch (Exception $e) {
            $message = "Error adding customer: " . htmlspecialchars($e->getMessage());
        }
    } else {
        $message = "First name, last name, and email are required.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Customer</title>
</head>
<body>
<h1>Add Customer</h1>

<?php if ($message): ?>
    <p><strong><?= $message ?></strong></p>
<?php endif; ?>

<form method="post" action="">
    <label>First Name:
        <input type="text" name="first_name" required>
    </label><br><br>

    <label>Last Name:
        <input type="text" name="last_name" required>
    </label><br><br>

    <label>Email:
        <input type="email" name="email" required>
    </label><br><br>

    <label>Phone:
        <input type="text" name="phone">
    </label><br><br>

    <label>Address:
        <textarea name="address" rows="3" cols="30"></textarea>
    </label><br><br>

    <button type="submit">Add Customer</button>
</form>
</body>
</html>


