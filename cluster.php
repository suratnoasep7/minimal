<?php
$host = 'db-mysql-bhisa-do-user-2248794-0.b.db.ondigitalocean.com';
$port = 25060;
$username = 'doadmin';
$password = 'AVNS_vN6DCO8dFQcywxKmnLf';
$database = 'defaultdb';

// Buat koneksi dengan opsi charset
$mysqli = new mysqli($host . ':' . $port . ';charset=utf8mb4', $username, $password, $database);

// Periksa koneksi
if ($mysqli->connect_errno) {
    echo "Gagal terhubung ke database: " . $mysqli->connect_error;
    exit();
}

// Query untuk menampilkan daftar database
$query = "SHOW DATABASES";

// Eksekusi query
$result = $mysqli->query($query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
    // Tampilkan daftar database
    while ($row = $result->fetch_assoc()) {
        echo $row['Database'] . "<br>";
    }
    
    // Bebaskan hasil query
    $result->free();
} else {
    echo "Error: " . $mysqli->error;
}

// Tutup koneksi
$mysqli->close();
?>