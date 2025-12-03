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
    	<div class="HeadContainer">
        <div style="height: auto; text-align: center;">
        <img class = "logo" src="Pawslogo.png">
        </div>
        <div style="text-align: left;">
        <h1 class = title> Bloom</h1>

            <div class="return">
        <a href="in.html">
          <button class="button">Home</button>
        </a>
      </div>

        </div>
        <div class="return">
			<a href="Volunteer.html">
            <button class="button">Volunteer</button>
            </a>
        </div>
        <div class="return">
			<a href="adopt.html">
            <button class="button">Adopt</button>
		    </a>
        </div>
        <div class="return">
			<a href="aboutus.html">
            <button class="button">About Us</button>
			</a>
        </div>
		<div class="return">
        <a href="add_customer.php">
          <button class="button">Add Costumer</button>
        </a>
      </div>
      </div>

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



