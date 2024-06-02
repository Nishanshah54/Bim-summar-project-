
<?php
    session_start();
       
error_reporting(0);
    require 'connection.php';
    if(!isset($_SESSION['email']))
    {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html>
    <?php require('head.php'); ?>
<head>
    <title>Shipping Information Form</title>
    <style>
        form {
            max-width: 600px;
            margin: auto;
            padding: 1em;
            border: 1px solid #ccc;
            border-radius: 1em;
        }
        div + div {
            margin-top: 1em;
        }
        label {
            display: inline-block;
            width: 90px;
            text-align: right;
        }
        input, select {
            font: 1em sans-serif;
            width: 300px;
            box-sizing: border-box;
            border: 1px solid #999;
        }
        input:focus {
            border-color: #000;
        }
        .button {
            padding-left: 90px;
        }
        button {
            margin-left: .5em;
        }
    </style>
</head>
<body>
        <?php require_once('header.php')?>

<form action="proceedtopay_backend.php" method="post">
    
  

    <!-- <input type="hidden" id="userId" name="userId" value="12345"> Example UserID -->
    
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required placeholder="customer name">
    </div>
    <div>
        <label for="address1">Address :</label>
        <input type="text" id="address" name="address" required placeholder="enter your address">
    </div>
       <div>
        <label for="city">City:</label>
               <select id="city" name="city" required placeholder="enter your city name">
            <option value="">Select a city</option>
            <option value="Kathmandu">Kathmandu</option>
            <option value="Lalitpur(Patan)">Lalitpur(Patan)</option>
            <option value="Pokhara">Pokhara</option>
            <option value="Biratnagar">Biratnagar </option>
            <option value="Bharatpur">Bharatpur </option>
            <option value="Birgunj">Birgunj </option>
            <option value="Dharan">Dharan </option>
            <option value="Butwal">Butwal </option>
            <option value="Janakpur">Janakpur </option>
            <option value="Hetauda">Hetauda </option>
            <!-- Add more options as needed -->
        </select>
    </div>
    <div>
        <label for="province">Province:</label>
        <select id="province" name="province" required>
            <option value="">Select a  province</option>
            <option value="1">province 1</option>
            <option value="2">province 2</option>
            <option value="3">province 3</option>
            <option value="4">province 4</option>
            <option value="5">province 5</option>
            <option value="6">province 6</option>
            <option value="7">province 7</option>     
            </select>    
            <!-- Add more options as needed -->
    </div>
    <div>
        <label for="country">country:</label>
        <select id="country" name="country" required>
            <option value="" disable>Select a  country</option>
            <option value="Nepal">Nepal </option>
            <option value="others country">others country </option>
                    
            <!-- Add more options as needed -->
            </select>
    </div>
    <div>
        <label for="phoneNumber">Phone Number:</label>
        <input type="text" id="phoneNumber" name="phoneNumber" required >
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>
    <div class="button">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

</body>
</html>
