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
    let nama_orang = tr.children[1].innerText;
    let alamat = tr.children[2].innerText;
    let nama_aglo = tr.children[3].innerText;
    let size = tr.children[4].innerText;
    let ukuran = tr.children[5].innerText;
    let modal = document.createElement('div');
    modal.innerHTML = `
      <div style="position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:9999;background:rgba(0,0,0,0.48);display:flex;align-items:center;justify-content:center;">
        <form id="editPesananForm" class="container-trans" style="gap:10px;max-width:350px;">
          <h3 class="center" style="margin-bottom:8px;">Edit Pesanan</h3>
          <input type="hidden" name="id" value="${id}">
          <label>Nama Orang</label><input type="text" name="nama_orang" value="${nama_orang}" required>
          <label>Alamat</label><input type="text" name="alamat" value="${alamat}" required>
          <label>Nama Aglo</label><input type="text" name="nama_aglo" value="${nama_aglo}" required>
          <label>Size</label><input type="text" name="size" value="${size}" required>
          <label>Ukuran</label><input type="text" name="ukuran" value="${ukuran}" required>
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