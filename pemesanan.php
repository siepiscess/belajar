<?php $activePage='home'; include "header_sidebar.php"; ?>

<link rel="stylesheet" href="css/universal.css">
<div class="container-trans" style="max-width:540px;">
  <h2 class="center">Form Pemesanan</h2>
  <?php if(isset($_GET['success'])): ?>
    <div class="msg-success"><?= htmlspecialchars($_GET['success']) ?></div>
  <?php endif ?>
  <form method="post" action="pemesanan_process.php">
    <label>Nama Pemesan</label>
    <input type="text" name="nama_orang" required />
    <label>Alamat</label>
    <input type="text" name="alamat" required />
    <label>Nama Aglonema</label>
    <input type="text" name="nama_aglo" required />
    <div class="row">
      <div>
        <label>Size</label>
        <input type="text" name="size" required />
      </div>
      <div>
        <label>Ukuran</label>
        <input type="text" name="ukuran" required />
      </div>
    </div>
    <button class="btn-grad" type="submit">Pesan</button>
  </form>
</div>