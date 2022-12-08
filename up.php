    <?php 
        //Makes DB connection
        global $con;
        $servername = "sql1.njit.edu";
        $username = "gv8";
        $password = "WWP6happygoldcranes@";
        $dbname = "gv8";
        $con = mysqli_connect($servername,$username,$password,$dbname);
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $stmt = 'SELECT * FROM `ClientText` WHERE `Name` = "'.$_POST["name"].'"';
        
        $clients = mysqli_query($con, $stmt);

        $row = mysqli_fetch_array($clients, MYSQLI_ASSOC);
        
        if(sizeof($_POST["mes"])>=65535){
            echo('<label>Status:</label><br>Message is too long to be sent!');
            exit();
        }
        if(sizeof($_POST["name"])>=65535){
            echo('<label>Status:</label><br>Name is too long to be sent!');
        }
        if(sizeof($_POST["pass"])>=65535){
            echo('<label>Status:</label><br>Password is too long!');
            exit();
        }  
        
        if($row){
            if($row['Password'] != $_POST["pass"]){
                echo'<label>Status:</label><br>Wrong password!';
                exit();
            }
        }
        else{
            echo'<label>Status:</label><br>There is no such name!';
            exit();
        }
        $stmt = 'UPDATE `Chat` SET `Message`="'.$_POST['mes'].'" WHERE `ID` = "'.$row["ClientID"].'"';
        mysqli_query($con, $stmt);


        echo'<label>Status:</label><br>Success!';

    ?>