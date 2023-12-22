<?php

session_start();
    include_once "config.php";

    $id_umkm = mysqli_real_escape_string($conn, $_POST['id_umkm']);
    $id_freelance = mysqli_real_escape_string($conn, $_POST['id_freelance']);
    $start_time = mysqli_real_escape_string($conn, $_POST['start_time']);
 
// Menambahkan data ke tabel chat
$id_umkm = 1; // Ganti dengan nilai yang sesuai
$id_freelance = 2; // Ganti dengan nilai yang sesuai
$start_time = date("Y-m-d H:i:s"); // Menggunakan waktu saat ini

$sql = "INSERT INTO chat (id_umkm, id_freelance, start_time) VALUES ('$id_umkm', '$id_freelance', '$start_time')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>