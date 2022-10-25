<?php 
session_start();
include "Header_links.html";


if (isset($_SESSION['stID']))
    $stid = $_SESSION['stID'] ;
else	
    $stid = -1;

    include "Database Connection.php";

    $TableName1 = "students";
    $TableName2 = "trainers";
    $TableName3 = "enrolled";

    

if ($stid != -1) {
    $sql = "SELECT * FROM $TableName2";
    $qRes = mysqli_query($conn, $sql);

    echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Student Details by Trainers</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Trainer ID</th>\n";
    echo " <th style='background-color:cyan'>Trainer Name</th>\n";
    echo " <th style='background-color:cyan'>Details</th>\n";
    echo "</tr>\n";

    while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
        $trID = $Row['Trainer ID'];
        $trName = $Row['Trainer Name'];
        $fcID = $Row['Facility ID'];

        echo " <tr>\n";
        echo " <td>" . $trID . "</td>\n";
        echo " <td>" . $trName . "</td>\n";
        echo " <td>" . "<a href='Page 15.php?" . SID . "&trID=" . $trID . "'> Details </a>". "</td>\n";
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