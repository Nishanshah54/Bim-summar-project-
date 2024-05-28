<?php
session_start();
require 'connection.php';

if(!isset($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $transactionId = htmlspecialchars($_POST['transaction-id']);
    $userId = $_SESSION['id'];
    
    if (!empty($transactionId) && !empty($_FILES['Bill']['name'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["Bill"]["name"]);
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowedTypes = array("jpg", "png", "jpeg", "gif", "pdf");
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["Bill"]["tmp_name"], $targetFile)) {
                // Save transaction ID and file path to the database
                $sql = "INSERT INTO payments (user_id, transaction_id, file_path) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iss", $userId, $transactionId, $targetFile);
                if ($stmt->execute()) {
                    echo "<script>alert('Payment details submitted successfully.');</script>";
                } else {
                    echo "<script>alert('Error submitting payment details.');</script>";
                }
            } else {
                echo "<script>alert('Error uploading file.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, PNG, GIF, & PDF files are allowed.');</script>";
        }
    } else {
        echo "<script>alert('Please enter a transaction ID and upload a file.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once("head.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <style>
        /* Your CSS code */
    </style>
</head>
<body>
    <header>
        <?php require_once("header.php"); ?>
        <div class="container">
            <h1>Payment Options</h1>
        </div>
    </header>
    <main class="container main">
        <section class="option">
            <div class="details">
                <h3>Ewallet (eSewa)</h3>
                <form action="payment.php" method="POST" enctype="multipart/form-data" id="esewa-form">
                    <p><strong>Step 1:</strong> Open your eSewa app.</p>
                    <p><strong>Step 2:</strong> Navigate to the 'Send Money' or 'Pay' section.</p>
                    <p><strong>Step 3:</strong> Enter the following details:</p>
                    <ul>
                        <li><strong>Recipient:</strong> [Name or ID]</li>
                        <li><strong>Amount:</strong> [Total Amount]</li>
                        <li><strong>Reference:</strong> [Order Number or Description]</li>
                    </ul>
                    <p><strong>Step 4:</strong> Confirm the payment and note the transaction ID.</p>
                    <p><strong>Step 5:</strong> Enter the transaction ID below and click 'Submit'.</p>
                    <input type="text" name="transaction-id" id="transaction-id" placeholder="Enter your transaction ID here" required>
                    <input type="file" name="Bill" required>
                    <div class="button-group">
                        <button type="submit">Submit</button>
                        <button type="button" onclick="cancelEsewaForm()">Cancel</button>
                    </div>
                </form>
            </div>
            <div class="image">
                <img src="PaymentQR_image/1000271114.jpg" alt="payment QR image">
            </div>
        </section>
        <section class="option">
            <h3>Cash in Hand</h3>
            <p>If you prefer to pay with cash, please follow these steps:</p>
            <p><strong>Step 1:</strong> Confirm your order by clicking the 'Confirm Order' button below.</p>
            <p><strong>Step 2:</strong> Our representative will contact you to arrange the cash payment.</p>
            <p><strong>Step 3:</strong> Hand over the cash to our representative upon delivery.</p>
            <br><br><br>
            <div class="button-group">
                <a href="success.php?id=<?php echo $userId ?>" class="btn btn-primary"><button type="button" onclick="confirmOrder()">Confirm Order</button></a>
                <button type="button" onclick="cancelOrder()">Cancel</button>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <p>Need Help? Contact our customer support at Ns thakuri sto.</p>
        </div>
    </footer>
    <script>
        function submitEsewaForm() {
            const transactionId = document.getElementById('transaction-id').value;
            if (transactionId.trim() === '') {
                alert('Please enter a transaction ID.');
                return;
            }
            alert('Esewa form submitted with transaction ID: ' + transactionId);
            // Add further form submission logic here
        }

        function cancelEsewaForm() {
            document.getElementById('transaction-id').value = '';
            document.querySelector('input[name="Bill"]').value = '';
            alert('Esewa form has been cleared.');
        }

        function confirmOrder() {
            alert('Order confirmed. Our representative will contact you.');
            // Add further order confirmation logic here
        }

        function cancelOrder() {
            alert('Order has been cancelled.');
            // Add further order cancellation logic here
        }
    </script>
</body>
</html>
