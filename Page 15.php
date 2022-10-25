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
        $trID = $_GET['trID'];
        //echo $traID;

        echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Student Details by Trainers</p>";
    echo "<table border='1' width='100%'>\n";
    echo "<tr>\n";
    echo " <th style='background-color:cyan'>Trainer ID</th>\n";
    echo " <th style='background-color:cyan'>Trainers Name</th>\n";
    echo "</tr>\n";

        $sql = "SELECT * FROM $TableName3";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $tid = $Row['TID'];
            $trid = $Row['Tr_ID'];

            if ($trid == $trID) {
                $sql_2 = "SELECT * FROM $TableName2";
                $qRes_2 = mysqli_query($conn, $sql_2);
                while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                    $tid_2 = $Row_2['TID'];
                    $sid = $Row_2['SID'];

                    if($tid_2 == $tid) {
                        $sql_3 = "SELECT * FROM $TableName1";
                        $qRes_3 = mysqli_query($conn, $sql_3);
                        while (($Row_3 = mysqli_fetch_assoc($qRes_3)) != FALSE) {
                            $sid_2 = $Row_3['SID'];
                            $sname = $Row_3['S_Name'];

                            if($sid == $sid_2) {
                                echo " <tr>\n";
                                echo " <td>" . $sid_2 . "</td>\n";
                                echo " <td>" . $sname . "</td>\n";
                                echo "</tr>\n"; 
                            }
                    }
                }

            }
        }
        
        
    }
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
