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
        $tr_details = array(array());
        $enrolled = array();
        $notEmpty = False;

        echo "<p style=\" font-size: 25px; margin-left: 3%; color: #001641\">Available Traings</p>";
        echo "<table border='1' width='100%'>\n";
        echo "<tr>\n";
        echo " <th style='background-color:cyan'>Trainings ID</th>\n";
        echo " <th style='background-color:cyan'>Trainings Name</th>\n";
        echo " <th style='background-color:cyan'>ADD</th>\n";
        echo "</tr>\n";

        $count = 0;
        $tra_name = array();
        $com_id = array();
        $enr_tid = array();
        $enr_sid = array();

        $sql_2 = "SELECT * FROM $TableName2";
        $qRes_2 = mysqli_query($conn, $sql_2);
        
        while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
            //echo "1 <br>";
            $notEmpty = True;
            $tid_2 = $Row_2['TID'];
            $studentid = $Row_2['SID'];

            
            if ($studentid == $stid) {
                $enrolled[] = $tid_2;
            }
        }


        $id_array = array();

        if (!empty($enrolled)) {
            $sql = "SELECT * FROM $TableName3";
            $qRes = mysqli_query($conn, $sql);
            while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
                //echo "2 <br>";
                $tid_1 = $Row['TID'];
                $tname = $Row['T_Name'];
                $count = 0;

                $sql_2 = "SELECT * FROM $TableName2";
                $qRes_2 = mysqli_query($conn, $sql_2);
                
                while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                    //echo "3 <br>";
                    $tid_2 = $Row_2['TID'];
                    $studentid = $Row_2['SID'];

                    if ($tid_1 == $tid_2)
                        $count++;
                }

                if ($count < 4) {
                    //echo "4 <br>";
                    if (!in_array($tid_1, $enrolled)) {

                        echo "<tr>\n";
                        echo " <td>" . $tid_1 . "</td>\n";
                        echo " <td>" . $tname . "</td>\n";
                        echo " <td>" . "<a href='Page 4.php?" . SID . "&trID=" . $tid_1 . "'> ADD </a>". "</td>\n";
                        echo "</tr>\n";
                    }
                }
            }
        }

        else {
            //echo "8<br>";
            $sql = "SELECT * FROM $TableName3";
            $qRes = mysqli_query($conn, $sql);
            while (($Row = mysqli_fetch_assoc($qRes)) != FALSE) {
                //echo "9<br>";
                $tid_1 = $Row['TID'];
                $tname = $Row['T_Name'];
                $count = 0;

                $sql_2 = "SELECT * FROM $TableName2";
                $qRes_2 = mysqli_query($conn, $sql_2);
                
                while (($Row_2 = mysqli_fetch_assoc($qRes_2)) != FALSE) {
                    //echo "10 <br>";
                    $tid_2 = $Row_2['TID'];
                    $studentid = $Row_2['SID'];

                    if ($tid_1 == $tid_2)
                        $count++;
                }

                if ($count < 4) {
                    echo "<tr>\n";
                    echo " <td>" . $tid_1 . "</td>\n";
                    echo " <td>" . $tname . "</td>\n";
                    echo " <td>" . "<a href='Page 4.php?" . SID . "&trID=" . $tid_1 . "'> ADD </a>". "</td>\n";
                    echo "</tr>\n";
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