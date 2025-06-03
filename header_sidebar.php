<?php
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
$username = $_SESSION['username'] ?? "User";
$email = $_SESSION['email'] ?? "user@example.com";
$activePage = $activePage ?? '';
$profile_pic = "";
if(isset($_SESSION['user_id'])) {
    require_once "db_connect.php";
    $uid = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT profile_pic FROM users WHERE id=?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $stmt->bind_result($profile_pic);
    $stmt->fetch();
    $stmt->close();
}
?>
<link rel="stylesheet" href="css/header_sidebar.css">
<header class="header-trans" style="position:sticky;top:0;z-index:1200;background:#004d00;">
  <div class="header-left">
    <button id="sidebarBtn" class="sidebar-btn" aria-label="Open Sidebar">
      <span></span><span></span><span></span>
    </button>
    <span class="header-title">Aglonema Store</span>
  </div>
  <div style="flex:1"></div>
  <div class="header-profile" style="display:flex;align-items:center;gap:13px;">
    <div class="profile-pic" id="profileBtn">
      <img src="<?= $profile_pic ? 'uploads/'.$profile_pic : 'assets/profile.svg' ?>" alt="profile" />
    </div>
    <div id="dropdownProfile" class="dropdown-profile">
      <div class="dropdown-info">
        <div class="dropdown-pic"><img src="<?= $profile_pic ? 'uploads/'.$profile_pic : 'assets/profile.svg' ?>" alt=""></div>
        <div>
          <div class="dropdown-name"><?= htmlspecialchars($username) ?></div>
          <div class="dropdown-email"><?= htmlspecialchars($email) ?></div>
        </div>
      </div>
      <a href="#" id="settingsLink">Settings</a>
      <a href="edit_profile.php" id="editProfileLink">Edit Profile</a>
      <a href="#" id="helpLink">Help & Support</a>
      <form action="logout.php" method="post" style="margin:8px 0 0 0;">
        <button class="btn-grad" style="width:100%;">Logout</button>
      </form>
    </div>
  </div>
</header>
<aside id="sidebarTrans" class="sidebar-trans">
  <div class="sidebar-container">
    <button class="sidebar-close" id="sidebarClose">&times;</button>
    <nav>
      <a href="home.php" class="<?= $activePage=='home'?'active':'' ?>">Home</a>
      <div class="sidebar-menu-expand">
        <button class="sidebar-expand-btn" id="expandBtn">All &nbsp;<span id="expandArrow" style="transition:.28s;"><b>&#9660;</b></span></button>
        <div class="sidebar-sub" id="sidebarSub">
          <a href="menu.php" class="<?= $activePage=='menu'?'active':'' ?>">Menu</a>
          <a href="pemesanan.php" class="<?= $activePage=='pemesanan'?'active':'' ?>">Pemesanan</a>
          <a href="contact.php" class="<?= $activePage=='contact'?'active':'' ?>">Contact</a>
        </div>
      </div>
      <button class="btn-grad admin-login-btn" onclick="window.location='login_admin.php'">Login Admin</button>
    </nav>
  </div>
</aside>
<!-- Modal Settings -->
<div id="settingsModal" class="custom-modal" style="display:none;">
  <div class="modal-content">
    <span class="modal-close" onclick="closeModal('settingsModal')">&times;</span>
    <h3>Settings</h3>
    <div style="margin-bottom:12px;">Sesuaikan tampilan dan preferensi akun Anda.</div>
    <div style="margin-bottom:10px;">
      <label>
        <input type="checkbox" id="darkModeToggle" /> Dark Mode <span id="darkModeStatus"></span>
      </label>
    </div>
    <div>
      <label>
        <input type="checkbox" id="notifToggle" checked /> Aktifkan notifikasi promo & info menarik
      </label>
    </div>
    <div style="font-size:.98rem;color:#888;margin-top:13px;">Pengaturan akan segera tersedia lebih lengkap!</div>
  </div>
</div>
<!-- Modal Help -->
<div id="helpModal" class="custom-modal" style="display:none;">
  <div class="modal-content">
    <span class="modal-close" onclick="closeModal('helpModal')">&times;</span>
    <h3>Help & Support</h3>
    <ul style="padding-left:18px;">
      <li>Butuh bantuan pesanan? Hubungi <b>Admin</b> via <a href="mailto:aglonemastore@email.com" style="color:#18bc9c;">Email</a> atau <a href="https://wa.me/628122334455" style="color:#18bc9c;">WhatsApp</a>.</li>
      <li>FAQ: <br>
        - Bagaimana cara memesan? Pilih produk, isi form, dan klik Pesan.<br>
        - Bagaimana jika stok habis? Hanya produk stok tersedia yang bisa dipesan.<br>
        - Bagaimana reset password? Edit profil & ganti password di halaman Edit Profile.
      </li>
      <li>Tips keamanan: Jangan pernah bagikan password ke orang lain.</li>
    </ul>
    <div style="font-size:.98rem;color:#888;margin-top:13px;">Masih bingung? Kirim pertanyaan ke tim support kami.</div>
  </div>
</div>
<style>
  .custom-modal { position:fixed;top:0;left:0;width:100vw;height:100vh;z-index:16000;background:rgba(0,0,0,0.36);display:flex;align-items:center;justify-content:center;}
  .modal-content { background:#fff; color:#222; border-radius:12px; max-width:340px; width:92vw; padding:26px 24px 18px 24px; position:relative; box-shadow:0 6px 32px rgba(0,0,0,0.19);}
  .modal-content h3 { margin-top:0; margin-bottom:14px;}
  .modal-close { position:absolute;top:12px;right:16px;font-size:1.4rem;cursor:pointer;color:#333;}
  @media(max-width:500px){ .modal-content{padding:14px 8px 12px 8px;} }
</style>
<script>
const sidebarBtn = document.getElementById('sidebarBtn');
const sidebar = document.getElementById('sidebarTrans');
const sidebarContainer = sidebar.querySelector('.sidebar-container');
const sidebarClose = document.getElementById('sidebarClose');
sidebarBtn.onclick = ()=>sidebar.classList.add('open');
sidebarClose.onclick = ()=>sidebar.classList.remove('open');
document.addEventListener('mousedown',e=>{
  if(sidebar.classList.contains('open') && !sidebarContainer.contains(e.target) && !sidebarBtn.contains(e.target)) sidebar.classList.remove('open');
});
const expandBtn = document.getElementById('expandBtn');
const sidebarSub = document.getElementById('sidebarSub');
const expandArrow = document.getElementById('expandArrow');
expandBtn.onclick = ()=>{
  sidebarSub.classList.toggle('show');
  expandArrow.style.transform = sidebarSub.classList.contains('show') ? 'rotate(180deg)' : '';
};
const profileBtn = document.getElementById('profileBtn');
const dropdownProfile = document.getElementById('dropdownProfile');
profileBtn.onclick = e=>{
  e.stopPropagation();
  dropdownProfile.classList.toggle('show');
};
window.addEventListener('mousedown',e=>{
  if(!dropdownProfile.contains(e.target) && !profileBtn.contains(e.target)) dropdownProfile.classList.remove('show');
});

// Modal Setting & Help
document.getElementById('settingsLink').onclick = function(e){ e.preventDefault(); openModal('settingsModal'); };
document.getElementById('helpLink').onclick = function(e){ e.preventDefault(); openModal('helpModal'); };
function openModal(id) {
  document.getElementById(id).style.display = "flex";
}
function closeModal(id) {
  document.getElementById(id).style.display = "none";
}
// Dark Mode toggle (dummy demo, real implementasi butuh class css)
const darkModeToggle = document.getElementById('darkModeToggle');
if(darkModeToggle) {
  darkModeToggle.onchange = function(){
    document.body.classList.toggle('dark-mode', darkModeToggle.checked);
    document.getElementById('darkModeStatus').textContent = darkModeToggle.checked ? ' (Aktif)' : '';
  };
}
</script>