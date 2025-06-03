<?php $activePage='home'; include "header_sidebar.php"; ?>

<link rel="stylesheet" href="css/universal.css">
<div class="container-trans" style="max-width:500px;">
  <h2 class="center">Contact Us</h2>
  <?php if(isset($_GET['sent'])): ?>
    <div class="msg-success">Pesan berhasil dikirim!</div>
  <?php endif ?>
  <form method="post" action="contact_process.php">
    <label>Email</label>
    <input type="email" name="email" required />
    <label>Pesan</label>
    <textarea name="message" rows="5" required></textarea>
    <button class="btn-grad" type="submit">Kirim Pesan</button>
  </form>
</div>