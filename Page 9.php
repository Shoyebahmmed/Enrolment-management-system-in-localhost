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
    if(isset($_GET['tID'])){
        $tid = $_GET['tID'];
        $sidList= array();

        echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Student Enrolled in Training</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Enrolled Student Name</th>\n";
    echo "</tr>\n";

        $sql = "SELECT * FROM $TableName2";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $sID = $Row['SID'];
            $tID = $Row['TID'];

            if ($tid == $tID) {
                $sidList[] = $sID;
            }

        }


        foreach ($sidList as $list) {
            $sql_2 = "SELECT * FROM $TableName1";
            $qRes_2 = mysqli_query($conn, $sql_2);
            while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                $sID = $Row_2['SID'];
                $sname = $Row_2['S_Name'];

                if ($sID == $list) {
                    echo " <tr>\n";
                    echo " <td>" . $sname . "</td>\n";
                    echo "</tr>\n"; 
                }

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
