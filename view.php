<?php
    include_once("template/header.php");
?>
    <title>View</title>
    <!--link rel="stylesheet" href="gaya.css"-->
    <script src="view.js"></script>
    <script src="view_jq.js"></script>
</head>
<body>
    <?php
        include_once("menu.php");
    ?>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include_once("view_get.php");
                ?>
            </tbody>
        </table>
    </div>

<?php
    include_once("template/footer.php")
?>