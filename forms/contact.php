<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $yourname = $_POST["yourname"];
    $youremail = $_POST["youremail"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.mailtrap.io';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_username';
    $mail->Password   = 'your_password';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 2525;


    // Validasi input
    if (empty($yourname) || empty($youremail) || empty($subject) || empty($message)) {
        echo "Mohon isi semua field.";
    } else {
        // Konfigurasi email
        $to = "arjunasatria1717@gmail.com";
        $subject = "Pesan dari $subject";
        $message = "Nama: $yourname\nEmail: $youremail\nMessage:\n$message";
        $headers = "From: $youremail";

        // Mengirim email
        if (mail($to, $subject, $message, $headers)) {
            echo "Pesan berhasil dikirim. Terima kasih, $yourname!";
        } else {
            echo "Gagal mengirim pesan. Silakan coba lagi.";
        }
    }
}
?>
