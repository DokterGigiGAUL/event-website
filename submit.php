<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $date = date("Y-m-d H:i:s"); // Tanggal dan waktu registrasi

    // Tentukan file untuk menyimpan data
    $file = 'registrations.csv';

    // Format data yang akan disimpan
    $data = array($date, $name, $email, $phone);

    // Cek jika file belum ada, tambahkan header
    if (!file_exists($file)) {
        $header = array("Tanggal", "Nama", "Email", "Telepon");
        $fp = fopen($file, 'w');
        fputcsv($fp, $header);
    } else {
        $fp = fopen($file, 'a');
    }

    // Simpan data ke dalam file
    fputcsv($fp, $data);
    fclose($fp);

    // Redirect ke halaman konfirmasi
    echo "<script>alert('Registrasi berhasil! Terima kasih.'); window.location.href='index.html';</script>";
    exit();
} else {
    echo "Metode pengiriman data tidak valid.";
}
?>
