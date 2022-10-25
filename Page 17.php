<?php 
session_start();
include "Header_links.html";


if (isset($_SESSION['stID']))
    $stid = $_SESSION['stID'] ;
else	
    $stid = -1;

    include "Database Connection.php";

    $TableName1 = "academy";
    $TableName2 = "enrolled";
    $TableName3 = "trainings";
    $count = 0;

if ($stid != -1) {
    if(isset($_GET['fcID'])){
        $fcID = $_GET['fcID'];
        //echo $traID;

        echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Number of Student in Facility</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Facility ID</th>\n";
    echo " <th style='background-color:cyan'>Facility Name</th>\n";
    echo " <th style='background-color:cyan'>Number of Student</th>\n";
    echo "</tr>\n";

        $sql = "SELECT * FROM $TableName3";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            //echo "1 ";
            $tid = $Row['TID'];
            $fcid = $Row['FID'];


            if ($fcid == $fcID) {
                //echo "2 ";
                $sql_2 = "SELECT * FROM $TableName2";
                $qRes_2 = mysqli_query($conn, $sql_2);
                

                while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                    //echo "3 ";
                    $tid_2 = $Row_2['TID'];
                    $sid = $Row_2['SID'];
                    //echo $count;

                    if($tid_2 == $tid) {
                        //echo "4 ";
                        $count++;
                        //echo "#### " . $count . " ###";
                    }
                }
            }

        }

        $fname = "";
        $sql = "SELECT * FROM $TableName1";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $fid = $Row['Facility ID'];
            $fcname = $Row['Facility Name'];

            if ($fid == $fcID) {
                $fname = $fcname;
            }

        }

        echo " <tr>\n";
        echo " <td>" . $fcID . "</td>\n";
        echo " <td>" . $fname . "</td>\n";
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
