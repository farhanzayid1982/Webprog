<?php
    //Mengambil data yang dikirimkan
    $user_id = $_POST["user_id"];
    include_once("conn.php");
    $sql = "DELETE FROM t_user WHERE username = '$user_id'";
    if($conn->query($sql) === TRUE) {
        //Jika penyimpanan berhasil menampilkan notifikasi penyimpanan berhasil
        echo '{"status":"SUKSES","pesan":"Data terhapus."}';
    } else {
        //Penyimpanan gagal
        echo '{"status":"GAGAL", "pesan":"Error: ' . $sql . '<br>' . $conn->error . '"}';
    }
    $conn->close();
?>