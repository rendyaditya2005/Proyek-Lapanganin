<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// base path
$base = rtrim(dirname($_SERVER['SCRIPT_NAME']), "/\\");
if ($base === '/' || $base === '.' || $base === '') $base = '';

// ambil input form
$email = $_POST['email']    ?? '';
$pass  = $_POST['password'] ?? '';

// 1. cek admin dulu (hardcode dulu saja)
if ($email === 'admin@gmail.com' && $pass === 'admin123') {
  $_SESSION['user'] = [
    'name'  => 'Admin',
    'email' => $email,
    'role'  => 'admin'
  ];

  header('Location: ' . $base . '/admin');
  exit;
}

// 2. kalau bukan admin → anggap user biasa
// di sini silakan pakai logic lama kamu (cek ke database, dll).
// Contoh paling simpel:
if ($email === 'user@gmail.com' && $pass === 'user123') {
  $_SESSION['user'] = [
    'name'  => 'Rendy',        // ganti sesuai data user
    'email' => $email,
    'role'  => 'user'
  ];

  header('Location: ' . $base . '/');
  exit;
}

// 3. kalau email/password tidak cocok dua2nya
header('Location: ' . $base . '/login?error=1');
exit;
