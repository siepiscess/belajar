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
      <img src="assets/aglo1.jpg" alt="Aglonema" />
    </section>
  </div>
</div>
<style>
.main-home { margin-top: 90px; display: flex; justify-content: center; }
.home-content { display: flex; background: var(--trans); border-radius:22px; padding:46px 0; max-width:900px; width:92vw; }
.home-left { flex:1.2; padding:0 38px; display:flex; flex-direction:column; justify-content:center; }
.home-right { flex:1; display:flex; justify-content:center; align-items:center; }
.home-right img { width: 290px; border-radius: 18px; box-shadow:0 8px 32px rgba(0,255,140,0.08);}
.home-subtitle { font-size: 1.15rem; color: var(--green1); font-weight: 600; margin-bottom: 13px;}
.home-title { font-size: 2.8rem; font-weight: 800; margin-bottom: 16px; letter-spacing: -1.5px;}
.home-parag { font-size: 1.13rem; color: #f4f4f4; }
@media (max-width:900px){ .home-content{flex-direction:column;align-items:center;} .home-right{margin-top:24px;}}
</style>