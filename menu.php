<?php
session_start();
require "db_connect.php";
$activePage = 'menu';
$kategori = $_GET['kategori'] ?? 'favorite';
$page = max(1, intval($_GET['page'] ?? 1));
$perPage = 8;
$offset = ($page-1)*$perPage;
$search = trim($_GET['search'] ?? '');
$where = "WHERE kategori='$kategori'";
if($search) $where .= " AND nama LIKE '%$search%'";
$res = $conn->query("SELECT COUNT(*) FROM produk $where");
$total = $res ? $res->fetch_row()[0] : 0;
$totalPages = max(1, ceil($total/$perPage));
$produk = [];
$res = $conn->query("SELECT * FROM produk $where ORDER BY id LIMIT $perPage OFFSET $offset");
while($res && $row = $res->fetch_assoc()) $produk[] = $row;
include "header_sidebar.php";
?>
<link rel="stylesheet" href="css/universal.css">
<link rel="stylesheet" href="css/carousel.css">
<div class="container-trans" style="max-width:980px;">
  <form method="get" action="menu.php" style="display:flex;justify-content:center;gap:12px;margin-bottom:18px;">
    <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori) ?>">
    <input type="text" name="search" placeholder="Cari produk..." value="<?= htmlspecialchars($search) ?>" style="width:60%;border-radius:14px;padding:13px 18px;font-size:1.07rem;">
    <button class="btn-grad" type="submit">Search</button>
  
  
  
  
  </form>
  <div class="center" style="margin-bottom:14px; display:flex; gap:16px; justify-content:space-between;">
  <button class="btn-grad <?= $kategori=='favorite'?'active':'' ?>" style="flex:1;" onclick="location.href='menu.php?kategori=favorite'">Favorite</button>
  <button class="btn-grad <?= $kategori=='best'?'active':'' ?>" style="flex:1;" onclick="location.href='menu.php?kategori=best'">Best Seller</button>
</div>
  <div class="produk-carousel">
    <?php foreach($produk as $prd): ?>
      <div class="produk-card">
        <div class="carousel-img-wrap">
          <img src="<?= htmlspecialchars($prd['gambar']) ?>" alt="<?= htmlspecialchars($prd['nama']) ?>">
        </div>
        <div class="produk-info">
          <div class="produk-nama"><?= htmlspecialchars($prd['nama']) ?></div>
          <button class="btn-grad view-btn"
            data-img="<?= htmlspecialchars($prd['gambar']) ?>"
            data-nama="<?= htmlspecialchars($prd['nama']) ?>"
            data-harga="<?= number_format($prd['harga'],0,',','.') ?>"
            data-stok="<?= $prd['stok'] ?>"
            data-ukuran="<?= htmlspecialchars($prd['ukuran']) ?>">View</button>
        </div>
      </div>
    <?php endforeach ?>
    <?php if(empty($produk)): ?>
      <div style="grid-column:1/-1;text-align:center;color:#fff;font-size:1.1rem;">Produk tidak ditemukan.</div>
    <?php endif ?>
  </div>
  <div class="pagination center" style="margin-top:18px;display:flex;justify-content:center;align-items:center;gap:8px;">
    <?php if($page>1): ?>
      <a class="btn-grad" href="menu.php?page=<?= $page-1 ?>&kategori=<?= $kategori ?>&search=<?= urlencode($search) ?>">&#8592; Prev</a>
    <?php endif ?>
    <?php for($i=1;$i<=$totalPages;$i++): ?>
      <a class="btn-grad <?= $i==$page?'active':'' ?>" href="menu.php?page=<?= $i ?>&kategori=<?= $kategori ?>&search=<?= urlencode($search) ?>"><?= $i ?></a>
    <?php endfor ?>
    <?php if($page<$totalPages): ?>
      <a class="btn-grad" href="menu.php?page=<?= $page+1 ?>&kategori=<?= $kategori ?>&search=<?= urlencode($search) ?>">Next &#8594;</a>
    <?php endif ?>
  </div>
</div>
<!-- Modal View image + detail -->
<div class="modal-img" id="modalImg" style="display:none;">
  <div class="modal-bg" onclick="closeModalImg()"></div>
  <div class="modal-card" style="display:flex;flex-direction:row;gap:40px;align-items:center;">
    <img id="modalImgSrc" src="" alt="" style="width:220px;height:330px;object-fit:cover;border-radius:16px;">
    <div>
      <div class="produk-modal-nama" id="modalImgNama" style="font-size:1.22rem;font-weight:700;color:#fff;margin-bottom:12px;"></div>
      <div class="produk-modal-harga" id="modalImgHarga" style="font-size:1.09rem;color:#fff;margin-bottom:8px;"></div>
      <div class="produk-modal-stok" id="modalImgStok" style="font-size:1.06rem;color:#fff;margin-bottom:8px;"></div>
      <div class="produk-modal-ukuran" id="modalImgUkuran" style="font-size:1.06rem;color:#fff;margin-bottom:8px;"></div>
      <button class="btn-grad" onclick="closeModalImg()" style="margin-top:18px;">Close</button>
    </div>
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
    document.getElementById('modalImgHarga').textContent = 'Rp ' + btn.dataset.harga;
    document.getElementById('modalImgStok').textContent = 'Stok: ' + btn.dataset.stok;
    document.getElementById('modalImgUkuran').textContent = 'Ukuran: ' + btn.dataset.ukuran;
    document.getElementById('modalImg').style.display = 'flex';
  }
});
</script>