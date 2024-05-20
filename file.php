<?php
    $data = 'Ini datanya';
    echo 'data = $data'; //Ditulis menggunakan single quote
    echo "data = $data"; //Ditulis menggunakan double quote isi data dari $data di munculkan
    echo `data = $data`; //Ditulis menggunakan Aphosthrope, ini seharusnya tidak muncul karena error
?>