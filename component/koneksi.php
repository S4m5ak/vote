<?php
$koneksi = mysqli_connect("localhost","root","","vt_db");

if(mysqli_connect_error()){
    echo "Gak Nyambung ke data base nih bang : " . mysqli_connect_error();
}
?>