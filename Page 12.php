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

    echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Number of Students in Training</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Training ID</th>\n";
    echo " <th style='background-color:cyan'>Training Name</th>\n";
    echo " <th style='background-color:cyan'>Number of Student</th>\n";
    echo "</tr>\n";

    

        $sql = "SELECT * FROM $TableName3";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $fcId = $Row['FID'];
            $tname = $Row['T_Name'];
            $tid = $Row['TID'];

            $count = 0;

            $sql_2 = "SELECT * FROM $TableName2";
            $qRes_2 = mysqli_query($conn, $sql_2);
            while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                $tID = $Row_2['TID'];
                if ($tid == $tID)
                    $count++;
            }

                echo " <tr>\n";
                echo " <td>" . $tid . "</td>\n";
                echo " <td>" . $tname . "</td>\n";
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