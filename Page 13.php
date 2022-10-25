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
    $sql = "SELECT * FROM $TableName2";
    $qRes = mysqli_query($conn, $sql);

    echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Number of Trainers in Facility</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Facility ID</th>\n";
    echo " <th style='background-color:cyan'>Facility Name</th>\n";
    echo " <th style='background-color:cyan'>Number of Trainers</th>\n";
    echo "</tr>\n";

    while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
        $fcId = $Row['Facility ID'];
        $fcname = $Row['Facility Name'];

        $count = 0;


        $sql_2 = "SELECT * FROM $TableName3";
        $qRes_2 = mysqli_query($conn, $sql_2);
        while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
            $fid = $Row_2['Facility ID'];
            if ($fid == $fcId)
            $count++;
        }

        echo " <tr>\n";
        echo " <td>" . $fcId . "</td>\n";
        echo " <td>" . $fcname . "</td>\n";
        echo " <td>" . $count . "</td>\n";
        echo "</tr>\n"; 


    }

    echo "</table>\n"; 

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