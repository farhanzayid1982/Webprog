<?php
    session_start(); //Memulai session pada halaman
    //================================================================================================
    //====== Script di bawah digunakan untuk memeriksa apakah sudah melakukan login atau belum =======
    //================================================================================================
    if(isset($_SESSION["user_id"])) { //Memeriksa apakah variabel user_id pada session sudah di deklarasikan
        
        //echo 'SESSION(' . $_SESSION["user_id"] . ')';
        
    } else { //Jika variabel user_id belum di deklarasikan
        $link = "<script>window.open('login.php', '_SELF');</script>"; //Membuat script open windows javascript
        echo $link; //Mencetak teks $link (memberikan efek menjalankan script javascript)
    }
?>