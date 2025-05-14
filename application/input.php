<?php
$koneksi = new mysqli("localhost", "root", "", "penyiraman_db"); // ganti sesuai database kamu

$kelembaban = $_GET['kelembaban'];
$tanggal = $_GET['tanggal'];
$jam = $_GET['jam'];

if ($kelembaban != '' && $tanggal != '' && $jam != '') {
    $sql = "INSERT INTO sensor_data (kelembaban, tanggal, jam) VALUES ('$kelembaban', '$tanggal', '$jam')";
    $koneksi->query($sql);
    echo "Data masuk!";
} else {
    echo "Data tidak lengkap!";
}
?>
