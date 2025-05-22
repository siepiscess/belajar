<?php
session_start();
require "db_connect.php";
$produk = [];
$res = $conn->query("SELECT * FROM produk");
while($row = $res->fetch_assoc()) $produk[] = $row;

$pesanan = [];
$res = $conn->query("SELECT * FROM pesanan");
while($row = $res->fetch_assoc()) $pesanan[] = $row;
?>
<link rel="stylesheet" href="css/universal.css">
<link rel="stylesheet" href="css/header_sidebar.css">
<div class="container-trans" style="max-width:1140px; margin-top:38px;">
  <div style="display:flex;align-items:center;justify-content:space-between;">
    <h2 style="font-size:2rem;text-align:center;flex:1;">Dashboard Admin</h2>
    <form action="logout.php" method="post" style="margin-left:18px;">
      <button class="btn-grad" style="padding:7px 22px;font-size:.96rem;">Logout</button>
    </form>
  </div>
  <div class="center" style="margin-bottom:22px;">
    <div>
      <button class="btn-grad" onclick="showTab('produk')">Tabel Stok</button>
      <button class="btn-grad" onclick="showTab('pesanan')">Tabel Pemesanan</button>
    </div>
  </div>
  <div id="produkTab" class="tab-content" style="display:block;">
    <form id="addProdukForm" enctype="multipart/form-data" style="display:flex;gap:12px;margin-bottom:18px;align-items:center;justify-content:center;">
      <input type="text" name="nama" placeholder="Nama Produk" required />
      <input type="number" name="harga" placeholder="Harga" required min="1"/>
      <input type="number" name="stok" placeholder="Stok" required min="0"/>
      <input type="file" name="gambar" accept="image/*" required/>
      <select name="kategori">
        <option value="favorite">Favorite</option>
        <option value="best">Best Seller</option>
      </select>
      <button class="btn-grad" type="submit">+ Tambah</button>
    </form>
    <div id="produkNotif"></div>
    <table class="table-admin">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Image</th>
          <th>Kategori</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($produk as $i => $prd): ?>
        <tr data-id="<?= $prd['id']?>">
          <td><?= $i+1 ?></td>
          <td><?= htmlspecialchars($prd['nama']) ?></td>
          <td><?= $prd['harga']?></td>
          <td><?= $prd['stok']?></td>
          <td><img src="<?= htmlspecialchars($prd['gambar']) ?>" style="width:44px"></td>
          <td><?= htmlspecialchars($prd['kategori']) ?></td>
          <td>
            <button class="btn-grad editProdukBtn" data-id="<?= $prd['id']?>" style="padding:5px 14px;">Edit</button>
            <button class="btn-grad deleteProdukBtn" data-id="<?= $prd['id']?>" style="background:linear-gradient(90deg,#ff3131,#8b0000);color:#fff;padding:5px 14px;">Hapus</button>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
  <div id="pesananTab" class="tab-content" style="display:none;">
    <table class="table-admin">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Jenis Aglonema</th>
          <th>Size</th>
          <th>Jumlah</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($pesanan as $i => $row): ?>
        <tr data-id="<?= $row['id']?>">
          <td><?= $i+1 ?></td>
          <td><?= htmlspecialchars($row['nama']??'') ?></td>
          <td><?= htmlspecialchars($row['alamat']??'') ?></td>
          <td><?= htmlspecialchars($row['jenis_aglonema']??'') ?></td>
          <td><?= htmlspecialchars($row['size']??'') ?></td>
          <td><?= htmlspecialchars($row['jumlah']??'') ?></td>
          <td>
            <button class="btn-grad editPesananBtn" data-id="<?= $row['id']?>" style="padding:5px 14px;">Edit</button>
            <button class="btn-grad deletePesananBtn" data-id="<?= $row['id']?>" style="background:linear-gradient(90deg,#ff3131,#8b0000);color:#fff;padding:5px 14px;">Hapus</button>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</div>
<script>
function showTab(tab){
  document.getElementById('produkTab').style.display = tab=='produk'?'block':'none';
  document.getElementById('pesananTab').style.display = tab=='pesanan'?'block':'none';
}

// Tambah produk
document.getElementById('addProdukForm').onsubmit = function(e){
  e.preventDefault();
  let fd = new FormData(this);
  fetch('dashboard_produk_crud.php',{method:'POST',body:fd})
    .then(res=>res.text())
    .then(txt=>{
      document.getElementById('produkNotif').innerHTML='<div class="msg-success">'+txt+'</div>';
      setTimeout(()=>location.reload(),1000);
    });
}

// Hapus produk
document.querySelectorAll('.deleteProdukBtn').forEach(btn=>{
  btn.onclick = function(){
    if(confirm('Hapus produk ini?')) {
      fetch('dashboard_produk_crud.php?hapus='+btn.dataset.id)
        .then(res=>res.text())
        .then(()=>location.reload());
    }
  }
});

// Edit produk
document.querySelectorAll('.editProdukBtn').forEach(btn=>{
  btn.onclick = function(){
    let tr = btn.closest('tr');
    let id = btn.dataset.id;
    let nama = tr.children[1].innerText;
    let harga = tr.children[2].innerText;
    let stok = tr.children[3].innerText;
    let kategori = tr.children[5].innerText;
    let modal = document.createElement('div');
    modal.innerHTML = `
      <div style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;background:rgba(0,0,0,0.48);display:flex;align-items:center;justify-content:center;">
        <form id="editProdukForm" class="container-trans" style="gap:10px;max-width:350px;">
          <h3 class="center" style="margin-bottom:8px;">Edit Produk</h3>
          <input type="hidden" name="id" value="${id}">
          <label>Nama</label><input type="text" name="nama" value="${nama}" required>
          <label>Harga</label><input type="number" name="harga" value="${harga}" required min="1">
          <label>Stok</label><input type="number" name="stok" value="${stok}" required min="0">
          <label>Kategori</label>
          <select name="kategori">
            <option value="favorite" ${kategori=='favorite'?'selected':''}>Favorite</option>
            <option value="best" ${kategori=='best'?'selected':''}>Best Seller</option>
          </select>
          <label>Gambar (opsional)</label><input type="file" name="gambar" accept="image/*">
          <div class="row" style="gap:8px;">
            <button class="btn-grad" type="submit" style="flex:1;">Simpan</button>
            <button class="btn-grad" type="button" style="background:gray;flex:1;" onclick="this.closest('form').parentNode.remove()">Batal</button>
          </div>
        </form>
      </div>
    `;
    document.body.appendChild(modal);
    modal.querySelector('#editProdukForm').onsubmit = function(e){
      e.preventDefault();
      let fd = new FormData(this);
      fd.append('edit','1');
      fetch('dashboard_produk_crud.php', {method:'POST',body:fd})
      .then(res=>res.text())
      .then(txt=>{
        alert(txt); location.reload();
      });
    }
  }
});

// Hapus pesanan
document.querySelectorAll('.deletePesananBtn').forEach(btn=>{
  btn.onclick = function(){
    if(confirm('Hapus pesanan ini?')) {
      fetch('dashboard_pesanan_crud.php?hapus='+btn.dataset.id)
        .then(res=>res.text())
        .then(()=>location.reload());
    }
  }
});

// Edit pesanan
document.querySelectorAll('.editPesananBtn').forEach(btn=>{
  btn.onclick = function(){
    let tr = btn.closest('tr');
    let id = btn.dataset.id;
    let nama = tr.children[1].innerText;
    let alamat = tr.children[2].innerText;
    let jenis_aglonema = tr.children[3].innerText;
    let size = tr.children[4].innerText;
    let jumlah = tr.children[5].innerText;
    let modal = document.createElement('div');
    modal.innerHTML = `
      <div style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;background:rgba(0,0,0,0.48);display:flex;align-items:center;justify-content:center;">
        <form id="editPesananForm" class="container-trans" style="gap:10px;max-width:350px;">
          <h3 class="center" style="margin-bottom:8px;">Edit Pesanan</h3>
          <input type="hidden" name="id" value="${id}">
          <label>Nama</label><input type="text" name="nama" value="${nama}" required>
          <label>Alamat</label><input type="text" name="alamat" value="${alamat}" required>
          <label>Jenis Aglonema</label><input type="text" name="jenis_aglonema" value="${jenis_aglonema}" required>
          <label>Size</label><input type="text" name="size" value="${size}" required>
          <label>Jumlah</label><input type="number" name="jumlah" value="${jumlah}" min="1" required>
          <div class="row" style="gap:8px;">
            <button class="btn-grad" type="submit" style="flex:1;">Simpan</button>
            <button class="btn-grad" type="button" style="background:gray;flex:1;" onclick="this.closest('form').parentNode.remove()">Batal</button>
          </div>
        </form>
      </div>
    `;
    document.body.appendChild(modal);
    modal.querySelector('#editPesananForm').onsubmit = function(e){
      e.preventDefault();
      let fd = new FormData(this);
      fd.append('edit','1');
      fetch('dashboard_pesanan_crud.php', {method:'POST',body:fd})
      .then(res=>res.text())
      .then(txt=>{
        alert(txt); location.reload();
      });
    }
  }
});
</script>
<style>
.table-admin {
  width: 100%; background: var(--trans); border-radius: 16px; box-shadow: 0 2px 18px rgba(0,255,140,0.05); margin: 0 0 18px 0;
}
.table-admin th, .table-admin td { padding: 11px 7px; text-align:center; color:var(--white); border-bottom: 1px solid var(--border);}
.table-admin th {background: var(--green2);}
.table-admin img {border-radius:7px;}
.tab-content {animation: fadeIn .7s;}
</style>