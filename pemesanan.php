<?php $activePage='home'; include "header_sidebar.php"; ?>

<link rel="stylesheet" href="css/universal.css">
<div class="container-trans" style="max-width:540px; margin: 45px auto 0 auto; background:rgba(255,255,255,0.11); padding:30px 22px 32px 22px; border-radius:18px;">
  <h2 class="center" style="margin-bottom:22px;">Form Pemesanan</h2>
  <?php if(isset($_GET['success'])): ?>
    <div class="msg-success"><?= htmlspecialchars($_GET['success']) ?></div>
  <?php endif ?>
  <form action="pemesanan_process.php" method="post" style="display:flex;flex-direction:column;gap:15px;">
    <input type="text" name="nama" placeholder="Nama" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <input type="text" name="alamat" placeholder="Alamat" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <input type="text" name="jenis_aglonema" placeholder="Jenis Aglonema" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <select name="size" id="size" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
      <option value="small">Small</option>
      <option value="medium">Medium</option>
      <option value="jumbo">Jumbo</option>
    </select>
    <input type="number" name="jumlah" placeholder="Jumlah" required min="1" style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <div style="display:flex;justify-content:center;margin-top:10px;">
      <button type="submit" style="min-width:180px; height:48px; font-size:1.08rem; letter-spacing:1px; border-radius:8px; background:var(--green2,#18bc9c);color:#fff;font-weight:500;">
        <span style="font-size:0.97rem;">Pesan</span>
      </button>
    </div>
  </form>
</div>