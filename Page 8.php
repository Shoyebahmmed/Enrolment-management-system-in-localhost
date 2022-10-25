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

    echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Student Enrolled in Training</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Training ID</th>\n";
    echo " <th style='background-color:cyan'>Training Name</th>\n";
    echo " <th style='background-color:cyan'>Details</th>\n";
    echo "</tr>\n";

        $sql_3 = "SELECT * FROM $TableName3";
        $qRes_3 = mysqli_query($conn, $sql_3);
        if ($qRes_3)

        while (($Row = mysqli_fetch_assoc($qRes_3)) != FALSE) {
            $fcId = $Row['FID'];
            $tname = $Row['T_Name'];
            $tid = $Row['TID'];

                echo " <tr>\n";
                echo " <td>" . $tid . "</td>\n";
                echo " <td>" . $tname . "</td>\n";
                echo " <td>" . "<a href='Page 9.php?" . SID . "&tID=" . $tid . "'> Offered Subjects </a>". "</td>\n";
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