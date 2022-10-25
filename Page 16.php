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
    $TableName3 = "trainings";

    

if ($stid != -1) {
    $sql = "SELECT * FROM $TableName2";
    $qRes = mysqli_query($conn, $sql);

    echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Number of Student in Facility</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Facility ID</th>\n";
    echo " <th style='background-color:cyan'>Facility Name</th>\n";
    echo " <th style='background-color:cyan'>Details</th>\n";
    echo "</tr>\n";

    while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
        $fcId = $Row['Facility ID'];
        $fcname = $Row['Facility Name'];

        echo " <tr>\n";
        echo " <td>" . $fcId . "</td>\n";
        echo " <td>" . $fcname . "</td>\n";
        echo " <td>" . "<a href='Page 17.php?" . SID . "&fcID=" . $fcId . "'> Offered Subjects </a>". "</td>\n";
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