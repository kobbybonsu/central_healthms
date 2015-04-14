<?php
        include_once 'health_action.php';
        include("health_functions.php");

        $obj = new health_functions();

        if(!$obj->connect()){
            echo"Cannot connect to database";
           exit();

      }

        $id = null;

        
        $xls_filename = 'regional_health_stats_on_'.date('Y-m-d').'.xls'; // Define Excel (.xls) file name
        header("Content-Type: application/xls");
        header("Content-Disposition: attachment; filename=$xls_filename");
        header("Pragma: no-cache");
        header("Expires: 0");

        if (isset($_REQUEST['region_ref'])) {
            $region  = $_REQUEST["region_ref"];
            $from  = $_REQUEST["from"];
            $to  = $_REQUEST["to"];
            $result=$obj->see_some_cases($region,$from,$to);

        }

        echo "<table><tr><td sytle='background-color:green; color:black; font-size:20px;'>
        Health Cases That Were Recorded Between <b>" . $from . "</b> and <b>" . $to . "</b></td></tr></table>";
        
        echo "<br><table border='1' border-collapse= 'collapse'>";
        echo "<thead><tr>";
            echo "<th style='background-color:blue; color:white;'>DISEASE</th>";
            echo "<th style='background-color:blue; color:white;'>NUMBER OF CASES</th>";
            echo "<th style='background-color:blue; color:white;'>REGION</th>";
        echo "</tr></thead>";
        echo "<tbody>";

    while($result){
        echo "<tr>";
        echo "<td>$result[d_name]</td>";
        echo "<td style='background-color:lightgreen; color:black;'><b>$result[num_cases]</b></td>";
        echo "<td>$result[regions]</td>";
        echo "</tr>";

    $result=$obj->fetch();
    }
    echo "</tbody>
        </table>";
?>