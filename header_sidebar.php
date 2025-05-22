<?php
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
$username = $_SESSION['username'] ?? "User";
$email = $_SESSION['email'] ?? "user@example.com";
$activePage = $activePage ?? 'home';
?>
<link rel="stylesheet" href="css/header_sidebar.css">
<header class="header-trans">
  <div class="header-left">
    <button id="sidebarBtn" class="sidebar-btn" aria-label="Open Sidebar">
      <span></span><span></span><span></span>
    </button>
    <span class="header-title">Aglonema Store</span>
  </div>
  <div style="flex:1"></div>
  <div class="header-profile" style="display:flex;align-items:center;gap:13px;">
    <?php
if(session_status()!==PHP_SESSION_ACTIVE) session_start();
$username = $_SESSION['username'] ?? "User";
$email = $_SESSION['email'] ?? "user@example.com";
$activePage = $activePage ?? 'home';
?>
    <div class="profile-pic" id="profileBtn">
      <img src="assets/profile.svg" alt="profile" />
    </div>
    <div id="dropdownProfile" class="dropdown-profile">
      <div class="dropdown-info">
        <div class="dropdown-pic"><img src="assets/profile.svg" alt=""></div>
        <div>
          <div class="dropdown-name"><?= htmlspecialchars($username) ?></div>
          <div class="dropdown-email"><?= htmlspecialchars($email) ?></div>
        </div>
      </div>
      <a href="#">Settings</a>
      <a href="#">Edit Profile</a>
      <a href="#">Help & Support</a>
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
</script>