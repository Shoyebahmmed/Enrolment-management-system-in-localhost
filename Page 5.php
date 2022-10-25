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
    if(isset($_GET['trid'])){
        $tid = $_GET['trid'];
        //echo $traID;

        $sql = "DELETE FROM $TableName2 WHERE TID = '$tid' AND SID = '$stid'";
        echo $sql;

        if (mysqli_query($conn, $sql)) {
            header('location: Page 2.php?' . SID);
        } 
        
        else {
            echo "<p style='font-size: 30px; color: red;'>Error 707: Somthig Wrong...</p>";
        }


        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
          } else {
            echo "Error deleting record: " . mysqli_error($conn);
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
