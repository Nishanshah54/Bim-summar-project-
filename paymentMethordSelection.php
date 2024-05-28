<?php
    session_start();
    require 'connection.php';
    if(!isset($_SESSION['email']))
    {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once("head.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Options</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #35424a;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e8491d 3px solid;
        }
        header a {
            color: #ffffff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        .main {
            padding: 20px;
            background: #ffffff;
            margin: 20px 0;
        }
        .option {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .option h3 {
            margin-top: 0;
            width: 100%;
        }
        .option p, .option ul {
            width: 100%;
        }
        .option ul {
            padding-left: 20px;
        }
        .option ul li {
            list-style-type: disc;
        }
        .option .details, .option .image {
            flex: 1;
            min-width: 300px;
        }
        .option .image {
            text-align: right;
        }
        .option .image img {
            max-width: 100%;
            height: auto;
        }
        input[type="text"], input[type="file"], button {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }
        button {
            background: #35424a;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: #e8491d;
        }
        .button-group {
            display: flex;
            justify-content: space-between;
        }
        @media (max-width: 768px) {
            .option {
                flex-direction: column;
                align-items: center;
            }
            .option .image {
                text-align: center;
                margin-top: 20px;
            }
            .button-group {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

    <header>
        <?php
        require_once("header.php");
        ?>
        <div class="container">

            <h1>Payment Options</h1>
            <?php
                // require 'header.php';
                $user_id=$_SESSION['id'];
            ?>
        </div>
    </header>

    <main class="container main">
        <section class="option">
            <div class="details">
                <h3>Ewallet (eSewa)</h3>
                <form  action="" id="esewa-form">
                    <p><strong>Step 1:</strong> Open your eSewa app.</p>
                    <p><strong>Step 2:</strong> Navigate to the 'Send Money' or 'Pay' section.</p>
                    <p><strong>Step 3:</strong> Enter the following details:</p>
                    <ul>
                        <li><strong>Recipient:</strong>[ Name or ID]</li>
                        <li><strong>Amount:</strong> [Total Amount]</li>
                        <li><strong>Reference:</strong> [Order Number or Description]</li>
                    </ul>
                    <p><strong>Step 4:</strong> Confirm the payment and note the transaction ID.</p>
                    <p><strong>Step 5:</strong> Enter the transaction ID below and click 'Submit'.</p>
                    <input type="text" id="transaction-id" placeholder="Enter your transaction ID here" aria-label="Transaction ID">
                    <input type="file" name="Bill" requried aria-label="Upload bill">
                    <div class="button-group">
                        <button type="button"  name="" onclick="submitEsewaForm() ">Submit</button>
                        
                        <button type="button"  onclick="cancelEsewaForm()">Cancel</button>
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
                <a href="success.php?id=<?php echo $user_id?>" class="btn btn-primary">  <button type="button"  onclick="confirmOrder()">Confirm Order</button></a> 
                <button type="button"  onclick="cancelOrder()">Cancel</button>
                
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
            alert('Order confirmed. Our representative will contact you.  ');
            // Add further order confirmation logic here
                  
            
        }

        function cancelOrder() {
            alert('Order has been cancelled.');
            // Add further order cancellation logic here
        }
    </script>
</body>
</html>
