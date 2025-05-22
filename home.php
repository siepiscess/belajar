<?php $activePage='home'; include "header_sidebar.php"; ?>
<link rel="stylesheet" href="css/universal.css">
<div class="main-home">
  <div class="home-content">
    <section class="home-left">
      <div class="home-subtitle">Toko Tanaman Hias</div>
      <div class="home-title">Aglonema Store</div>
      <div class="home-parag">Selamat datang di Toko Aglonema terbaik! Temukan koleksi <b>Aglonema</b> favorit, best seller, dan jadikan rumahmu lebih indah & asri.</div>
    </section>
    <section class="home-right">
      <img class="aglo-animate" src="home.png" alt="home.jpg" />
    </section>
  </div>
</div>

<!-- About Us Section -->
<section class="about-us">
  <h2>Tentang Kami</h2>
  <p>
    Aglonema Store adalah pusat tanaman hias spesialis Aglonema dengan koleksi terlengkap dan harga terbaik. Kami berkomitmen memberi pelayanan ramah, produk sehat, dan pengiriman cepat ke seluruh Indonesia. Ingin hunianmu makin asri dan fresh? Percayakan pada kami!
  </p>
</section>

<!-- Keunggulan Kami Section -->
<section class="keunggulan-container">
  <h2 style="text-align:center;margin-bottom:26px;">Keunggulan Kami</h2>
  <div class="keunggulan-row">
    <div class="keunggulan-box">
      <img src="1.png" alt="Sehat" />
      <h3>Tanaman Super Sehat</h3>
      <p>Semua koleksi kami tumbuh sehat, daun lebat, dan siap mempercantik rumahmu!</p>
    </div>
    <div class="keunggulan-box">
      <img src="2.png" alt="Pengiriman Cepat" />
      <h3>Pengiriman Kilat</h3>
      <p>Packing aman dan pengiriman cepat ke seluruh Indonesia. Tanaman sampai tetap segar!</p>
    </div>
    <div class="keunggulan-box">
      <img src="3 (2).png" alt="Support" />
      <h3>Layanan Ramah</h3>
      <p>CS kami siap membantu konsultasi & order setiap hari. Fast response dan friendly!</p>
    </div>
  </div>
</section>

<!-- Map Section -->
<section class="map-section">
  <div class="map-desc">
    <h2>Lokasi Toko Kami</h2>
    <p>Kunjungi langsung Aglonema Store di Sleman Yogyakarta atau order online dari mana saja.<br>
       <b>Alamat:</b> Jl.Pandowoharjo, Sleman, Yogyakarta<br>
       <b>Jam buka:</b> Setiap hari, 08.00–20.00 WIB
    </p>
  </div>
  <div class="map-container">
    <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.224118944893!2d110.3685287!3d-7.6839778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5fea7e040191%3A0xad1c00834dda7cf1!2sOmah%20Krandon!5e0!3m2!1sid!2sid!4v1715667352584!5m2!1sid!2sid" 

      width="100%" height="220" style="border:0;border-radius:13px;" allowfullscreen="" loading="lazy"></iframe>
  </div>
</section>

<!-- Footer -->
<footer class="footer">
  <div class="footer-content">
    <div>
      <b>Aglonema Store</b> &copy; <?=date('Y')?> | Sleman Yogyakarta, Indonesia
    </div>
    <div>
      <a href="https://instagram.com/" target="_blank" class="footer-link"><img src="ig.png" alt="IG" /> Instagram</a>
      <a href="mailto:aglonemastore@email.com" class="footer-link"><img src="gmail.jpg" alt="Email" /> Email</a>
    </div>
  </div>
</footer>

<style>
/* Sticky Header (Berlaku di semua halaman jika header_sidebar.php di-include) */
header, .header {
  position: sticky;
  position: -webkit-sticky;
  top: 0; left: 0; right: 0;
  z-index: 1200;
  background: #004d00;
  box-shadow: 0px 2px 10px rgba(0,0,0,0.5);
}

/* Main Home Style */
.main-home { margin-top: 90px; display: flex; justify-content: center; }
.home-content { display: flex; background: var(--trans); border-radius:22px; padding:46px 0; max-width:900px; width:92vw; }
.home-left { flex:1.2; padding:0 38px; display:flex; flex-direction:column; justify-content:center; }
.home-right { flex:1; display:flex; justify-content:center; align-items:center; }
.home-right img { width: 290px; border-radius: 18px; box-shadow:0 8px 32px rgba(0,255,140,0.08);}
.home-subtitle { font-size: 1.15rem; color: var(--green1); font-weight: 600; margin-bottom: 13px;}
.home-title { font-size: 2.8rem; font-weight: 800; margin-bottom: 16px; letter-spacing: -1.5px;}
.home-parag { font-size: 1.13rem; color: #f4f4f4; }
@media (max-width:900px){ .home-content{flex-direction:column;align-items:center;} .home-right{margin-top:24px;}}

/* Animated Aglo Image */
.aglo-animate {
  animation: agloBounce 2.5s infinite cubic-bezier(0.4,0.01,0.29,0.99);
  will-change: transform;
}
@keyframes agloBounce {
  0% { transform: translateY(0);}
  20% { transform: translateY(-10px);}
  40% { transform: translateY(-18px);}
  60% { transform: translateY(-10px);}
  80% { transform: translateY(-3px);}
  100% { transform: translateY(0);}
}

/* About Us */
.about-us {
  max-width: 830px;
  margin: 52px auto 0 auto;
  background: rgba(0,77,0,0.18);
  padding: 32px 32px 22px 32px;
  border-radius: 18px;
  color: #fff;
  box-shadow: 0 2px 18px rgba(0,255,140,0.08);
}
.about-us h2 { font-size:2rem; color:var(--green1); margin-bottom:9px;}
.about-us p { font-size:1.1rem; color:#eaeaea; line-height:1.6; }

/* Keunggulan Kami Section */
.keunggulan-container {
  max-width: 970px;
  margin: 50px auto 0 auto;
  padding: 0 12px;
}
.keunggulan-row {
  display: flex;
  flex-wrap: wrap;
  gap: 24px;
  justify-content: center;
}
.keunggulan-box {
  background: linear-gradient(135deg,#013803 80%,#007a2f 100%);
  color: #fff;
  padding: 30px 24px 22px 24px;
  border-radius: 20px;
  box-shadow: 0 2px 18px rgba(0,255,140,0.08);
  flex: 1 1 210px;
  min-width: 210px;
  max-width: 260px;
  text-align: center;
  transition: transform .2s,box-shadow .2s;
  position: relative;
  overflow: hidden;
}
.keunggulan-box img {
  width: 42px; margin-bottom: 10px; filter: drop-shadow(0 2px 12px #01ff8c44);
  animation: keunggulanIcon 2.7s infinite alternate;
}
@keyframes keunggulanIcon {
  0% { transform: scale(1);}
  100% { transform: scale(1.12);}
}
.keunggulan-box h3 { font-size:1.14rem; margin:13px 0 10px 0; font-weight:700;}
.keunggulan-box p { color:#e0ffe3; font-size:.99rem;}
.keunggulan-box:hover { transform: translateY(-9px) scale(1.04); box-shadow: 0 6px 36px 0 #33ffbd33; }

/* Map Section */
.map-section {
  max-width: 950px;
  margin: 50px auto 0 auto;
  background: rgba(0,77,0,0.13);
  border-radius: 18px;
  display: flex;
  align-items: flex-start;
  gap: 24px;
  padding: 34px 26px;
  box-shadow: 0 2px 18px rgba(0,255,140,0.06);
  flex-wrap: wrap;
}
.map-desc {
  flex:1.3;
  color: #fff;
  padding-right: 10px;
}
.map-desc h2 { font-size:1.38rem; color:var(--green1); margin-bottom:11px;}
.map-desc p { font-size:1.07rem; }
.map-container {
  flex:1.3;
  min-width:240px;
  display:flex;
  align-items:center;
  justify-content:center;
}
@media (max-width:950px){
 .map-section{flex-direction:column;}
 .map-desc{padding-right:0;}
 .map-container{margin-top:18px;}
}

/* Footer */
.footer {
  background: #013803;
  color: #fff;
  padding: 26px 0 18px 0;
  font-size: 1rem;
  margin-top: 52px;
}
.footer-content {
  max-width: 950px;
  margin: 0 auto;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 18px;
}
.footer-link {
  color: #baffb4;
  margin-left: 18px;
  text-decoration: none;
  font-size: 1.01rem;
  display: inline-flex;
  align-items: center;
  gap: 4px;
  transition: color .2s;
}
.footer-link:hover { color: #fff; text-decoration: underline;}
.footer-link img { width: 20px; height: 20px;}
</style>