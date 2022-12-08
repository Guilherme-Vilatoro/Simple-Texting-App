<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Text</title>
</head>
<body class = "bg">
    <div>
        <table>
            <tr>
                <th>Users</th>
            </tr>
        <?php 
        //Makes DB connection
        global $con;
        $servername = "";
        $username = "";
        $password = "";
        $dbname = "";
        $con = mysqli_connect($servername,$username,$password,$dbname);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $stmt = 'SELECT * FROM `ClientText`';
        
        $clients = mysqli_query($con, $stmt);
        while($row = mysqli_fetch_array($clients, MYSQLI_NUM)){
            echo'<tr><td>'.$row[1].'</td></tr>';
        }
        ?>
        </table>

