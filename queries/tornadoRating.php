<?php
        $link = mysqli_connect("127.0.0.1", "ptdrake2", "stormyskies", "StormySkies");
        $lower = $_POST["lower"];
        $upper = $_POST["upper"];

        $sql = "SELECT * FROM tornadoes as t WHERE t.Fatalities>=$lower and t.Fatalities<=$upper";
        $res = mysqli_query($link,$sql);
        echo "<br>"."------------Tornadoes-------------"."<br>";
        echo "<table>";
        while($row = mysqli_fetch_array($res,MYSQL_ASSOC)){
                echo "<tr>";
                foreach($row as $key => $value){
                        echo "<td>".$value."</td>";
                }
                echo "</tr>";
        }
        echo "</table>";

        mysqli_close($link);
?>
