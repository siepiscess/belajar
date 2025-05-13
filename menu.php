<?php
session_start();
require "db_connect.php";
$activePage = 'menu';
$kategori = $_GET['kategori']??'favorite';
$page = max(1, intval($_GET['page']??1));
$perPage = 8;
$offset = ($page-1)*$perPage;
$res = $conn->query("SELECT COUNT(*) FROM produk WHERE kategori='$kategori'");
$total = $res ? $res->fetch_row()[0] : 0;
$totalPages = max(1, ceil($total/$perPage));
$produk = [];
$res = $conn->query("SELECT * FROM produk WHERE kategori='$kategori' ORDER BY id LIMIT $perPage OFFSET $offset");
while($row = $res && $row ? $res->fetch_assoc() : false) $produk[] = $row;
include "partials/header_sidebar.php";
?>
<link rel="stylesheet" href="css/universal.css">
<link rel="stylesheet" href="css/carousel.css">
<div class="container-trans" style="max-width:980px;">
  <div class="center" style="margin:12px 0 24px 0;">
    <h2 style="font-size:2rem;margin-bottom:8px;">Menu Produk</h2>
    <div>
      <button class="btn-grad <?= $kategori=='favorite'?'active':'' ?>" onclick="location.href='menu.php?kategori=favorite'">Favorite</button>
      <button class="btn-grad <?= $kategori=='best'?'active':'' ?>" onclick="location.href='menu.php?kategori=best'">Best Seller</button>
    </div>
  </div>
  <div class="produk-carousel">
    <?php foreach($produk as $prd): ?>
      <div class="produk-card">
        <div class="carousel-img-wrap">
          <img src="<?= htmlspecialchars($prd['gambar']) ?>" alt="<?= htmlspecialchars($prd['nama']) ?>">
        </div>
        <div class="produk-info">
          <div class="produk-nama"><?= htmlspecialchars($prd['nama']) ?></div>
          <div class="produk-harga">Rp <?= number_format($prd['harga'],0,',','.') ?></div>
          <div class="produk-stok">Stok: <?= $prd['stok'] ?></div>
          <button class="btn-grad view-btn" data-img="<?= htmlspecialchars($prd['gambar']) ?>" data-nama="<?= htmlspecialchars($prd['nama']) ?>">View</button>
        </div>
      </div>
    <?php endforeach ?>
  </div>
  <div class="pagination center" style="margin-top:18px;">
    <?php for($i=1;$i<=$totalPages;$i++): ?>
      <a class="btn-grad <?= $i==$page?'active':'' ?>" style="margin:2px 4px;" href="menu.php?page=<?= $i ?>&kategori=<?= $kategori ?>"><?= $i ?></a>
    <?php endfor ?>
  </div>
</div>
<!-- Modal View image -->
<div class="modal-img" id="modalImg" style="display:none;">
  <div class="modal-bg" onclick="closeModalImg()"></div>
  <div class="modal-card">
    <img id="modalImgSrc" src="" alt="" style="max-width:90vw;max-height:75vh;border-radius:16px;">
    <div class="center" style="margin-top:10px;font-size:1.2rem;font-weight:600;color:#fff;" id="modalImgNama"></div>
    <button class="btn-grad" onclick="closeModalImg()" style="margin-top:10px;">Close</button>
  </div>
</div>
<script>
function closeModalImg() {
  document.getElementById('modalImg').style.display = 'none';
}
document.querySelectorAll('.view-btn').forEach(btn=>{
  btn.onclick = function() {
    document.getElementById('modalImgSrc').src = btn.dataset.img;
    document.getElementById('modalImgNama').textContent = btn.dataset.nama;
    document.getElementById('modalImg').style.display = 'flex';
  }
});
</script>