<?php
require_once 'config.php';

if (isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// menangani pesan error (via ?error=1)
$error = isset($_GET['error']) ? 'Username atau kata sandi salah.' : '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Login — Manajemen Kontak</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *{box-sizing:border-box}
        body{
            margin:0;
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            background: linear-gradient(180deg,#ffe8f1,#ffd6ea);
            font-family:"Poppins",sans-serif;
            color:#4a0130;
        }
        .card{
            width:420px;
            background:#fff;
            padding:28px;
            border-radius:14px;
            box-shadow:0 8px 30px rgba(200,50,110,0.12);
            border:1px solid rgba(255,180,215,0.4);
        }
        h2{margin:0 0 8px 0;color:#d62484}
        p.sub{margin:0 0 18px 0;color:#7a2a4a;font-size:14px}
        input{width:100%;padding:12px;border-radius:8px;border:1px solid #efe1e8;margin-top:8px}
        button{width:100%;padding:12px;border-radius:10px;border:0;background:#d62484;color:#fff;font-weight:600;margin-top:14px;cursor:pointer}
        .error{background:#fff0f6;color:#9b1232;padding:10px;border-radius:8px;margin-bottom:12px;border:1px solid #ffd4e6}
        .note{margin-top:10px;font-size:13px;color:#8b3a5b}
    </style>
</head>
<body>
    <div class="card">
        <h2>Masuk</h2>
        <p class="sub">Silakan masuk untuk mengelola daftar kontak</p>

        <?php if ($error): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form action="login_action.php" method="post" autocomplete="off">
            <label for="username" style="font-weight:600">Nama Pengguna</label>
            <input id="username" name="username" type="text" required>

            <label for="password" style="font-weight:600;margin-top:10px;display:block">Kata Sandi</label>
            <input id="password" name="password" type="password" required>

            <button type="submit">Masuk</button>
        </form>

        
    </div>
</body>
</html>
