<?php
require_once 'config.php';
require_once 'functions.php';
require_login();

// Ambil pesan flash jika ada
$flash = $_SESSION['flash'] ?? '';
unset($_SESSION['flash']);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Tambah Kontak</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
    body{margin:0;background:linear-gradient(to bottom,#ffe6f2,#ffd4eb);font-family:"Poppins",sans-serif}
    .container{max-width:540px;margin:40px auto;padding:20px}
    .card{background:#fff;padding:22px;border-radius:14px;box-shadow:0 8px 24px rgba(200,50,110,0.10);border:1px solid rgba(255,150,210,0.35)}
    h2{margin:0 0 12px;color:#d62484}
    label{display:block;margin-top:10px;font-weight:600;color:#7a2a4a}
    input,textarea{width:100%;padding:10px;border-radius:8px;border:1px solid #efe1e8;margin-top:8px;font-size:14px}
    textarea{min-height:100px}
    .row{display:flex;gap:12px;margin-top:14px}
    .btn{background:#d62484;color:#fff;padding:12px 18px;border-radius:10px;border:0;font-weight:600;cursor:pointer}
    .back{display:inline-block;margin-left:8px;color:#b81d6b;text-decoration:none;padding:12px 18px;border-radius:10px}
    .flash{background:#fff0f6;color:#9b1232;padding:10px;border-radius:8px;border:1px solid #ffd4e6;margin-bottom:12px}
</style>
</head>
<body>
<div class="container">
    <div class="card">
        <h2>Tambah Kontak</h2>

        <?php if ($flash): ?>
            <div class="flash"><?= htmlspecialchars($flash) ?></div>
        <?php endif; ?>

        <form action="add_action.php" method="POST" autocomplete="off">
            <label>Nama <span style="color:#b81d6b">*</span></label>
            <input type="text" name="name" required>

            <label>Email <span style="color:#b81d6b">*</span></label>
            <input type="email" name="email" required>

            <label>Telepon <span style="color:#b81d6b">*</span></label>
            <!-- pattern memastikan hanya angka di browser -->
            <input type="text" name="phone" required pattern="[0-9]+" title="Nomor telepon hanya boleh angka">

            <label>Asal (opsional)</label>
            <input type="text" name="asal">

            <label>Catatan (opsional)</label>
            <textarea name="catatan"></textarea>

            <div class="row">
                <button type="submit" class="btn">Simpan</button>
                <a href="index.php" class="back">Batal</a>
            </div>
        </form>
    </div>
</div>
</body>
</html>
