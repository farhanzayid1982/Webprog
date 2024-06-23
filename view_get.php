<?php
    $filter = "";
    if(isset($_POST["filter"])) {
        $key = $_POST["filter"];
        $filter = " WHERE username like '%$key%'";
    }
    $sql = "SELECT * FROM t_user" . $filter . ";";
    include_once("conn.php");
    $result = $conn->query($sql);
    if($result->num_rows >0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            echo "<tr><td>" . $row["username"] . "</td><td>" . $row["gender"] . "</td>
            <td>" . $row["tmp_lahir"] . "</td>
            <td>" . $row["tgl_lahir"] . "</td>
            <td>
            <button id='e".$row["username"]."' onclick=edit_click('".$row["username"]."')>EDIT</button>
            <button id='h".$row["username"]."' onclick=hapus_click('".$row["username"]."')>HAPUS</button>
            </td></tr>";
        }
    } else {
        echo '<td colspan=4>TIDAK ADA DATA</td>';
    }
    $conn->close();
?>