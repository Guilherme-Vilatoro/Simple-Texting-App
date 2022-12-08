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

        $stmt = 'SELECT * FROM `ClientText` WHERE `Name` = "'.$_POST["name"].'"';
        
        $clients = mysqli_query($con, $stmt);

        $row = mysqli_fetch_array($clients, MYSQLI_ASSOC);
        
        if(!$row){
            exit();
        }


        $stmt = 'SELECT `Message` FROM `Chat` WHERE `ID` = "'.$row["ClientID"].'"';
        $chat = mysqli_query($con, $stmt);

        $row = mysqli_fetch_array($chat, MYSQLI_NUM);
        if($row){
            echo $row[0];
        }
        else{
            exit();
        }



        

    ?>
