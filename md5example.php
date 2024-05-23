<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MD5 example</title>
</head>
<body>
    <form action="" >
        Enter message <br>
        <input type="text" name="message">
        <input type="submit">
    </form>
    
</body>
</html>
<?php
    if(isset($_GET['message']))
    {
        $md5=md5($_GET['message']);
        echo "Message after Md5".$md5;

    }
?>