<?php
session_start();

error_reporting(0);
// require 'connection/connection.php';
// if(!isset($_SESSION['email']))
// {
//     header('location: ../adminLogin/Adminlogin.php');
// }

?>
<!DOCTYPE html>
<html>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 10px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    </style>
   <?php require_once('head.php');?>
    <body>
        <?php require ('header.php'); ?>
        <div class="container">
          
            <h1>Bug Report and Complaints Form</h1>
    <form action="Bug report/submit_form_bug.php" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="submission_type">Type of Submission:</label><br>
        <select id="submission_type" name="submission_type" required>
            <option value="Bug Report">Bug Report</option>
            <option value="Complaint">Complaint</option>
        </select><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
        
        <label for="attachments">Attachments (if applicable):</label><br>
        <input type="file" id="attachments" name="attachments"><br><br>

        <label for="additional_comments">Additional Comments:</label><br>
        <textarea id="additional_comments" name="additional_comments" rows="4" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
    <!--CREATE TABLE Bug (
    BugID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    SubmissionType VARCHAR(20) NOT NULL,
    Description TEXT NOT NULL,
    Attachments VARCHAR(255),
    AdditionalComments TEXT,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
-->

<br><br>
<br><br>
<br><br>
<br><br>
          
            </div>
            <?php require ('footer/footer.php')  ?>
    </body> 
   
</html>