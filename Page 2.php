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
    $training_id = array();

    if ($stid != -1) {
        $sql = "SELECT * FROM $TableName2";
        $qRes = mysqli_query($conn, $sql);
        while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
            $sid = $Row['SID'];
            $tid = $Row['TID'];

            if($sid == $stid) {
                $training_id[] = $tid;
            }
        }

        if(!empty($training_id)) {

            $tr_details = array(array());
            echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Home</p>";
            echo "<table border='1' width='100%'>\n";
            echo "<tr>\n";
            echo " <th style='background-color:cyan'>Trainings ID</th>\n";
            echo " <th style='background-color:cyan'>Trainings Name</th>\n";
            echo " <th style='background-color:cyan'>Remove</th>\n";
            echo "</tr>\n";

            $sql = "SELECT * FROM $TableName3";
            $qRes = mysqli_query($conn, $sql);
            while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
                $tid_2 = $Row['TID'];
                $tname = $Row['T_Name'];
                

                foreach ($training_id as $id) {
                    if ($tid_2 == $id) {
                        $tr_details = array(array("id" => $tid_2, "name" => $tname)); 
                        echo " <tr>\n";
                        echo " <td>" . $tid_2 . "</td>\n";
                        echo " <td>" . $tname . "</td>\n";
                        echo " <td>" . "<a href='Page 5.php?" . SID . "&trid=" . $tid_2 . "'> Remove </a>". "</td>\n";
                        echo "</tr>\n"; 
                    }
                }
            }
            echo "</table>\n";
        }
        else {
        ?>
        <div>
            <p style="font-size: 30px; color: blueviolet; text-align: center;">You have not Enrolled into any Trainings.</p>
        </div>
        <?php
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