<?php
// Sertakan kelas PHP_Email_Form
include('./assets/vendor/php-email-form/php-email-form.php');

// Buat objek PHP_Email_Form
$emailForm = new PHP_Email_Form();

// Atur propertinya
$emailForm->to = 'tujuan@email.com';
$emailForm->from_name = 'Nama Pengirim';
$emailForm->from_email = 'pengirim@email.com';
$emailForm->subject = 'Subjek Email';

// Tambahkan pesan ke badan email
$emailForm->add_message('Isi pesan email disini.', 'Label Konten');

// Kirim email
if ($emailForm->send()) {
    echo 'Email berhasil dikirim!';
} else {
    echo 'Gagal mengirim email.';
}
?>
