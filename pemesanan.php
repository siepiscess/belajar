<?php
$activePage='pemesanan';
include "header_sidebar.php";
require "db_connect.php";

// Ambil daftar produk dari database
$produk = [];
$res = $conn->query("SELECT id, nama, stok, ukuran FROM produk WHERE stok > 0 ORDER BY nama ASC");
while($row = $res->fetch_assoc()) $produk[] = $row;
?>

<link rel="stylesheet" href="css/universal.css">
<link rel="stylesheet" href="css/pemesanan.css">
<script>
function updateStokInfo() {
  const select = document.getElementById('produk_id');
  const stokInfo = document.getElementById('stokInfo');
  const selected = select.options[select.selectedIndex];
  stokInfo.textContent = selected ? "Stok: " + selected.getAttribute('data-stok') + " (" + selected.getAttribute('data-ukuran') + ")" : "";
}
document.addEventListener('DOMContentLoaded', updateStokInfo);
</script>
<div class="container-trans" style="max-width:540px; margin: 45px auto 0 auto; background:rgba(255,255,255,0.11); padding:30px 22px 32px 22px; border-radius:18px;">
  <h2 class="center" style="margin-bottom:22px;">Form Pemesanan</h2>
  <?php if(isset($_GET['success'])): ?>
    <div class="msg-success"><?= htmlspecialchars($_GET['success']) ?></div>
  <?php endif ?>
  <?php if(isset($_GET['error'])): ?>
    <div class="msg-error"><?= htmlspecialchars($_GET['error']) ?></div>
  <?php endif ?>
  <form action="pemesanan_process.php" method="post" style="display:flex;flex-direction:column;gap:15px;" id="pemesananForm">
    <input type="text" name="nama" placeholder="Nama Pemesan" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <input type="text" name="alamat" placeholder="Alamat" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <select name="produk_id" id="produk_id" required style="padding:12px 14px; border-radius:8px; font-size:1.06rem;" onchange="updateStokInfo()">
      <?php foreach($produk as $prd): ?>
        <option value="<?= $prd['id'] ?>" data-stok="<?= $prd['stok'] ?>" data-ukuran="<?= htmlspecialchars($prd['ukuran']) ?>">
          <?= htmlspecialchars($prd['nama']) ?> (Stok: <?= $prd['stok'] ?>, Ukuran: <?= htmlspecialchars($prd['ukuran']) ?>)
        </option>
      <?php endforeach ?>
    </select>
    <div id="stokInfo" style="color:#0a0;font-size:.97rem;margin-top:-8px;margin-bottom:6px;"></div>
    <input type="number" name="jumlah" placeholder="Jumlah" required min="1" style="padding:12px 14px; border-radius:8px; font-size:1.06rem;">
    <div style="display:flex;justify-content:center;margin-top:10px;">
      <button type="submit" class="btn-grad" style="min-width:180px; height:48px; font-size:1.08rem; letter-spacing:1px; border-radius:8px;">
        <span style="font-size:0.97rem;">Pesan</span>
      </button>
    </div>
  </form>
</div>
<script>
document.getElementById('produk_id').addEventListener('change', updateStokInfo);
updateStokInfo();
// Optional: Validasi jumlah <= stok
document.getElementById('pemesananForm').addEventListener('submit', function(e){
  const select = document.getElementById('produk_id');
  const stok = parseInt(select.options[select.selectedIndex].getAttribute('data-stok'));
  const jumlah = parseInt(this.jumlah.value);
  if(jumlah > stok) {
    alert('Jumlah melebihi stok tersedia!');
    e.preventDefault();
  }
});
</script>