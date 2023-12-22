<?php
$conn =mysqli_connect("localhost","root","","db_freelance");
if(!$conn){
    echo "Database connecting " .mysqli_connect_error();
}
?>