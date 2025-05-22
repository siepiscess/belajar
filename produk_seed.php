<?php
require "db_connect.php";
$conn->query("DELETE FROM produk");
$fav = [
  ["Aglonema Red Ruby", 150000, 10, "Sedang", "assets/aglo1.jpg", "Aglonema Red Ruby adalah jenis aglonema dengan warna merah cerah dan daun lebar. Ciri khasnya adalah batang pendek dan daun kuat, mudah tumbuh di indoor."],
  ["Aglonema Widuri", 170000, 14, "Besar", "assets/aglo2.jpg", "Aglonema Widuri punya motif pink-merah dan hijau, sangat dicari kolektor. Mudah dirawat dan tahan banting."],
  // ... tambahkan 12 data lain sesuai kebutuhan
];
foreach($fav as $f) {
  $conn->query("INSERT INTO produk (nama, harga, stok, ukuran, gambar, deskripsi, kategori) VALUES ('{$f[0]}', {$f[1]}, {$f[2]}, '{$f[3]}', '{$f[4]}', '{$f[5]}', 'favorite')");
}
for($i=1;$i<=12;$i++) {
  $conn->query("INSERT INTO produk (nama, harga, stok, ukuran, gambar, deskripsi, kategori) VALUES ('Aglonema Favorite $i', ".(110000+$i*1000).",".(8+$i).",'Sedang','assets/aglo1.jpg','Deskripsi aglonema favorite $i','favorite')");
}
$best = [
  ["Aglonema Snow White", 220000, 11, "Sedang", "assets/aglo2.jpg", "Aglonema Snow White terkenal dengan daun putih kehijauan dan mudah tumbuh."],
  // ... tambah 20 data best seller seperti contoh di atas
];
foreach($best as $b) {
  $conn->query("INSERT INTO produk (nama, harga, stok, ukuran, gambar, deskripsi, kategori) VALUES ('{$b[0]}', {$b[1]}, {$b[2]}, '{$b[3]}', '{$b[4]}', '{$b[5]}', 'best')");
}
for($i=1;$i<=20;$i++) {
  $conn->query("INSERT INTO produk (nama, harga, stok, ukuran, gambar, deskripsi, kategori) VALUES ('Aglonema Best $i', ".(120000+$i*1200).",".(10+$i).",'Besar','assets/aglo2.jpg','Deskripsi aglonema best seller $i','best')");
}
echo "Seeded!";