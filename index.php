<?php
require_once 'config.php';
require_once 'functions.php';
require_login();

$contacts = read_contacts();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Kontak — Manajemen Kontak</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        html,body{height:100%;margin:0}
        body{
            display:flex;flex-direction:column;min-height:100vh;
            background:linear-gradient(180deg,#ffe8f1,#ffd6ea);
            font-family:"Poppins",sans-serif;color:#5b0033;
        }
        .header{background:#fff;padding:18px 28px;display:flex;justify-content:space-between;align-items:center;border-bottom:1px solid rgba(255,120,180,0.25);box-shadow:0 3px 12px rgba(255,110,170,0.12)}
        .title{font-size:22px;font-weight:600;color:#d62484}
        .controls{display:flex;align-items:center;gap:10px}
        .btn{background:#d62484;color:#fff;padding:10px 16px;border-radius:10px;text-decoration:none;font-weight:600}
        .btn.secondary{background:transparent;color:#b81d6b;border:1px solid transparent}
        .main{flex:1;display:flex;justify-content:center;padding:28px}
        .container{width:94%;max-width:720px}
        .card{background:#fff;padding:20px 22px;border-radius:16px;border:1px solid rgba(255,150,210,0.35);box-shadow:0 10px 28px rgba(200,50,110,0.12);margin-bottom:18px;transition:transform .12s}
        .card:hover{transform:translateY(-3px)}
        .row{display:grid;grid-template-columns:160px 1fr;gap:12px;margin-bottom:10px}
        .cell{padding:10px;border-radius:10px}
        .label{background:#ffe0ef;font-weight:600;color:#b31266;border:1px solid #ffb7d4}
        .value{background:#fff;border:1px solid #ffd4e6;color:#5b0033}
        .actions{margin-top:12px}
        .actions a{color:#d62484;text-decoration:none;font-weight:600;margin-right:12px}
        .empty{padding:40px;text-align:center;color:#c21864;font-style:italic}
        .footer{padding:14px;text-align:center;color:#a21d5a;background:rgba(255,245,250,0.7);border-top:1px solid rgba(255,140,190,0.35)}
    </style>
</head>
<body>

<div class="header">
    <div class="title">Daftar Kontak</div>
    <div class="controls">
        <a class="btn" href="add.php">+ Tambah Kontak</a>
        <a class="btn secondary" href="logout.php">Keluar</a>
    </div>
</div>

<div class="main">
    <div class="container">
        <?php if (count($contacts) === 0): ?>
            <div class="card empty">Belum ada kontak. Silakan tambahkan kontak baru.</div>
        <?php else: ?>
            <?php foreach ($contacts as $c): ?>
                <div class="card">
                    <div class="row">
                        <div class="cell label">Nama</div>
                        <div class="cell value"><?= htmlspecialchars($c['name']) ?></div>
                    </div>
                    <div class="row">
                        <div class="cell label">Email</div>
                        <div class="cell value"><?= htmlspecialchars($c['email']) ?></div>
                    </div>
                    <div class="row">
                        <div class="cell label">Telepon</div>
                        <div class="cell value"><?= htmlspecialchars($c['phone']) ?></div>
                    </div>
                    <div class="row">
                        <div class="cell label">Asal</div>
                        <div class="cell value"><?= htmlspecialchars($c['asal']) ?></div>
                    </div>
                    <div class="row">
                        <div class="cell label">Catatan</div>
                        <div class="cell value"><?= htmlspecialchars($c['catatan']) ?></div>
                    </div>

                    <div class="actions">
                        <a href="edit.php?id=<?= urlencode($c['id']) ?>">Edit</a>
                        <a href="delete_action.php?id=<?= urlencode($c['id']) ?>" onclick="return confirm('Hapus kontak ini?')">Hapus</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<div class="footer">© <?= date('Y') ?> Manajemen Kontak • Friskila R </div>

</body>
</html>
