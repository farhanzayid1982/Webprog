<?php
    //Mengambil data yang dikirimkan
    $user_id = $_POST["user_id"];
    $olduser_id = $_POST["olduser_id"];
    $pass = $_POST["pass"];
    $gender = $_POST["gender"];
    $tmp_lhr = $_POST["tmp_lhr"];
    $tgl_lhr = $_POST["tgl_lhr"];

    //test data
    //echo $user_id . $olduser_id . $pass . $gender . $tmp_lhr . $tgl_lhr;
    include_once("conn.php");
    //Periksa apakah key berubah
    $duplikasi = false;
    if($user_id!=$olduser_id) {
        //Jika key berubah, periksa apakah key baru sudah ada
        $sql = "SELECT * FROM t_user WHERE username = '$user_id'";
        $result = $conn->query($sql);
        if($result->num_rows >0) {
            //Jika key sudah ada
            $duplikasi = true;
        }
    }
    //Jika key baru sudah ada alert dan hentikan penyimpanan
    if($duplikasi) {
        echo '{"status":"GAGAL","pesan":"Data user_id sudah ada!"}';
    } else {
        //Membuat query penyimpanan data baru/edit
        if($olduser_id=="") {
            $sql = "INSERT INTO t_user (username, password, gender, tmp_lahir, tgl_lahir) VALUES ('$user_id', '$pass', '$gender', '$tmp_lhr', '$tgl_lhr');";
        } else {
            $sql = "UPDATE t_user set username = '$user_id'";
            if($pass!="") {
                $sql = $sql . ", password = '$pass'";
            }
            $sql=$sql . ", gender = '$gender', tmp_lahir = '$tmp_lhr', tgl_lahir = '$tgl_lhr' WHERE username = '$olduser_id';";
        }
        //Jika proses diatas bisa di lewati semua maka akan dilakukan proses penyimpanan data
        if($conn->query($sql) === TRUE) {
            //Jika penyimpanan berhasil menampilkan notifikasi penyimpanan berhasil
            echo '{"status":"SUKSES","pesan":"Data tersimpan."}';
        } else {
            //Penyimpanan gagal
            echo '{"status":"GAGAL", "pesan":"Error: ' . $sql . '<br>' . $conn->error . '"}';
        }
    }
    $conn->close();
?>