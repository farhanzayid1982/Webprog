<?php
    include_once("template/header.php");
?>
    <title>Add/Edit</title>
    <script src="addedit_jq.js"></script>
    <script src="addedit.js"></script>
    <?php
        if(isset($_GET["id"])) {
            $user_id = $_GET["id"];
            //echo $user_id;
            //Proses pencarian data
            $sql = "SELECT * FROM t_user WHERE username = '".$user_id."'";
            include_once("conn.php");
            $result = $conn->query($sql);
            if($result->num_rows >0) {
                // mengambil data setiap baris
                while($row = $result->fetch_assoc()) {
                    
                    //Mengambil data dan menyimpan kedalam variable
                    $user_id = $row["username"];
                    $gender = $row["gender"];
                    $tmp_lahir = $row["tmp_lahir"];
                    $tgl_lahir = $row["tgl_lahir"];

                }
            } else {
                $user_id = ""; //Ini adalah failsafe apabila data tidak di temukan (seharusnya semua ditemukan)
            }
            $conn->close();
        } else {
            $user_id = ""; //Jika user_id tidak di set (Mode penambahan data baru)
        }
    ?>
</head>
<body>
    <!-- ===================================================================================================================
         == Object input diberikan accesskey baik melalui label maupun secara langsung agar bisa di akses                 ==
         == menggunakan shortcut                                                                                          ==
         == Title di sisipkan pada txtUser_id & txttgl_lahir untuk mencontohkan penggunaan tooltip                        ==
         == placeholder digunakan untuk memberikan petunjuk kepada user untuk pengisian textbox                           ==
         == Semua object input diberikan scipt untuk menampilkan data sebelumnya jika dalam mode edit                     ==
         ===================================================================================================================-->
    <div class="container"> <!-- Memberikan jarak awal (container) -->
        <!-- USER ID -->
        <div class="row mb-3"> <!-- Memberikan jarak antar baris dibawah nya mb (margin bottom) -->
            <label class="col-sm-2" accesskey="U" for="txtUser_id"><u>U</u>ser ID</label> <!-- Memberikan placeholder sembanyak 2 terhadap object/element -->
            <div class="col-sm-10">
                <input type="text" id="txtOldUser_id" value=<?php if($user_id!="") {echo $user_id;} else { echo "''"; } ?> hidden>
                <input type="text" title="USER ID" id="txtUser_id" placeholder="Masukkan User ID" value=<?php if($user_id!=="") {echo $user_id;} else {echo "";} ?>>
                <div id="txtUser_idNotif"></div>
            </div>
        </div>

        <!-- Password -->
        <div class="row mb-3"> 
            <label class="col-sm-2" accesskey="P" for="txtPass1"><u>P</u>assword</label>
            <div class="col-sm-10">
                <input type="password" id="txtPass1" placeholder="Masukkan password"  onchange="password_change()">
                <label accesskey="W" for="txtPass2">Repeat Pass<u>w</u>ord</label>
                <input type="password" id="txtPass2" placeholder="Ulangi Masukkan password" onchange="password_change()">
                <div id="txtPass1Notif"></div>
            </div>
        </div>

        <!-- Gender -->
        <div class="row mb-3">
            <label class="col-sm-2">Gender</label>
            <div class="col-sm-10">
                <input type="radio" name="gender" id="rL" <?php if($user_id!="") {if($gender=="L"){ echo "checked";};} else { echo "checked";}; ?> >
                <label accesskey="L" for="rL"><u>L</u>aki-laki</label>
                <input type="radio" name="gender" id="rP" <?php if($user_id!="") {if($gender=="P"){ echo "checked";};}; ?>>
                <label accesskey="R" for="rP">Pe<u>r</u>empuan</label>
                <div id="genderNotif"></div>
            </div>
        </div>

        <!-- Tempat lahir -->
        <div class="row mb-3">
            <label class="col-sm-2"  accesskey="T" for="txtTmp_lhr"><u>T</u>empat Lahir</label>
            <div class="col-sm-10">
                <input type="text" id="txtTmp_lhr" placeholder="Masukkan Tempat Lahir" value=<?php if($user_id!=="") {echo $tmp_lahir;} else {echo "";} ?>>
                <div id="txtTmp_lhrNotif"></div>
            </div>
        </div>

        <!-- Tempat lahir -->
        <div class="row mb-3">
            <label class="col-sm-2"  accesskey="a" for="txtTgl_lhr">T<u>a</u>nggal Lahir</label>
            <div class="col-sm-10">
                <input type="date" id="txtTgl_lhr" title="Masukkan tanggal lahir" placeholder="Masukkan Tanggal Lahir" value=<?php if($user_id!=="") {echo $tgl_lahir;} else {echo "";} ?>>
                <div id="txtTmp_lhrNotif"></div>
            </div>
        </div>

        <!-- Button -->
        <div class="row mb-3">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <button accesskey="S" id="cmdSimpan"><u>S</u>impan</button>
                <button accesskey="C" id="cmdCancel"><u>C</u>ancel</button>
            </div>
        </div>
    </div>
<?php
    include_once("template/footer.php")
?>