<?php 
session_start();
include "Header_links.html";




if (isset($_SESSION['stID']))
    $stid = $_SESSION['stID'] ;
else	
    $stid = -1;

    include "Database Connection.php";

    $TableName1 = "students";
    $TableName2 = "enrolled";
    $TableName3 = "trainings";

if ($stid != -1) {
    if(isset($_GET['trID'])){
        $traID = $_GET['trID'];

        $sql = "INSERT INTO $TableName2 (TID, SID)
        VALUES ('$traID', '$stid')";

        if ($conn->query($sql) === TRUE) {
            header('location: Page 3.php?' . SID);
        } 
        
        else {
            echo "<p style='font-size: 30px; color: re  d;'>Error 707: Somthig Wrong...</p>";
        }
    }
}
else {
    ?>
    <div>
        <p style="font-size: 30px; color: red;">Error 707: Somthig Wrong...</p>
    </div>
    <?php
}

include "footer.php";
?>
