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

    // Validasi input
    if (empty($yourname) || empty($youremail) || empty($subject) || empty($message)) {
        echo "Mohon isi semua field.";
    } else {
        try {
            // Konfigurasi PHPMailer
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '1ff91c1f6a8eff';
            $mail->Password = 'b72e515879fe13';

            // Set pengaturan email
            $mail->setFrom($youremail, $yourname);
            $mail->addAddress('arjunasatria1717@gmail.com');
            $mail->Subject = "Pesan dari $subject";
            $mail->Body    = "Nama: $yourname\nEmail: $youremail\nMessage:\n$message";

            // Kirim email
            $mail->send();
            echo "Pesan berhasil dikirim. Terima kasih, $yourname!";
        } catch (Exception $e) {
            // Pesan kesalahan
            echo "Gagal mengirim pesan. Error: {$mail->ErrorInfo}";
        }
    }
}
?>
