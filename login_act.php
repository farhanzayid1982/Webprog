<?php
    include("conn.php");
    $user_id = $_POST["user_id"];
    $pass = $_POST["password"];

    $sql = "select * from t_user where username = '$user_id' and password = '$pass'";
    //echo $sql;
    $result = $conn->query($sql);
    if($result->num_rows >0) {

        echo 'SUKSES';
        //Contoh penggunaan cookie
        //setcookie("user_id", $user_id, time() + 3600);
        //Contoh penggunaan session
        session_start(); //di setiap page harus di awali session start
        $_SESSION["user_id"] = $user_id; //Membuat variabel session dan memberikannya nilai
        $_SESSION["session_start"] = time();
        $_SESSION["last_active"] = time();
    } else {
        echo 'GAGAL';
    }
    $conn->close();
?>