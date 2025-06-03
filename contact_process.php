<?php
// Simpan pesan ke database atau emailkan
echo "Pesan Anda telah dikirim!";
?>
<?php
// Simulasi kirim pesan
header("Location: contact.php?sent=1");
exit;