<?php
session_start();
require "db_connect.php";

// Hanya redirect ke login jika session user_id tidak ada
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Ambil info user
$stmt = $conn->prepare("SELECT username, email, profile_pic FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$stmt->bind_result($username, $email, $profile_pic);
$stmt->fetch();
$stmt->close();

$error = '';
$success = '';

// Update profile
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profile_update'])) {
    $new_username = trim($_POST['username']);
    $new_email = trim($_POST['email']);
    if ($new_username === "" || $new_email === "") {
        $error = "Nama dan email wajib diisi!";
    } else {
        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
            $tmp = $_FILES['profile_pic']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg','jpeg','png','gif','webp'];
            if (in_array($ext, $allowed)) {
                $filename = uniqid("profile_") . "." . $ext;
                $upload_dir = "uploads/";
                if (!is_dir($upload_dir)) mkdir($upload_dir,0777,true);
                move_uploaded_file($tmp, $upload_dir.$filename);
                if ($profile_pic && file_exists($upload_dir.$profile_pic)) unlink($upload_dir.$profile_pic);
                $profile_pic = $filename;
            } else {
                $error = "Format gambar tidak didukung!";
            }
        }
        if (!$error) {
            $stmt = $conn->prepare("UPDATE users SET username=?, email=?, profile_pic=? WHERE id=?");
            $stmt->bind_param("sssi", $new_username, $new_email, $profile_pic, $user_id);
            if ($stmt->execute()) {
                $_SESSION['username'] = $new_username;
                $_SESSION['email'] = $new_email;
                $success = "Profil berhasil diubah!";
            } else {
                $error = "Gagal update profil!";
            }
            $stmt->close();
        }
    }
}

// Update password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pw_update'])) {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error = "Password baru dan konfirmasi tidak cocok!";
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE id=?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($pw_hash);
        $stmt->fetch();
        $stmt->close();
        if (!password_verify($old_password, $pw_hash)) {
            $error = "Password lama salah!";
        } else {
            $new_pw_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $conn->query("UPDATE users SET password='$new_pw_hash' WHERE id=$user_id");
            $success = "Password berhasil diubah!";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/universal.css">
    <link rel="stylesheet" href="css/profile.css">
    <style>
        body {background: #f4f6fb;}
        .msg-success { background:#d0ffd0; color:#008800; border-radius:7px; padding:10px 0; margin-top:18px; text-align:center;}
        .msg-error { background:#ffd0d0; color:#bb1010; border-radius:7px; padding:10px 0; margin-top:18px; text-align:center;}
        .profile-section-title {font-size:1.34rem;font-weight:700;color:#222;margin-bottom:18px;}
        .card-shadow {background:#fff;border-radius:16px;box-shadow:0 2px 18px rgba(0,0,0,0.09);}
        .input-group {margin-bottom:12px;}
        .profile-info-form input[type="text"],
        .profile-info-form input[type="email"] {font-size:1.07rem;}
        .save-btn, .change-pw-btn {
            background:linear-gradient(90deg,#6d5dfc,#5f4ace);
            color:#fff;font-weight:600;border:none;border-radius:7px;
            padding:12px 0;font-size:1.03rem;width:100%;margin-top:10px;
            transition:background .14s,transform .13s,box-shadow .13s;
            box-shadow:0 2px 10px rgba(120,110,250,0.09);cursor:pointer;
        }
        .save-btn:hover, .change-pw-btn:hover {
            background:linear-gradient(90deg,#5f4ace,#6d5dfc);
            transform:translateY(-2px) scale(1.04);
        }
        .profile-avatar .avatar-camera-btn {
            background: #6d5dfc;
        }
        .profile-avatar .avatar-camera-btn:hover {
            background: #5f4ace;
        }
    </style>
</head>
<body>
<?php
$activePage = '';
include "header_sidebar.php";
?>
<div style="max-width:1120px;margin:54px auto 0 auto;padding:0 12px;">
    <div class="profile-main-title">My Profile</div>
    <div class="profile-row">
        <!-- Profile Information Card -->
        <div class="profile-card card-shadow">
            <div class="profile-section-title">Profile Information</div>
            <form method="post" enctype="multipart/form-data" class="profile-info-form">
                <input type="hidden" name="profile_update" value="1">
                <div class="profile-avatar-wrap">
                    <div class="profile-avatar">
                        <img src="<?= $profile_pic ? 'uploads/'.$profile_pic : 'assets/profile.svg' ?>" alt="Profile Photo">
                        <label for="profilePicInput" class="avatar-camera-btn" title="Ubah foto">
                            <svg width="19" height="19" fill="none" viewBox="0 0 20 20"><circle cx="10" cy="10" r="10" fill="#fff" /><path d="M10 5a3 3 0 100 6 3 3 0 000-6zm-7 12a8 8 0 1116 0H3z" fill="#6d5dfc"/></svg>
                            <input id="profilePicInput" type="file" name="profile_pic" accept="image/*" style="display:none" onchange="this.form.submit()">
                        </label>
                    </div>
                    <div style="font-size:.96rem;color:#777;margin-top:2px;">Click on the camera icon to select an image</div>
                </div>
                <div class="input-group">
                    <label>Full Name</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" required>
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
                </div>
                <button type="submit" class="save-btn">Save Changes</button>
            </form>
        </div>
        <!-- Change Password Card -->
        <div class="profile-card card-shadow">
            <div class="profile-section-title">Change Password</div>
            <form method="post" class="profile-info-form">
                <input type="hidden" name="pw_update" value="1">
                <div class="input-group">
                    <label>Current Password</label>
                    <input type="password" name="old_password" required>
                </div>
                <div class="input-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="input-group">
                    <label>Confirm Password</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <button type="submit" class="change-pw-btn">Change Password</button>
            </form>
        </div>
    </div>
    <?php if($error): ?><div class="msg-error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
    <?php if($success): ?><div class="msg-success"><?= htmlspecialchars($success) ?></div><?php endif; ?>
</div>
</body>
</html>