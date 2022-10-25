<?php 
session_start();
include "Header_links.html";


if (isset($_SESSION['stID']))
    $stid = $_SESSION['stID'] ;
else	
    $stid = -1;

    include "Database Connection.php";

    $TableName1 = "students";
    $TableName2 = "academy";
    $TableName3 = "trainers";

if ($stid != -1) {
    if(isset($_GET['fcID'])){
        $fid = $_GET['fcID'];
        //echo $traID;

        echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Name of Trainers</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Trainer ID</th>\n";
    echo " <th style='background-color:cyan'>Trainers Name</th>\n";
    echo "</tr>\n";

        $sql = "SELECT * FROM $TableName3";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $fcId = $Row['Facility ID'];
            $tname = $Row['Trainer Name'];
            $tid = $Row['Trainer ID'];

            if ($fcId == $fid) {
                echo " <tr>\n";
                echo " <td>" . $tid . "</td>\n";
                echo " <td>" . $tname . "</td>\n";
                echo "</tr>\n"; 
            }
        }
        echo "</table>\n";  
        
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
