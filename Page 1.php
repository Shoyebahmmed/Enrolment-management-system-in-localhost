<?php
session_start();
?>
<html>
    <style>
        .error {
        color: red;
        font-size: small;
        margin-left: 3%;
        }

        .form_section{
        margin-left: 22%;
        margin-top: 5%;
        }

        input[type=submit] {
        background-color: #42c9ff;
        border: none;
        color: white;
        padding: 12px 32px;
        text-decoration: none;
        cursor: pointer;
        border-radius: 30px;
        }
        input[type=text] {
        width: 70%;
        padding: 12px 20px;
        margin: 8px;
        box-sizing: border-box;
        border: 2px solid rgb(88, 236, 255);
        border-radius: 30px;
        }
       
    </style>
    <body>
        <?php
        include "Header.html";
           

            $Global_error_message_sid = "";
            $Global_error_message_password = "";


            function displayForm()
        {
        ?>
            <div class="form_section">
                <form action="Page 1.php" method="post">
                    <input type="text" placeholder="Student ID" name="sid">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_sid"]; ?> 
                        </div>
                        
                    <input type="text" placeholder="Password" name="password">
                        <div class="error">
                            <?php echo $GLOBALS["Global_error_message_password"]; ?> 
                        </div>
                        <br><br>
                    <input type="submit" name="submit">
                </form>
            </div>
        <?php
        }

        function work_section() {
            $errorCount = 0;
            $TableName = "students";
            
            

            if (empty($_POST['sid'])) {
                $errorCount += 1;
                $GLOBALS["Global_error_message_sid"] = "<p>Please enter Student ID to Log-in.</p>";
            }

            if (empty($_POST['password'])) {
                $errorCount += 1;
                $GLOBALS["Global_error_message_password"] = "<p>Please enter Password to Log-in.</p>";
            }

            include "Database Connection.php";
            $errorCount2 = 0;

            if (!empty($_POST['sid']) && !empty($_POST['password'])) {
                try{
                    $sql = "SELECT * FROM $TableName";
                    $qRes = mysqli_query($conn, $sql);
                    $ppassword = md5($_POST['password']);
                    while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
                        //echo $Row['SID'];
                        //echo $Row['password'];
                        $sid = $Row['SID'];
                        $password = $Row['password'];
                        

                        if ( $sid == $_POST['sid'] && $password == $ppassword) {
                        //echo $Row['SID'];
                        //echo $Row['password'];
                            $_SESSION['stID'] = $sid;
                        
                            header('location: Page 2.php?' . SID);
                        }
                        else 
                            $errorCount2 += 1;
                    
                    }
                    if ($errorCount2 > 0 ) {
                        $GLOBALS["Global_error_message_sid"] = "<p>Please enter valid Student ID.</p>";
                        $GLOBALS["Global_error_message_password"] = "<p>Please enter corrrect password.</p>";
                    }
                }
                catch (mysqli_sql_exception $e) {
                    die("Error: " . mysqli_error($conn));
                }

            }
                
        
        }

        if (isset($_POST['submit'])) {
            work_section();
        }

        displayForm();
        ?>
    </body>
</html>