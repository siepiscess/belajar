<?php
require "db_connect.php";
$conn->query("DELETE FROM produk");
for($i=1;$i<=14;$i++) {
  $conn->query("INSERT INTO produk (nama,harga,stok,gambar,kategori) VALUES ('Aglonema Favorite $i',".(10000+$i*1000).",".(10+$i).",'assets/aglo1.jpg','favorite')");
}
for($i=1;$i<=21;$i++) {
  $conn->query("INSERT INTO produk (nama,harga,stok,gambar,kategori) VALUES ('Aglonema Best $i',".(20000+$i*1200).",".(6+$i).",'assets/aglo2.jpg','best')");
}
echo "Produk Seeded!";